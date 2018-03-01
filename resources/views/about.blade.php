@extends('layouts.master')

@section('content')
<div class="centered">
	<div class="container">
		<div class="row">
			<div class="col-12 col-lg-12 col-xs-12 col-sm-12">
				<h3> About </h3>
	 			<hr class="featurette-divider">
	 			<div class="row featurette">
					<div class="col-md-7">
						<h2 class="featurette-heading"><span class="text-muted">Purpose</span></h2>
						<p class="lead">RetBul is an online image retrieval platform applied on flat buildings in region of Athens,GR.
						The current project is part of the MSc thesis in the postgraduate ISICG program in TEI of Athens and 
						University of Limoges.
						</p>
					</div>
					<div class="col-md-5">
						<img class="featurette-image img-responsive center-block" src="{{ asset('img/teiathinas.jpg') }}"  width="300" height="300">
					</div>
				</div>

				<hr class="featurette-divider">

	 			<div class="row featurette">
					<div class="col-md-4">
						<img class="featurette-image img-responsive center-block" src="{{ asset('img/flask.png') }}"  width="250" height="250">
					</div>
					<div class="col-md-8">
						<h2 class="featurette-heading"><span class="text-muted">Method</span></h2>
						<p class="lead">
							A query represents an image of the given dataset, chosen from <span>RetBul</span> database.	
						</p>
						<p class="lead">
							<i>Modes</i>
						</p>						
						<div class="col-md-6">
							<p class="lead">
							<span>Offline</span>
							</p>
							Query a single image, and a series of ranked images will be retrieved 
							through an already automated session of experiments.
						</div>
						<div class="col-md-6">
							<p class="lead">
								<span>Online</span>
							</p>
							<ul>
								<li>Query a pair of images, processed in realtime, by the selected descriptor,
							giving a montaged image of the best matching tentative points.</li>
								<li>Upload or query a user defined image, processed through the best <span>60</span>
									representative building images of <span>RetBul</span> database.</li>
							</ul>
						</div>
						<p class="lead">
							<i>Image Features</i>
						</p>
						<div class="col-md-6">
							<p class="lead">
							<span>SIFT</span>
							</p>
							Scale-Invariant Feature Transform (SIFT) features proposed by David Lowe is one of the most widely
							used feature descriptors, for tasks such as pattern recognition, image registration, semantic image analysis, etc,
							as they have been proven to achieve high repeatability and distinctiveness.						
						</div>
						<div class="col-md-6">
							<p class="lead">
							<span>SURF</span>
							</p>
							Speeded-Up Robust Features (SURF) features have been partially inspired by the SIFT and during the last
							decade have been successfully adopted in many computer vision related problems, used
							both to extract set of keypoints and visual content. They may achieve comparable performance yet requiring less computational time.							
						</div>																							
					</div>
				</div>

				<hr class="featurette-divider">

	 			<div class="row featurette">
					<div class="col-md-7">
					<h2 class="featurette-heading"><span class="text-muted">Features</span></h2>
					<p class="lead">
					Implementation utilizes Python (OpenCV), in the core retrieval engine, and
					PHP (Laravel MVC) concerning the GUI.
					</p>
					</div>
					<div class="col-md-5" style="margin-top:74px;">
						<div class="progress">
  							<div class="progress-bar progress-bar-success" style="width: 30%">Python</div>
  							<div class="progress-bar progress-bar-warning" style="width: 70%">Laravel</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
</div>
@endsection