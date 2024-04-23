<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use App\Models\order;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mengambil semua data order yang memiliki status 'pending'
        $pendingOrders = order::where('status', 'success')->get();

        // Mengirim data order ke view
        return view('role.maskapai.transaksi', ['pendingOrders' => $pendingOrders]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function konfirmasi()
    {
        $pendingOrders = order::where('status', 'pending')->get();

        // Mengirim data order ke view
        return view('role.admin.konfirmasi', ['pendingOrders' => $pendingOrders]);
    }

    public function markAsSuccess($orderId)
    {
        // Mengambil data order berdasarkan ID
        $order = Order::findOrFail($orderId);

        // Mengubah status order menjadi 'success'
        $order->status = 'success';
        $order->save();

        // Redirect kembali ke halaman sebelumnya atau halaman lain yang diinginkan
        return redirect()->back()->with('success', 'Order status has been updated to success.');
    }


}
