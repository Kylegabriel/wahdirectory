@extends('layouts.app')
{!! Html::style('/select2/dist/css/select2.css') !!}
@section('content')
	@include('partials._facilityInfoEditCreate')
@endsection
@section('scripts')        
    {!! Html::script('/select2/dist/js/select2.js') !!}
    <script>
         $('.js-example-basic-single').select2();

	     $('#form-hide').hide();

	     $('#facility_id').change(function () {
	         $('#form-hide').hide();
	         var option = this.options[this.selectedIndex].value;
	         if ( option !== null) {
	            $('#form-hide').show();
	         }
	     });

    </script>
@endsection