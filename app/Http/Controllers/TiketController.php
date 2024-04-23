<?php

namespace App\Http\Controllers;

use App\Models\tiket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TiketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tikets = tiket::all();
        return view('role.user.index', compact('tikets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('role.maskapai.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'no_penerbangan' => 'required|string',
            'nama_maskapai' => 'required|string',
            'dari_bandara' => 'required|string',
            'tujuan_bandara' => 'required|string',
            'tanggal_keberangkatan' => 'required|date',
            'jam_pergi' => 'required|date_format:H:i',
            'jam_sampai' => 'required|date_format:H:i',
            'jumlah_kursi' => 'required|integer',
            'price' => 'required|integer',
        ]);

        // Simpan data tiket baru ke dalam database
        Tiket::create([
            'id_user' => Auth::id(),
            'no_penerbangan' => $request->no_penerbangan,
            'nama_maskapai' => $request->nama_maskapai,
            'dari_bandara' => $request->dari_bandara,
            'tujuan_bandara' => $request->tujuan_bandara,
            'tanggal_keberangkatan' => $request->tanggal_keberangkatan,
            'jam_pergi' => $request->jam_pergi,
            'jam_sampai' => $request->jam_sampai,
            'jumlah_kursi' => $request->jumlah_kursi,
            'price' => $request->price,
        ]);

        // Redirect ke halaman index tiket dengan pesan sukses
        return redirect()->route('maskapai.index')->with('success', 'Tiket berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     */
    public function show(tiket $tiket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(tiket $tiket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, tiket $tiket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(tiket $tiket)
    {
        //
    }
}
