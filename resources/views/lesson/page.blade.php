@extends('app')

@section('content')
<div class="container">
    <div class="col-md-10 col-md-offset-1">
	
		<!-- Breadbcrumbs -->
		{!! Breadcrumbs::render() !!}
	
		<!-- Basic Course Information -->
		<div class="page-header">
			<h1><small>{{ $lesson->title }}</small></h1>
		</div>
	</div>
</div>
@endsection