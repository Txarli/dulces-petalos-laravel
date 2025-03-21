<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Plant;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class PlantController extends Controller
{
    public function index()
    {
        $plants = Plant::all();
        return view('admin.plants.index', compact('plants'));
    }

    public function create()
    {
        return view('admin.plants.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'binomial_name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'image' => 'required|image|mimes:jpg,jpeg',
            'waterings_per_week' => 'required|integer|min:0',
            'fertilizer_type' => 'required|in:nitrogen,phosphorus',
            'height_in_cm' => 'required|integer|min:0',
        ]);

        // Procesar imagen
        $image = $request->file('image');
        $filename = Str::uuid() . '.webp';
        $folder = storage_path('app/public/plants');

        if (!file_exists($folder)) {
            mkdir($folder, 0755, true);
        }

        $path = $folder . '/' . $filename;

        $img = imagecreatefromjpeg($image->getRealPath());
        imagewebp($img, $path, 90);
        imagedestroy($img);

        $imgUrl = asset('storage/plants/' . $filename);

        Plant::create([
            'name' => $validated['name'],
            'binomial_name' => $validated['binomial_name'],
            'price' => $validated['price'],
            'img_url' => $imgUrl,
            'waterings_per_week' => $validated['waterings_per_week'],
            'fertilizer_type' => $validated['fertilizer_type'],
            'height_in_cm' => $validated['height_in_cm'],
        ]);

        return redirect()->route('admin.plants.index')->with('success', 'Planta creada correctamente.');
    }

    public function edit(Plant $plant)
    {
        return view('admin.plants.edit', compact('plant'));
    }

    public function update(Request $request, Plant $plant)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'binomial_name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpg,jpeg',
            'waterings_per_week' => 'required|integer|min:0',
            'fertilizer_type' => 'required|in:nitrogen,phosphorus',
            'height_in_cm' => 'required|integer|min:0',
        ]);

        $imgUrl = $plant->img_url;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = Str::uuid() . '.webp';
            $folder = storage_path('app/public/plants');

            if (!file_exists($folder)) {
                mkdir($folder, 0755, true);
            }

            $path = $folder . '/' . $filename;
            $img = imagecreatefromjpeg($image->getRealPath());
            imagewebp($img, $path, 90);
            imagedestroy($img);

            $imgUrl = asset('storage/plants/' . $filename);
        }

        $plant->update([
            'name' => $validated['name'],
            'binomial_name' => $validated['binomial_name'],
            'price' => $validated['price'],
            'img_url' => $imgUrl,
            'waterings_per_week' => $validated['waterings_per_week'],
            'fertilizer_type' => $validated['fertilizer_type'],
            'height_in_cm' => $validated['height_in_cm'],
        ]);

        return redirect()->route('admin.plants.index')->with('success', 'Planta actualizada correctamente.');
    }

    public function destroy(Plant $plant)
    {
        $plant->delete();
        return redirect()->route('admin.plants.index')->with('success', 'Planta eliminada correctamente.');
    }
}
