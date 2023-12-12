<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'kategori';
    protected $primaryKey = 'id_kategori';
    public $timestamps = false;

    protected $fillable = [
        'nama_kategori'
    ];
    // Relasi one-to-many dengan makanan
    public function makanans()
    {
        return $this->hasMany(Makanan::class, 'id_kategori', 'nama_kategori');
    }
}