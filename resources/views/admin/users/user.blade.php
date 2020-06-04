@extends('layouts.app')

@section('content')
    <div class="container">
            <div class="col-md-12">
                <h2>{{$user->name}}</h2>
                <form action="" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="user-name">Name</label>
                                <input type="text" id="user-name" name="user-name" class="form-control" value="{{$user->name}}">
                            </div>
                            <div class="form-group">
                                <label for="user-email">Email</label>
                                <input type="text" id="user-email" name="user-email" class="form-control" value="{{$user->email}}">
                            </div>
                            <div class="form-group">
                                <label for="user-email-verified">Email verified</label>
                                <input type="text" id="user-email-verified" name="user-email-verified" class="form-control" value="{{$user->email_verified}}">
                            </div>
                            <div class="form-group ">
                                <label for="user-mobile">Mobile</label>
                                <input type="text" id="user-mobile" name="user-mobile" class="form-control" value="{{$user->mobile}}">
                            </div>
                            <div class="form-group ">
                                <label for="user-roles">Roles</label>
                                <select id="user-roles" class="form-control">
                                    @if(count($user->roles) > 0)
                                    @foreach($user->roles as $role)
                                        <option>{{$role->role}}</option>
                                    @endforeach
                                    @else
                                        <option>user</option>
                                    @endif
                                </select>
                            </div>
                            <div class="form-group ">
                                <label for="user-mobile-verified">Mobile verified</label>
                                <input type="text" id="user-mobile-verified" name="user-mobile-verified" class="form-control" value="{{$user->mobile_verified}}">
                            </div>
                            <div class="form-group ">
                                <label for="user-token">API token</label>
                                <input type="text" id="user-token" name="user-token" class="form-control" value="{{$user->api_token}}">
                            </div>
                            <div class="form-group ">
                                <label for="user-join">joined in</label>
                                <input type="text" id="user-join" name="user-join" class="form-control" value="{{$user->formatTimeForHuman()}}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <img src="{{$user->avatar}}" alt="user picture" width="350"  style="padding: 100px 0;">
                        </div>
                    </div>
                </form>
                <button id="delete-btn" class="form-control btn btn-danger" style="margin-top: 50px">Delete</button>
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
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">CANCEL</button>
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
            element.preventDefault();
            $deleteWindow.modal('show');
            var userId = $(this).data('userid');
            $hiddenInput.val(userId);
        });

    </script>
@endsection