@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-12">
            <h2>{{$review->user->name}} Review</h2>
            <form action="" method="post">
                @csrf
                <div class="form-group">
                    <label for="post-user">Created by</label>
                    <input class="form-control" type="text" id="post-user" value="{{$review->user->name}}">
                </div>
                <div class="form-group">
                    <label for="post-title">post</label>
                    <input class="form-control" type="text" id="post-title" value="{{$review->post->title}}">
                </div>
                <div class="form-group">
                    <label for="rating">post</label>
                    <input class="form-control" type="text" id="rating" value="{{$review->stars}}">
                </div>
                <div class="form-group">
                    <label for="date">written in </label>
                    <input class="form-control" type="text" id="date" value="{{$review->formatTimeForHumen()}}">
                </div>
                <div class="form-group">
                    <label for="review">review</label>
                    <textarea id="review" class="form-control">{{$review->review}}</textarea>
                </div>
                <button class="form-control btn btn-danger" style="margin-top: 50px">Delete</button>

            </form>
        </div>
    </div>
@endsection