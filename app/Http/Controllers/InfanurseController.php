<?php

namespace App\Http\Controllers;
use App\Models\DatabaseNurse;
use App\Models\User;
use App\Models\DatabaseRentHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

class InfanurseController extends Controller
{
    public function index()
    {
        $nurses = DB::table('database_nurses')->get();
        return view('infanurse2', compact('nurses'));
    }

    public function nurserent(Request $request)
    {
        $nurseId = $request->query('id');
        // Perform actions based on the given nurse ID, such as retrieving data from the database using the ID

        return view('nurserent', compact('nurseId'));
    }



    public function submitNurserent(Request $request)
    {
        // Mendapatkan nurse ID dari halaman sebelumnya (nurserent.blade.php)
        $nurseId = $request->input('nurseId');

        // Mendapatkan nilai dari form
        $count = intval($request->input('durasiSewa'));
        $harga = intval($request->input('harga'));

        // Menghitung total harga
        $totalPrice = $count * $harga;


        // Mendapatkan ID pengguna yang sedang login
        $userId = Auth::id();

        // Simpan data ke dalam tabel database_rent_history
        $rentHistory = new DatabaseRentHistory();
        $rentHistory->user_id = $userId;
        $rentHistory->nurse_id = $nurseId;
        $rentHistory->durasiSewa = $count;
        $rentHistory->harga = $totalPrice;
        $rentHistory->paymentDate = now();
        $rentHistory->status = 'checkout';
        $rentHistory->namaBarang = '';
        $rentHistory->save();

        // Mendapatkan ID transaksi baru
        $transactionId = $rentHistory->orderID;

        // Redirect ke halaman checkout dengan membawa ID transaksi
        return redirect()->route('checkout', ['id' => $transactionId]);
    }

}
