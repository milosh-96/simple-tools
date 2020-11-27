@if($viewModel->getErrors())
<div class="callout warning">
    {{-- viewmodel errors aka custom feature errors --}}
    @foreach($viewModel->getErrors() as $error)
    <div>
        <strong style="color:red">{{$error}}</strong>
    </div>
    @endforeach
</div>
@endif

@if($errors->any())
<div class="callout warning">
{{--laravel session errors--}}
    @foreach($errors->all() as $error)
    <div>
        <strong style="color:red">{{$error}}</strong>
    </div>
    @endforeach
</div>
@endif

