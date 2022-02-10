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

    public function filter($data){
        //
        $dato = json_decode($data);
        //$marker=Estate::select('id','latitude','longitude')->whereIn('id',[1,3,5])->get();
        $marker=Estate::select('id','latitude','longitude');
        //return $data;
        if($dato->type->value!=-1){
            $marker->where('type',$dato->type->value);
        }
        if($dato->price->value!=-1){
            $marker->where('price',$dato->price->value);
        }
        if($dato->area->value!=-1){
            $marker->whereBetween('area',$dato->area->value,$dato->area->value);
        }
        if($dato->est->value!=-1){
            $marker->where('est',$dato->est->value);
        }
        if($dato->floors->value!=-1){
            $marker->where('floors',$dato->floors->value);
        }
        //$marker=Estate::select('id','latitude','longitude')->whereIn('id',[1,3,5])->get();
        return json_encode($marker->get());
    }

    public function detail($id){
        //
        $marker=Estate::where('id',$id)->with('user')->with('feature')->first();
        return json_encode($marker);
    }
}
