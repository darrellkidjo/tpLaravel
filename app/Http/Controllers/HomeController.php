<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;


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
        return view('Acceuil');
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
}
