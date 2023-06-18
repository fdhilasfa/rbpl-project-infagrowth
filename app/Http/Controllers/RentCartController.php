<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Models\PerlengkapanBayi;
use App\Models\DatabaseRentHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RentCartController extends Controller
{
    public function index($id)
    {
        // Ambil data perlengkapan bayi berdasarkan id
        $barang = DB::table('perlengkapanbayis')
            ->where('id', $id)
            ->first();

        // Ambil nilai-nilai yang diperlukan
        $imagePath = 'images/perlengkapanbayi/perlengkapanbayi' . $barang->id . '.jpg';
        $imageURL = file_exists(public_path($imagePath)) ? asset($imagePath) : asset('images/perlengkapanbayi.jpg');
        $harga = $barang->hargaBarang ?? null;
        $count = 0;
        $totalPrice = $harga !== null ? $harga * $count : null;

        // Pass nilai-nilai tersebut ke halaman blade
        return view('rentCart2', compact('barang', 'imageURL', 'harga', 'count', 'totalPrice'));
    }

    public function submitrent(Request $request)
    {
    // Mendapatkan nurse ID dari halaman sebelumnya
    $id_barang = $request->input('id_barang');

    // Mendapatkan nilai dari form
    $count = intval($request->input('durasiSewa'));
    $harga = intval($request->input('harga'));

    // Menghitung total harga
    $totalPrice = $count * $harga;

    // Mendapatkan ID pengguna yang sedang login
    $userId = Auth::id();

    // Mengambil data namaBarang dari tabel perlengkapanbayis berdasarkan id_barang
    $namaBarang = PerlengkapanBayi::where('id', $id_barang)->value('namaBarang');

    // Simpan data ke dalam tabel database_rent_history
    $rentHistory = new DatabaseRentHistory();
    $rentHistory->user_id = $userId;
    $rentHistory->durasiSewa = $count;
    $rentHistory->harga = $totalPrice;
    $rentHistory->paymentDate = now();
    $rentHistory->status = 'checkout';
    $rentHistory->namaBarang = $namaBarang;
    $rentHistory->save();

    // Mendapatkan ID transaksi baru
    $transactionId = $rentHistory->orderID;

    // Redirect ke halaman checkout dengan membawa ID transaksi
    return redirect()->route('checkout2', ['id' => $transactionId]);

    }
}
