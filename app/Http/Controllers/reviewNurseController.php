<?php

namespace App\Http\Controllers;
use App\Models\DatabaseNurse;
use Illuminate\Http\Request;

class ReviewNurseController extends Controller
{
    public function index()
    {
        return view('reviewNurse');
    }

    public function index2($id)
    {
        // Ambil data nurse berdasarkan ID
        $nurse = DatabaseNurse::findOrFail($id);

        // Kirim data nurse dan id ke tampilan reviewNurse2.blade.php
        return view('reviewNurse2', compact('nurse', 'id'));
    }

    public function store(Request $request)
    {
        $nurseId = $request->input('nurse');

        // Lakukan operasi yang diperlukan dengan $nurseId

        return redirect()->route('reviewnurse.index2', ['id' => $nurseId]);
    }

    public function store2(Request $request, $id)
    {
        // Validasi input
        $validatedData = $request->validate([
            'review' => 'required',
        ]);

        // Ambil data nurse berdasarkan ID
        $nurse = DatabaseNurse::findOrFail($id);

        // Simpan review ke dalam kolom reviewNurse
        $nurse->reviewNurse = $validatedData['review'];
        $nurse->save();

        return redirect()->route('home');
    }
}
