@extends('errors.layout')
@section('content')
	<div class="card text-center mt-50">
	  <div class="card-body">
	    <h5 class="card-title"><i class="{{ $icon }} fs-50"></i></h5>
	    <div class="card-text fs-20">{!! $message !!}</div>
	  </div>
	</div>
@endsection
