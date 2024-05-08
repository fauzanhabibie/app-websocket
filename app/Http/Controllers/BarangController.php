<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use App\Events\BarangAdded;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barang = Barang::all();

       return view('barang.daftarbarang',['barang' => $barang]); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('barang.form'); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        
         $request->validate([
            'nama_barang' => 'required|string|max:255'
        ]);

        // dd($validate); 


        // Simpan barang ke dalam penyimpanan (misalnya, database)
        $barang = new Barang;
        $barang->nama_barang = $request->nama_barang;
        $barang->save();

        // Kirim event BarangAdded ke WebSocket setelah barang berhasil disimpan
        event(new BarangAdded($request->nama_barang));

        // Jika request adalah AJAX, kirim respon JSON
        if ($request->ajax()) {
            return response()->json(['message' => 'Barang berhasil ditambahkan']);
        }

        // Jika bukan request AJAX, redirect kembali dengan pesan flash
        return redirect()->back()->with('success', 'Barang berhasil ditambahkan');
    }
    /**
     * Display the specified resource.
     */
    public function show(Barang $barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Barang $barang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Barang $barang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Barang $barang)
    {
        //
    }
}
