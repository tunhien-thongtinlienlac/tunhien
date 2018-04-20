
@extends('Contents.master.master')
@section('content1')
SLidebar
@stop
@section('content2')
<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<style type="text/css">
		.btn-success {
    margin-right: 100px;
		}
        .container{
            margin-top:20px;
        }
        .image-preview-input {
            position: relative;
            overflow: hidden;
            margin: 0px;    
            color: #333;
            background-color: #fff;
            border-color: #ccc;    
        }
        .image-preview-input input[type=file] {
            position: absolute;
            top: 0;
            right: 0;
            margin: 0;
            padding: 0;
            font-size: 20px;
            cursor: pointer;
            opacity: 0;
            filter: alpha(opacity=0);
        }
        .image-preview-input-title {
            margin-left:2px;
        }
        .eidt-image-contact{
        	width: 70px;
        	height: 70px;
        }
    </style>
    
@endsection
@section('content3')
Slidebar
@stop
@section('content4')
<li><a href="{{ route('Slidebar') }}">Slidebar</a></li>
@stop
@section('content5')
Slide Image
@stop
@section('content6')
<div class="container">
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>List Image</h2>
        </div>
        <div class="pull-right">
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#create-item">
  Add Image
</button>
        </div>
    </div>
</div>
<form method="POST">
<table class="table table-bordered">
<thead>
    <tr>
      <th>STT</th>
		<th>Image</th>
		<th width="300px">Action</th>
    </tr>
    <?php
    	$Contentimageslb = file_get_contents(storage_path()."/slidebar/datasldiebar.json",true);
    	if (json_decode($Contentimageslb,true)) {
    		$datasimg = json_decode($Contentimageslb,true);
			foreach ($datasimg as $key => $value) {
    ?>
    <tr>
      <td>{{ $value['stt'] }}</td>
    	<td><img class="eidt-image-contact" src="{{ asset('public/upload/image') }}/{{$value['nameimageslidebar']}}"></td>
    	<td>
    		<a href="{{ route('slidebar.delete') }}?id={{ $value['stt'] }}" class="btn btn-danger a-btn-slide-text" data-id={{$value['stt']}}>
       <span class="glyphicon glyphicon-remove" aria-hidden="true" ></span>
        <span><strong>Delete</strong></span>            
    		</a>
    	</td>
    </tr>
    <?php }}
    ?>
</thead>
<tbody>
</tbody>
</table>
</form>
<ul id="pagination" class="pagination-sm"></ul>

        <!-- Create Item Modal -->
<div class="modal fade" id="create-item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        <h4 class="modal-title" id="myModalLabel">Select Image SLidebar</h4>
      </div>

      <div class="modal-body"><!--  -->
      <form  action="{{ route('dataslidebar') }}"  method="post" enctype="multipart/form-data">
      	<input type="hidden" name="_token" value="{!! csrf_token() !!}" />
    <div class="form-group">
        <label class="control-label" for="title">STT:</label>
        <input type="text" name="sttslidebar" class="form-control" placeholder="Enter stt" data-error="Please enter stt." required />
        <div class="help-block with-errors"></div>
      </div>
 <div class="form-group">
<label class="control-label" for="title">image:</label>
<div class="container">
        <div class="row">    
            <div class="col-xs-12 col-md-6 col-sm-8 editform">  
                <!-- image-preview-filename input [CUT FROM HERE]-->
                <div class="input-group image-preview">
                    <input type="text" class="form-control image-preview-filename" disabled="disabled"> <!-- don't give a name === doesn't send on POST/GET -->
                    <span class="input-group-btn">
                        <!-- image-preview-clear button -->
                        <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
                            <span class="glyphicon glyphicon-remove"></span> Clear
                        </button>
                        <!-- image-preview-input -->
                        <div class="btn btn-default image-preview-input">
                            <span class="glyphicon glyphicon-folder-open"></span>
                            <span class="image-preview-input-title">Browse</span>
                            <input type="file" accept="image/png, image/jpeg, image/gif" name="imageslide"/><!-- rename it -->
                        </div>
                    </span>
                </div><!-- /input-group image-preview [TO HERE]--> 
            </div>
        </div>
    </div>
</div>



<div class="form-group">
<button type="submit" name="submitadd" class="btn crud-submit btn-success">ADD Item</button>
</div>

      </form>

      </div>
    </div>

  </div>
</div>

<!-- Edit Item Modal -->
</div>
@endsection
@section('content7')
Tự nhiên
@endsection


@section('script1')
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
@endsection
@section('script')
     
    <script type="text/javascript">
                $(document).on('click', '#close-preview', function(){ 
            $('.image-preview').popover('hide');
            // Hover befor close the preview
            $('.image-preview').hover(
                function () {
                   $('.image-preview').popover('show');
                }, 
                 function () {
                   $('.image-preview').popover('hide');
                }
            );    
        });

        $(function() {
            // Create the close button
            var closebtn = $('<button/>', {
                type:"button",
                text: 'x',
                id: 'close-preview',
                style: 'font-size: initial;',
            });
            closebtn.attr("class","close pull-right");
            // Set the popover default content
            $('.image-preview').popover({
                trigger:'manual',
                html:true,
                title: "<strong>Preview</strong>"+$(closebtn)[0].outerHTML,
                content: "There's no image",
                placement:'bottom'
            });
            // Clear event
            $('.image-preview-clear').click(function(){
                $('.image-preview').attr("data-content","").popover('hide');
                $('.image-preview-filename').val("");
                $('.image-preview-clear').hide();
                $('.image-preview-input input:file').val("");
                $(".image-preview-input-title").text("Browse"); 
            }); 
            // Create the preview image
            $(".image-preview-input input:file").change(function (){     
                var img = $('<img/>', {
                    id: 'dynamic',
                    width:250,
                    height:200
                });      
                var file = this.files[0];
                var reader = new FileReader();
                // Set preview image into the popover data-content
                reader.onload = function (e) {
                    $(".image-preview-input-title").text("Change");
                    $(".image-preview-clear").show();
                    $(".image-preview-filename").val(file.name);            
                    img.attr('src', e.target.result);
                    $(".image-preview").attr("data-content",$(img)[0].outerHTML).popover("show");
                }        
                reader.readAsDataURL(file);
            });  
        });
    </script>
   
@endsection