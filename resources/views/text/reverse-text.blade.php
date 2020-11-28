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
        <textarea name="result" id="" cols="30" style="min-height: 150px" disabled>{{$viewModel->getResult()}}</textarea>
      </div>
  </div>
</div>
@endif
<hr>
        <div class="row">
            <form action="{{route('text.reverse-text')}}" method="POST">
                @csrf
                <div class="columns small-12">
                    <div class="row">
                        <div class="columns small-12 medium-8">
                            <div class="input-group">
                                <textarea
                                name="text" id="text" rows="10" style="width:100%" placeholder="type here...">{{$viewModel->getSubmittedValues()['text'] ?? old('text') ?? ''}}</textarea>
                            </div>
                        </div>
                        <div class="columns small-12 medium-4">
                            <div class="input-group">
                                <label for="">Reverse Words, keep structure
                                    <input type="checkbox" name="only_words" {{$viewModel->reverseOnlyWords() ? "checked" : ''}}>

                                </label>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="columns small-12">
                    <div class="input-group">
                        <button class="button" onclick="copyText()">Reverse</button>
                    </div>
                </div>
            </form>
        </div>
@endsection

