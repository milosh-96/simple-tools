<?php

namespace App\Http\Controllers\Converters;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BitcoinController extends Controller
{
    public function chart()
    {
        $data = ["viewModel"=>new \App\ViewModels\Converters\Bitcoin\BitcoinChartPageViewModel];
        return view('converters.bitcoin.chart')->with($data);
    }
}
