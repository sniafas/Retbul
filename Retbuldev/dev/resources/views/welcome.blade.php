
@extends('layouts.header')
<div class="flex-center position-ref full-height">


    <div class="content">
        <div class="title m-b-md">
            Laravel Dev Branch
        </div>
        <div class="container" id='app'>
            <image-list></image-list>
        </div>
        @foreach($data as $image)
            <img src="{{asset('/Vyronasdbmin/').'/'. $image->name}}">
        @endforeach     
    </div>
</div>
<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>