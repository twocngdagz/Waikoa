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
	
	<!-- Video Youtube or Vimeo -->
	<div class="row pad-bottom">
		<div class="col-md-9 text-center">
			<div class="panel panel-default">
				<div class="panel-heading"> Video: {{ $lesson->url }} </div>             
				<div class="panel-body">
					@if($videoType == 'youtube')
						<div id="ytplayer"></div>
					@elseif ($videoType == 'vimeo')
						<iframe src="{{ $lesson->url }}" width="500" height="281" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe> 			
					@else
						{!! link_to($lesson->url, $lesson->url, $attributes = array(), $secure = null) !!}
					@endif
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
	
	<!-- Audio -->	
	@if($videoType == 'audio')
		<div class="row pad-bottom">
			<div class="panel panel-default">
				<div class="panel-heading"> Audio: {{ $lesson->url }} </div>             
				<div class="panel-body">
					<audio controls>
						<source src="{{ $lesson->url }}" type="audio/ogg">
						<source src="{{ $lesson->url }}" type="audio/mpeg">
						Your browser does not support the audio element.
					</audio>
				</div>
			</div>
		</div>
	@endif
	
	<div class="clearfix"></div>
	
	<!-- Description -->	
	<div class="row">
		<div class="col-md-9">			
			<div class="panel panel-default">
				<div class="panel-heading"> Description </div>             
				<div class="panel-body">					
					{!! $lesson->description !!}
				</div>
			</div>
		</div>		
	</div>
	
	<div class="clearfix"></div>
	
	<!-- Content -->	
	<div class="row">
		<div class="col-md-9">			
			<div class="panel panel-default">
				<div class="panel-heading"> Content </div>             
				<div class="panel-body">					
					<?php echo html_entity_decode($lesson->content); ?>
				</div>
			</div>
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
		
		// Load the IFrame Player API code asynchronously.
			var tag = document.createElement('script');
			tag.src = "https://www.youtube.com/player_api";
			var firstScriptTag = document.getElementsByTagName('script')[0];
			firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

			// Replace the 'ytplayer' element with an <iframe> and
			// YouTube player after the API code downloads.
			var player;
			function onYouTubePlayerAPIReady() {
				player = new YT.Player('ytplayer', {
					height: '390',
					width: '640',
					videoId: '{{ $youtubeId }}'
				});
			}
		
    </script>
@endsection