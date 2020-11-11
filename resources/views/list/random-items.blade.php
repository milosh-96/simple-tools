@extends('layout.main')
@section('content')

    <h2>{{$viewModel->getTitle()}}</h2>

    @include('layout.errors')

    <hr>
   <form action="{{route('list.random')}}" method="POST">
    <div class="row">
        <div class="small-12 medium-12 columns">
            @csrf
            <input type="hidden" name="submitted" value="1">
            <div class="cell">
                <label for="items">
                    <em>Enter as many items as you want. Don't forget to seperate them by comma (,).</em>
                </label>
               <textarea id="items" name="items" rows="3" style="width:100%;resize: none"
                placeholder="{{$viewModel->defaultItemsString}}">{{$viewModel->itemsString}}</textarea>
            </div>
            <div class="cell medium-2">
                <div class="input-group">
                    <span class="input-group-label">Separator</span>
                    <input type="text" name="separator" id="separator" class="input-group-field" value="{{$viewModel->separator}}" />
                </div>
            </div>
            <button class="button" type="submit">Get Random</button>
        </div>
    </div>
   </form>
   @if($viewModel->formSubmitted)
   <hr>
        <h3>Result: {{$viewModel->parsedItems[$viewModel->randomItemIndex]}}</h3>
        @if($viewModel->parsedItems)
            <ul class="list">
                @foreach($viewModel->parsedItems as $key=>$value)
            <li>
                @if($key == $viewModel->randomItemIndex)
                <strong>{{$value}}</strong>
                @else
                {{$value}}
                @endif
            </li>
            @endforeach
            </ul>
        @endif
    @endif
@endsection
