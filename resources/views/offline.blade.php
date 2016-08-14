@extends('layouts.master')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-12 col-lg-12 col-xs-12 col-sm-12">
			<div class="centered">
				<h3> Section for offline experiments</h3>
			</div>
		 	@foreach($data as $id )
			<?php $img_path = substr($id->url,36,strlen($id->url)) ?>
				<div class="col-md-4">
					<div class="thumbnail">
						<img src="{{asset('/dataset/').'/'. $img_path}}">
						<div class = "caption">
							<form action="{{route('expexec')}}" method="post">
								<select name="descriptor" class="selectpicker">
									<option>Surf</option>
									<option>Sift</option>
								</select>
								<button class = "btn btn-primary" role = "button" type="submit">Go!</button>
								<input type="hidden" value="{{ $id->imgId }}" name="imgId">
								<input type="hidden" value="{{ $id->exp1 }}" name="exp1">
								<input type="hidden" value="{{ $id->exp2 }}" name="exp2">
								<input type="hidden" value="{{ $id->building }}" name="building">
								<input type="hidden" value="{{ Session::token() }}" name="_token">
							</form>
						</div>
					</div>
				</div>
			@endforeach
			<div class="centered">
				{!! $data->links() !!}
			</div>
		</div>
	</div>
</div>
@endsection