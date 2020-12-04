@extends('layout.main')
@section('content')

    <h1>{{$viewModel->getTitle()}}</h1>
    <p>{{$viewModel->getTagline()}}</p>
    @include('layout.errors')
    <hr>

   <form action="{{route('list.random')}}" method="POST">
    <div class="row">
        <div class="small-12 medium-12 columns">
            <div class="callout">
                @csrf
            <input type="hidden" name="submitted" value="1">
            <div class="cell">
                <label for="items">
                    <em>Enter as many items as you want. Don't forget to seperate them by comma (,).</em>
                </label>
               <textarea id="items" name="items" rows="3" style="width:100%;resize: none"
                placeholder="{{$viewModel->defaultItemsString}}">{{$viewModel->itemList->original_input}}</textarea>
            </div>
            <div class="cell medium-2">
                <div class="input-group">
                    <span class="input-group-label">Separator</span>
                    <input type="text" name="separator" id="separator" class="input-group-field" value="{{$viewModel->itemList->original_separator}}" />
                </div>
            </div>
            <button class="button" type="submit">Get Random</button>
            </div>

        </div>
    </div>
   </form>




   @if($viewModel->formSubmitted || $viewModel->updateMode)
   <div class="callout">
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
    </div>

    @if(auth()->user())
    <h3>Save List</h3>
    <div class="row">
        <div class="columns">
            <form action="{{$viewModel->saveOrUpdateUrl}}" method="post">
                @csrf
                <div class="row">
                    <div class="columns small-12 medium-12">
                        <div class="input-group">
                            <input type="hidden" name="original_input" value="{{$viewModel->itemList->original_input}}">
                <input type="hidden" name="original_separator" value="{{$viewModel->itemList->original_separator}}">
                    </div>
                    <div class="row">
                        <div class="columns small-12 medium-10">
                            <div class="input-group">
                                <input type="text" class="width-100" name="name" value="{{$viewModel->itemList->name ?? 'Unnamed list'}}">
                            </div>
                         </div>
                         <div class="columns small-12 medium-2">
                             <button class="button small success width-100">{{$viewModel->saveOrUpdateButton}}</button>
                             <p><small>anyone with link can see the list</small>
                         </div>
                    </div>

                </div>
            </div>

            </form>
         @else
         @include('layout.small-components.login-required',["message"=>"Login to save this list"])
    @endif

    @endif
    <hr>
    <div>
        <strong>List as Array output</strong>
    <textarea disabled>{{json_encode($viewModel->getParsedItems($viewModel->itemsString))}}</textarea>
    </div>
    <hr>
    @if(auth()->user())
    @include('list.components.saved-lists',["user"=>auth()->user()])
    @endif
@endsection
