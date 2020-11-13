@extends('layout.main')
@section('content')

<h1>{{$viewModel->getTitle()}}</h1>
<p>{{$viewModel->getTagline()}}</p>
@include('layout.errors')
<hr>
    <form action="{{route('image.fitToCanvas')}}" method="POST">
    @csrf
    <input type="hidden" name="submitted" value="1">
    <div class="row">
        <div class="small-12 medium-8 columns">
            <div class="input-group">
                <label>Enter Image URL: </label>
                <input type="text"  name="url" value="{{old('url') ?? request()->url}}">
            </div>

            @if($viewModel->formSubmitted)
    <hr>
    <h3>Result</h3>
        <div><img class="callout" id="resultImage" src="{{$viewModel->resizedImageUrl}}" alt="" max-width="100%"></div>
        @endif
        </div>
        <div class="small-12 medium-4 columns">

            <div class="input-group">
                <label>Canvas Width: </label>
                <input id="canvasWidth" type="text" id="canvasWidth" name="canvasWidth" value="{{old('canvasWidth') ?? request()->canvasWidth?? 256}}">
            </div>
            <div class="input-group">
                <label>Canvas Height: </label>
                <input id="canvasHeight" type="text" id="canvasHeight" name="canvasHeight" value="{{old('canvasHeight') ?? request()->canvasHeight ?? 128}}">
            </div>
            <div class="input-group">
                <label>Padding (spacing): </label>
                <input id="padding" type="text" id="padding" name="padding" value="{{old('padding') ?? request()->padding ?? 0}}">
            </div>
            <div class="input-group">
                <label>Background Color</label>
                <input type="color" name="color" id="color" value="{{$viewModel->color ?? old('color') ?? '#cccccc'}}" />
                <label for="transparent">Transparent?</label>
                <input type="checkbox" name="transparent" id="transparent" {{$viewModel->transparent ? "checked" : ""}}>
            </div>
        </div>
    </div>

    <hr>


    <button class="button" type="submit">Get</button>
</form>
@endsection
