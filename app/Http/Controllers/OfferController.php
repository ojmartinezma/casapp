<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class OfferController extends Controller
{
    public function create(Request $request)
    {
        request()->validate([
         'dirección' => 'required',
         'ciudad' => 'required',
         'localidad' => 'required',
         'barrio' => 'required',
         'estrato' => 'required',
         'área' => 'required',
         'pisos' => 'required',
         'habitaciones' => 'required',
         'baños' => 'required',
         'tipo' => 'required',
         'parqueadero' => 'required',
         'amueblado' => 'required',
         'sótano' => 'required',
         'terraza' => 'required',
         'seguridad' => 'required',
         'valor' => 'required',
         'foto1' => 'required',
         'foto2' => 'required',
         'foto3' => 'required',
         'latitud' => 'required',
         'longitud' => 'required',
        ]);

        date_default_timezone_set('America/New_York');
        $publishDate = date_create()->format('Y-m-d');
        $created_at = date_create()->format('Y-m-d H:i:s');


        // $feature = new \App\Models\Feature;
        // $feature->furnished = $request->get('amueblado');
        // $feature->basement = $request->get('sótano');
        // $feature->terrace = $request->get('terraza')
        // $feature->security = $request->get('seguridad');
        // $feature->save();

        DB::connection()->table('estates')->insert([
            'address' => $request->input('dirección'),
            'city' => $request->input('ciudad'),
            'loc' => $request->input('localidad'),
            'neighborhood' => $request->input('barrio'),
            'estr' => $request->input('estrato'),
            'area' => $request->input('área'),
            'area_h' => $request->input('área'),
            'area_c' => $request->input('área'),
            'floors' => $request->input('pisos'),
            'rooms' => $request->input('habitaciones'),
            'toilets' => $request->input('baños'),
            'type' => $request->get('tipo'),
            'parking' => $request->get('parqueadero'),
            'value' => $request->input('valor'),
            'latitude' => $request->input('latitud'),
            'longitude' => $request->input('longitud'),
            'created_at' => $created_at,
            'user_id' => auth::user()->id
        ]);

        $Estates_id = DB::connection()->table('estates')->max('id');


        DB::connection()->table('features')->insert([
            'estate_id' => $Estates_id,
            'furnished' => $request->get('amueblado'),
            'basement' => $request->get('sótano'),
            'terrace' => $request->get('terraza'),
            'security' => $request->get('seguridad'),
            'created_at' => $created_at,
        ]);

        
        for($i = 1; $i <= 3; $i++) {
            DB::connection()->table('images')->insert([
                'url' => $request->get('foto'.$i),
                'created_at' => $created_at,
                'estate_id' => $Estates_id,
            ]);
        }
        
        return redirect('/edit-offer');
    }
    public function modify(Request $request)
    {
        DB::connection()->statement('SET FOREIGN_KEY_CHECKS=0');
        if($request->modalAnswerDeleteYes == "Si") {
            session_start();
            $offer_id = session('offer_id');
            $estates = DB::connection()->table('estates')->where('id','=',$offer_id)->get();
            $Feature_id = 0;
            foreach($estates as $estate) {
                $Feature_id = $estate->Features_id;
            }
            DB::connection()->table('features')->where('id','=',$Feature_id)->delete();
            $images = DB::connection()->table('images')->where('Estates_id','=',$offer_id)->get();
            $imagesArray = array();
            foreach($images as $image) {
               array_push($imagesArray,$image->id);
           }
            for($i = 0; $i <= 2; $i++) {
                DB::connection()->table('images')->where('id','=',$imagesArray[$i])->delete();
            }
            DB::connection()->table('estates')->where('id','=',$offer_id)->delete();
            return redirect('/edit-offer');
        } else {
            request()->validate([
                'dirección' => 'required',
                'ciudad' => 'required',
                'localidad' => 'required',
                'barrio' => 'required',
                'estrato' => 'required',
                'área' => 'required',
                'pisos' => 'required',
                'habitaciones' => 'required',
                'baños' => 'required',
                'tipo' => 'required',
                'parqueadero' => 'required',
                'amueblado' => 'required',
                'sótano' => 'required',
                'terraza' => 'required',
                'seguridad' => 'required',
                'valor' => 'required',
                'foto1' => 'required',
                'foto2' => 'required',
                'foto3' => 'required',
                'latitud' => 'required',
                'longitud' => 'required',
               ]);
               session_start();
               $offer_id = session('offer_id');
               date_default_timezone_set('America/New_York');
               $updated_at = date_create()->format('Y-m-d H:i:s');
               DB::connection()->table('estates')->where('id','=',$offer_id)->update([
                'address' => $request->input('dirección'),
                'city' => $request->input('ciudad'),
                'loc' => $request->input('localidad'),
                'neighborhood' => $request->input('barrio'),
                'estr' => $request->input('estrato'),
                'area' => $request->input('área'),
                'floors' => $request->input('pisos'),
                'rooms' => $request->input('habitaciones'),
                'toilets' => $request->input('baños'),
                'type' => $request->get('tipo'),
                'parking' => $request->get('parqueadero'),
                'value' => $request->input('valor'),
                'latitude' => $request->input('latitud'),
                'longitude' => $request->input('longitud'),
                'updated_at' => $updated_at,
               ]);
            //    $estate = DB::connection()->table('estates')->where('id','=',$offer_id)->first();
            //    $Feature_id = 0;
            //    foreach($estates as $estate) {
            //        $Feature_id = $estate->Features_id;
            //    }
               DB::connection()->table('features')->where('estate_id','=',$offer_id)->update([
                'furnished' => $request->get('amueblado'),
                'basement' => $request->get('sótano'),
                'terrace' => $request->get('terraza'),
                'security' => $request->get('seguridad')
               ]);
               $images = DB::connection()->table('images')->where('estate_id','=',$offer_id)->get();
               $imagesArray = array();
               foreach($images as $image) {
                   array_push($imagesArray,$image->id);
               }
               for($i = 0; $i <= 2;) {
                    DB::connection()->table('images')->where('id','=',$imagesArray[$i])->update([
                        'url' => $request->get('foto'.++$i)
                    ]);
                }
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