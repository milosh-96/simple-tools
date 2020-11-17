@extends('layout.main')
@section('content')
    <h1>{{$viewModel->getTitle()}}</h1>
    <p>{{$viewModel->getTagline()}}</p>
    <hr>
    <form method="POST">
        @csrf
        <input type="hidden" name="submitted" value="1">
        <div class="row">
            <div class="small-12 columns">
                @include('image.components.file-handler')


                <div class="columns small-12 medium-4">
                <div class="input-group">
                <label for="fileType">Select File Type</label>
                    <select name="fileType" id="fileType">
                        @foreach($viewModel->fileTypes as $key=>$value)
                        <option {{$viewModel->isSelectedType($key) ? 'selected' : ''}} value="{{$key}}">{{strtoupper($key)}}</option>
                        @endforeach
                    </select>
                </div>
                </div>

            </div>
        </div>
        <button class="button" type="submit">Get</button>
        <div class="row">
            <div class="columns small-12">
            @if($viewModel->formSubmitted)
    <hr>
    <h3>Result</h3>
        <div style="padding: 20px 0">
            <img id="resultImage" src="{{$viewModel->resizedImageUrl}}" alt="" max-width="100%">
        </div>
        <hr>
    @endif

            </div>
        </div>

    </form>
@endsection
