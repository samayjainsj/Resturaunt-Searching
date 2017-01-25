<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\City;
use App\Hotel;
use App\Menu;
use App\Rate;
use DB;
use Illuminate\Support\Facades\Input;
use Auth;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $city = DB::table('cities')->orderBy('city','asc')->get();
      $hotel = DB::table('hotels')->orderBy('hotel','asc')->get();
      return view('pages.welcome')->withCity($city)->withHotel($hotel);
    }

    public function hotelshow(Request $request)
    {
      $this->validate($request,array(
      'city'=>'required',
      'hotel' => 'required'
      ));
      $hotel_id = $request->hotel;
      $city_id = $request->city;
      $city = City::find($city_id);
      $city_name = $city->city;
      $hotel = Hotel::find($hotel_id);
      $hotel_slug = $hotel->slug;
      return redirect()->route('hotel.select',["city_name" => $city_name,"hotel" => $hotel_slug]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function hotelselect($id1,$id2){
       $city = City::where('city','=', $id1)->get();
      //  $city_id = $city->id;
       $hotel = Hotel::where('slug', $id2)->get();
       $hotel_id = Hotel::where('slug',$id2)->value('id');
       $menu = Menu::where('hotel_id',$hotel_id)->get();
       if (Auth::guest()){
         $rate = NULL;
         }
       else {
         $rate = Rate::where('hotel_id',$hotel_id)->where('user_id',Auth::user()->id)->get();
       }
       $rate_hotel = Rate::where('hotel_id',$hotel_id)->get();
      //  $hotel_id = $hotel->id;
       return view('pages.select')->withCity($city)->withHotel($hotel)->withMenu($menu)->withRate($rate)->withRate_hotel($rate_hotel);
     }

     public function hotelindex(){
       $city = DB::table('cities')->orderBy('city','asc')->get();
       $hotel = DB::table('hotels')->orderBy('hotel','asc')->get();
       return view('pages.hotel')->withHotel($hotel)->withCity($city);
     }
     public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
