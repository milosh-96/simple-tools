<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Services\ImageService;
use App\ViewModels\Images\ResizeImageViewModel;
use App\ViewModels\Images\CropImageViewModel;
use App\ViewModels\Images\FitToCanvasViewModel;
class ImageController extends Controller
{

    public function resizeImage() {
        $viewModel = new ResizeImageViewModel;
        if(request()->submitted == 1) {
            $viewModel->setFormSubmitted();
            if(request()->image != null) {
                $name = "public/temp-uploads/".Str::uuid().".png";
                Storage::put($name,request()->image->get());
                $viewModel->setSourceUrl($name);
                $viewModel->setUploadedFile(true);
            }else {
                $viewModel->setSourceUrl(request()->url);
            }
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
            $viewModel->setColor(request()->color);
            $viewModel->setResizedImageUrl();
        }

        $data = ["viewModel"=>$viewModel];
        return view('image.crop')->with($data);
    }
    public function fitToCanvas() {
        $viewModel = new FitToCanvasViewModel;

        if(request()->submitted == 1) {
            $viewModel->setFormSubmitted();
            $viewModel->setSourceUrl(request()->url);
            $viewModel->setCanvasWidth(request()->canvasWidth);
            $viewModel->setCanvasHeight(request()->canvasHeight);
            $viewModel->setPadding(request()->padding);
            $viewModel->setColor(request()->color);
            if(request()->transparent == true) {
                $viewModel->setTransparent(true);
            }
            if($viewModel->transparent) {
                $viewModel->setColor("transparent");
                $viewModel->insertError("Notice: Background of the image is transparent.");
            }
            $viewModel->setResizedImageUrl();
        }

        $data = ["viewModel"=>$viewModel];
        return view('image.fitToCanvas')->with($data);
    }
}
