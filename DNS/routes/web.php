<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ComputerController;
// routes/web.php

use App\Http\Controllers\ProductController;

// Маршруты для управления товарами
Route::get('/admin', 'ProductController@index')->name('admin');
Route::get('/get_product', 'ProductController@getProduct')->name('get_product');
Route::post('/add_product', 'ProductController@addProduct')->name('add_product');
Route::post('/edit_product', 'ProductController@editProduct')->name('edit_product');
Route::post('/delete_product', 'ProductController@deleteProduct')->name('delete_product');

Route::get('/', [ProductController::class, 'index']);
Route::get('/category/{type}', [ProductController::class, 'showCategory']);
Route::get('/product/{articul}', [ProductController::class, 'showProduct']);
Route::get('/search', [ProductController::class, 'search']);
Route::get('/about', function () {
    return view('home');
});
Route::get('/signin', function () {
    return view('signin');
});
Route::get('/login', function () {
    return view('login');
});

Route::get('/computer', function () {
    return view('computer');
});
Route::get('/more', function () {
    return view('more');
});
Route::get('/kor', function () {
    return view('kor');
});
Route::get('/user', function () {
    return view('user');
});
Route::get('/support', function () {
    return view('support');
});
Route::get('/admin', function () {
    return view('admin.admin');
});
