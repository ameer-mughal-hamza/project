@extends('layouts.master')

@section('content')
    <div class="container" style="padding-top: 80px;">
    	<div class="row">
            <div class="col-md-12">
                <img src="{{ asset('upload-images/'. $post->image_url) }}" height="400" width="800">
            </div>
        </div>
    	<div class="row">
            <div class="col-md-8">
                <h4>{{ $post->title }}</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8" style="font-size: 17px; font-family: sans-serif;">
                <p>{!! $post->content !!}</p>
            </div>
        </div>
    </div>
@endsections