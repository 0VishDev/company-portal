@extends('errors.layout')
@section('content')
    @php $urlArr = explode('/', \URL::current()); $activityId = end($urlArr); @endphp
	<div class="card text-center mt-50">
	  <div class="card-body">
	  	@if (Session::has('message'))
	        <div class="alert alert-info">{{ Session::get('message') }}</div>
		@endif

	    <h5 class="card-title"><i class="fa fa-exclamation-circle fs-50"></i></h5>
	    <p class="card-text fs-20">The link has been expired. Pleae click below button to request another link.</p>
	    <a href="{{ url('student/activity/'.$activityId.'/request/create') }}" class="btn btn-primary">Create Request</a>
	  </div>
	</div>
@endsection