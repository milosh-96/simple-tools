<?php

namespace App\Http\Controllers;

use App\Http\Requests\Lists\StoreListRequest;
use App\Models\ItemLists\ItemList;
use Illuminate\Http\Request;
use App\Services\ListService;
use App\ViewModels\Lists\RandomListItemViewModel;

class ListController extends Controller
{
    public function random(ItemList $itemList = null) {

        $viewModel = new RandomListItemViewModel;
        if($itemList) {
            $viewModel->itemList = $itemList;
            $viewModel->setUpdateMode();
            $viewModel->getParsedItems($viewModel->itemList->original_input);
        }
        //["title"=>"Get Random Item/s from List","items" => request()->items ?? ""];
       // return request()->all();
      if(request()->submitted) {
        $viewModel->setItemsString(request()->items);
        $viewModel->setSeparator(request()->separator);
        $viewModel->setFormSubmitted();
        $viewModel->getParsedItems($viewModel->itemsString);

      }

      $data = ["viewModel"=>$viewModel];
        return view("list.random-items",$data);
    }

    public function store(StoreListRequest $request,ItemList $itemList = null)
    {
       $json_list=json_encode(ListService::parseItems($request->original_input,$request->original_separator));
       if($itemList) {
           $itemList->update($request->all());
       }
       else {
       $itemList =new ItemList($request->all());
       }
       $itemList->json_list = $json_list;
       $itemList->user()->associate(auth()->user());
       $itemList->save();
       return redirect()->route('list.random',["itemList"=>$itemList->id]);
    }
}
