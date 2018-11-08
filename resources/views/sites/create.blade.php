@extends('layouts.app')
{!! Html::style('/select2/dist/css/select2.css') !!}
@section('content')

    @include('partials._createEditSites')
    <input type="hidden" name="is_active" id="is_active" value="Y">
    {!! Form::close() !!}

@endsection
@section('scripts')  
    @include('partials._sitesScript')
    {!! Html::script('/select2/dist/js/select2.js') !!}
    <script>
        $('.js-example-basic-single').select2();
    </script>
@endsection