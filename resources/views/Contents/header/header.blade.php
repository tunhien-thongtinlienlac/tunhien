
@extends('Contents.master.master')
@section('content1')
Header
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
Header
@stop
@section('content4')
<li><a href="{{ route('Header') }}">Header</a></li>
@stop
@section('content5')
Logo
@stop
@section('content6')
<div class="container">
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Logo Image</h2>
        </div>
        <div class="pull-right">
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#create-item">
  Add Logo
</button>
        </div>
    </div>
</div>
<form method="POST">
<table class="table table-bordered">
<thead>
    <tr>
      <th>STT</th>
		  <th>Background image</th>
      <th>Type Logo</th>
		<th width="300px">Action</th>
    </tr>
    <?php
    	$Contentimagelogo = file_get_contents(storage_path()."/header/datalogo.json",true);
    	if (json_decode($Contentimagelogo,true)) {
    		$datasimg = json_decode($Contentimagelogo,true);
			foreach ($datasimg as $key => $value) {
    ?>
    <tr>
      <td>{{ $value['stt'] }}</td>
    	<td><img class="eidt-image-contact" src="{{ asset('public/upload/image') }}/{{$value['namelogo']}}"></td>
      <td>{{ $value['typelogo'] }}</td>
    	<td>
        <button type="button" class="btn btn-primary btn-edit-logo" data-url={{route('logo.edit', $value['stt'])}} data-id={{$value['stt']}} data-toggle="modal" data-target="#edit-item-logo">Edit
            </button>
    		<a href="{{ route('dltlogo') }}?id={{ $value['stt'] }}" class="btn btn-danger a-btn-slide-text">
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
<div class="modal fade" id="create-item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        <h4 class="modal-title" id="myModalLabel">Select Logo</h4>
      </div>

      <div class="modal-body"><!--  -->
      <form  action="{{ route('datatlogo') }}"  method="post" enctype="multipart/form-data">
      	<input type="hidden" name="_token" value="{!! csrf_token() !!}" />

        <div class="form-group">
          <label class="control-label" for="title">STT:</label>
          <input type="text" name="sttlogo1" class="form-control" placeholder="Enter stt" data-error="Please enter stt." required />
          <div class="help-block with-errors"></div>
        </div>

        <div class="form-group">
          <label class="control-label" for="title">Type:</label>
          <select class="form-control" name="typelogo1">
            <option selected>logo</option>
            <option value="sologan">sologan</option>
          </select>
  
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
                                <input type="file" accept="image/png, image/jpeg, image/gif" name="logo1"/><!-- rename it -->
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
      
      <div class="modal fade" id="edit-item-logo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="myModalLabel">Edit Logo</h4>
                  </div>


                  <div class="modal-body">
                  <form  action="{{ route('editdatalogo') }}"  method="post" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{!! csrf_token() !!}" />

                      <div class="form-group">
          <label class="control-label" for="title">STT:</label>
          <input type="text" name="sttlogo" class="form-control" placeholder="Enter stt" data-error="Please enter stt." required readonly="readonly" />
          <div class="help-block with-errors"></div>
        </div>

        <div class="form-group">
          <label class="control-label" for="title">Type:</label>
          <select class="form-control" name="typelogo">
            <option value="logo">logo</option>
            <option value="sologan">sologan</option>
          </select>
  
          <div class="help-block with-errors"></div>
        </div>


     <div class="form-group">
    <label class="control-label" for="title">image:</label>
    <div class="container">
            <div class="row">    
                <div class="col-xs-12 col-md-6 col-sm-8 editform">  
                    <!-- image-preview-filename input [CUT FROM HERE]-->
                    <div class="input-group image-preview">
                        <input type="text" class="form-control image-preview-filename" disabled="disabled" name="logo"> <!-- don't give a name === doesn't send on POST/GET -->
                        <span class="input-group-btn">
                            <!-- image-preview-clear button -->
                            <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
                                <span class="glyphicon glyphicon-remove"></span> Clear
                            </button>
                            <!-- image-preview-input -->
                            <div class="btn btn-default image-preview-input">
                                <span class="glyphicon glyphicon-folder-open"></span>
                                <span class="image-preview-input-title">Browse</span>
                                <input type="file" accept="image/png, image/jpeg, image/gif" name="logo"/><!-- rename it -->
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
          <h3 class="box-title">Menu</h3>

          
        </div>
        <div class="box-body">
          <!-- body content8 -->
                <div class="container">
      <div class="row">
          <div class="col-lg-12 margin-tb">
              <div class="pull-left">
                  <h2>List Menu</h2>
              </div>
              <div class="pull-right">
      <button type="button" class="btn btn-success" data-toggle="modal" data-target="#create-item-menu">
        Add Menu
      </button>
              </div>
          </div>
      </div>
      <form method="post" action="">
      <table class="table table-bordered">
      <thead>
          <tr>
            <th>STT</th>
          <th>Name Menu</th>
          <th>Link Menu</th>
          <th width="300px">Action</th>
          </tr>
          <?php
            $rowwhydt = file_get_contents(storage_path()."/header/datamenu.json",true);
            if (json_decode($rowwhydt,true)) {
              $datarowwhy = json_decode($rowwhydt,true);
            foreach ($datarowwhy as $key => $value) {
          ?>
          <tr>
            <td><?php echo $value['stt'];?></td>
            <td><?php echo $value['namemenu'];?></td>
            <td><?php echo $value['linkmenu'];?></td>
            <td>
              <button type="button" class="btn btn-primary btn-edit-2" data-url={{route('menu.edit', $value['stt'])}} data-id={{$value['stt']}} data-toggle="modal" data-target="#edit-item-menu">Edit
            </button>
              <a href="{{route('menu.delete')}}?id={{ $value['stt'] }}" class="btn btn-danger a-btn-slide-text" data-id={{$value['stt']}}>
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
      <div class="modal fade" id="create-item-menu" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
              <h4 class="modal-title" id="myModalLabel">Info Menu</h4>
            </div>

            <div class="modal-body">
            <form  action="{{ route('datamenu') }}"  method="post">
              <input type="hidden" name="_token" value="{!! csrf_token() !!}" />
            <div class="form-group">
      <label class="control-label" for="title">STT:</label>
      <input type="text" name="sttmenu1" class="form-control" placeholder="Enter stt" data-error="Please enter stt." required />
      <div class="help-block with-errors"></div>
      </div>

       <div class="form-group">
      <label class="control-label" for="title">Name Menu:</label>
      <input type="text" name="namemenu1" class="form-control" placeholder="Enter Name" data-error="Please enter name." required />
      <div class="help-block with-errors"></div>
      </div>

       <div class="form-group">
      <label class="control-label" for="title">Link Menu:</label>
      <input type="text" name="linkmenu1" class="form-control" placeholder="Enter Link" data-error="Please enter link." required />
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
      
      <div class="modal fade" id="edit-item-menu" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="myModalLabel">Edit Menu</h4>
                  </div>


                  <div class="modal-body">
                  <form  action="{{ route('editmenus') }}"  method="post">
                    <input type="hidden" name="_token" value="{!! csrf_token() !!}" />

                      <div class="form-group">
      <label class="control-label" for="title">STT:</label>
      <input type="text" name="sttmenu" class="form-control" placeholder="Enter stt" data-error="Please enter stt." required readonly="readonly" />
      <div class="help-block with-errors"></div>
      </div>

       <div class="form-group">
      <label class="control-label" for="title">Name Menu:</label>
      <input type="text" name="namemenu" class="form-control" placeholder="Enter Name" data-error="Please enter name." required />
      <div class="help-block with-errors"></div>
      </div>

       <div class="form-group">
      <label class="control-label" for="title">Link Menu:</label>
      <input type="text" name="linkmenu" class="form-control" placeholder="Enter Link" data-error="Please enter link." required />
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
{{-- get content logo --}}
<script type="text/javascript">
    $(document).ready(function(){
      
      $(document).on('click', '.btn-edit-logo', function(e){
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
                $('.modal-content input[name=sttlogo]').val(data.stt);
                $('.modal-content select[name=typelogo]').val(data.typelogo);
                $('.modal-content input[name=logo]').val(data.namelogo);
              }
            },
            error: function(response){
              console.log('Error: ' + response);
            }
        });
      })
      
    });
  </script>
{{-- get content menu --}}
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
				    		$('.modal-content input[name=sttmenu]').val(data.stt);
				    		$('.modal-content input[name=namemenu]').val(data.namemenu);
				    		$('.modal-content input[name=linkmenu]').val(data.linkmenu);
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