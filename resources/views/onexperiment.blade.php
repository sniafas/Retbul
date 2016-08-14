@extends('layouts.master')

@section('content')




<div class="centered">
	<div class="container">
		<div class="col-12 col-lg-12 col-xs-9 col-sm-10">
			<div class="card card-block">
				<div class="col-md-6">
					<div class="thumbnail">
						<img src="{{ asset($output[0]) . '/' . $des . '_keypoints1.jpg' }}">
						<span>Query Image</span>
					</div>
				</div>
				<div class="col-md-6">
					<div class="thumbnail">
						<img src="{{ asset($output[0]) . '/' . $des . '_keypoints2.jpg' }}">
						<span>Train Image</span>
					</div>
				</div>
				<div class="col-md-12">
					<div class="thumbnail">
						<img src="{{ asset($output[0]) . '/' . $des . '_match.jpg' }}">
						<span>Output Image</span>
					</div>				
				</div>
			</div>
		</div>		
	</div>
</div>


@endsection