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

Route::get('/buscar', function () {
    $query = request('q');
    $plants = Plant::where('name', 'like', "%{$query}%")
        ->orWhere('binomial_name', 'like', "%{$query}%")
        ->get();

    return view('search', compact('plants', 'query'));
});
