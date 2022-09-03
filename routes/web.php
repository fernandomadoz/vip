<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



	

Route::group(['middleware' => 'auth'], function () {

	
	Route::get('/', function () {
	    return view('tarjetas/tarjetas');
	});	
	Route::get('/home', 'HomeController@index');
	Route::get('/micuenta', 'HomeController@miCuenta');
	Route::post('/listar-tarjetas', 'HomeController@listarTarjetas');
	Route::get('/tarjetas', function () {
	    return view('tarjetas/tarjetas');
	});	
	
	Route::get('/enviar/{id}', 'HomeController@enviarTarjeta');	


	// RUTAS GENERICAS
	Route::post('/crearlista', 'GenericController@crearLista');
	Route::post('/crearabm', 'GenericController@crearABM');
	Route::post('/enviarabm/{gen_modelo}', 'GenericController@crearABM');
	Route::post('/store', 'GenericController@store');
	Route::get('/list/{gen_modelo}/{gen_opcion}', 'GenericController@index');
	// FIN RUTAS GENERICAS


});

Route::get('/prueba', function () {
    return view('prueba');
});	


Auth::routes();

Route::get('/delcache', function () {
    $exitCode = Artisan::call('cache:clear');
    echo 'Cache Borrada';
});




Route::get('/vip-pass/{id}/{hash}', 'HomeController@vipPassPrint');
Route::get('/vip-pass-check/{id}/{hash}', 'HomeController@vipPassCheck');