@extends('layout.main')
@section('content')
<h2>Create a Range of Number</h2>

<form method="POST" action="{{route('number.range')}}">
        @csrf
        <input type="hidden" name="submitted" value="true">
    <div style="display:flex">
        <div class="input-group" style="width:30%">
            <label for="">Start</label>
            <input type="text" name="start" value="{{$start}}">
        </div>
        <div class="input-group" style="width:30%;">
            <label for="">End</label>
            <input type="text" name="end" value="{{$end}}">
        </div>
        <div class="input-group">
            <label for="">Separator</label>
            <select name="separator" id="">
                <option value=",">Comma (,)</option>
                <option value=".">Dot (.)</option>
                <option value=":">Colon (:)</option>
                <option value="-">Hyphen (-)</option>
                <option value=";">Semicolon (;)</option>
                <option value="space">Empty space (space key)</option>
                <option value="tab">Tab (tab key)</option>
            </select>
        </div>
    </div>
    <button class="button" type="submit">Get</button>
</form>

    @if(request()->submitted)
    <hr>
    <textarea disabled style="width:100%;resize:none;">{{$result}}</textarea >
    @endif

@endsection
