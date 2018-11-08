@extends('layouts.app')
{!! Html::style('/select2/dist/css/select2.css') !!}
@section('content')
    @include('partials._createEditProfile')
    <input type="hidden" name="is_active" id="is_active" value="{{ $profile->is_active == 'Y' ? 'Y' : 'N' }}">
    {!! Form::close() !!}
@endsection
@section('scripts')        
    {!! Html::script('/select2/dist/js/select2.js') !!}
    <script>
        $('.js-example-basic-single').select2();
    </script>
@endsection