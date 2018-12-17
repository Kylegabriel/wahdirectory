@extends('layouts.app')
@section('content')
    @include('partials._createEditInterns')
    <input type="hidden" name="is_active" id="is_active" value="{{ $intern->is_active == 'Y' ? 'Y' : 'N' }}">
    {!! Form::close() !!}
@endsection
@section('scripts')
    <script>
        $('.select2-multi').select2();
        $('.select2-multi').select2().val({!! json_encode($intern->tags()->getRelatedIds()) !!}).trigger('change');
    </script>
@endsection
