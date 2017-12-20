@extends('layouts.master')
@section('content')
    <div style="padding: 80px;">
            <div class="row">
                <div class="col-md-8">
                    {{-- Here all posts are shown From Database--}}
                    @foreach($posts as $post)
                        <h3>{{ $post->title }}</h3>
                        <img src="{{ asset('upload-images/' . $post->image_url) }}" height="400" width="700" />
                        <br>
                        <p class="p-of-blog">
                            {!! substr($post->content,0,300) !!}{{ strlen($post->content) > 300 ? "..." : "" }}
                        </p>
                        <a href="{{ route('post',['id' => $post->id]) }}" class="btn">Read More...</a>
                        <hr>
                    @endforeach
                </div>
                <div class="col-md-4">
                    <div class="well">
                            <h5>Ameer Hamza</h5>
                            <p class="p-of-blog">This is a paragraph.</p>
                    </div>
                    <hr>
                </div>
            </div>
        </div>
@endsection