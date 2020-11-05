<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ListController extends Controller
{
    public function random() {
        $data = ["title"=>"Get Random Item/s from List","items" => request()->items ?? ""];
       // return request()->all();
        return view("list.random-items",$data);
    }
}
