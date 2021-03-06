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
