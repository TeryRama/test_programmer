<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Support\Facades\Http;
use App\Models\Produk;
use App\Models\Status;

class ApiController extends Controller
{
    public function fetchDataFromApi()
    {
        $endpoint = 'https://recruitment.fastprint.co.id/tes/api_tes_programmer';
        $username = 'tesprogrammer240923C19';
        $password = md5('bisacoding-24-09-23');

        $response = Http::asForm()->post($endpoint, [
            'username' => $username,
            'password' => $password
        ]);

        $dataFromApi = $response->json();

        if (isset($dataFromApi['data'])) {
            foreach ($dataFromApi['data'] as $item) {
                $category = Kategori::firstOrCreate(['nama_kategori' => $item['kategori']]);
                $status = Status::firstOrCreate(['nama_status' => $item['status']]);
                Produk::create([
                    'nama_produk' => $item['nama_produk'],
                    'harga'       => $item['harga'],
                    'id_kategori' => $category->id_kategori,
                    'id_status'   => $status->id_status
                ]);
            }
        } else {
            return response()->json(['message' => 'Tidak ada data yang ditemukan atau terjadi kesalahan.']);
        }

        return response()->json(['message' => 'Data berhasil di-import!']);
    }
}
