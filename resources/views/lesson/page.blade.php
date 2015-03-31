@extends('app')

@section('content')
<div class="container">

	@if(Session::has('success'))
		<div class="alert-box success">						
			<div class="alert alert-success">
				<strong>{{ $lesson->exists ? 'Course' : 'Congrats!' }}</strong> 
				{{ Session::get('success') }}
			</div>
		</div>
	@endif
	
    <div class="row">
        <div class="col-md-12">		
		
			<!-- Breadbcrumbs -->
			{!! Breadcrumbs::render('lessonPage', $lesson) !!}
		
			<div class="page-header">
                <h1><small>{{ $lesson->home_name }}</small></h1>				
				{{ $lesson->course->name }}
            </div>
			
			<div class="jumbotron">
				<h1>Lesson:</h1>
				<p>{{ $lesson->title }}</p>
				<i>{{ $lesson->start_time }} - {{ $lesson->end_time }}</i>
			</div>
		</div>
	</div>
	
	<div class="row">
		<div class="col-md-9">
			<a href="http://www.google.com" class="click-box">
				<div class="panel panel-default">
					<div class="panel-heading"> {{ $lesson->title }} </div>             
					<div class="panel-body">
						{{ $lesson->description }}
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="hidden" name="Course[course_id]" value="{{ $lesson->id }}">
					</div>
				</div>
			</a>		
		</div>
		
		<div class="col-md-3">
			<ul class="nav nav-pills nav-stacked">
			<li role="presentation" class="active"><a href="#">Course Home</a></li>
			<li role="presentation"><a href="#">Fellow Coaches</a></li>
			<li role="presentation"><a href="#">Discussions</a></li>
			<li role="presentation"><a href="#">My Profile</a></li>
			</ul>
		</div>
	</div>
	
	<div class="clearfix"></div>	
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