<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\City;
use DB;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $city = DB::table('cities')->orderBy('city','asc')->get();
      $hotel = DB::table('hotels')->orderBy('hotel','asc')->get();
      return view('pages.welcome')->withCity($city)->withHotel($hotel);
    }
}
