@extends('Contents.master.master')
@section('content1')
About
@stop
@section('content2')
<style type="text/css">
	.btn-success{
		margin-right: 100px;
	}
	.table-bordered th{
		text-align: center;
	}
</style>
@stop
@section('content3')
about
@stop
@section('content4')
<li><a href="{{ route('About') }}">About</a></li>
@stop
@section('content5')
About
@stop
@section('content6')
<div class="container">
			<div class="row">
			    <div class="col-lg-12 margin-tb">
			        <div class="pull-left">
			            <h2>Content About</h2>
			        </div>
			        <div class="pull-right">
			<button type="button" class="btn btn-success" data-toggle="modal" data-target="#create-item-about">
			  Add About
			</button>
			        </div>
			    </div>
			</div>
			<form method="post" action="">
			<table class="table table-bordered">
			<thead>
			    <tr>
			    	<th>STT</th>
					<th width="100px">Type icon about</th>
					<th width="200px">Link ablut</th>
					<th>Text1</th>
					<th>Text2</th>
					<th width="400px">Description</th>
					<th width="300px">Action</th>
			    </tr>
			    @php
			    	$Socialdt = file_get_contents(storage_path()."/about/dataabout.json",true);
			    @endphp
			    	@if (json_decode($Socialdt,true)) 
			    		@php
			    		$datasocial = json_decode($Socialdt,true);
			    		@endphp
						@foreach ($datasocial as $key => $value) 
			  
			    <tr>
			    	<td>{{ $value['stt'] }}</td>
			    	<td>{{ $value['typeabout'] }}</td>
			    	<td>{{ $value['linkabout'] }}</td>
			    	<td>{{ $value['text1'] }}</td>
			    	<td>{{ $value['text2'] }}</td>
			    	<td>{{ $value['desabout'] }}</td>
			    	<td>
			    		<button type="button" class="btn btn-primary btn-edit" data-url={{route('about.edit', $value['stt'])}} data-id={{$value['stt']}} data-toggle="modal" data-target="#edit-item-about">Edit
						</button>
			    		<a href="{{route('about.delete')}}?id={{ $value['stt'] }}" class="btn btn-danger a-btn-slide-text" data-id={{$value['stt']}}>
			       <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
			        <span><strong>Delete</strong></span>            
			    		</a>
			    	</td>
			    </tr>

			    @endforeach @endif
			</thead>
			<tbody>
			</tbody>
			</table>
			</form>

			<ul id="pagination" class="pagination-sm"></ul>

			        <!-- Create Item Modal -->
			<div class="modal fade" id="create-item-about" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
			        <h4 class="modal-title" id="myModalLabel">Info About</h4>
			      </div>

			      <div class="modal-body">
			      <form  action="{{ route('dataabout') }}"  method="post">
			      	<input type="hidden" name="_token" value="{!! csrf_token() !!}" />
			      <div class="form-group">
			<label class="control-label" for="title">STT:</label>
			<input type="text" name="sttabout1" class="form-control" placeholder="Enter stt" data-error="Please enter stt." required />
			<div class="help-block with-errors"></div>
			</div>

			 <div class="form-group">
			<label class="control-label" for="title">Type icon about:</label>
			  <select class="form-control" name="typeiconabout1">
			    <option selected>wrench</option>
			    <option value="users">users</option>
			    <option value="paper-plane-o">paper-plane-o</option>
			    <option value="archive">archive</option>
			  </select>
			<div class="help-block with-errors"></div>
			</div>

			 <div class="form-group">
			<label class="control-label" for="title">Link About:</label>
			<input type="text" name="linkabout1" class="form-control" placeholder="Enter Link" data-error="Please enter link." required />
			<div class="help-block with-errors"></div>
			</div>

			<div class="form-group">
			<label class="control-label" for="title">Text1 About:</label>
			<input type="text" name="text1about1" class="form-control" placeholder="Enter Link" data-error="Please enter text." required />
			<div class="help-block with-errors"></div>
			</div>

			<div class="form-group">
			<label class="control-label" for="title">Text2 About:</label>
			<input type="text" name="text2about1" class="form-control" placeholder="Enter Link" data-error="Please enter text." required />
			<div class="help-block with-errors"></div>
			</div>

			<div class="form-group">
			<label class="control-label" for="title">Description About:</label>
			<textarea rows="5" cols="20" name="descriptionabout1" class="form-control" placeholder="Enter Description" data-error="Please enter description." required /></textarea>
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
			
			<div class="modal fade" id="edit-item-about" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="myModalLabel">Edit About</h4>
                  </div>


                  <div class="modal-body">
                  <form  action="{{ route('editabout') }}"  method="post">
                    <input type="hidden" name="_token" value="{!! csrf_token() !!}" />

                  	<div class="form-group">
			<label class="control-label" for="title">STT:</label>
			<input type="text" name="sttabout" class="form-control" placeholder="Enter stt" data-error="Please enter stt." required readonly="readonly" />
			<div class="help-block with-errors"></div>
			</div>

			 <div class="form-group">
			<label class="control-label" for="title">Type icon about:</label>
			  <select class="form-control" name="typeiconabout">
			    <option value="wrench">wrench</option>
			    <option value="users">users</option>
			    <option value="paper-plane-o">paper-plane-o</option>
			    <option value="archive">archive</option>
			  </select>
			<div class="help-block with-errors"></div>
			</div>

			 <div class="form-group">
			<label class="control-label" for="title">Link About:</label>
			<input type="text" name="linkabout" class="form-control" placeholder="Enter Link" data-error="Please enter link." required />
			<div class="help-block with-errors"></div>
			</div>

			<div class="form-group">
			<label class="control-label" for="title">Text1 About:</label>
			<input type="text" name="text1about" class="form-control" placeholder="Enter Link" data-error="Please enter text." required />
			<div class="help-block with-errors"></div>
			</div>

			<div class="form-group">
			<label class="control-label" for="title">Text2 About:</label>
			<input type="text" name="text2about" class="form-control" placeholder="Enter Link" data-error="Please enter text." required />
			<div class="help-block with-errors"></div>
			</div>

			<div class="form-group">
			<label class="control-label" for="title">Description About:</label>
			<textarea rows="5" cols="20" name="descriptionabout" class="form-control" placeholder="Enter Description" data-error="Please enter description." required /></textarea>
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
@stop
@section('content7')
Tự nhiên
@stop
@section('content8')

@stop

@section('script')
	<script type="text/javascript">
		$(document).ready(function(){
			
			$(document).on('click', '.btn-edit', function(e){
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
				    		$('.modal-content input[name=sttabout]').val(data.stt);
				    		$('.modal-content select[name=typeiconabout]').val(data.typeabout);
				    		$('.modal-content input[name=linkabout]').val(data.linkabout);
				    		$('.modal-content input[name=text1about]').val(data.text1);
				    		$('.modal-content input[name=text2about]').val(data.text2);
				    		$('.modal-content textarea[name=descriptionabout]').val(data.desabout);				    	}
				    },
				    error: function(response){
				    	console.log('Error: ' + response);
				    }
				});
			})
			
		});
	</script>
@endsection