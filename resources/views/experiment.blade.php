@extends('layouts.master')

@section('content')


	<div class="container">
		<div class="row">
			<div class="centered">
				<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
					Class Results
				</button>
				<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample1" aria-expanded="false" aria-controls="collapseExample">
					Total Results
				</button>
			</div>

			<div class="col-12 col-lg-12 col-xs-12 col-sm-12">
				<div class="collapse" id="collapseExample">
					<div class="card card-block">
						@foreach( $classRank["ClassRank"]["__ndarray__"] as $cBuild )
							@if (str_limit($cBuild[0][1],11, $end = '') !=  $imageId)
								<div class="col-md-4">
									<div class="thumbnail">
										<a class="example-image-link" href="{{ asset( $exp_path . '/' . $exp . '/' . $imageId . '/' . $log_path . '/' . str_limit($cBuild[0][1],11, $end = $match) )}}" data-lightbox="roadtrip">
											<img  class="example-image" src="{{ asset( $exp_path . '/' . $exp . '/' . $imageId . '/' . $log_path . '/' . str_limit($cBuild[0][1],11, $end = $match) )}}">
										</a>
										<p> ImageId: {{ str_limit($cBuild[0][1],11, $end = '') }} </p>
									</div>
								</div>
							@endif
						@endforeach	
					</div>
				</div>

				<div class="collapse" id="collapseExample1">
					<div class="card card-block">
						@foreach( $results["Results"]["__ndarray__"] as $totalBuild)
							@if (str_limit($totalBuild[0][1],11, $end = '') !=  $imageId)
							@if ( $totalBuild[0][2] >= 8)
							<div class="col-md-4">
								<div class="thumbnail">
														
										<a class="example-image-link" href="{{ asset( $exp_path . '/' . $exp . '/' . $imageId . '/' . $log_path . '/' . str_limit($totalBuild[0][1],11, $end = $match) )}}" data-lightbox="roadtrip">
											<img  class="example-image" src="{{ asset( $exp_path . '/' . $exp . '/' . $imageId . '/' . $log_path . '/' . str_limit($totalBuild[0][1],11, $end = $match) )}}">
										</a>
									
										<span> Query Building: {{ $building }}  => </span>								
										<br>
										<span> Train Building: {{ $totalBuild[0][4] }} </span>
										@if ( $building ==  $totalBuild[0][4] )
											<i class="fa fa-check-circle fa-2x"></i>
										@else
											<i class="fa fa-times fa-2x"></i>
										@endif
										<br>
										<span>Score: {{{ number_format((float) $totalBuild[0][3],2) }}}  </span>
									</div>
							</div>
							@endif
							@endif
						@endforeach 
					</div>
				</div>
			</div>
		</div>
	</div>



@endsection