@extends('layouts.app')
@section('content')
    @include('partials._createEditProfile')
    <input type="hidden" name="is_active" id="is_active" value="{{ $profile->is_active == 'Y' ? 'Y' : 'N' }}">
    {!! Form::close() !!}
@endsection
