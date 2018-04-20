
@extends('Contents.master.master')
@section('content1')
Statiscal
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
Statiscal
@stop
@section('content4')
<li><a href="{{ route('Statical') }}">Statiscal</a></li>
@stop
@section('content5')
Title and Backgroundimage
@stop
@section('content6')
<div class="container">
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Title and Backgroundimage</h2>
        </div>
        <?php
        	$ContentFile = file_get_contents(storage_path()."/statistical/titleandbackgroundstt.json",true);
        	if(!json_decode($ContentFile,true)){
        ?>
        <div class="pull-right">
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#create-item-stt1">
  Add Title and Backgruond
</button>
        </div>
        <?php
        	}
        ?>
    </div>
</div>
<form method="POST">
<table class="table table-bordered">
<thead>
    <tr>
		<th>Title1</th>
		<th>Title2</th>
		<th>Background image</th>
		<th width="300px">Action</th>
    </tr>
    <?php
    	$ContentFile = file_get_contents(storage_path()."/statistical/titleandbackgroundstt.json",true);
    	if (json_decode($ContentFile,true)) {
    		$datas = json_decode($ContentFile,true);
			foreach ($datas as $key => $value) {
    ?>
    <tr>
    	<td><?php echo $value['titlelstt1'];?></td>
    	<td><?php echo $value['titlelstt2'];?></td>
    	<td><img class="eidt-image-contact" src="{{ asset('public/upload/image') }}/{{$value['nameimage']}}"></td>
    	<td>
    		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit-item-stt1" >Edit
			</button>
    		<a href="{{ route('dtltitleandbackgroundstt') }}" class="btn btn-danger a-btn-slide-text">
       <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
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
<div class="modal fade" id="create-item-stt1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        <h4 class="modal-title" id="myModalLabel">Info Title and Image</h4>
      </div>

      <div class="modal-body"><!--  -->
      <form  action="{{ route('datatitlebackgruondstt') }}"  method="post" enctype="multipart/form-data">
      	<input type="hidden" name="_token" value="{!! csrf_token() !!}" />
     <div class="form-group">
		<label class="control-label" for="title">Title1:</label>
		<input type="text" name="titlstt1" class="form-control" placeholder="Enter Title1" data-error="Please enter title." required />
		<div class="help-block with-errors"></div>
	</div>

	 <div class="form-group">
		<label class="control-label" for="title">Title2:</label>
		<input type="text" name="titlstt2" class="form-control" placeholder="Enter Title2" data-error="Please enter title." required />
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
                            <input type="file" accept="image/png, image/jpeg, image/gif" name="backgruondimagestt"/><!-- rename it -->
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
<div class="modal fade" id="edit-item-stt1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        <h4 class="modal-title" id="myModalLabel">Edit Title and Background</h4>
      </div>

      <?php
      $ContentFilestt1 = file_get_contents(storage_path()."/statistical/titleandbackgroundstt.json",true);
      if (json_decode($ContentFilestt1,true)) {
        $datas = json_decode($ContentFilestt1,true);
      foreach ($datas as $key => $value) {
    ?>

     <div class="modal-body"><!--  -->
     <form  action="{{ route('edittitlebackgruondstt') }}"  method="post" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{!! csrf_token() !!}" />
     <div class="form-group">
		<label class="control-label" for="title">Title1:</label>
		<input type="text" name="titlstt1" class="form-control" placeholder="Enter Title1" data-error="Please enter title." required value="<?php echo $value['titlelstt1'];?>" />
		<div class="help-block with-errors"></div>
	</div>

	<div class="form-group">
		<label class="control-label" for="title">Title2:</label>
		<input type="text" name="titlstt2" class="form-control" placeholder="Enter Title2" data-error="Please enter title." required value="<?php echo $value['titlelstt2'];?>" />
		<div class="help-block with-errors"></div>
	</div>

	 	<div class="form-group">
			<label class="control-label" for="title">image:</label>
			<div class="container">
			        <div class="row">    
			            <div class="col-xs-12 col-md-6 col-sm-8 editform">  
			                <!-- image-preview-filename input [CUT FROM HERE]-->
			                <div class="input-group image-preview">
			                    <input type="text" class="form-control image-preview-filename" name="backgruondimagestt" disabled="disabled" value="<?php echo $value['nameimage'];?>"> <!-- don't give a name === doesn't send on POST/GET -->
			                    <span class="input-group-btn">
			                        <!-- image-preview-clear button -->
			                        <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
			                            <span class="glyphicon glyphicon-remove"></span> Clear
			                        </button>
			                        <!-- image-preview-input -->
			                        <div class="btn btn-default image-preview-input">
			                            <span class="glyphicon glyphicon-folder-open"></span>
			                            <span class="image-preview-input-title">Browse</span>
			                            <input type="file" accept="image/png, image/jpeg, image/gif" name="backgruondimagestt"/><!-- rename it -->
			                        </div>
			                    </span>
			                </div><!-- /input-group image-preview [TO HERE]--> 
			            </div>
			        </div>
			    </div>
		</div>



		<div class="form-group">
			<button type="submit" name="submitadd" class="btn crud-submit btn-success">Edit Item</button>
		</div>

      </form>

      </div>
      <?php }}?>
    </div>

  </div>
</div>


</div>
@endsection
@section('content7')
Tự nhiên
@endsection

@section('content8')
<div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Content Statistical</h3>

        </div>
        <div class="box-body">
          <!-- body content8 -->
                <div class="container">
      <div class="row">
          <div class="col-lg-12 margin-tb">
              <div class="pull-left">
                  <h2>Content Row Statstical</h2>
              </div>
              <div class="pull-right">
      <button type="button" class="btn btn-success" data-toggle="modal" data-target="#create-item-Contentrowstt">
        Add Content Row
      </button>
              </div>
          </div>
      </div>
      <form method="post" action="">
      <table class="table table-bordered">
      <thead>
          <tr>
	          <th>STT</th>
	          <th>Number</th>
	          <th>Text1</th>
	          <th>Text2</th>
	          <th width="300px">Action</th>
          </tr>
          <?php
            $Logoslidesdt = file_get_contents(storage_path()."/statistical/datacontentstt.json",true);
            if (json_decode($Logoslidesdt,true)) {
              $datas_logoslides = json_decode($Logoslidesdt,true);
            foreach ($datas_logoslides as $key => $value) {
          ?>
          <tr>
            <td><?php echo $value['stt'];?></td>
            <td><?php echo $value['number'];?></td>
            <td><?php echo $value['text1'];?></td>
            <td><?php echo $value['text2'];?></td>
            <td>
              <button type="button" class="btn btn-primary btn-edit-2" data-url={{route('statiscal.edit', $value['stt'])}} data-id={{$value['stt']}} data-toggle="modal" data-target="#edit-item-Contentrowstt">Edit
            </button>
              <a href="{{route('statiscal.delete')}}?id={{ $value['stt'] }}" class="btn btn-danger a-btn-slide-text" data-id={{$value['stt']}}>
             <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
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
      <div class="modal fade" id="create-item-Contentrowstt" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
              <h4 class="modal-title" id="myModalLabel">Info Row</h4>
            </div>

            <div class="modal-body"><!-- action="api/create.php" -->
            <form  action="{{ route('datacontentrowstt') }}"  method="post" enctype="multipart/form-data">
              <input type="hidden" name="_token" value="{!! csrf_token() !!}" />
       <div class="form-group">
	      <label class="control-label" for="title">STT:</label>
	      <input type="text" name="sttrow1" class="form-control" placeholder="Enter stt" data-error="Please enter stt." required />
	      <div class="help-block with-errors"></div>
      </div>

       <div class="form-group">
	      <label class="control-label" for="title">Number:</label>
	      <input type="text" name="numberrow1" class="form-control" placeholder="Enter Number" data-error="Please enter number." required />
	      <div class="help-block with-errors"></div>
      </div>

       <div class="form-group">
	      <label class="control-label" for="title">Text 1:</label>
	      <input type="text" name="text1row1" class="form-control" placeholder="Enter Text" data-error="Please enter text." required />
        <div class="help-block with-errors"></div>
      </div>

       
       <div class="form-group">
	      <label class="control-label" for="title">Text 2:</label>
	      <input type="text" name="text2row1" class="form-control" placeholder="Enter Text" data-error="Please enter text." required />
	      <div class="help-block with-errors"></div>
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
      
      <div class="modal fade" id="edit-item-Contentrowstt" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="myModalLabel">Edit Content Rows</h4>
                  </div>


                  <div class="modal-body">
                  <form  action="{{ route('editcontentsrowstt') }}"  method="post" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{!! csrf_token() !!}" />
                <div class="form-group">
                  <label class="control-label" for="title">STT:</label>
                  <input type="text" name="sttrow" class="form-control" placeholder="Enter stt" data-error="Please enter stt." required readonly="readonly" />
                  <div class="help-block with-errors"></div>
                </div>

                 <div class="form-group">
                  <label class="control-label" for="title">Number:</label>
                  <input type="text" name="numberrow" class="form-control" placeholder="Enter Number" data-error="Please enter number." required />
                  <div class="help-block with-errors"></div>
                </div>

                 <div class="form-group">
                  <label class="control-label" for="title">Text 1:</label>
                  <input type="text" name="text1row" class="form-control" placeholder="Enter Text" data-error="Please enter text." required />
                  <div class="help-block with-errors"></div>
                </div>

                 
                 <div class="form-group">
                  <label class="control-label" for="title">Text 2:</label>
                  <input type="text" name="text2row" class="form-control" placeholder="Enter Text" data-error="Please enter text." required />
                  <div class="help-block with-errors"></div>
                </div>

                <div class="form-group">
                <button type="submit" name="submitadd" class="btn crud-submit btn-success">Edit Item</button>
                </div>

                  </form>

                  </div>
       
                </div>

              </div>
            </div>

</div>
<!-- code đó a. e muốn bấm vô button mà nó hiện 1 cái theo đúng cái đó thôi
Okay. chờ xíu anh xem.
 -->
          <!-- end body content8 -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
        </div>
        <!-- /.box-footer-->
      </div>
@stop
@section('script1')
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
@endsection
@section('script')
     <script type="text/javascript">
		$(document).ready(function(){
			
			$(document).on('click', '.btn-edit-2', function(e){
				e.preventDefault();
				var $url = $(this).data('url');
				$.ajax({
				    url     : $url,
				    method  : 'get', 
				    data    : {
				        
				    },
				    headers:
				    {
				        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				    },
				    success : function(response){
				    	console.log('Success: ' + response);

				    	if(response && response.error == false){
				    		var data = response.data;
				    		$('.modal-content input[name=sttrow]').val(data.stt);
				    		$('.modal-content input[name=numberrow]').val(data.number);
				    		$('.modal-content input[name=text1row]').val(data.text1);
				    		$('.modal-content input[name=text2row]').val(data.text2);
				    	}
				    },
				    error: function(response){
				    	console.log('Error: ' + response);
				    }
				});
			})
			
		});
	</script>
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