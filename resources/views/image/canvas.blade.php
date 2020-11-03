@extends('layouts.main')
@section('content')
<h2>Add Canvas to Image</h2>
<p>Add container around the image. If you set smaller dimension than current, the image will be cropped.</p>
<hr>
<form action="{{route('image.resize')}}">
<div class="input-group">
    <label>Enter Image URL: </label>
    <input type="text" style="width:100%" name="url" value="{{old('url') ?? request()->url}}">
</div>
<hr>
<div class="input-group">
    <label>New Width: </label>
    <input type="text" id="width" name="width" value="{{old('width') ?? request()->width}}">
</div>
<div class="input-group">
    <label>New Height: </label>
    <input type="text" id="height" name="height" value="{{old('height') ?? request()->height}}">
</div>


<button class="button" type="submit">Get</button>
</form>

@endsection
