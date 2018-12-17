@extends('layouts.app')
@section('content')
	@include('partials._facilityInfoEditCreate')
	<input type="hidden" name="is_active" id="is_active" value="{{ $facilityInfo->is_active == 'Y' ? 'Y' : 'N' }}">
    {!! Form::close() !!}
@endsection