<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Voitures;

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
        $voitures = Voitures::all();
        return view('listeVoiture', compact('voitures'));
    }

    public function admin()
    {
        return view('admin');
    }
    public function deconnexion(Request $request)
    {
        $request->session()->flush();
        return Redirect::route('acceuil');
    }
    function AllVoitureAcceuil(Request $request)
    {
        
        return view('listeVoiture', compact('voitures'));
    }
}
