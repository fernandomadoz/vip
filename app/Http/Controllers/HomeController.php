<?php

namespace App\Http\Controllers;
use App\Tarjeta;
use App\Scan;

use Auth;
use QrCode;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\ExtController;




class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        //$Solicitudes = Solicitud::all();

        return View('welcome');
    }


    public function listarTarjetas()
    {

        $gen_modelo = 'Tarjeta';
        $gen_opcion = 0;
        $acciones_extra = array('Enviar,fa fa-qrcode,enviar');
        //$gen_seteo['filtros_por_campo'] = array('sucursal_id' => Auth::user()->sucursal_id);
        $gen_seteo['gen_url_siguiente'] = 'enviar/nro_de_id';

        
        $gen_seteo['mostrar_titulo'] = 'NO';
        $gen_seteo['titulo'] = '';
        
        /*
        $gen_seteo['table'] = [
            'searching' => 'false',
            'paging' => 'false',
            'pageLength' => 50
            ];
        */
        $gen_campos_a_ocultar = [
            'fecha_de_vencimiento',
            'nro_de_celular_a_enviar',
            'cantidad_de_personas'
        ];
        


        if ($gen_opcion > 0) {
            $Opcion = Opcion::where('id', $gen_opcion)->get();

            // Traigo los campos a Ocultar
            $campos_a_ocultar_array = explode('|', $Opcion[0]->no_listar_campos);
            foreach ($campos_a_ocultar_array as $campos_a_ocultar) {
                array_push($gen_campos_a_ocultar, $campos_a_ocultar);  
            }

            // Traigo las acciones extra
            $acciones_extra = explode('|', $Opcion[0]->acciones_extra);

        }        
        $GenericController = new GenericController();
        $gen_campos = $GenericController->traer_campos($gen_modelo, $gen_campos_a_ocultar);
        $gen_permisos = [
            'R',
            'C',
            'U',
            'D'
            ];

        $gen_filas = Tarjeta::all();

        //$gen_filas = call_user_func(array($this->dirModel($gen_modelo), 'all'), '*');
        //$gen_fila = call_user_func(array($this->dirModel($gen_modelo), 'find'), $gen_id);    

        $gen_nombre_tb_mostrar = $GenericController->nombreDeTablaAMostrar($gen_modelo);

        return View('genericas/func_list')
        ->with('gen_campos', $gen_campos)
        ->with('gen_modelo', $gen_modelo)
        ->with('gen_filas', $gen_filas)
        ->with('gen_seteo', $gen_seteo)
        ->with('gen_permisos', $gen_permisos)
        ->with('gen_opcion', $gen_opcion)
        ->with('gen_nombre_tb_mostrar', $gen_nombre_tb_mostrar)
        ->with('acciones_extra', $acciones_extra);       
    }

    public function enviarTarjeta($id) 
    {
        $Tarjeta = Tarjeta::find($id);

        $celular_wa = '';
        
        if ($Tarjeta->nro_de_celular_a_enviar <> '') {
            $celular_wa = $this->celular_wa($Tarjeta->nro_de_celular_a_enviar, '549');
        }


        return View('tarjetas/enviar')
        ->with('Tarjeta', $Tarjeta)
        ->with('celular_wa', $celular_wa);  

            
    }

    public function celular_wa($numero, $codigo_tel = '')
    {
        
        $celular_wa = trim($numero);


        if (substr($celular_wa, 0, 1) <> '+') {
            if (substr($celular_wa, 0, strlen($codigo_tel)) <> $codigo_tel) {
                $celular_wa = $codigo_tel.$celular_wa;
            }
        }
        
        $celular_wa = str_replace('+', '', $celular_wa);
        $celular_wa = str_replace(' ', '', $celular_wa);
        $celular_wa = str_replace('-', '', $celular_wa);
        $celular_wa = str_replace('(', '', $celular_wa);
        $celular_wa = str_replace(')', '', $celular_wa);
        $celular_wa = str_replace(',', '', $celular_wa);
        $celular_wa = str_replace('.', '', $celular_wa);
        
        return $celular_wa;
    }

    public function vipPassPrint($id, $hash) 
    {
        $Tarjeta = Tarjeta::find($id);

        $dir_imagen_url = '';

        if (md5(ENV('PREFIJO_HASH').$id) == $hash) {

            $hash = md5(ENV('PREFIJO_HASH').$id);
            $url_qrcode = ENV('PATH_PUBLIC').'vip-pass-check/'.$id.'/'.$hash;
            //echo $url_qrcode;
            $dir_imagen = env('PATH_PUBLIC_INTERNO').'qrcode/vip-pass-'.$id.'.png';
            $dir_imagen_url = env('PATH_PUBLIC').'qrcode/vip-pass-'.$id.'.png';

            QrCode::format('png');
            QrCode::size(200);
            QrCode::generate($url_qrcode, $dir_imagen);

            return View('tarjetas/vip-pass')
            ->with('Tarjeta', $Tarjeta)
            ->with('dir_imagen_url', $dir_imagen_url);  
        }
        else {
            echo 'ERROR';
        }

            
    }



    public function vipPassCheck($id, $hash)
    {   

        
        if (md5(ENV('PREFIJO_HASH').$id) == $hash) {

            $mensaje = '';
            $color_mensaje = '';
            $Tarjeta = Tarjeta::find($id);
            $Scans = Scan::where('tarjeta_id', $id);

            if ($Scans->count() > 0) {
                $sino = 'no';
                $mensaje = 'Pase ya utilizado';
                $color_mensaje = 'red';
            }
            else {
                $sino = 'si';
                $mensaje = 'Puede ingresar';
                $color_mensaje = 'green';
            }

            $Scan = new Scan();
            $Scan->tarjeta_id = $id;
            if (!Auth::guest()) {
                $Scan->user_id = Auth::user()->id;
            }            
            $Scan->save();



            return View('tarjetas/vip-pass-check')        
            ->with('mensaje', $mensaje)        
            ->with('color_mensaje', $color_mensaje)        
            ->with('sino', $sino)         
            ->with('Tarjeta', $Tarjeta);            
            }
        else {
            echo 'ERROR';
        }  


        if (isset($_POST['sino'])) {
            $sino = $_POST['sino'];

            if ($codigo == 8) {
                $nombre_de_campo = 'sino_asistio';
            }

            $Inscripcion = Inscripcion::find($inscripcion_id);
            $Inscripcion->$nombre_de_campo = $sino;
            $Inscripcion->save();



            return $nombre_de_campo;
        }





    }
    public function miCuenta()
    {   
        $user_id = Auth::user()->id;
        $User = User::find($user_id);

        return View('mi-cuenta')
        ->with('User', $User);
    }




}
