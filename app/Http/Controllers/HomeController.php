<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Produk;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function dashboard()
    {
        $data = Produk::allData();
        // dd($data);
        return view('dashboard', compact('data'));
    }
    public function index()
    {
        $data = Produk::fetchWithRelations();

        // dd($data);
        return view('index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['kategori'] = Kategori::get();
        $data['status'] = Status::get();
        return view('create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'nama_produk' => 'required|string|max:255',
            'harga'       => 'required|numeric|min:0',
            'kategori'    => 'required',
            'status'      => 'required',

        ]);

        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $data['nama_produk'] = $request->nama_produk;
        $data['harga']       = $request->harga;
        $data['id_kategori'] = $request->kategori;
        $data['id_status']   = $request->status;

        Produk::create($data);

        return redirect()->route('all');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id_produk)
    {

        $produk = Produk::find($id_produk);

        if (!$produk) {
            return redirect()->back()->with('error', 'Produk tidak ditemukan.');
        }

        $kategori = Kategori::all();
        $status   = Status::all();

        return view('edit', ['produk' => $produk, 'kategori' => $kategori, 'status' => $status]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id_produk)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'nama_produk' => 'required|string|max:255',
            'harga'       => 'required|numeric|min:0',
            'kategori'    => 'required',
            'status'      => 'required',

        ]);

        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $data['nama_produk'] = $request->nama_produk;
        $data['harga']       = $request->harga;
        $data['id_kategori'] = $request->kategori;
        $data['id_status']   = $request->status;

        // Produk::whereId($id_produk)->update($data);
        Produk::where('id_produk', $id_produk)->update($data);


        return redirect()->route('all');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id_produk)
    {
        $data = Produk::find($id_produk);

        if ($data) {
            $data->delete();
        }

        return redirect()->route('all');
    }
}
