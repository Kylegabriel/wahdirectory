@extends('layouts.app')

@section('content')
	<div class="col s12 card">
        {!! Form::model($partners, ['route' => ['partner.update', $partners->id], 'method' => 'PUT','class'=>'formValidate']) !!}
            <h5><div class="card blue" style="padding:10px"></i>Edit Partner Organization</div></h5> 
                    @include('partials._EditAndCreate')    
    </div>
    <div class="row">
    	<button type="submit" class="waves-effect waves-light btn left">Save Changes<i class="material-icons right">send</i></button>
	    <a href="{{ route('partner.index') }}" class="waves-effect waves-green btn-flat left" style="margin-left:5px"><i class="material-icons left">keyboard_arrow_left</i>Cancel</a>
	</div>	
        {!! Form::close() !!}

@endsection
