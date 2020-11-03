@extends('layout.main')
@section('content')

    <h2>Resize Image</h2>
    <hr>
   <form action="{{route('image.resize')}}">
    <div class="row">
        <div class="small-12 medium-8 columns">
            <div class="input-group">
                <label>Enter Image URL: </label>
                <input type="text"  name="url" value="{{old('url') ?? request()->url}}">
            </div>

            @if(request()->url)
    <hr>
    <h3>Result</h3>
    <?php $url = route('engine.image.resize',request()->all()); ?>
        <img id="resultImage" src="{{$url}}" alt="" max-width="100%">
            <small>image is resized, you can save it or open in a new tab to see it in full size.</small>
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

