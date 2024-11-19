<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProyectosController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'getHome']);



Route::get('login', function() {
    return view('auth.login');
});

Route::get('logout', function() {
    return 'Logout usuario';
});

Route::get('proyectos', [ProyectosController::class, 'getIndex']);


Route::get('proyectos/show/{id}', [ProyectosController::class, 'getShow'])->where('id', '[0-9]+');

Route::get('proyectos/create', function() {
    return view('proyectos.create');
});

Route::get('proyectos/edit/{id}', function($id) {
    return view('proyectos.edit', array('id'=>$id));
})->where('id', '[0-9]+');

Route::get('perfil/{id?}', function($id = null) {
    return $id ? 'Visualizar el currículo de '. $id : 'Visualizar el currículo propio';
})->where('id', '[0-9]*');
