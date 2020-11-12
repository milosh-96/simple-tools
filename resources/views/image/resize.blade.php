@extends('layout.main')
@section('content')

<h1>{{$viewModel->getTitle()}}</h1>
<p>{{$viewModel->getTagline()}}</p>
@include('layout.errors')
<hr>
   <form action="{{route('image.resize')}}" method="POST">
    @csrf
    <input type="hidden" name="submitted" value="1">
    <div class="row">
        <div class="small-12 medium-8 columns">
            <div class="input-group">
                <label>Enter Image URL: </label>
                <input type="text"  name="url" value="{{old('url') ?? request()->url}}" onchange="getImageSize(this)">
            </div>

            @if($viewModel->formSubmitted)
    <hr>
    <h3>Result</h3>
        <div><img id="resultImage" src="{{$viewModel->resizedImageUrl}}" alt="" max-width="100%"></div>
        <small>image is resized, you can save it or open in a new tab to see it in full size.</small>
    @endif
        </div>
        <div class="small-12 medium-4 columns">

            <div class="input-group">
                <label>Width: </label>
                <input type="text" id="width" name="width" value="{{old('width') ?? request()->width}}">
            </div>
            <div class="input-group">
                <label>Height: </label>
                <input type="text" id="height" name="height" value="{{old('height') ?? request()->height}}">
            </div>
        </div>
    </div>

    <hr>


    <button class="button" type="submit">Get</button>
</form>





@endsection

@section("scriptSection")
<script>
 function setImageSize(imgUrl) {
    var imageObject = new Image();
    imageObject.src = imgUrl;
    //alert(imageObject.src);
    imageObject.onload= function() {
        document.getElementById("width").value = this.width;
        document.getElementById("height").value = this.height;
    };
 }

 function getImageSize(img) {
     setImageSize(img.value);
 }

</script>

@if($viewModel->formSubmitted)
<script>
    var img = document.getElementById("resultImage").src;
   setImageSize(img);
   // alert(img.height);
</script>
@endif
@endsection
