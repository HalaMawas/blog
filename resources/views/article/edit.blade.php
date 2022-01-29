@extends('master')
   @section('style')
   <style type="text/css">
       input[type="file"] {
  display: block;
}
.imageThumb {
  max-height: 75px;
  border: 2px solid;
  padding: 1px;
  cursor: pointer;
}
.pip {
  display: inline-block;
  margin: 10px 10px 0 0;
}
.remove ,.removeold{
  display: block;
  background: #444;
  border: 1px solid black;
  color: white;
  text-align: center;
  cursor: pointer;
}
.remove:hover ,removeold:hover{
  background: white;
  color: black;
}
   </style>
   @endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Article</div>
                <div class="card-body">
                    <form method="post" action="{{ route('article.update',$article->id) }}" enctype="multipart/form-data">
                         @csrf
        @method('PUT')
                         @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Warning!</strong> Please check input field code<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
                        <div class="form-group">
                            <label class="label">Article Title: </label>
                            <input type="text" name="title" class="form-control" required value="{{$article->title}}" />
                        </div>
                        <div class="form-group">
                            <label class="label">Article Body: </label>
                            <textarea name="content" rows="10" cols="30" class="form-control" required>{{$article->content}}</textarea>
                        </div>
                        <div id="new" class="row">
<label for="img" class="col-lg-3 col-sm-2 control-label"> Article Image</label>
                      @foreach($article->images as $image)
           

  <span class="pip"> <input name="ImageId[]" type="text" value="{{$image->id}}" hidden><img class="imageThumb" src={{asset("article-image/{$image->url}")}} title="undefined"><br><span class="removeold">Remove image</span></span>
  @endforeach
                </div>
                                                <div class="form-group">

                        <div class="field" align="left">
  <h3>Upload your images</h3>
  <input type="file" id="files" name="images[]" multiple />
 
</div>
</div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-success" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script type="text/javascript">
    $(document).ready(function() {
  if (window.File && window.FileList && window.FileReader) {
    $("#files").on("change", function(e) {
      var files = e.target.files,
        filesLength = files.length;
      for (var i = 0; i < filesLength; i++) {
        var f = files[i]
        var fileReader = new FileReader();
        fileReader.onload = (function(e) {
          var file = e.target;
          $("<span class=\"pip\">" +
            "<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
            "<br/><span class=\"remove\">Remove image</span>" +
            "</span>").insertAfter("#files");
          $(".remove").click(function(){
            $(this).parent(".pip").remove();
          });
          
          // Old code here
          /*$("<img></img>", {
            class: "imageThumb",
            src: e.target.result,
            title: file.name + " | Click to remove"
          }).insertAfter("#files").click(function(){$(this).remove();});*/
          
        });
        fileReader.readAsDataURL(f);
      }
    });
  } else {
    alert("Your browser doesn't support to File API")
  }
});
</script>
<script type="text/javascript">
     $('span').on("click",'span.removeold', function() {
            var d=$(this).parent();
            console.log(d);
            d.remove();
            // if($('#new > div').length==1) {
            //     $('.delete').addClass('hide');
            // }

        })
</script>
@endsection