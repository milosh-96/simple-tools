<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ViewModels\Texts\NotesPageViewModel;
class TextController extends Controller
{
    public function notes() {
        $data = ["viewModel"=>new NotesPageViewModel];
        return view('text.notes')->with($data);
    }
}
