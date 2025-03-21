<?php

use App\Models\Plant;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PlantController;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

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


Route::prefix('admin')->group(function () {
    Route::get('/plants', [PlantController::class, 'index'])->name('admin.plants.index');
    Route::get('/plants/create', [PlantController::class, 'create'])->name('admin.plants.create');
    Route::post('/plants', [PlantController::class, 'store'])->name('admin.plants.store');
    Route::get('/plants/{plant}/edit', [PlantController::class, 'edit'])->name('admin.plants.edit');
    Route::put('/plants/{plant}', [PlantController::class, 'update'])->name('admin.plants.update');
    Route::delete('/plants/{plant}', [PlantController::class, 'destroy'])->name('admin.plants.destroy');
});

Route::get('/login', fn() => view('auth.login'))->name('login');

Route::post('/login', function (Request $request) {
    $credentials = $request->only('email', 'password');
    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        return redirect()->intended('/');
    }

    return back()->withErrors(['email' => 'Credenciales incorrectas']);
});

Route::post('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/');
})->name('logout');

Route::middleware('auth')->prefix('admin')->group(function () {
    Route::resource('plants', App\Http\Controllers\Admin\PlantController::class)
        ->names('admin.plants');
});
