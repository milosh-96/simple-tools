@if(session('status'))
<div class="callout success">
    <div>
       {{session('status')}}
    </div>
</div>
@endif

@if(auth()->user() && !auth()->user()->hasVerifiedEmail())
<div class="callout primary">
    <div>
       Please verify your account. Check your Inbox.
    </div>
</div>
@endif