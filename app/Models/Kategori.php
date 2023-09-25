<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $fillable = ['nama_kategori']; // Sesuaikan nama kolom jika berbeda
    protected $table = 'kategori';
    public function products()
    {
        return $this->hasMany('App\Models\Product'); // Gantikan 'App\Product' dengan path yang sesuai jika lokasi file model berbeda
    }
}
