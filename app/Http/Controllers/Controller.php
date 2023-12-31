<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Makanan;
use App\Models\Image;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;


class Controller extends BaseController
{
    // Index - Show all categories
    public function index()
    {
        $categories = Kategori::all();
        $makanan = Makanan::all();
        $logo = Image::find(8);
        return view('admin', compact('categories', 'makanan', 'logo'));
    }

    // public function store(Request $request)
    // {
    //     $kategoriData = $request->only(['nama_kategori']);

    //     Kategori::create($kategoriData);

    //     return redirect('/admin')->with('success', 'Category created successfully.');
    // }

    // public function show($id)
    // {
    //     $category = Kategori::findOrFail($id);
    //     return view('kategori.show', compact('category'));
    // }

    // public function edit(Request $request, $id)
    // {
    //     $category = Kategori::findOrFail($id);
    //     $category->update($request->all());
    //     return redirect('/admin')->with('success', 'Category edited successfully.');
    // }

    // public function update(Request $request, $id)
    // {
    //     $category = Kategori::findOrFail($id);
    //     $category->update($request->all());
    //     return redirect()->route('kategori.index')->with('success', 'Category updated successfully.');
    // }

    // public function destroy($id)
    // {
    //     $category = Kategori::findOrFail($id);
    //     $category->delete();
    //     return redirect('/admin')->with('success', 'Category deleted successfully.');
    // }

    public function storeMakanan(Request $request)
    {
        // Validate the form data, including the image upload
        $request->validate([
            'url_gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
            'nama_makanan' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'id_kategori' => 'required|integer',
            'deskripsi' => 'required|string|max:255',
        ], [
            'url_gambar.required' => 'Gambar harus ada.',
            'url_gambar.image' => 'File harus berupa gambar.',
            'url_gambar.mimes' => 'Tipe yang diterima adalah: jpeg, png, jpg, gif, svg.',
            'url_gambar.max' => 'Gambar harus berukuran kurang dari 4096 KB.',
        ]);

        // Handle file upload
        $imagePath = $request->file('url_gambar')->store('uploads', 'public');

        // Save the data to the database
        Makanan::create([
            'url_gambar' => $imagePath,
            'nama_makanan' => $request->input('nama_makanan'),
            'harga' => $request->input('harga'),
            'id_kategori' => $request->input('id_kategori'),
            'deskripsi' => $request->input('deskripsi')
            // Other fields
        ]);

        return redirect('/admin')->with('success', 'Makanan created successfully.');
    }

    public function showMakanan($id)
    {
        $category = Kategori::findOrFail($id);
        $makanan = Makanan::with('kategori')->all();
        return view('kategori.show', compact('category', 'makanan'));
    }

    public function editMakanan(Request $request, $id)
    {
        $request->validate([
            'url_gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
            'nama_makanan' => 'required|string',
            'harga' => 'required|numeric',
            'id_kategori' => 'required|integer',
            'deskripsi' => 'required|string',
        ]);

        $makanan = Makanan::findOrFail($id);

        $imagePath = $request->file('url_gambar')->store('uploads', 'public');

        $makanan->update([
            'url_gambar' => $imagePath,
            'nama_makanan' => $request->input('nama_makanan'),
            'harga' => $request->input('harga'),
            'id_kategori' => $request->input('id_kategori'),
            'deskripsi' => $request->input('deskripsi'),
        ]);

        return redirect('/admin')->with('success', 'Makanan edited successfully.');
    }

    public function updateMakanan(Request $request, $id)
    {
        $category = Kategori::findOrFail($id);
        $category->update($request->all());
        return redirect()->route('kategori.index')->with('success', 'Makanan updated successfully.');
    }

    public function destroyMakanan($id)
    {
        $category = Makanan::findOrFail($id);
        $category->delete();
        return redirect('/admin')->with('success', 'Makanan deleted successfully.');
    }
}
