@extends('Contents.master.master')
@section('content1')
Google map
@stop
@section('content2')
<style type="text/css">
	.btn-success{
		margin-right: 100px;
	}
</style>
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twbs-pagination/1.3.1/jquery.twbsPagination.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.5/validator.min.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
<!-- <script src="/js/item-ajax.js"></script> -->
@stop
@section('content3')
Google map
@stop
@section('content4')
<li><a href="{{ route('googlemap') }}">google-map</a></li>
@stop
@section('content5')

@stop
@section('content6')
<div class="container">
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Content</h2>
        </div>
        <?php
        	$ContentFile = file_get_contents(storage_path()."/googlemap/datagooglemap.json",true);
        	if(!json_decode($ContentFile,true)){
        ?>
        <div class="pull-right">
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#create-item">
  Create google map
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
		<th>Latitude</th>
		<th>Longitude</th>
		<th width="300px">Action</th>
    </tr>
    <?php
    	$ContentFile = file_get_contents(storage_path()."/googlemap/datagooglemap.json",true);
    	if (json_decode($ContentFile,true)) {
    		$datas = json_decode($ContentFile,true);
			foreach ($datas as $key => $value) {
    ?>
    <tr>
    	<td><?php echo $value['lat'];?></td>
    	<td><?php echo $value['long'];?></td>
    	<td>
    		<!-- <a href="#" class="btn btn-primary a-btn-slide-text">
        <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
        <span><strong>Edit</strong></span>            
    		</a> -->
    		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit-item-googlemap" >Edit
			</button>
    		<a href="{{route('dtlgooglemap')}}" class="btn btn-danger a-btn-slide-text">
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
        <h4 class="modal-title" id="myModalLabel">Create google map</h4>
      </div>

      <div class="modal-body">
      <form  action="{{ route('datagooglemap') }}"  method="post">
      	<input type="hidden" name="_token" value="{!! csrf_token() !!}" />
      <div class="form-group">
<label class="control-label" for="title">Latitude:</label>
<input type="text" name="latggm" class="form-control" placeholder="Enter lat" data-error="Please enter lat." required />
<div class="help-block with-errors"></div>
</div>

 <div class="form-group">
<label class="control-label" for="title">Longitude:</label>
<input type="text" name="longggm" class="form-control" placeholder="Enter long" data-error="Please enter long." required />
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

<div class="modal fade" id="edit-item-googlemap" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        <h4 class="modal-title" id="myModalLabel">Edit</h4>
      </div>

      <?php
    	$ContentFile = file_get_contents(storage_path()."/googlemap/datagooglemap.json",true);
    	if (json_decode($ContentFile,true)) {
    		$datas = json_decode($ContentFile,true);
			foreach ($datas as $key => $value) {
    ?>

      <div class="modal-body">
      <form  action="{{ route('editgooglemap') }}"  method="post">
      	<input type="hidden" name="_token" value="{!! csrf_token() !!}" />
      <div class="form-group">
<label class="control-label" for="title">Latitude:</label>
<input type="text" name="latggm" class="form-control" placeholder="Enter lat" data-error="Please enter lat." required value="<?php echo $value['lat'];?>" />
<div class="help-block with-errors"></div>
</div>

 <div class="form-group">
<label class="control-label" for="title">Longitude:</label>
<input type="text" name="longggm" class="form-control" placeholder="Enter long" data-error="Please enter long." required value="<?php echo $value['long'];?>" />
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
Tự Nhiên
@stop