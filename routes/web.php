<?php

use Illuminate\Support\Facades\Route;

Route::get('/login', function () {
    return "Login";
})->name('login');

/*
Route::middleware([])->group(function () {

    Route::prefix('admin')->group(function () {

        Route::namespace('Admin')->group(function () {

            Route::name('admin.')->group(function () {
                Route::get('/dashboard', 'TesteController@teste')->name('dashboard');
        
                Route::get('/financeiro', 'TesteController@teste')->name('financeiro');
                
                Route::get('/produtos', 'TesteController@teste')->name('produtos');

                Route::get('/', function () {
                    return redirect()->route('admin.dashboard');
                })->name('home');
            });
        });
    });
});
*/

Route::group([
    'middleware' => [],
    'prefix' => 'admin',
    'namespace' => 'Admin'
], function () {
    Route::get('/dashboard', 'TesteController@teste')->name('admin.dashboard');
        
    Route::get('/financeiro', 'TesteController@teste')->name('admin.financeiro');
                
    Route::get('/produtos', 'TesteController@teste')->name('admin.produtos');

    Route::get('/', function () {
                    return redirect()->route('admin.dashboard');
    })->name('admin.home');
});

Route::get('redirect3', function () {
    return redirect()->route('url.name');
});

Route::get('/nome-url', function () {
    return "Hey hey hey";
})->name('url.name');

Route::view('/view', 'site.contact');

Route::redirect('/redirect1', '/redirect2');

Route::get('redirect2', function () {
    return "Redirect 02";
});

// Route::get('redirect1', function () {
//     return redirect('/redirect2');
// });

Route::get('/produtos/{idProduct?}', function ($idProduct = '') {
    return "Produto(s) {$idProduct}";
});

Route::get('/categoria/{flag}/posts', function ($flag) {
    return "Posts da categoria: {$flag}";
});

Route::get('/categorias/{flag}', function ($flag) {
    return "Produtos da categoria: {$flag}";
});

Route::match(['get', 'post'], '/match', function () {
    return 'Match';
});

Route::any('/any', function () {
    return 'Any';
});

Route::post('/register', function () {
    return '<h1>Sobre a Empresa</h1>';
});

Route::get('/empresa', function () {
    return '<h1>Sobre a Empresa</h1>';
});

Route::get('/contato', function () {
    return view('contact');
});

Route::get('/', function () {
    return view('welcome');
});