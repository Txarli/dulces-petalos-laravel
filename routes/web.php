<?php

use App\Models\Plant;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $plants = Plant::all();
    return view('home', compact('plants'));
});

Route::get('/plant/{id}', function ($id) {
    $plant = Plant::find($id);
    return view('plant', compact('plant'));
});
