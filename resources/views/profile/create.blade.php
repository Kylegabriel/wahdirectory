@extends('layouts.app')
@section('content')
    @include('partials._createEditProfile')
    <input type="hidden" name="is_active" id="is_active" value="Y">
    {!! Form::close() !!}
@endsection
@section('scripts')  
    @include('partials._sitesScript')
@endsection