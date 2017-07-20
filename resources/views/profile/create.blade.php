@extends('layouts.app')

@section('content')
	<div class="col s12 card">
		<form method="POST" action="{{ route('profile.store') }}" class="formValidate">

                    <h5><div class="card blue" style="padding:10px"><i class="material-icons small">add</i>WAH NGO</div></h5>
                    @include('partials._EditAndCreateProfile')

    </div>            
                <div class="row">
                	<button type="submit" class="waves-effect waves-light btn left">Submit<i class="material-icons right">send</i></button>
            	    <a href="{{ route('profile.index') }}" class="waves-effect waves-green btn-flat left" style="margin-left:5px"><i class="material-icons left">keyboard_arrow_left</i>Close</a>
            	</div>	
        </form>
	

@endsection
