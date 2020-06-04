@extends('layouts.app')

@section('content')
    <div class="container">
            <div class="col-md-12">
                <h2>{{$post->title}}</h2>
                <form action="" method="post">
                    @csrf
                    <img alt="post first image" style="margin: 40px 0;width: 100%"
                         src="{{(! is_null($post->images) && count($post->images)>0)?$post->images[0]->url:''}}">
                    <div class="form-group">
                        <label for="post-title">title</label>
                        <input type="text" id="post-title" name="post-title" class="form-control" value="{{$post->title}}">
                    </div>
                    <div class="form-group">
                        <label for="post-blogger">Created by</label>
                        <input type="text" id="post-blogger" name="post-blogger" class="form-control" value="{{$post->blogger->name}}">
                    </div>
                    <div class="form-group">
                        <label for="post-content">Content</label>
                        <textarea type="text" id="post-content" name="post-content" class="form-control">{{$post->content}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="post-media">Source from</label>
                        <input type="text" id="post-media" name="post-media" class="form-control"
                               value="{{((! is_null($post->medias)) && count($post->medias)>0 )?$post->medias[0]->title:'No media found'}}">
                    </div>
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item"
                                src="{{((! is_null($post->medias)) && count($post->medias)>0)?$post->medias[0]->url:''}}" allowfullscreen></iframe>
                    </div>
                    <button class="form-control btn btn-danger" style="margin-top: 50px">Delete</button>
                </form>
            </div>
    </div>


@endsection