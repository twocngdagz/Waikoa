@extends('app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
		
			<!-- Breadbcrumbs -->
			{!! Breadcrumbs::render('lessonCreate',$course) !!}
		
			<div class="page-header">
                <h1><small>{{ $course->name }} - {{ $formName }}</small></h1>				
            </div>
			
			@foreach($errors->all() as $error)
				<p class="alert alert-danger">{{$error}}</p>
			@endforeach
			
			@if(Session::has('success'))
				<div class="alert-box success">						
					<div class="alert alert-success">
						<strong>{{ $lesson->exists ? 'Lesson' : 'Congrats!' }}</strong> 
						{{ Session::get('success') }}
					</div>
				</div>
			@endif

			<div class="btn-group pad-bottom" role="group" aria-label="...">				
				{!! link_to_action('HomeController@index', 'Home', array(), array('class'=>'btn btn-default'))!!}
				{!! link_to_action('LessonController@index', 'Lessons', array('id'=>$course->id), array('class'=>'btn btn-default')) !!}
				@if($lesson->exists)
					{!! link_to_action('LessonController@create', 'New Lesson', array('id'=>$course->id), array('class'=>'btn btn-default'))!!}
					{!! link_to_action('LessonController@page', 'View Page', array('id'=>$course->id,'les'=>$lesson->id), array('class'=>'btn btn-default', 'target'=>'_blank'))!!}
				@endif
			</div>

			<!-- Form -->
			{!! Form::open(array('action' => $lesson->exists ? 'LessonController@update' : 'LessonController@store', 'class'=>'form-horizontal'), 'POST') !!}				
				
				<!-- Basic Lesson Information -->
				<div class="panel panel-yellow">
					<div class="panel-heading">
						Basic Lesson Information
						<div class="btn-group pull-right" style="margin-bottom: 1em;" role="group" aria-label="...">
							@if($lesson->exists)
								{!! link_to_action('LessonController@destroy', 'Delete', array('id'=>$lesson->course->id,'les'=>$lesson->id), array('class'=>'btn btn-danger btn-xs'))!!}
							@endif
						</div>
					</div>
					<div class="panel-body">					
						{!! Form::hidden('course_id', $course->id) !!}
						@if($lesson->exists)
							{!! Form::hidden('lesson_id', $lesson->id) !!}
						@endif
						
						@foreach ($information as $value)								
							<div class="form-group {{ $errors->has($value) ? 'has-error' : '' }}">								
								{!! Form::label($value, Lang::get('lesson.'.$value), array('class' => 'col-md-4 control-label')) !!}
								<div class="col-md-6">
									{!! Form::text($value, $lesson->$value, array('id'=>$value, 'class'=>'form-control')) !!}
									{!! $errors->first($value,'<span class="help-block">:message</span>') !!}									
								</div>
							</div>							
						@endforeach
					</div>
				</div>
				
				<!-- Lesson Options -->				
				<div class="panel panel-yellow">
					<div class="panel-heading">Lesson Options</div>             
					<div class="panel-body">					
						
						<!-- Lesson Type, Comments -->
						@foreach ($dropDown as $value)					
							<div class="form-group {{ $errors->has($value) ? 'has-error' : '' }}">
								<label class="col-md-4 control-label radio-inline">{{ Lang::get('lesson.'.$value) }}</label>
								<div class="col-md-6">								
									<select name="{{ $value }}">
										@if($value == 'type')
											<option value="1" {{ $selected[$value]['1'] }}>Lesson</option>
											<option value="2" {{ $selected[$value]['2'] }}>Webinar</option>
											<option value="3" {{ $selected[$value]['3'] }}>Event</option>
										@else
											<option value="1" {{ $selected[$value]['1'] }}>Yes</option>
											<option value="0" {{ $selected[$value]['0'] }}>No</option>											
										@endif
									</select>
									{!! $errors->first($value,'<span class="help-block">:message</span>') !!}
								</div>
							</div>
						@endforeach						
					</div>
				</div>
				
				<!-- Lesson Content -->
				<div class="panel panel-yellow">
					<div class="panel-heading">
						Lesson Content						
					</div>
					<div class="panel-body">											
						@foreach ($content as $value)								
							<div class="form-group {{ $errors->has($value) ? 'has-error' : '' }}">								
								{!! Form::label($value, Lang::get('lesson.'.$value), array('class' => 'col-md-12 control-label force-text-left')) !!}
								<div class="col-md-12">
									{!! Form::textArea($value, $lesson->$value, array('id'=>$value, 'class'=>'form-control')) !!}
									{!! $errors->first($value,'<span class="help-block">:message</span>') !!}									
								</div>
							</div>							
						@endforeach
					</div>
				</div>
				
				<!-- Lesson Messages -->
				<div class="panel panel-yellow">
					<div class="panel-heading">
						Lesson Messages
					</div>
					<div class="panel-body">											
						@foreach ($textArea as $value)								
							<div class="form-group {{ $errors->has($value) ? 'has-error' : '' }}">								
								{!! Form::label($value, Lang::get('lesson.'.$value), array('class' => 'col-md-12 control-label force-text-left')) !!}
								<div class="col-md-12">
									{!! Form::textArea($value, $lesson->$value, array('id'=>$value, 'class'=>'form-control')) !!}
									{!! $errors->first($value,'<span class="help-block">:message</span>') !!}									
								</div>
							</div>							
						@endforeach
					</div>
				</div>
				
				<!-- Lesson schedule -->
				<div class="panel panel-yellow">
					<div class="panel-heading">Lesson Schedule</div>             
					<div class="panel-body">						
						@foreach ($schedule as $value)							
							<div class="form-group {{ $errors->has($value) ? 'has-error' : '' }}">
								<label class="col-md-4 control-label">{{ Lang::get('lesson.'.$value) }}</label>
								<div class="col-md-6">									
									{!! Form::text($value, $lesson->$value, array('id'=>$value, 'class'=>'form-control', 'name'=>$value )) !!}
									{!! $errors->first($value,'<span class="help-block">:message</span>') !!}
								</div>
							</div>
						@endforeach
						
						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" id="submit" class="btn btn-primary">
									{{ $lesson->exists ? 'Save' : 'Create' }}
								</button>
							</div>
						</div>
					</div>
				</div>				
			{!! Form::close() !!}
        </div>
    </div>	
@endsection

@section('scripts')
    <script>
        $(document).ready(function(){
            var format = 'yy-mm-dd';
            var dateSchedule = [
                "date", "date_visible", "email_on"
            ];

            // iterate elements with datepicker
            dateSchedule.forEach(function(entry) {
                $("#" + entry + "").datepicker({
                    dateFormat: format,
                });
            });
			
			var timeSchedule = [
                "start_time", "end_time"
            ];

            // iterate elements with datepicker
            timeSchedule.forEach(function(entry) {
                $("#" + entry + "").timepicker({
                    timeFormat: 'h:mm:ss p',
                });
            });
        });
		
		// auto date offset
		$('#date').change(function() {
			  var date2 = $('#date').datepicker('getDate'); 
			  date2.setDate(date2.getDate() + {{ $course->date_visible_offset }}); 
			  $('#date_visible').datepicker('setDate', date2);
		});
		
		// auto email offset
		$('#date').change(function() {
			  var date2 = $('#date').datepicker('getDate'); 
			  date2.setDate(date2.getDate() + {{ $course->email_notif_offset }}); 
			  $('#email_on').datepicker('setDate', date2);
		});		
    </script>
	
	<script>
		CKEDITOR.replace( 'description' );
		CKEDITOR.replace( 'content' );
		CKEDITOR.replace( 'before_message' );
		CKEDITOR.replace( 'during_message' );
		CKEDITOR.replace( 'after_message' );
		
		var test = CKEDITOR.instances['content'].getData();
		console.log($(test).attr('src'));
	</script>
@endsection
