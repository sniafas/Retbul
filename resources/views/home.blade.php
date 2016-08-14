@extends('layouts.master')

@section('content')

	<div class="container">

		<div class="jumbotron">
            <div class="centered">
    			<h1>Building Retrieval Platform</h1>
    			<p>An online image retrieval platform with buildings of Athens</p>
    			<p><a href="{{ route('offline')}}" class="btn btn-primary btn-lg">Try now!</a></p>
            </div>
		</div>
        <div class="row">
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-building fa-5x" aria-hidden="true"></i>
                        <br>
                        <h3> 60 Available Buildings </h3>
                    </div>

                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-home fa-5x"></i>
                        <h3> 900 Online Queries </h3>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-braille fa-5x"></i>
                        <h3> 2 Image Descriptors </h3>
                    </div>
                </div>
            </div>
        </div>
@endsection