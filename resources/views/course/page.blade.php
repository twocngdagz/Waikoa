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
		
			<!-- Breadbcrumbs -->
			{!! Breadcrumbs::render('coursePage', $course) !!}
		
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
		<div class="col-md-9">
			<div class="panel panel-default">
				<div class="panel-heading"> Anything Here, schedule, reminders, etc.. </div>             
				<div class="panel-body">
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam vel purus et dolor sodales porttitor eu vel risus. Nullam at velit in urna semper consequat.
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam vel purus et dolor sodales porttitor eu vel risus. Nullam at velit in urna semper consequat.
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<input type="hidden" name="Course[course_id]" value="{{ $course->id }}">
				</div>
			</div>
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
	
	@foreach($course->lessons as $lesson)
		<div class="row">
			<div class="col-md-9">
				<a href="http://www.google.com" class="click-box">
				<div class="panel panel-default">
					<div class="panel-heading"> {{ $lesson->title }} </div>             
					<div class="panel-body">
						{{ $lesson->description }}
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="hidden" name="Course[course_id]" value="{{ $course->id }}">
					</div>
				</div>
				</a>
			</div>
		</div>
	@endForeach
	
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