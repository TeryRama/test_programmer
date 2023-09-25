<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $fillable = ['id_produk', 'nama_produk', 'harga', 'id_kategori', 'id_status'];
    protected $table = 'produk';
    protected $primaryKey = 'id_produk';
    public function kategori()
    {
        return $this->belongsTo('App\Models\Kategori');
    }

    public function status()
    {
        return $this->belongsTo('App\Models\Status');
    }

    public function satuan()
    {
        return $this->belongsTo('App\Models\Satuan');
    }

    public static function fetchWithRelations()
    {
        return self::join('kategori', 'produk.id_kategori', '=', 'kategori.id_kategori')
            ->join('status', 'produk.id_status', '=', 'status.id_status')
            ->select('id_produk', 'produk.nama_produk', 'produk.harga', 'kategori.nama_kategori', 'status.nama_status')
            ->where('status.nama_status', '=', 'bisa dijual')
            ->get();
    }
    public static function allData()
    {
        return self::join('kategori', 'produk.id_kategori', '=', 'kategori.id_kategori')
            ->join('status', 'produk.id_status', '=', 'status.id_status')
            ->select('id_produk', 'produk.nama_produk', 'produk.harga', 'kategori.nama_kategori', 'status.nama_status')
            ->get();
    }
}
