@if(auth()->user())
<div class="callout">
    <form action="{{route('question.store')}}" method="POST">
    @csrf
    <div class="step"  id="question-title" data-step="1">
    <strong>Question Title</strong>
        <div class="input-group">
            <input required type="text"  style="font-size: 23px" name="title" placeholder="What is your question?">
        </div>
        <button class="button step-control" data-tostep="2">Next</button>
    </div>
    <div class="step"  id="question-desc" data-step="2">
    <strong>Question Description</strong>
        <div class="input-group">
            <input required type="text"  style="font-size: 23px" name="description" placeholder="Explain your question in few words."">
        </div>
        <button class="button step-control" data-tostep="1">Back</button>
        <button class="button step-control" data-tostep="3">Next</button>
    </div>
    <div class="step"  id="question-choices" data-step="3">
        <strong>Choices</strong>
        <div class="input-group">
            <input required type="text" name="choices[]"  style="font-size: 23px" placeholder="Option 1 (example: yes)">
        </div>
        <div class="input-group">
            <input  required type="text" name="choices[]"  style="font-size: 23px" placeholder="Option 2 (example: no)">
        </div>
        <button class="button step-control" data-tostep="2">Back</button>
        <button class="button">Submit</button>
    </div>
    </form>
</div>


@section('scriptSection')
<script>
   function stepControl() {
       $(".step").hide();
       $('[data-step="'+1+'"]').show();
    $(".step-control").click(function(e) {
        e.preventDefault();
        $(".step").fadeOut();
        $('[data-step="'+this.dataset.tostep+'"]').slideDown();
    });
   }

   stepControl();
</script>
@endsection
@else
@include('layout.small-components.login-required',["message"=>"Login to ask question"])
@endif
