@extends('layouts.master')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-12 col-lg-12 col-xs-12 col-sm-12">

			<!-- alert sections -->
	       	@if($errors->any())
	        <div class="alert alert-danger">
	            <i class="glyphicon"></i> &nbsp; {{$errors->first()}}
	            <a class="close" data-dismiss="alert" href="#">×</a> 
	        </div>
			@endif

			@if ( session()->has('message') )
			    <div class="alert alert-success alert-dismissable">{{ session()->get('message') }}</div>
				<a class="close" data-dismiss="alert" href="#">×</a>
			@endif

			<!-- Online experiment -->
			<div class="centered">
				<div class="panel-heading">
					<a id="refresh1" class="pull-right" href="{{ route('online')}}">
						<span class="fa fa-refresh"></span>
					</a> <h3> Section for online experiments</h3>
				</div>
			</div>

			<!-- Database section -->
			<div class="panel panel-default">
				<div class="panel-heading">
					<h2> Select a pair from database </h2>
            		<div style="overflow-y: scroll; height:500px;">
						<form action="{{route('onlexp')}}" method="post">
			 			@foreach($data as $id )
						<?php $img_path = substr($id->url,36,strlen($id->url)) ?>
							<div class="col-md-4">
								<div class="thumbnail" >
									<img src="{{ asset('/dataset/').'/'. $img_path}} " >
									<div class = "caption">
										{!! Form::checkbox('checkbox[]', $img_path) !!}
									</div>
								</div>
							</div>
						@endforeach
					</div>
           		</div>
           		
				<!-- database panel body -->
				<div class="panel-body">
					<span> Image Descriptor: </span>
					<select name="descriptor" class="selectpicker">
						<option>SURF</option>
						<option>SIFT</option>
						<option>ORB</option>
					</select>

					<button class="btn btn-primary">Go!</button>
					<input type="hidden" value=" {!! csrf_token() !!}" name="_token">
					</form>					
				</div>
			</div>
				

			<!-- Users' uploads -->
			<div class="panel panel-default">
				<div class="panel-heading">
				<h2> Select from uploaded </h2>

					<div style="overflow-y: scroll; height:500px;">
						{!! Form::open(['url'=>'/online/totalExp', 'method'=>'POST', 'files'=>'true']) !!}
						@foreach($uploaded_data as $im )
						<div class="col-md-4">
							<div class="thumbnail" >						
								<img src="{{ asset('/uploads/').'/'. $im->file}} " >
								<div class = "caption">
								{!! Form::checkbox('checkbox[]', $im->id) !!}
								</div>
							</div>
						</div>
						@endforeach
						
					</div>					
				</div>
				
					
				<!-- database panel body -->
				<div class="panel-body">

					<span> Image Descriptor: </span>
					<select name="descriptor" class="selectpicker">
						<option>SURF</option>
						<option>SIFT</option>
						<option>ORB</option>
					</select>

					<button class="btn btn-primary">Go!</button>
					<input type="hidden" value=" {!! csrf_token() !!}" name="_token">
					{!! Form::close() !!}

					<h3>Upload (portrait up to 2Mb)</h3> 
					<div class="col-md-4">

					{!! Form::open(['url'=>'/online/upload', 'method'=>'POST', 'files'=>'true']) !!}
						<div class="form-group">
							<label for="image">Image File</label>
							<input type="file" class="form-control" name="image">
						</div>
						<button type="submit" class="btn btn-primary">Upload</button>
					{!! Form::close() !!}
					</div>
				</div>
				


			</div> <!-- users' upload -->
			
		</div> <!-- divs -->
	</div> <!-- row -->
</div> <!-- container -->


@endsection