@extends('layout.main')
@section('content')
<h1>{{$viewModel->getTitle()}}</h1>
<p>{{$viewModel->getTagline()}}</p>
@include('layout.errors')

@if($viewModel->isFormSubmitted())
<hr>
<div id="result">
  <div class="row">
      <div class="columns">
        <h2>Result</h2>
        <textarea name="result" id="" cols="30" style="min-height: 100px" disabled></textarea>
      </div>
  </div>
</div>
@endif
<hr>
        <div class="row">
            <form action="{{route('text.reverse-text')}}" method="POST">
                @csrf
                <div class="columns small-12">
                    <textarea
                        name="text" id="text" rows="10" style="width:100%" placeholder="type here..."></textarea>
                </div>
                <div class="columns small-12">
                    <div class="input-group">
                        <button class="button" onclick="copyText()">Reverse</button>
                    </div>
                </div>
            </form>
        </div>
@endsection

