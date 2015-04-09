@extends('app')

@section('content')
<div class="container">

	@if(Session::has('warning'))
		<div class="alert-box success">						
			<div class="alert alert-warning">
				<strong>Oops:</strong> 
				{{ Session::get('warning') }}
			</div>
		</div>
	@endif
	
	@if(Session::has('success'))
		<div class="alert-box success">						
			<div class="alert alert-success">
				<strong>Success:</strong> 
				{{ Session::get('success') }}
			</div>
		</div>
	@endif
	
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
		
			<!-- Breadbcrumbs -->
			{!! Breadcrumbs::render() !!}
			
			<div class="page-header">
                <h1><small>Course List</small></h1>
            </div>
			<div class="btn-group pad-bottom" role="group" aria-label="...">				
				{!! link_to_action('HomeController@index', 'Home', array(), array('class'=>'btn btn-default'))!!}				
				{!! link_to_action('CourseController@create', 'New Course', array(), array('class'=>'btn btn-default'))!!}				
			</div>
		</div>
	</div>

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-yellow">
                <div class="panel-heading">User List</div>

                <div class="panel-body">

                    <table class="table">
                        <thead>
                            <tr>
                                <th>Course Name</th>
                                <th>Instructor</th>
                                <th>Class Start</th>
                                <th>Access Date</th>
                                <th>Registration Date</th>
                                <th colspan="3">Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($courses as $course)
                                <tr>
                                    <td>{{ $course->name }}</td>
                                    <td>{{ $course->instructor_name }}</td>
                                    <td>{{ $course->class_start }}</td>
                                    <td>{{ $course->access_start }}</td>
                                    <td>{{ $course->register_start }}</td>
                                    <td><a href="{{action('CourseController@edit', array('id'=>$course->id))}}" > Edit </a></td>
                                    <td><a href="{{action('CourseController@page', array('id'=>$course->id))}}" > View </a></td>
                                    <td><a href="{{action('LessonController@create', array('id'=>$course->id))}}" > New Lesson </a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
        </div>
    </div>
</div>
@endsection