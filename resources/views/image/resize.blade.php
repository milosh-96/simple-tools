@extends('layout.main')
@section('content')

    <h2>Resize Image</h2>
    <hr>
   <form action="{{route('image.resize')}}">
    <div class="input-group">
        <label>Enter Image URL: </label>
        <input type="text" style="width:100%" name="url" value="{{old('url') ?? request()->url}}">
    </div>
    <hr>
    <div class="input-group">
        <label>Width: </label>
        <input type="text" id="width" name="width" value="{{old('width') ?? request()->width}}">
    </div>
    <div class="input-group">
        <label>Height: </label>
        <input type="text" id="height" name="height" value="{{old('height') ?? request()->height}}">
    </div>


    <button class="button" type="submit">Get</button>
</form>



    @if(request()->url)
    <hr>
    <h3>Result</h3>
    <?php $url = route('engine.image.resize',request()->all()); ?>
        <img id="resultImage" src="{{$url}}" alt="">

        @section('scriptSection')
<script>
    var img = document.getElementById("resultImage");
    var imageObject = new Image();
    imageObject.src = img.getAttribute("src");
    //alert(imageObject.src);
    imageObject.onload= function() {
        document.getElementById("width").value = this.width;
        document.getElementById("height").value = this.height;
    };
   // alert(img.height);
</script>
@endsection

    @endif

@endsection

