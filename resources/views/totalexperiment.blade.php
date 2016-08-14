@extends('layouts.master')

@section('content')


	<div class="container">
		<div class="row">
			<div class="col-12 col-lg-12 col-xs-12 col-sm-12">

<table class="table table-striped table-hover ">
  <thead>
    <tr>
      <th>#</th>
      <th>Retrieved Image</th>
      <th>Building</th>
      <th>Inliers</th>      
    </tr>
  </thead>
  <tbody>
  	<?php $i=0; ?>
	@foreach( $results["Results"]["__ndarray__"] as $totalBuild)
	@if ( $totalBuild[0][2] >= 9)	
    <tr class="success">
      <td>{{ $i+=1 }}</td>
      <td>{{$totalBuild[0][1]}}</td>
      <td>{{$totalBuild[0][4]}}</td>
      <td>{{$totalBuild[0][2]}}</td>
    </tr>
	@endif
	@if ( $totalBuild[0][2] > 7 AND $totalBuild[0][2] < 9)	
    <tr class="warning">
      <td>{{ $i+=1 }}</td>
      <td>{{$totalBuild[0][1]}}</td>
      <td>{{$totalBuild[0][4]}}</td>
      <td>{{$totalBuild[0][2]}}</td>
    </tr>
	@endif
	@if ( $totalBuild[0][2] == 7)	
    <tr class="danger">
      <td>{{ $i+=1 }}</td>
      <td>{{$totalBuild[0][1]}}</td>
      <td>{{$totalBuild[0][4]}}</td>
      <td>{{$totalBuild[0][2]}}</td>
    </tr>
	@endif
	@endforeach	
  </tbody>
</table> 				


				<div class="card card-block">
					@foreach( $results["Results"]["__ndarray__"] as $totalBuild)
					@if ( $totalBuild[0][2] >= 7)						
						<div class="col-md-4">
							<div class="thumbnail">													
								<a class="example-image-link" href="{{ asset( $exp_path . $totalBuild[0][1] . $match) }}" data-lightbox="roadtrip">
									<img  class="example-image" src="{{ asset( $exp_path . $totalBuild[0][1] . $match ) }}">
								</a>
								<span>Score: {{{ number_format((float) $totalBuild[0][3],2) }}}  </span>						
							</div>
						</div>
					@endif
					@endforeach	
				</div>
			</div>
		</div>
	</div>
@endsection