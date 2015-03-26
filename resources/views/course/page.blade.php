@extends('app')

@section('content')
<div class="container">

	@if(Session::has('success'))
		<div class="alert-box success">						
			<div class="alert alert-success">
				<strong>{{ $course->exists ? 'Course' : 'Congrats!' }}</strong> 
				{{ Session::get('success') }}
			</div>
		</div>
	@endif
	
    <div class="row">
        <div class="col-md-12">		
			<div class="page-header">
                <h1><small>{{ $course->name }}</small></h1>
				{{ $course->home_name }}
            </div>
			
			<div class="jumbotron">
				<h1>Course Summary/Headlines</h1>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam vel purus et dolor sodales porttitor eu vel risus. Nullam at velit in urna semper consequat</p>
			</div>
		</div>
	</div>
	
	<div class="row">
		<div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-heading"> About Us </div>             
				<div class="panel-body">
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam vel purus et dolor sodales porttitor eu vel risus. Nullam at velit in urna semper consequat.
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam vel purus et dolor sodales porttitor eu vel risus. Nullam at velit in urna semper consequat.
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<input type="hidden" name="Course[course_id]" value="{{ $course->id }}">
				</div>
			</div>
		</div>
		<div class="col-md-6 pad-bottom">
			<form class="form-horizontal" role="form" method="POST" action="{{ $course->exists ? action('CourseController@update') : action('CourseController@create') }}">
				<!-- Course Lessons -->
				<ul class="nav nav-tabs ">
					<li role="presentation" class="active"><a href="#">Lessons</a></li>
					<li role="presentation"><a href="#">Webinars</a></li>
					<li role="presentation"><a href="#">Live Events</a></li>
				</ul>
				<div class="tab-content">
					<div id="tab_1" class="tab-pane fade">
						<textarea class="form-control" rows="3"></textarea>
					</div>
					<div id="tab_2" class="tab-pane fade active in">
						<textarea class="form-control" rows="3"></textarea>
					</div>
					<div id="tab_4" class="tab-pane fade">
						<textarea class="form-control" rows="3"></textarea>
					</div>
				</div>				
			</form>
		</div>
	</div>
	
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading"> Course Lessons </div>             
				<div class="panel-body">
					test
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<input type="hidden" name="Course[course_id]" value="{{ $course->id }}">
				</div>
			</div>	
		</div>
	</div>
	
	<div class="clearfix"></div>
	
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading"> Course Lessons </div>             
				<div class="panel-body">
					test
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<input type="hidden" name="Course[course_id]" value="{{ $course->id }}">
				</div>
			</div>	
		</div>
	</div>
</div>
@endsection