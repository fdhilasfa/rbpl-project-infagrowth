<?php

namespace App\Http\Controllers;

use App\Models\DatabaseRentHistory;
use App\Models\DatabaseNurse;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function index()
    {
        // Mengambil semua data rental history dari tabel database_rent_history
        $rentalHistories = DatabaseRentHistory::all();

        // Mendapatkan data perawat berdasarkan nurse_id
        foreach ($rentalHistories as $rentalHistory) {
            $nurse = DatabaseNurse::where('id', $rentalHistory->nurse_id)->first();
            $rentalHistory->namaNurse = $nurse ? $nurse->namaNurse : 'Nurse Not Found';
        }

        return view('rentHistory', compact('rentalHistories'));
    }
}
