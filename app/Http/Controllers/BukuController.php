<?php

namespace App\Http\Controllers;

use App\Models\buku;
use App\Models\kategori;
use App\Models\penerbit;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $allBuku = buku::all();
        return view("buku.index", compact("allBuku"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $penerbit = penerbit::all();
        $kategori = kategori::all();
        return view("buku.create", compact("penerbit","kategori"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validation
        $validateData = $request->validate([
            "judul" => "required|max:100",
            "pengarang" => "required|max:100",
            "tahun_terbit" => "required|int:4",
            "kategori_id" => "required",
            "penerbit_id" => "required",
        ]);
        // Save Data
        buku::create($validateData);

        // Redirect
        return redirect()->route("buku.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(buku $buku)
    {
        //
        return view("buku.show", compact("buku"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(buku $buku)
    {
        //
        $penerbit = penerbit::all();
        $kategori = kategori::all();
        return view("buku.edit", compact("buku", "penerbit", "kategori"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, buku $buku)
    {
        // Validate
        $validateData = $request->validate([
            "judul" => "required|max:100",
            "pengarang" => "required|max:100",
            "tahun_terbit" => "required|int:4",
            "kategori_id" => "required",
            "penerbit_id" => "required",
        ]);

        // Update
        $buku->update($validateData);

        // Redirect
        return redirect()->route("buku.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(buku $buku)
    {
        // 
        $buku->delete();
        return redirect()->route("buku.index");
    }
}
