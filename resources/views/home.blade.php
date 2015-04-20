@extends('app')

@section('content')
    <div class="col-md-3">
        @if (!Auth::check())
            @include('auth.login')
        @else
        <div class="panel panel-default">
            <div class="panel-heading">Welcome {{Auth::user()->name}}</div>
            <div class="panel-body">
                <a class="btn btn-default" href="{{action('UserController@course')}}">Account</a>
                <a class="btn btn-default" href="/auth/logout">Logout</a>

            </div>
        </div>
        @endif
    </div>
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">Content</div>
            <div class="panel-body">

            </div>
        </div>
    </div>
    <div class="col-md-3">
        90 day Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum
    </div>

@endsection
