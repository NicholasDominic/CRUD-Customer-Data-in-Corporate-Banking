<?php
use Illuminate\Support\Facades\Route;

Route::get('/', 'display@showData');
Route::get('/add', function () {return view('addview');})->name('add'); // alias route
Route::post('/add', 'add_controller@add_customer_data');
Route::post('/edit', 'edit_controller@edit')->name('edit_data');
Route::post('/delete', 'delete_controller@delete_data')->name('delete_data');
Route::get('/search', 'Select2Controller@loadData');
