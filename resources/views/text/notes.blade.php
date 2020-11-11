@extends('layout.main')
@section('content')
    <h2>{{$viewModel->getTitle()}}</h2>
    <p>{{$viewModel->getTagline()}}</p>
    <hr>
        <div class="row">
            <div class="columns small-12">
                <textarea
                    name="notes" id="notes" rows="10" style="width:100%" placeholder="type here..."></textarea>
            </div>
            <div class="columns small-12">
                <div class="input-group">
                    <button class="button" onclick="copyText()">Copy Text</button>
                </div>
            </div>
        </div>
@endsection

@section('scriptSection')
    <script>
        function copyText() {
            var copied = document.getElementById("notes");
            copied.select();
            copied.setSelectionRange(0, 100000);
            document.execCommand("copy");
            alert("The text is copied to your device. You can paste it now to other programs or apps.");
        }

    </script>
@endsection
