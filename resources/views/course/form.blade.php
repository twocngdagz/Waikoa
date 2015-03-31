@extends('app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
		
			<!-- Breadbcrumbs -->
			{!! Breadcrumbs::render() !!}
		
			<div class="page-header">
                <h1><small>{{ $formName }}</small></h1>				
            </div>
			
			@foreach($errors->all() as $error)
				<p class="alert alert-danger">{{$error}}</p>
			@endforeach
			
			@if(Session::has('success'))
				<div class="alert-box success">						
					<div class="alert alert-success">
						<strong>{{ $course->exists ? 'Course' : 'Congrats!' }}</strong> 
						{{ Session::get('success') }}
					</div>
				</div>
			@endif

			<!-- Nav Buttons -->
			<div class="btn-group pad-bottom" role="group" aria-label="...">				
				{!! link_to_action('HomeController@index', 'Home', array(), array('class'=>'btn btn-default')) !!}
				{!! link_to_action('CourseController@index', 'Courses', array(), array('class'=>'btn btn-default')) !!}
				@if($course->exists)
					{!! link_to_action('CourseController@create', 'New Course', array(), array('class'=>'btn btn-default')) !!}
					{!! link_to_action('LessonController@index', 'Lessons', array('id'=>$course->id), array('class'=>'btn btn-default')) !!}
					{!! link_to_action('LessonController@create', 'New Lesson', array('id'=>$course->id), array('class'=>'btn btn-default')) !!}
				@endif
			</div>			

			<!-- Form -->
			{!! Form::open(array('action' => $course->exists ? 'CourseController@update' : 'CourseController@create', 'class'=>'form-horizontal'), 'POST') !!}				
				<!-- Basic Course Information -->
				<div class="panel panel-yellow">
					<div class="panel-heading">
						Basic Course Information						
						<div class="btn-group pull-right" style="margin-bottom: 1em;" role="group" aria-label="...">							
							@if($course->exists)
								{!! link_to_action('CourseController@destroy', 'Delete', array('id'=>$course->id), array('class'=>'btn btn-danger btn-xs'))!!}
							@endif							
						</div>
					</div>
					<div class="panel-body">					
						{!! Form::hidden('course_id', $course->id) !!}
						
						@foreach ($information as $value)								
							<div class="form-group {{ $errors->has($value) ? 'has-error' : '' }}">								
								{!! Form::label($value, Lang::get('course.'.$value), array('class' => 'col-md-4 control-label')) !!}
								<div class="col-md-6">
									{!! Form::text($value, $course->$value, array('id'=>$value, 'class'=>'form-control')) !!}
									{!! $errors->first($value,'<span class="help-block">:message</span>') !!}									
								</div>
							</div>							
						@endforeach
					</div>
				</div>
				
				<!-- Course Options -->				
				<div class="panel panel-yellow">
					<div class="panel-heading">Course Options</div>             
					<div class="panel-body">						
						
						<!-- Class Size -->						
						@foreach ($radio as $value)				
							<div class="form-group {{ $errors->has($value) ? 'has-error' : '' }}">								
								{!! Form::label($value, Lang::get('course.'.$value), array('class' => 'col-md-4 control-label radio-inline')) !!}
								<div class="col-md-2">									
									
									{!! Form::radio($value, '0', $classSize[$value]['unlimited'], array('id'=>$value.'1')) !!} Unlimited<br />									
									{!! Form::radio($value, '1', $classSize[$value]['limited'], array('id'=>$value.'2')) !!} Limit to									
									{!! Form::text($value, $course->$value, array(
											'id'=>$value.'_limit',
											'class'=>'form-control input-sm ' . $classSize[$value]['visibility'],
											'name'=>$value.'_limit',											
											'size'=>'10',
											'placeholder'=>'Number'
										)) 
									!!}
									{!! $errors->first($value,'<span class="help-block">:message</span>') !!}
								</div>
							</div>
						@endforeach
						
						<!-- Comments, Always On -->
						@foreach ($dropDown as $value)					
							<div class="form-group {{ $errors->has($value) ? 'has-error' : '' }}">
								<label class="col-md-4 control-label radio-inline">{{ Lang::get('course.'.$value) }}</label>
								<div class="col-md-6">								
									<select name="{{ $value }}">									
										<option value="1" {{ $selected[$value]['yes'] }}>Yes</option>
										<option value="0" {{ $selected[$value]['no'] }}>No</option>
									</select>
									{!! $errors->first($value,'<span class="help-block">:message</span>') !!}
								</div>
							</div>
						@endforeach
						
						<div class="form-group {{ $errors->has($value) ? 'has-error' : '' }}">
							<label class="col-md-4 control-label">{{ Lang::get('course.date_visible_offset') }}</label>
							<div class="col-md-6">								
								<select name="date_visible_offset">
									<option value="-5" {{ $selected['date_visible_offset']['-5'] }}>5 days before</option>
									<option value="-4" {{ $selected['date_visible_offset']['-4'] }}>4 days before</option>
									<option value="-3" {{ $selected['date_visible_offset']['-3'] }}>3 days before</option>
									<option value="-2" {{ $selected['date_visible_offset']['-2'] }}>2 days before</option>
									<option value="-1" {{ $selected['date_visible_offset']['-1'] }}>1 days before</option>
									<option value="0" {{ $selected['date_visible_offset']['0'] }}>On the scheduled day</option>
								</select>
								{!! $errors->first('date_visible_offset','<span class="help-block">:message</span>') !!}
							</div>
						</div>
						
						<div class="form-group {{ $errors->has($value) ? 'has-error' : '' }}">
							<label class="col-md-4 control-label">{{ Lang::get('course.email_notif_offset') }}</label>
							<div class="col-md-6">								
								<select name="email_notif_offset">
									<option value="-5" {{ $selected['email_notif_offset']['-5'] }}>5 days before</option>
									<option value="-4" {{ $selected['email_notif_offset']['-4'] }}>4 days before</option>
									<option value="-3" {{ $selected['email_notif_offset']['-3'] }}>3 days before</option>
									<option value="-2" {{ $selected['email_notif_offset']['-2'] }}>2 days before</option>
									<option value="-1" {{ $selected['email_notif_offset']['-1'] }}>1 days before</option>
									<option value="0" {{ $selected['email_notif_offset']['0'] }} >Email on the scheduled day</option>
									<option value="1" {{ $selected['email_notif_offset']['1'] }} >1 day after</option>
									<option value="2" {{ $selected['email_notif_offset']['2'] }} >2 days after</option>
									<option value="3" {{ $selected['email_notif_offset']['3'] }} >3 days after</option>
								</select>
								{!! $errors->first('email_notif_offset','<span class="help-block">:message</span>') !!}
							</div>
						</div>
						
						<div class="form-group {{ $errors->has($value) ? 'has-error' : '' }}">
							<label class="col-md-4 control-label">{{ Lang::get('course.course_material_schedule') }}</label>
							<div class="col-md-6">								
								<select name="course_material_schedule">									
									<option value="1" {{ $selected['course_material_schedule']['1'] }}>Daily</option>
									<option value="2" {{ $selected['course_material_schedule']['2'] }}>Weekdays</option>
									<option value="3" {{ $selected['course_material_schedule']['3'] }}>Business Days</option>
									<option value="4" {{ $selected['course_material_schedule']['4'] }}>Others</option>
								</select>
								{!! $errors->first('course_material_schedule','<span class="help-block">:message</span>') !!}
							</div>
						</div>						
					</div>
				</div>
				
				<!-- Course schedule -->
				<div class="panel panel-yellow">
					<div class="panel-heading">Course Schedule</div>             
					<div class="panel-body">						
						@foreach ($schedule as $value)							
							<div class="form-group {{ $errors->has($value) ? 'has-error' : '' }}">
								<label class="col-md-4 control-label">{{ Lang::get('course.'.$value) }}</label>
								<div class="col-md-6">									
									{!! Form::text($value, $course->$value, array('id'=>$value, 'class'=>'form-control', 'name'=>$value )) !!}
									{!! $errors->first($value,'<span class="help-block">:message</span>') !!}
								</div>
							</div>
						@endforeach
					</div>
				</div>
				
				<!-- Course Mail Server -->
				<div class="panel panel-yellow">
					<div class="panel-heading">Course Mail Server</div>             
					<div class="panel-body">
						@foreach($mailServer as $value)						
							<div class="form-group {{ $errors->has($value) ? 'has-error' : '' }}">
								<label class="col-md-4 control-label">{{ Lang::get('course.'.$value) }}</label>
								<div class="col-md-6">									
									{!! Form::text($value, $course->$value, array('id'=>$value, 'class'=>'form-control', 'name'=>$value )) !!}
									{!! $errors->first($value,'<span class="help-block">:message</span>') !!}
								</div>
							</div>
						@endforeach
						
						<div class="form-group">
							<label class="col-md-4 control-label">{{ Lang::get('course.smtp_password') }}</label>
							<div class="col-md-6">
								<?php //-- Form element override, issue with Form::password class ?>
								<input type="password" id="smtp_password" class="form-control" name="smtp_password" value="{{ $course->smtp_password }}">								
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									{{ $course->exists ? 'Save' : 'Create' }}
								</button>
							</div>
						</div>
					</div>
				</div>
			{!! Form::close() !!}
        </div>
		
		<div class="row">
			<div class="col-md-3 pull-right">
				<div style="margin-bottom: 1em;" role="group" aria-label="...">											
				@if($course->exists)
					<i>Author:</i>
					{{ $course->user->name }}
				@endif
				</div>
			</div>
		</div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function(){
            var format = 'yy-mm-dd';
            var id = [
                "class_start", "class_end", "access_start",
                "access_end", "register_start", "register_end",
                "course_material_schedule"
            ];

            // iterate elements with datepicker
            id.forEach(function(entry) {
                $("#" + entry + "").datepicker({
                    dateFormat: format,
                });
            });

            // hide show limit textbox
            var classSize = ['a', 'b', 'c'];
            classSize.forEach(function(entry) {
                $('#class_size_' + entry + '1').click(function(){
                    $('#class_size_' + entry + '_limit').addClass('hidden');
                });
                $('#class_size_' + entry + '2').click(function(){
                    $('#class_size_' + entry + '_limit').removeClass('hidden');
                });
            });
        });
    </script>	
@endsection