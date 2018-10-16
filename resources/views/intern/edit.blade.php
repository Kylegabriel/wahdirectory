@extends('layouts.app')
    {!! Html::style('/select2/dist/css/select2.css') !!}
@section('content')
    @include('partials._createEditInterns')
@endsection
@section('scripts')

    {!! Html::script('/select2/dist/js/select2.js') !!}
    <script>
        $('.select2-multi').select2();
        $('.select2-multi').select2().val({!! json_encode($intern->tags()->getRelatedIds()) !!}).trigger('change');
    </script>

@endsection
