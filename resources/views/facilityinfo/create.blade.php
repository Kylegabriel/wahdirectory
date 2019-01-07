@extends('layouts.app')
@section('content')
	@include('partials._facilityInfoEditCreate')
	<input type="hidden" name="is_active" id="is_active" value="Y">
    {!! Form::close() !!}
@endsection
@section('scripts')        
    <script>
	     $('#form-hide').hide();

	     $('#facility_id').change(function () {
	         $('#form-hide').hide();
	         var option = this.options[this.selectedIndex].value;
	         if ( option !== null) {
	            $('#form-hide').show();
	         }
	     });

		$('#facility_id')
		    .select2()
		    .on('select2:open', () => {
		        $(".select2-results:not(:has(a))").append('<a href="{{ route('facility.create') }}" style="padding: 6px;height: 20px;display: inline-table;">CREATE NEW FACILITY</a>');
		})

    </script>
@endsection