<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use Session;
use Spatie\Geocoder\Facades\Geocoder;

class OfferController extends Controller
{
    public function create(Request $request)
    {
        request()->validate([
         'nombre' => 'required',
         'direccion' => 'required',
         'area' => 'required', 
         'barrio' => 'required', 
         'estrato' => 'required', 
         'tipo' => 'required', 
         'habitaciones' => 'required', 
         'baños' => 'required', 
         'garajes' => 'required', 
         'precio' => 'required', 
         'foto' => 'required', 
        ]);
        /*
        $address = 'Google HQ'; // Google HQ
        $prepAddr = str_replace(' ','+',$address);
        $geocode=file_get_contents('https://maps.google.com/maps/api/geocode/json?address='.$prepAddr.'&sensor=false&key=AIzaSyAYvLNR666y22LmyCPbGU8Ws1OuuXfdplY');
        $output= json_decode($geocode);
        $latitude = $output->results[0]->geometry->location->lat;
        $longitude = $output->results[0]->geometry->location->lng;*/

        DB::connection('mysql2')->table('estates')->insert([
            'address' => $request->input('direccion'),
            'area' => $request->input('area'),
            'neighborhood' => $request->input('barrio'),
            'estr' => $request->input('estrato'),
            'type' => $request->get('tipo'),
            'rooms' => $request->input('habitaciones'),
            'toilets' => $request->input('baños'),
            'parking' => $request->input('garajes'),
            'value' => $request->input('precio'),
            //'User_idUser' => auth()->user()->id,
            'User_idUser' => NULL,
            'Features_id' => NULL
        ]);       

        return redirect('/edit-offer');
    }
    public function modify(Request $request)
    {
        if($request->modalAnswerDeleteYes == "Si") {
            session_start();
            $offer_id = session('offer_id');
            DB::connection('mysql2')->table('estates')->where('id','=',$offer_id)->delete();
            return redirect('/edit-offer');
        } else {
            request()->validate([
                'nombre' => 'required',
                'direccion' => 'required',
                'area' => 'required', 
                'barrio' => 'required', 
                'estrato' => 'required', 
                'tipo' => 'required', 
                'habitaciones' => 'required', 
                'baños' => 'required', 
                'garajes' => 'required', 
                'precio' => 'required', 
                'foto' => 'required', 
               ]);
               session_start();
               $offer_id = session('offer_id');
               DB::connection('mysql2')->table('estates')->where('id','=',$offer_id)->update([
                   'address' => $request->input('direccion'),
                   'area' => $request->input('area'),
                   'neighborhood' => $request->input('barrio'),
                   'estr' => $request->input('estrato'),
                   'type' => $request->get('tipo'),
                   'rooms' => $request->input('habitaciones'),
                   'toilets' => $request->input('baños'),
                   'parking' => $request->input('garajes'),
                   'value' => $request->input('precio'),
                   //'User_idUser' => auth()->user()->id,
                   'User_idUser' => NULL,
                   'Features_id' => NULL
               ]);       
               return redirect('/edit-offer');
        }
        
    }
    public function edit(Request $request)
    {
        $offer_id = $request->input('editar',0);
        $request->session()->put('offer_id',$offer_id);
        return redirect('/modify-offer');
    }
}