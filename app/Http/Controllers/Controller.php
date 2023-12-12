<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Makanan;
use Illuminate\Http\Request;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    // Index - Show all categories
    public function index()
    {
        $categories = Kategori::all();
        $makanan = Makanan::all();
        return view('admin', compact('categories', 'makanan'));
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
        // $request->validate([
        //     'url_gambar' => 'required|image|mimes:jpeg,png|max:2048',
        //     'nama_makanan' => 'required|string|max:255',
        //     'harga' => 'required|integer',
        //     'id_kategori' => 'required|exists:kategori,id_kategori'
        //     // Other validation rules for other fields
        // ]);

        // return redirect()->route('/')->with('success', 'Category updated successfully.');
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

    
        return redirect('/admin')->with('success', 'Category updated successfully.');
    }

    public function showMakanan($id)
    {
        $category = Kategori::findOrFail($id);
        $makanan = Makanan::with('kategori')->all();
        return view('kategori.show', compact('category', 'makanan'));
    }

    public function editMakanan(Request $request, $id)
    {
        $makanan = Makanan::findOrFail($id);

        $imagePath = $request->file('url_gambar')->store('uploads', 'public');

        $makanan->update([
            'url_gambar' => $imagePath,
            'nama_makanan' => $request->input('nama_makanan'),
            'harga' => $request->input('harga'),
            'id_kategori' => $request->input('id_kategori'),
            'deskripsi ' => $request->input('deskripsi'),
        ]);
        return redirect('/admin')->with('success', 'Category edited successfully.');
    }

    public function updateMakanan(Request $request, $id)
    {
        $category = Kategori::findOrFail($id);
        $category->update($request->all());
        return redirect()->route('kategori.index')->with('success', 'Category updated successfully.');
    }

    public function destroyMakanan($id)
    {
        $category = Makanan::findOrFail($id);
        $category->delete();
        return redirect('/admin')->with('success', 'Category deleted successfully.');
    }
}