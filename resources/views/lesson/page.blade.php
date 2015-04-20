@extends('app')

@section('comment_css')
<link href="{{asset('/css/main.css')}}" rel="stylesheet">
@endsection

@section('comment_js')
<script type="text/javascript" src="{{asset('js/comment.js')}}"></script>
@endsection

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
        <div class="col-md-3">
            <ul class="nav nav-pills nav-stacked">
                <li role="presentation"><a href="{{action('UserController@course')}}">Course Home</a></li>
                <li role="presentation"><a href="#">Fellow Coaches</a></li>
                <li role="presentation"><a href="#">My Goals</a></li>
                <li role="presentation"><a href="/user/profile">My Profile</a></li>
                <li role="presentation"><a href="/auth/logout">Logout</a></li>
            </ul>
        </div>

		<div class="col-md-9 text-center">
            <div class="row">
                <div class="panel panel-default">
                    <div class="panel-heading"> Video: {{ $lesson->url }} </div>
                    <div class="panel-body">
                        @if($videoType == 'youtube')
                        <div id="ytplayer"></div>
                        @elseif ($videoType == 'vimeo')
                        <iframe src="{{ $lesson->url }}" width="500" height="281" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                        @else
                        {!! link_to($lesson->url, $lesson->url, $attributes = array('target'=>'_blank'), $secure = null) !!}
                        @endif
                    </div>
                </div>
                <!-- Audio -->
                @if($videoType == 'audio')
                <div class="row pad-bottom">
                    <div class="col-md-12">
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
                </div>
                @endif

                <div class="clearfix"></div>

                <!-- Mp3 -->
                @if(!empty($lesson->file_name))
                <div class="row pad-bottom">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading"> Audio: {{ $lesson->mp3_name }} </div>
                            <div class="panel-body">
                                <audio controls>
                                    <source src="{{ $lesson->file_name }}" type="audio/ogg">
                                    <source src="{{ $lesson->file_name }}" type="audio/mpeg">
                                    Your browser does not support the audio element.
                                </audio>
                            </div>
                        </div>
                    </div>
                </div>
                @endif

                <div class="clearfix"></div>

                <!-- Description -->
                <div class="row">
                    <div class="col-md-12">
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
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading"> Content </div>
                            <div class="panel-body">
                                <?php echo html_entity_decode($lesson->content); ?>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- download links -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading"> Downloads </div>
                            <div class="panel-body">
                                <a href="{{ $lesson->download_url }}" download> {{ $lesson->download_url }} </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>


                <!-- message board -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading"> Message Board </div>
                            <div class="panel-body">
                                <div  class="marketing_area">
                                    <div align="center" ><?php //echo $this->successMsg; ?></div>
                                    @include('partials.facebook_comment', ['object_id'=>'message_board_lesson_'.$lesson->id])
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>
            </div>

		</div>
	</div>
	

	
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