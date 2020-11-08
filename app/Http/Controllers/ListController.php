<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ListService;
use App\ViewModels\Lists\RandomListItemViewModel;

class ListController extends Controller
{
    public function random() {
        $viewModel = new RandomListItemViewModel;
        //["title"=>"Get Random Item/s from List","items" => request()->items ?? ""];
       // return request()->all();
      if(request()->submitted) {
        $viewModel->setFormSubmitted();
        $viewModel->setItemsString(request()->items);
        $viewModel->setSeparator(request()->separator);
        $viewModel->getParsedItems($viewModel->itemsString);
      }

      $data = ["viewModel"=>$viewModel];
        return view("list.random-items",$data);
    }
}
