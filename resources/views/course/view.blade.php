@extends('app')

@section('content')
<div class="container">
    <div class="col-md-10 col-md-offset-1">
	
		<!-- Basic Course Information -->
		<div class="page-header">
			<h1><small>{{ $course->name }}</small></h1>
		</div>
		
		<div class="panel panel-yellow">
			<div class="panel-heading">Basic Information</div>
			<div class="panel-body">
				<div class="list-group">
					@foreach ($information as $field)						
						<a href="#" class="list-group-item">
							<i class="fa fa-twitter fa-fw"></i> {{ Lang::get('fields.'.$field) }}: {{ $course->$field }}
							<span class="pull-right text-muted small"><em>12 minutes ago</em>
							</span>
						</a>
					@endforeach
				</div>
			</div>
		</div>
		
		<!-- Course Options -->
		<div class="panel panel-yellow">
			<div class="panel-heading">Course Options</div>
			<div class="panel-body">
				<div class="list-group">
					@foreach ($radio as $field)						
						<a href="#" class="list-group-item">
							<i class="fa fa-twitter fa-fw"></i> {{ Lang::get('fields.'.$field) }}: {{ $course->$field }}
							<span class="pull-right text-muted small"><em>12 minutes ago</em>
							</span>
						</a>
					@endforeach
					
					@foreach ($dropDown as $field)						
						<a href="#" class="list-group-item">
							<i class="fa fa-twitter fa-fw"></i> {{ Lang::get('fields.'.$field) }}: {{ $course->$field }}
							<span class="pull-right text-muted small"><em>12 minutes ago</em>
							</span>
						</a>
					@endforeach
					
					<a href="#" class="list-group-item">
						<i class="fa fa-twitter fa-fw"></i> {{ Lang::get('fields.date_visible_offset') }}: {{ $course->date_visible_offset }}
						<span class="pull-right text-muted small"><em>12 minutes ago</em>
						</span>
					</a>
					
					<a href="#" class="list-group-item">
						<i class="fa fa-twitter fa-fw"></i> {{ Lang::get('fields.email_notif_offset') }}: {{ $course->email_notif_offset }}
						<span class="pull-right text-muted small"><em>12 minutes ago</em>
						</span>
					</a>
					
					<a href="#" class="list-group-item">
						<i class="fa fa-twitter fa-fw"></i> {{ Lang::get('fields.course_material_schedule') }}: {{ $course->course_material_schedule }}
						<span class="pull-right text-muted small"><em>12 minutes ago</em>
						</span>
					</a>
					
				</div>
			</div>
		</div>
		
		<!-- Course schedule -->				
		<div class="panel panel-yellow">
			<div class="panel-heading">Course Schedule</div>
			<div class="panel-body">
				<div class="list-group">
					@foreach ($schedule as $field)						
						<a href="#" class="list-group-item">
							<i class="fa fa-twitter fa-fw"></i> {{ Lang::get('fields.'.$field) }}: {{ $course->$field }}
							<span class="pull-right text-muted small"><em>12 minutes ago</em>
							</span>
						</a>
					@endforeach
				</div>
			</div>
		</div>
		
		<!-- Course Mail Server -->
		<div class="panel panel-yellow">
			<div class="panel-heading">Course Schedule</div>
			<div class="panel-body">
				<div class="list-group">
					@foreach ($mailServer as $field)						
						<a href="#" class="list-group-item">
							<i class="fa fa-twitter fa-fw"></i> {{ Lang::get('fields.'.$field) }}: {{ $course->$field }}
							<span class="pull-right text-muted small"><em>12 minutes ago</em>
							</span>
						</a>
					@endforeach
				</div>
			</div>
		</div>

		<div class="panel panel-default">
			<div class="panel-heading">
			<h3 class="panel-title">Panel title</h3>
			</div>
			<div class="panel-body">
			Panel content
			</div>
		</div>
	</div>
</div>
@endsection