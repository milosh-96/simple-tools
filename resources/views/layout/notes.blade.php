@if($viewModel->getNotes())
        <div class="callout primary">
            @foreach($viewModel->getNotes() as $note)
            <small>{{$note}}</small>
            @endforeach
        </div>
@endif
