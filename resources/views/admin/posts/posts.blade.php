@extends('layouts.app')

@section('content')
    <div class="container">
            <div class="col-md-12">
                    <h2 style="text-align: center">Posts</h2>
                    <form class="form-inline" style="text-align: left;margin: 10px 0">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form>


                <table style="width: 100%" class="table table-bordered">
                    <tr>
                        <th>title</th>
                        <th>content</th>
                        <th>blogger</th>
                        <th>written in</th>
                        <th>admin panel</th>
                    </tr>
                    @foreach($posts as $post)
                        <tr>
                            <td>{{$post->titleResume()}}...</td>
                            <td>{{$post->contentResume()}}...</td>
                            <td>{{$post->blogger->name}}</td>
                            <td>{{$post->formatTimeForHuman()}}</td>
                            <td>
                                <a href="{{route('post',$post->id)}}"><button type="button" class="btn btn-primary">More</button></a>
                                <a href="#"><button type="button" class="btn btn-warning">Edit</button></a>
                                <a href="#"><button type="button" class="btn btn-danger">Delete</button></a>
                            </td>
                        </tr>
                    @endforeach
                </table>
                {{$posts->links()}}
            </div>
        </div>
@endsection