<?php

use App\Models\Plant;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $plants = Plant::all();
    return view('home', compact('plants'));
});
