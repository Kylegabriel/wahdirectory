@extends('settings.index')
@section('settings')
	@include('partials._UserEditCreate') 
	<input type="hidden" name="is_active" id="is_active" value="Y">
	{!! Form::close() !!}                           
@endsection