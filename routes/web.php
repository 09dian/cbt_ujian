<?php

use Illuminate\Support\Facades\Route;


Route::get('/a', function () {
    return redirect('admin');
});
// // Route for teacher view
// Route::get('/teacher', function () {
//     return redirect('/teacher');
// });

Route::get('/', function () {
      return redirect('/student');
});
