@extends('Contents.master.master')
@section('content1')
Footer
@stop
@section('content2')
<style type="text/css">
	.btn-success{
		margin-right: 100px;
	}
</style>
@stop
@section('content3')
footer
@stop
@section('content4')
<li><a href="{{ route('footer') }}">Edit footer</a></li>
@stop
@section('content5')
Copy Right
@stop
@section('content6')
<div class="container">
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Copy Right</h2>
        </div>
        <?php
        	$ContentFile = file_get_contents(storage_path()."/footer/copyright.json",true);
        	if(!json_decode($ContentFile,true)){
        ?>
        <div class="pull-right">
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#create-item">
  Add Copyright
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
		<th>Content1 Copyright</th>
		<th>Content1 Copyright</th>
		<th>Link Copyright</th>
		<th width="300px">Action</th>
    </tr>
    <?php
    	$ContentFile = file_get_contents(storage_path()."/footer/copyright.json",true);
    	if (json_decode($ContentFile,true)) {
    		$datas = json_decode($ContentFile,true);
			foreach ($datas as $key => $value) {
    ?>
    <tr>
    	<td><?php echo $value['content1coppyright'];?></td>
    	<td><?php echo $value['content2coppyright'];?></td>
    	<td><?php echo $value['linkcoppyright'];?></td>
    	<td>
    		<!-- <a href="#" class="btn btn-primary a-btn-slide-text">
        <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
        <span><strong>Edit</strong></span>            
    		</a> -->
    		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit-item" >Edit
			</button>
    		<a href="{{ route('dltcopyrightlft') }}" class="btn btn-danger a-btn-slide-text">
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
        <h4 class="modal-title" id="myModalLabel">Info Copyright</h4>
      </div>

      <div class="modal-body"><!-- action="api/create.php" -->
      <form  action="{{ route('datacopyright') }}"  method="post">
      	<input type="hidden" name="_token" value="{!! csrf_token() !!}" />
      <div class="form-group">
<label class="control-label" for="title">Content1 copyright:</label>
<input type="text" name="content1coppyright" class="form-control" placeholder="Enter Content1" data-error="Please enter content1." required />
<div class="help-block with-errors"></div>
</div>

 <div class="form-group">
<label class="control-label" for="title">Content2 copyright:</label>
<input type="text" name="content2coppyright" class="form-control" placeholder="Enter Content2" data-error="Please enter content2." required />
<div class="help-block with-errors"></div>
</div>

 <div class="form-group">
<label class="control-label" for="title">Link Copyright:</label>
<input type="text" name="linkcoppyright" class="form-control" placeholder="Enter Link" data-error="Please enter link." required />
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

<div class="modal fade" id="edit-item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        <h4 class="modal-title" id="myModalLabel">Edit Copyright</h4>
      </div>

      <?php
    	$ContentFile = file_get_contents(storage_path()."/footer/copyright.json",true);
    	if (json_decode($ContentFile,true)) {
    		$datas = json_decode($ContentFile,true);
			foreach ($datas as $key => $value) {
    ?>

      <div class="modal-body">
      <form  action="{{ route('editcopyright') }}"  method="post">
      	<input type="hidden" name="_token" value="{!! csrf_token() !!}" />
      <div class="form-group">
<label class="control-label" for="title">Content1 copyright:</label>
<input type="text" name="content1coppyright" class="form-control" placeholder="Enter Content 1" data-error="Please enter content1." required value="<?php echo $value['content1coppyright'];?>" />
<div class="help-block with-errors"></div>
</div>

 <div class="form-group">
<label class="control-label" for="title">Content2 copyright:</label>
<input type="text" name="content2coppyright" class="form-control" placeholder="Enter Content 2" data-error="Please enter content2." required value="<?php echo $value['content2coppyright'];?>" />
<div class="help-block with-errors"></div>
</div>

 <div class="form-group">
<label class="control-label" for="title">Link Copyright:</label>
<input type="text" name="linkcoppyright" class="form-control" placeholder="Enter link" data-error="Please enter link." required value="<?php echo $value['linkcoppyright'];?>" />
<div class="help-block with-errors"></div>
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
@stop
@section('content7')
Tự nhiên
@stop
@section('content8')
<div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Social footer</h3>

          
        </div>
        <div class="box-body">
        	<!-- body content8 -->
			        	<div class="container">
			<div class="row">
			    <div class="col-lg-12 margin-tb">
			        <div class="pull-left">
			            <h2>Social footer</h2>
			        </div>
			        <div class="pull-right">
			<button type="button" class="btn btn-success" data-toggle="modal" data-target="#create-item-social">
			  Add Social
			</button>
			        </div>
			    </div>
			</div>
			<form method="post" action="">
			<table class="table table-bordered">
			<thead>
			    <tr>
			    	<th>STT</th>
					<th>Type Social</th>
					<th>Link Social</th>
					<th width="300px">Action</th>
			    </tr>
			    <?php
			    	$Socialdt = file_get_contents(storage_path()."/footer/socialfooter.json",true);
			    	if (json_decode($Socialdt,true)) {
			    		$datasocial = json_decode($Socialdt,true);
						foreach ($datasocial as $key => $value) {
			    ?>
			    <tr>
			    	<td><input type="hidden" name="check" value="<?php echo $value['stt'];?>"><?php echo $value['stt'];?></td>
			    	<td><?php echo $value['typesocial'];?></td>
			    	<td><?php echo $value['linksocial'];?></td>
			    	<td>
			    		<button type="button" class="btn btn-primary btn-edit" data-url={{route('footer.edit', $value['stt'])}} data-id={{$value['stt']}} data-toggle="modal" data-target="#edit-item-social">Edit
						</button>
			    		<a href="{{route('footer.delete')}}?id={{ $value['stt'] }}" class="btn btn-danger a-btn-slide-text" data-id={{$value['stt']}}>
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
			<div class="modal fade" id="create-item-social" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
			        <h4 class="modal-title" id="myModalLabel">Info Social</h4>
			      </div>

			      <div class="modal-body"><!-- action="api/create.php" -->
			      <form  action="{{ route('datasocial') }}"  method="post">
			      	<input type="hidden" name="_token" value="{!! csrf_token() !!}" />
			      <div class="form-group">
			<label class="control-label" for="title">STT:</label>
			<input type="text" name="sttsocial1" class="form-control" placeholder="Enter stt" data-error="Please enter stt." required />
			<div class="help-block with-errors"></div>
			</div>

			 <div class="form-group">
			<label class="control-label" for="title">Type Social:</label>
			  <select class="form-control" name="typesocialfooter1">
			    <option selected>facebook</option>
			    <option value="vimeo">vimeo</option>
			    <option value="youtube-play">youtube-play</option>
			    <option value="twitter">twitter</option>
			    <option value="delicious">delicious</option>
			  </select>
			<div class="help-block with-errors"></div>
			</div>

			 <div class="form-group">
			<label class="control-label" for="title">Link Social:</label>
			<input type="text" name="linksocial1" class="form-control" placeholder="Enter Link" data-error="Please enter link." required />
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
			
			<div class="modal fade" id="edit-item-social" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="myModalLabel">Edit Social</h4>
                  </div>


                  <div class="modal-body">
                  <form  action="{{ route('editsocial') }}"  method="post">
                    <input type="hidden" name="_token" value="{!! csrf_token() !!}" />
                  	<div class="form-group">
		            <label class="control-label" for="title">STT:</label>
		            <input type="text" name="sttsocial" class="form-control" placeholder="Enter Content 1" data-error="Please enter content1." required value="" readonly="readonly" />
		            <div class="help-block with-errors"></div>
		            </div>

		             <div class="form-group">
		            <label class="control-label" for="title">Type Social:</label>
		                <select class="form-control" name="typesocialfooter">
		                    <option value="facebook">facebook</option>
		                    <option value="vimeo">vimeo</option>
		                    <option value="youtube-play">youtube-play</option>
		                    <option value="twitter">twitter</option>
		                    <option value="delicious">delicious</option>
		                </select>
		            <div class="help-block with-errors"></div>
		            </div>

		             <div class="form-group">
		            <label class="control-label" for="title">Link Social:</label>
		            <input type="text" name="linksocial" class="form-control" placeholder="Enter link" data-error="Please enter link." required value="" />
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

@section('script')
	<script type="text/javascript">
		$(document).ready(function(){
			
			$(document).on('click', '.btn-edit', function(e){
				e.preventDefault();
				var $url = $(this).data('url');
				$.ajax({
				    url     : $url,
				    method  : 'get', // update method = post, và trong route tạo  thêm 1 routeô  pót. em hiểu chưa? e hiểu sơ sơ rồi. tại script e chưa có học :v, Học những cái cơ bản trước thôi. cứ tìm hiểu dần dần là vừa, thôi anh out nhé
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
				    		$('.modal-content input[name=sttsocial]').val(data.stt);
				    		$('.modal-content input[name=linksocial]').val(data.linksocial);
				    		$('.modal-content select[name=typesocialfooter]').val(data.typesocial);
				    	}
				    	// phần stt là ko cho họ sửa nha em
				    	// OK A, này là để mình tìm kiếm thôi, họ sửa mà trùng là mình tìm kiếm sai đó
				    	// Này là anh demo get dữ liệu cho em đó, phần update thì em cũng làm như get dữ liệu thoi, method = post
				    },
				    error: function(response){
				    	console.log('Error: ' + response);
				    }
				});
			})
			
		});
	</script>
@endsection