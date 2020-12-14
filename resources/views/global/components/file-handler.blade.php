<div id="file-handler">

    <ul class="tabs" data-active-collapse="true" data-tabs id="collapsing-tabs">
        <li class="tabs-title is-active"><a href="#import-from-url" aria-selected="true">Image from URL</a></li>
        <li class="tabs-title"><a href="#upload">Upload</a></li>
      </ul>

      <div class="tabs-content" data-tabs-content="collapsing-tabs">
        <div class="tabs-panel is-active" id="import-from-url">
            <div class="input-group">
                <label>Enter Image URL: </label>
                <input type="text"  name="url" value="{{old('url') ?? request()->url}}" onchange="getImageSize(this)">
            </div> 
        </div>
        <div class="tabs-panel" id="upload">
              @csrf
              <div class="input-group">
                <label>Enter Image URL: </label>
                <input type="file" id="file-input"  name="file" value="{{old('url') ?? request()->file}}">
            </div>
            <button type="submit" class="button" id="upload-image">Upload</button>
            <img id="image">
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

      function uploadImage(event) {
        event.preventDefault();
        let photo = document.getElementById("file-input").files[0];
let formData = new FormData();

formData.append("file", photo);
  fetch('{{route('upload')}}', {
    method: "POST",
    body: formData
      }).then(function(res) {
    return res.blob();
  }).then(function(res) {
    var urlCreator = window.URL || window.webkitURL;
     var imageUrl = urlCreator.createObjectURL(res);
    
      $("#image").attr("src",imageUrl);
  });
      }

  </script>
  @endsection
