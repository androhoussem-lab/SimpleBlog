@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-md-12">
            <div class="col-md-12 mb-5">
            <img src="{{ ( (! is_null($posts[0]->images)) && (count($posts[0]->images) > 0))? $posts[0]->images[0]->url : ''   }}"
                 class="" style="
                         background-repeat:no-repeat;
                          background-size:cover;"

                 alt="post 01 background">
            <h1 style="text-align: center">{{$posts[0]->title}}</h1>
            <h3 style="text-align: center">{{$posts[0]->blogger->name}}</h3>
            </div>
        <div class="row justify-content-center">
            @foreach($posts as $post)
                <div class="card  m-1" style="width: 18rem;">
                <img src="{{ ( (! is_null($post->images)) && (count($post->images) > 0))? $post->images[0]->url : ''   }}" class="card-img-top" alt="post picture">
                    <div class="card-body">
                        <h4 class="card-title">{{$post->title}}</h4>
                        <h5 class="card-title">{{$post->blogger->name}}</h5>
                        <p class="card-text">{{$post->contentResume()}}...</p>
                        <a href="#" class="btn btn-primary">more...</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    {{$posts->links()}}
</div>
@endsection
