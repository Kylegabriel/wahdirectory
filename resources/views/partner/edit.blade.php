@extends('layouts.app')
@section('content')
            @include('partials._createEditPartner')
            <input type="hidden" name="is_active" id="is_active" value="{{ $partners->is_active == 'Y' ? 'Y' : 'N' }}">
            {!! Form::close() !!}
@endsection
            
