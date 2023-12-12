<?php
// app/Models/Makanan.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Makanan extends Model
{
    protected $table = 'makanan';
    protected $primaryKey = 'id';
    public $timestamps = false; // Assuming you don't have timestamps in the table

    protected $fillable = [
        'id_kategori',
        'nama_makanan',
        'harga',
        'deskripsi',
        'url_gambar',

    ];

    // Define the relationship with Kategori
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori', 'id_kategori');
    }
}