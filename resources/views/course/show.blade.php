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

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
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
                                <th></th>
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
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
        </div>
    </div>
</div>
@endsection