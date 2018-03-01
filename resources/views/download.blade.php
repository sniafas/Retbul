@extends('layouts.master')

@section('content')

	<div class="container">

        <div class="row">
            <div class="col-md-4">
                <h3> Vyronas database </h3>

                <p>Vyronas database comprises of 900 photos taken from 60 buildings in the area of Vyronas, Athens,
                    Greece.The databaseconsists of urban buildings with a variety of architectural specifications, number of floors,
                    construction age, colors, etc. For each building we have took a series of 15 photos, under
                    5 viewpoints and 3 illumination conditions.</p>
                <ul>
                    <span> Last Updated: 23/4/2017</span>
                    <li><span> 480x640</span> <a href="downloads/Vyronasdbmin.tar.gz">Download</a></li>
                    <li><span> Native</span> <a href="downloads/Vyronasdbnative.tar.gz">Download</a></li>
                    <li><a href="https://www.flickr.com/photos/139433384@N07/">Flickr</a></li>
                </ul>
            </div>                       
            <div class="col-md-4">
                <h3> Source code samples </h3>
                <a href="downloads/source.tar.gz">Download</a>
            </div>
            <div class="col-md-4">
                <h3>Dissertation</h3>
                <a href="downloads/dissertation.pdf">PDF</a> <br>
                <a href="downloads/dis-source.tar.gz">Source(in LaTeX)</a>
            </div>
        </div>
    </div>
@endsection