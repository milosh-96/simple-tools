<div id="file-handler">

    <ul class="tabs" data-active-collapse="true" data-tabs id="collapsing-tabs">
        <li class="tabs-title is-active"><a href="#import-from-url" aria-selected="true">Image from URL</a></li>
      </ul>

      <div class="tabs-content" data-tabs-content="collapsing-tabs">
        <div class="tabs-panel is-active" id="import-from-url">
            <div class="input-group">
                <label>Enter Image URL: </label>
                <input type="text"  name="url" value="{{old('url') ?? request()->url}}" onchange="getImageSize(this)">
            </div>
        </div>
      </div>
</div>





  @section('scriptSection')
  @parent
  <script>
      var tabs = new Foundation.Tabs($(".tabs"));
    $("#upload-image").click(function(event) {
        uploadImage(event);
    });

  </script>
  @endsection
