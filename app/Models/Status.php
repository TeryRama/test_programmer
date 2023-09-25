<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $fillable = ['nama_status']; // Sesuaikan nama kolom jika berbeda
    protected $table = 'status';
    public function products()
    {
        return $this->hasMany('App\Models\Product'); // Gantikan 'App\Product' dengan path yang sesuai jika lokasi file model berbeda

    }
}
