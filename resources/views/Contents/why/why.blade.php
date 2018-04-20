@extends('Contents.master.master')
@section('content1')
Why?
@stop
@section('content2')
<style type="text/css">
	.btn-success{
		margin-right: 100px;
	}
</style>
@stop
@section('content3')
Why
@stop
@section('content4')
<li><a href="{{ route('footer') }}">Edit footer</a></li>
@stop
@section('content5')
Title why
@stop
@section('content6')
<div class="container">
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Content Title Why</h2>
        </div>
        <?php
        	$ContentFile = file_get_contents(storage_path()."/why/titlewhy.json",true);
        	if(!json_decode($ContentFile,true)){
        ?>
        <div class="pull-right">
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#create-item">
  Add Title Why
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
		<th>Content1 Title</th>
		<th>Content2 Title</th>
		<th width="300px">Action</th>
    </tr>
    <?php
    	$ContentFile = file_get_contents(storage_path()."/why/titlewhy.json",true);
    	if (json_decode($ContentFile,true)) {
    		$datas = json_decode($ContentFile,true);
			foreach ($datas as $key => $value) {
    ?>
    <tr>
    	<td><?php echo $value['content1title'];?></td>
    	<td><?php echo $value['content2title'];?></td>
    	<td>
    		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit-item" >Edit
			</button>
    		<a href="{{ route('dlttitlewhy') }}" class="btn btn-danger a-btn-slide-text">
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
        <h4 class="modal-title" id="myModalLabel">Info Title Why</h4>
      </div>

      <div class="modal-body">
      <form  action="{{ route('datatitlewhy') }}"  method="post">
      	<input type="hidden" name="_token" value="{!! csrf_token() !!}" />
      <div class="form-group">
<label class="control-label" for="title">Content1 Title:</label>
<input type="text" name="content1titlewhy" class="form-control" placeholder="Enter Content1" data-error="Please enter content1." required />
<div class="help-block with-errors"></div>
</div>

 <div class="form-group">
<label class="control-label" for="title">Content2 Title:</label>
<input type="text" name="content2titlewhy" class="form-control" placeholder="Enter Content2" data-error="Please enter content2." required />
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
    	$ContentFile = file_get_contents(storage_path()."/why/titlewhy.json",true);
    	if (json_decode($ContentFile,true)) {
    		$datas = json_decode($ContentFile,true);
			foreach ($datas as $key => $value) {
    ?>

      <div class="modal-body">
      <form  action="{{ route('edittitlewhy') }}"  method="post">
      	<input type="hidden" name="_token" value="{!! csrf_token() !!}" />
      <div class="form-group">
		<label class="control-label" for="title">Content1 Title:</label>
		<input type="text" name="content1titlewhy" class="form-control" placeholder="Enter Content 1" data-error="Please enter content1." required value="<?php echo $value['content1title'];?>" />
		<div class="help-block with-errors"></div>
		</div>

		 <div class="form-group">
		<label class="control-label" for="title">Content2 Title:</label>
		<input type="text" name="content2titlewhy" class="form-control" placeholder="Enter Content 2" data-error="Please enter content2." required value="<?php echo $value['content2title'];?>" />
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
          <h3 class="box-title">Content Why</h3>

          
        </div>
        <div class="box-body">
        	<!-- body content8 -->
			        	<div class="container">
			<div class="row">
			    <div class="col-lg-12 margin-tb">
			        <div class="pull-left">
			            <h2>Content Rows Why</h2>
			        </div>
			        <div class="pull-right">
			<button type="button" class="btn btn-success" data-toggle="modal" data-target="#create-item-why">
			  Add Row Why
			</button>
			        </div>
			    </div>
			</div>
			<form method="post" action="">
			<table class="table table-bordered">
			<thead>
			    <tr>
			    	<th>STT</th>
					<th>Type Icon</th>
					<th>Text</th>
					<th>Description</th>
					<th width="300px">Action</th>
			    </tr>
			    <?php
			    	$rowwhydt = file_get_contents(storage_path()."/why/datawhy.json",true);
			    	if (json_decode($rowwhydt,true)) {
			    		$datarowwhy = json_decode($rowwhydt,true);
						foreach ($datarowwhy as $key => $value) {
			    ?>
			    <tr>
			    	<td><?php echo $value['stt'];?></td>
			    	<td><?php echo $value['typeiconwhy'];?></td>
			    	<td><?php echo $value['textwhy'];?></td>
			    	<td><?php echo $value['deswhy'];?></td>
			    	<td>
			    		<button type="button" class="btn btn-primary btn-edit-2" data-url={{route('why.edit', $value['stt'])}} data-id={{$value['stt']}} data-toggle="modal" data-target="#edit-item-why">Edit
						</button>
			    		<a href="{{route('why.delete')}}?id={{ $value['stt'] }}" class="btn btn-danger a-btn-slide-text" data-id={{$value['stt']}}>
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
			<div class="modal fade" id="create-item-why" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
			        <h4 class="modal-title" id="myModalLabel">Info Row Why</h4>
			      </div>

			      <div class="modal-body">
			      <form  action="{{ route('datarowwhy') }}"  method="post">
			      	<input type="hidden" name="_token" value="{!! csrf_token() !!}" />
			      <div class="form-group">
			<label class="control-label" for="title">STT:</label>
			<input type="text" name="sttrowwhy1" class="form-control" placeholder="Enter stt" data-error="Please enter stt." required />
			<div class="help-block with-errors"></div>
			</div>

			 <div class="form-group">
			<label class="control-label" for="title">Type Icon:</label>
			  <select class="form-control" name="typeiconwhy1">
			    <option selected>truck</option>
			    <option value="cogs">cogs</option>
			    <option value="users">users</option>
			  </select>
			<div class="help-block with-errors"></div>
			</div>

			 <div class="form-group">
			<label class="control-label" for="title">Text Why:</label>
			<input type="text" name="textwhy1" class="form-control" placeholder="Enter Text" data-error="Please enter text." required />
			<div class="help-block with-errors"></div>
			</div>

			 <div class="form-group">
			<label class="control-label" for="title">Description Why:</label>
			<textarea rows="5" cols="30" class="form-control" name="deswhy1" placeholder="Enter description" data-error="Please enter description." required /></textarea>
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
			
			<div class="modal fade" id="edit-item-why" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="myModalLabel">Edit Social</h4>
                  </div>


                  <div class="modal-body">
                  <form  action="{{ route('editrowwhy') }}"  method="post">
                    <input type="hidden" name="_token" value="{!! csrf_token() !!}" />

                  	 <div class="form-group">
					<label class="control-label" for="title">STT:</label>
					<input type="text" name="sttrowwhy" class="form-control" placeholder="Enter stt" data-error="Please enter stt." required  readonly="readonly" />
					<div class="help-block with-errors"></div>
					</div>

					 <div class="form-group">
					<label class="control-label" for="title">Type Icon:</label>
					  <select class="form-control" name="typeiconwhy">
					    <option value="truck">truck</option>
					    <option value="cogs">cogs</option>
					    <option value="users">users</option>
					  </select>
					<div class="help-block with-errors"></div>
					</div>

					 <div class="form-group">
					<label class="control-label" for="title">Text Why:</label>
					<input type="text" name="textwhy" class="form-control" placeholder="Enter Text" data-error="Please enter text." required />
					<div class="help-block with-errors"></div>
					</div>

					 <div class="form-group">
					<label class="control-label" for="title">Description Why:</label>
					<textarea rows="5" cols="30" class="form-control" name="deswhy" placeholder="Enter description" data-error="Please enter description." required /></textarea>
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
				    		$('.modal-content input[name=sttrowwhy]').val(data.stt);
				    		$('.modal-content select[name=typeiconwhy]').val(data.typeiconwhy);
				    		$('.modal-content input[name=textwhy]').val(data.textwhy);
				    		$('.modal-content textarea[name=deswhy]').val(data.deswhy);
				    	}
				    },
				    error: function(response){
				    	console.log('Error: ' + response);
				    }
				});
			})
			
		});
	</script>
@endsection