<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DatabaseNurse;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        // Ambil baris terbaru dari tabel database_nurses
        $latestNurse = DatabaseNurse::whereNotNull('reviewNurse')->latest('updated_at')->first();
        return view('home', compact('latestNurse'));
    }
    public function Infagrowth()
    {
        return view('Infagrowth');
    }

}
