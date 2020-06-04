@extends('layouts.app')

@section('content')
    <div class="container">
            <div class="col-md-12">
                <h2>Users</h2>
                <form class="form-inline" style="margin: 10px 0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
                <table class="table table-bordered" style="width: 100%">
                    <tr>
                        <th>name</th>
                        <th>email</th>
                        <th>mobile</th>
                        <th>joined in</th>
                        <th>admin panel</th>
                    </tr>
                    @foreach($users as $user)
                        <tr>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->mobile}}</td>
                            <td>{{$user->formatTimeForHuman()}}</td>
                            <td>
                                <a href="{{route('user',['id' => $user->id])}}"><button type="button" class="btn btn-primary">More</button></a>
                                <a id="delete-btn" data-userid="{{$user->id}}"><button type="button" class="btn btn-danger">Delete</button></a>
                            </td>


                        </tr>
                    @endforeach
                </table>
                {{$users->links()}}

            </div>

    </div>
    <!--model for delete tag-->
    <div class="modal delete-window" tabindex="-1" role="dialog" id="delete-window">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete user</h5>
                </div>
                <form action="{{route('users')}}" method="post" style="position:relative;">
                    @csrf
                    <div class="modal-body">
                        <p> Are you sur you want to delete this user?</p>
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="user_id" value="" id="delete-user-id"> <!--id for using on jquery "$hiddenDeleteInput"-->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-dismiss="modal">CANCEL</button>
                        <button type="submit" class="btn btn-danger">DELETE</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--Session-->
    @if(Session::has('message'))
        <div class="toast" style="position: absolute; z-index: 99999; top: 5%; right: 5%;">
            <div class="toast-header" style="background-color: #2a9055;color: #f8f9fa;">
                <strong class="mr-auto">Review</strong>
                <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close" style="color: #f7f7f7;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="toast-body" style="background-color: #38c172;color: #f8f9fa;">
                {{Session::get('message')}}
            </div>
        </div>
    @endif

@endsection

@section('scripts')
    <!--check if session has message for start javascript code & show toast 'javascript part' -->
    @if(Session::has('message'))
        <script>
            $(document).ready(function($){
                var $toast = $('.toast').toast({
                    delay : 2000
                });
                $toast.toast('show');
            });
        </script>
    @endif
    <script>
        var $deleteButton = $('#delete-btn');
        var $deleteWindow = $('#delete-window');
        var $hiddenInput = $('#delete-user-id');

        $($deleteButton).click(function (element) {
            alert('hello');
            element.preventDefault();
            //$deleteWindow.modal('show');
            //var userId = $(this).data('userid');
            //$hiddenInput.val(userId);
        });

    </script>
@endsection