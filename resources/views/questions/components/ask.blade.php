<div class="callout">
    <div class="step"  id="question-title" data-step="1">
        <div class="input-group">
            <input type="text"  style="font-size: 23" placeholder="What is your question?">
        </div>
        <button class="button step-control" data-tostep="2">Next</button>
    </div>
    <div class="step"  id="question-desc" data-step="2">
        <div class="input-group">
            <input type="text"  style="font-size: 23px" placeholder="Explain your question in few words."">
        </div>
        <button class="button step-control" data-tostep="1">Back</button>
        <button class="button step-control" data-tostep="3">Next</button>
    </div>
    <div class="step"  id="question-choices" data-step="3">
        <div class="input-group">
            <input type="text"  style="font-size: 23" placeholder="Option 1 (example: yes)">
        </div>
        <div class="input-group">
            <input type="text"  style="font-size: 23" placeholder="Option 2 (example: no)">
        </div>
        <button class="button step-control" data-tostep="2">Back</button>
        <button class="button">Submit</button>
    </div>
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
