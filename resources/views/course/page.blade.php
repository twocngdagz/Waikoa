@extends('app')

@section('content')
    <div class="col-md-3">
        <div class="panel panel-default">
            <div class="panel-heading">Welcome {{Auth::user()->name}}</div>
            <div class="panel-body">
                <ul class="nav nav-pills nav-stacked" id="user-menu">
                    <li role="presentation" class="active"><a href="{{action('UserController@course')}}">Course Home</a></li>
                    <li role="presentation"><a href="#">Fellow Coaches</a></li>
                    <li role="presentation"><a href="#">My Goals</a></li>
                    <li role="presentation"><a href="/user/profile">My Profile</a></li>
                    <li role="presentation"><a href="/auth/logout">Logout</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-md-9">
        @foreach($course->lessons as $lesson)
            <div class="row">
                <div class="col-md-12">
                    <a href="{{action('LessonController@page', array('id'=>$course->id, 'les'=>$lesson->id))}}" class="click-box">
                        <div class="panel panel-default">
                            <div class="panel-heading"> {{ $lesson->title }} </div>
                            <div class="panel-body">
                                {{ $lesson->description }}
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        @endForeach
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function(){
			$(".click-box").click(function() {
				window.location = $(this).find("a").attr("href"); 
				return true;
			});
        });
    </script>
@endsection