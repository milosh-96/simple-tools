<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ViewModels\Numbers\RandomNumberViewModel;
use App\ViewModels\Numbers\RangeViewModel;
class NumberController extends Controller
{
    public function random($min = 0,$max = 1500) {
        $min = request()->min ?? $min;
        $max = request()->max ?? $max;

        $viewModel = new RandomNumberViewModel;

        $viewModel->setMinNumber($min);
        $viewModel->setMaxNumber($max);

        if(request()->submitted == 1) {
            $viewModel->getRandomNumber();
        }
        $data = [
            "viewModel"=>$viewModel
        ];
        return view('number.random')->with($data);
    }
    public function range($start = 0,$end = 25) {
        $start = request()->start ?? $start;
        $end = request()->end ?? $end;
        $separator = request()->separator ?? ",";
        $messages = [];
        $viewModel = new RangeViewModel;
        if($start < -50000) {
            $viewModel->insertError("Minimum value cannot be less than -50.000.");
            $start = -50000;
        }
        if($end > 50000) {
            $viewModel->insertError("Maximum value cannot be greater than 50.000.");
            $end = 50000;
        }
        if($end > 1000) {
            $viewModel->insertError("Please, be patient. It can take some time to generate larger ranges.");
        }

        if(request()->submitted == 1) {
            $viewModel->setStart($start);
            $viewModel->setEnd($end);
            $viewModel->setSeparator($separator);
            $viewModel->generateRange();
        }
        $data = [
            "viewModel"=>$viewModel
        ];

        session()->flash('messages',$messages);

        return view('number.range')->with($data);
    }
}
