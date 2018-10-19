@extends('layouts.app')
    {!! Html::style('/select2/dist/css/select2.css') !!}
@section('content')
    @include('partials._createEditInterns')
    <input type="hidden" name="is_active" id="is_active" value="Y">
    {!! Form::close() !!}
@endsection
@section('scripts')

    {!! Html::script('/select2/dist/js/select2.js') !!}
    <script>
        $('.select2-multi').select2({
            width: 'resolve',
            placeholder: 'Choose Paper'
        });
    </script>

@endsection