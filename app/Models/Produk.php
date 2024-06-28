<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    protected $table = "produk";
    protected $fillable = ['nama', 'deskripsi', 'harga', 'stok', 'gambar'];

    public function merek()
    {
        return $this->belongsTo(Merek::class, 'id_merek');
    }
    public $timestamps = false;
}
