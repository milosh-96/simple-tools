@extends('layout.main')
@section('content')
<h2>{{$viewModel->getTitle()}}</h2>

@include('layout.errors')

<form method="POST" action="{{route('number.range')}}">
        @csrf
        <input type="hidden" name="submitted" value="1">
    <div style="display:flex">
        <div class="input-group" style="width:30%">
            <label for="">Start</label>
            <input type="text" name="start" value="{{$viewModel->start}}">
        </div>
        <div class="input-group" style="width:30%;">
            <label for="">End</label>
            <input type="text" name="end" value="{{$viewModel->end}}">
        </div>
        <div class="input-group">
            <label for="">Separator</label>
            <select name="separator" id="">
              @foreach($viewModel->separatorList as $key=>$value)
              @if($viewModel->separator == $key)
              <option selected value="{{$key}}">{{$value}}</option>
              @else
              <option value="{{$key}}">{{$value}}</option>
              @endif
              @endforeach
            </select>
        </div>
    </div>
    <button class="button" type="submit">Get</button>
</form>

@if($viewModel->formSubmitted)
<hr>
    <textarea disabled style="width:100%;resize:none;min-height:120px;height:auto;max-height:300px">{{$viewModel->generatedRange}}</textarea >
    @endif

@endsection
