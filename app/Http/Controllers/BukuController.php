<?php

namespace App\Http\Controllers;

use App\Models\buku;
use App\Models\kategori;
use App\Models\penerbit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        // Cari Buku
        $query = $request->input("q");
        if ($query) {
            # code...
            $allBuku = buku::when($query, function ($qBuilder) use ($query) {
                $qBuilder->where("judul", "like", "%" . $query . "%")
                    ->orWhere("pengarang", "like", "%" . $query . "%")
                    ->orWhere("tahun_terbit", "like", "%" . $query . "%");
            })->paginate(5);
            $allBuku->appends(["q"=> $query]);
        } else {
            $allBuku = buku::latest("id")->paginate(5);
        }
        // $allBuku = buku::all();
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
        return view("buku.create", compact("penerbit", "kategori"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            "judul" => "required|max:100",
            "pengarang" => "required|max:100",
            "tahun_terbit" => "required|integer",
            "kategori_id" => "required",
            "penerbit_id" => "required",
            "file_cover" => "nullable|image|mimes:jpeg,jpg,png|max:1024",
        ]);

        if ($request->hasFile('file_cover')) {
            $validateData['cover'] = $request->file('file_cover')->store('cover', 'public');
        }
        unset($validateData['file_cover']);

        buku::create($validateData);

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
            "file_cover" => "nullable|image|mimes:jpeg,jpg,png|max:1024",
        ]);

        // Upload File
        if ($request->hasFile('file_cover')) {
            $validateData['cover'] = $request->file('file_cover')->store('cover', 'public');

            if ($request->cover_lama) {
                Storage::delete('public/' . $request->cover_lama);
            }
        }

        // Hapus field file_cover agar tidak error mass assignment
        unset($validateData['file_cover']);

        // Update ke database
        $buku->update($validateData);

        // Redirect
        return redirect()->route("buku.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(buku $buku)
    {
        if ($buku->cover && Storage::exists('public/' . $buku->cover)) {
            Storage::delete('public/' . $buku->cover);
        }

        // Proses Delete
        $buku->delete();
        return redirect()->route("buku.index");
    }
}
