<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function index()
    {
        $images = Image::all();
        return view('images.index', compact('images'));
    }

      public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $path = $request->file('image')->store('images', 'public');

        $validated['image'] = $path;

        Image::create($validated);

        return redirect()->route('images.index')->with('success', 'Image hochgeladen!');
    }
    public function create()
    {
        return view('images.create');
    }

    public function show(Image $image)
    {
        return view('images.show', ['image' => $image]);
    }


    public function edit(Image $image)
    {
        
        return view('images.edit', compact('image'));
    }

    public function update(Request $request, Image $image)
{
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    if ($request->hasFile('image')) {

        if ($image->image && \Storage::disk('public')->exists($image->image)) {
            \Storage::disk('public')->delete($image->image);
        }

        $path = $request->file('image')->store('images', 'public');
        
        $validated['image'] = $path;
    }

    $image->update($validated);

    return redirect()->route('images.index')->with('success', 'Image updated successfully!');
}



    public function destroy(Image $image)
    {
        $image->delete();
        return redirect()->route('images.index')->with('success', 'Unternehmen deleted successfully!');
    }

}
