<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ImageService;
use App\ViewModels\Images\ResizeImageViewModel;
use App\ViewModels\Images\CropImageViewModel;
class ImageController extends Controller
{

    public function resizeImage() {
        $viewModel = new ResizeImageViewModel;

        if(request()->submitted == 1) {
            $viewModel->setFormSubmitted();
            $viewModel->setSourceUrl(request()->url);
            $viewModel->setNewWidth(request()->width);
            $viewModel->setNewHeight(request()->height);
            $viewModel->setResizedImageUrl();
        }

        $data = ["viewModel"=>$viewModel];
        return view('image.resize')->with($data);
    }
    public function cropImage() {
        $viewModel = new CropImageViewModel;

        if(request()->submitted == 1) {
            $viewModel->setFormSubmitted();
            $viewModel->setSourceUrl(request()->url);
            $viewModel->setNewWidth(request()->width);
            $viewModel->setNewHeight(request()->height);
            $viewModel->setResizedImageUrl();
        }

        $data = ["viewModel"=>$viewModel];
        return view('image.crop')->with($data);
    }
}
