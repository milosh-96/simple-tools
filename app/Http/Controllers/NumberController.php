<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NumberController extends Controller
{
    public function random($min = 0,$max = 1500) {
        $min = request()->min ?? $min;
        $max = request()->max ?? $max;
        $data = [
            "title"=>"Random Number",
            "min"=>$min,
            "max"=>$max,
            "number"=>\App\Services\NumberService::randomNumber($min,$max)
        ];
        return view('number.random')->with($data);
    }
    public function range($start = 0,$end = 25) {
        $start = request()->start ?? $start;
        $end = request()->end ?? $end;
        $separator = request()->separator ?? ",";
        $messages = [];
        if($start < -50000) {
            $messages[]="Sorry, min allowed number is -50.000";
            $start = -50000;
        }
        if($end > 50000) {
            $messages[]="Max allowed number is 50.000";
            $end = 50000;
        }
        if($end > 1000) {
            $messages[]="Please be patient, it can take some time.";
        }

        $data = ["title"=>"Range of Numbers","start"=>$start,"end"=>$end,"result"=>\App\Services\NumberService::rangeOfNumbers($start,$end,$separator)];

        session()->flash('messages',$messages);

        return view('number.range')->with($data);
    }
}