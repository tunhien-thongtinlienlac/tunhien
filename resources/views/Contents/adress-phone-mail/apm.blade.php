@extends('Contents.master.master')
@section('content1')
Address-phone-email
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
Address-phone-email
@stop
@section('content4')
<li><a href="{{ route('apm') }}">address-phone-email</a></li>
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
        	$ContentFile = file_get_contents(storage_path()."/apm/dataapm.json",true);
        	if(!json_decode($ContentFile,true)){
        ?>
        <div class="pull-right">
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#create-item">
  Create Item
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
		<th>Address</th>
		<th>Phone</th>
		<th>Email</th>
		<th width="300px">Action</th>
    </tr>
    <?php
    	$ContentFile = file_get_contents(storage_path()."/apm/dataapm.json",true);
    	if (json_decode($ContentFile,true)) {
    		$datas = json_decode($ContentFile,true);
			foreach ($datas as $key => $value) {
    ?>
    <tr>
    	<td><?php echo $value['address'];?></td>
    	<td><?php echo $value['phone'];?></td>
    	<td><?php echo $value['email'];?></td>
    	<td>
    		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit-item" >Edit
			</button>
    		<a href="{{route('dtlitemapm')}}" class="btn btn-danger a-btn-slide-text">
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
        <h4 class="modal-title" id="myModalLabel">Info</h4>
      </div>

      <div class="modal-body"><!-- action="api/create.php" -->
      <form  action="{{ route('dataapm') }}"  method="post">
      	<input type="hidden" name="_token" value="{!! csrf_token() !!}" />
      <div class="form-group">
<label class="control-label" for="title">Address:</label>
<input type="text" name="address" class="form-control" placeholder="My Address" data-error="Please enter title." required />
<div class="help-block with-errors"></div>
</div>

 <div class="form-group">
<label class="control-label" for="title">Phone:</label>
<input type="text" name="Phone" class="form-control" placeholder="My Phone" data-error="Please enter Phone." required />
<div class="help-block with-errors"></div>
</div>

 <div class="form-group">
<label class="control-label" for="title">Email:</label>
<input type="Email" name="email" class="form-control" placeholder="My Email" data-error="Please enter Email." required />
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
        <h4 class="modal-title" id="myModalLabel">Edit</h4>
      </div>

      <?php
    	$ContentFile = file_get_contents(storage_path()."/apm/dataapm.json",true);
    	if (json_decode($ContentFile,true)) {
    		$datas = json_decode($ContentFile,true);
			foreach ($datas as $key => $value) {
    ?>

      <div class="modal-body">
      <form  action="{{ route('edititem') }}"  method="post">
      	<input type="hidden" name="_token" value="{!! csrf_token() !!}" />
      <div class="form-group">
<label class="control-label" for="title">Address:</label>
<input type="text" name="address" class="form-control" placeholder="My Address" data-error="Please enter title." required value="<?php echo $value['address'];?>" />
<div class="help-block with-errors"></div>
</div>

 <div class="form-group">
<label class="control-label" for="title">Phone:</label>
<input type="text" name="Phone" class="form-control" placeholder="My Phone" data-error="Please enter Phone." required value="<?php echo $value['phone'];?>" />
<div class="help-block with-errors"></div>
</div>

 <div class="form-group">
<label class="control-label" for="title">Email:</label>
<input type="Email" name="email" class="form-control" placeholder="My Email" data-error="Please enter Email." required value="<?php echo $value['email'];?>" />
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