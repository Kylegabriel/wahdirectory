@extends('layouts.app')
{!! Html::style('/select2/dist/css/select2.css') !!}
@section('content')
        @include('partials._createEditSites')
@endsection
@section('scripts')        
    @include('partials._sitesScript')
    {!! Html::script('/select2/dist/js/select2.js') !!}
    <script>
        $('.js-example-basic-single').select2();
    </script>
@endsection