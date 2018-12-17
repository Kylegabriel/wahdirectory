@extends('layouts.app')
@section('content')
    @include('partials._createEditInterns')
    <input type="hidden" name="is_active" id="is_active" value="Y">
    {!! Form::close() !!}
@endsection
@section('scripts')
    <script>
        $('.select2-multi').select2({
            width: 'resolve',
            placeholder: 'Choose Paper'
        });
    </script>

@endsection