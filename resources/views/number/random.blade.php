@extends('layout.main')
@section('content')
    <h2>{{$viewModel->getTitle()}}</h2>

    <form method="POST" action="{{route('number.random')}}">
        @csrf
        <input type="hidden" name="submitted" value="1">
        <div class="row">
            <div class="columns small-12 medium-6">
                <div class="input-group">
                    <label for="">Min</label>
                    <input type="number" name="min" id="min" value="{{$viewModel->min}}">
                </div>
            </div>
            <div class="columns small-12 medium-6">
                <div class="input-group">
                    <label for="">Max</label>
                    <input type="number" name="max" id="max" value="{{$viewModel->max}}">
                </div>
            </div>
        </div>
        <button class="button" type="submit">Get</button>


    </form>
    @if($viewModel->formSubmitted)
    <hr>
    <textarea disabled style="font-size: 36px;padding:25px;height:150px;">{{$viewModel->randomNumber}}</textarea>
    @endif
@endsection
