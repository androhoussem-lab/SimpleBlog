@extends('layouts.app')

@section('content')
    <div class="container">
            <div class="col-md-12">
                <h2>Reviews</h2>
                <form class="form-inline" style="margin: 10px 0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
                <table class="table table-bordered" style="width: 100%">
                    <tr>
                        <th>user</th>
                        <th>post</th>
                        <th>rating</th>
                        <th>written in</th>
                        <th>review</th>
                    </tr>
                    @foreach($reviews as $review)
                        <tr>
                            <td>{{$review->user->name}}</td>
                            <td>{{$review->post->titleResume()}}...</td>
                            <td>
                                @php
                                $totalStars = 5;
                                $currentStars = $review->stars;
                                $diffrence = $totalStars - $currentStars;
                                @endphp
                                @for($i = 1;$i<=$diffrence;$i++)
                                    <i class="fas fa-star"></i>
                                @endfor
                                @for ($j = 1;$j<=$currentStars;$j++)
                                    <i class="far fa-star"></i>
                                @endfor
                            </td>
                            <td>{{$review->formatTimeForHumen()}}</td>
                            <td>{{$review->reviewResume()}}...</td>
                            <td>
                                <a href="{{route('review',['id'=>$review->id])}}"><button type="button" class="btn btn-primary">More</button></a>
                                <a href="#"><button type="button" class="btn btn-warning">Edit</button></a>
                                <a href="#"><button type="button" class="btn btn-danger">Delete</button></a>
                            </td>
                        </tr>
                    @endforeach
                </table>
                {{$reviews->links()}}
            </div>
    </div>

@endsection