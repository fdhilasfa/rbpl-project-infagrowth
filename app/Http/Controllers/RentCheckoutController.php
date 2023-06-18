<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\DatabaseRentHistory;
use App\Models\DatabaseNurse;
use App\Models\PerlengkapanBayi;


class RentCheckoutController extends Controller
{
    public function rentCheckout($id)
    {
        $transaction = DatabaseRentHistory::find($id);


        if (!$transaction) {
            abort(404); // Transaksi tidak ditemukan, tampilkan halaman 404 atau pesan kesalahan yang sesuai
        }


        $nurse = DatabaseNurse::find($transaction->nurse_id);
        $namaNurse = $nurse ? $nurse->namaNurse : 'Nurse Not Found';


        return view('rentCheckout', compact('transaction', 'namaNurse'));
    }


    public function rentCheckout2($id)
    {
        $transaction = DatabaseRentHistory::find($id);


        if (!$transaction) {
            abort(404); // Transaksi tidak ditemukan, tampilkan halaman 404 atau pesan kesalahan yang sesuai
        }


        $idBarang = $transaction->id_barang;
        $perlengkapanBayi = PerlengkapanBayi::find($idBarang);
        $namaBarang = $perlengkapanBayi ? $perlengkapanBayi->namaBarang : 'Barang Not Found';


        return view('rentCheckout2', compact('transaction', 'namaBarang'));
    }






    public function update($id)
    {
        $rentHistory = DatabaseRentHistory::find($id);


        if ($rentHistory) {
            $subtotal = intval(preg_replace('/\D/', '', $rentHistory->harga));


            $formattedValue = '...'; // Replace with the appropriate value or define this variable correctly


            $shippingCost = intval(preg_replace('/\D/', '', $formattedValue));


            $total = $subtotal + $shippingCost;






            $rentHistory->harga = $total;
            $rentHistory->status = 'selesai';
            $rentHistory->save();
        }


        // Lakukan pengalihan ke halaman /rentHistory
        return redirect('/rentHistory');
    }






}
