<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estate;

class MapController extends Controller
{
    //
    public function api(){
        //
        $marker=Estate::select('id','latitude','longitude')->get();
        return json_encode($marker);
    }

    public function filter(){
        //
        $marker=Estate::select('id','latitude','longitude')->get();
        return json_encode($marker);
    }

    public function detail($id){
        //
        $marker=Estate::where('id',$id)->with('user')->with('feature')->first();
        return json_encode($marker);
    }
}
