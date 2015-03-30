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
			<div class="page-header">
                <h1><small>Lesson List</small></h1>
            </div>
			<div class="btn-group pad-bottom" role="group" aria-label="...">				
				{!! link_to_action('HomeController@index', 'Home', array(), array('class'=>'btn btn-default'))!!}				
				{!! link_to_action('LessonController@create', 'New Lesson', array(), array('class'=>'btn btn-default'))!!}
			</div>
		</div>
	</div>

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-yellow">
                <div class="panel-heading">Lesson List</div>

                <div class="panel-body">

                    <table class="table">
                        <thead>
                            <tr>                                
                                <th>Title</th>
                                <th>Type</th>
                                <th>Lesson Date</th>
                                <th>Start Time</th>                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($lessons as $lesson)
                                <tr>                                    
                                    <td>{{ $lesson->title }}</td>
                                    <td>{{ $lesson->type }}</td>
                                    <td>{{ $lesson->date }}</td>
                                    <td>{{ $lesson->start_time }}</td>
                                    <td><a href="{{action('LessonController@edit', array('id'=>$lesson->course->id, 'les'=>$lesson->id))}}" > Edit </a></td>
                                    <td><a href="{{action('LessonController@page', array('id'=>$lesson->course->id))}}" > View </a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
        </div>
    </div>
</div>
@endsection