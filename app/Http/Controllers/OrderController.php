<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Tiket;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mendapatkan data pesanan yang sesuai dengan id pengguna yang saat ini login
        $currentUser = Auth::user();
        $orders = Order::where('id_user', $currentUser->id)->get();

        // Jika tidak ada pesanan yang sesuai, mungkin ingin menangani kasus ini sesuai kebutuhan
        return view('role.user.transaksi', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request, $tiketId)
    {
        $tikets = Tiket::find($tiketId);
        $users = User::find(auth()->id());

        return view('role.user.create', compact('tikets', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data yang diterima dari formulir
        $request->validate([
            'id_tiket' => 'required|exists:tikets,id',
            'id_user' => 'required|exists:users,id',
            'nama' => 'required|string|max:255',
            'no_telp' => 'required|string|max:20',
            'email' => 'required|string|email|max:255',
            'jumlah_kursi' => 'required|integer|min:1',
            'total_harga' => 'required|integer|min:0',
        ]);

        // Temukan tiket yang dipesan
        $tiket = Tiket::findOrFail($request->id_tiket);

        // Validasi jumlah kursi yang dipesan agar tidak melebihi jumlah yang tersedia
        if ($request->jumlah_kursi > $tiket->jumlah_kursi) {
            return back()->withInput()->withErrors(['jumlah_kursi' => 'Jumlah kursi yang diminta melebihi yang tersedia.']);
        }

        // Hitung total harga
        $total = $tiket->price * $request->jumlah_kursi;

        // Buat pesanan baru
        Order::create([
            'id_user' => $request->id_user,
            'id_tiket' => $request->id_tiket,
            'nama' => $request->nama,
            'no_telp' => $request->no_telp,
            'email' => $request->email,
            'jumlah_kursi' => $request->jumlah_kursi,
            'total_harga' => $total,
        ]);

        // Kurangi jumlah kursi yang tersedia di tiket
        $tiket->jumlah_kursi -= $request->jumlah_kursi;
        $tiket->save();

        // Redirect pengguna ke halaman yang sesuai setelah pembuatan pesanan
        return redirect()->route('transaksi')->with('success', 'Pesanan tiket berhasil dibuat.');
    }


    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
