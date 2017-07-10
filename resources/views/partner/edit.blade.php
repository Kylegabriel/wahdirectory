@extends('layouts.app')

@section('content')
<br>
	<div class="col s12 card">
	            <form method="POST" action="{{ route('partner.update',$partners->id) }}" class="formValidate">
	                    {{ csrf_field() }} 
	                    <h4><div class="card blue" style="padding:10px"><i class="material-icons small">add</i>Edit Partner Organization</div></h4> 
	                    <div class="row">
	                            <div class="input-field col s3">
	                                <i class="material-icons prefix">person_pin</i>
	                                <input type="text" name="last_name" id="last_name" class="validation" data-length="20" value="{{ $partners['last_name'] }}"> 
	                                <label for="last_name">Last Name</label>
	                            </div>
	                            
	                            <div class="input-field col s3">
	                                <input type="text" name="first_name" id="first_name" class="validate" data-length="20" value="{{ $partners['first_name'] }}">
	                                <label for="first_name">First Name</label>
	                            </div>
	                            <div class="input-field col s3">
	                                <input type="text" name="middle_name" id="middle_name" class="validate" data-length="20" value="{{ $partners['middle_name'] }}">
	                                <label for="middle_name">Middle Name</label>
	                            </div>
	                            <div class="input-field col s3">
	                                <select type="text" name="suffixName" id="suffixName" class="validate">
	                                  <option value="{{ $partners->partnerSuffix['suffix_code'] }}">{{ $partners->partnerSuffix['suffix_desc'] }}</option>
	                                  @foreach ( App\SuffixName::get() as $suffixName )  { ?>
	                                      <option value="{{ $suffixName['suffix_code'] }}">{{ $suffixName['suffix_desc'] }}</option>
	                                  @endforeach
	                                  </select> 
	                                <label for="suffixName">Suffix Name</label>
	                            </div>
	                        </div>    
	                        
	                        <div class="row">
	                            <div class="input-field col s3">
	                                <i class="material-icons prefix">add_location</i>
	                                <select type="text" id="partnerDesignation" name="partnerDesignation">
	                                  <option value="{{ $partners->partnerDesignation['designation_id'] }}">{{ $partners->partnerDesignation['designation'] }}</option>
	                                  @foreach( App\PartnerDesignation::get() as $designation )
	                                        <option value="{{ $designation['designation_id'] }}">{{ $designation['designation'] }}</option>
	                                  @endforeach
	                                </select>
	                                <label for="partnerDesignation">Designation</label>
	                            </div>
	                            <div class="input-field col s3">
	                                <i class="material-icons prefix">place</i>
	                                <select type="text" id="partnerOrganization" name="partnerOrganization">
	                                 	  <option value="{{ $partners->partnerOrganization['organization_id'] }}">{{ $partners->partnerOrganization['organization'] }}</option>
										  @foreach( App\PartnerOrganization::get() as $organization )
		                                        <option value="{{ $organization['organization_id'] }}">{{ $organization['organization'] }}</option>
		                                  @endforeach
	                                </select>
	                                <label for="partnerOrganization">Organization</label>
	                            </div>
	                            <div class="input-field col s3">
	                                <select type="text" id="gender" name="gender">
	                                	<option value="{{ $partners->gender }}">{{ $partners->gender == 'M' ? 'Male' : 'Female' }}</option>
	                                  	<option value="M">Male</option>
		                                <option value="F">Female</option>
	                                </select>
	                                <label for="gender">Gender</label>
	                            </div>
	                            <div class="input-field col s3">
	                                <select type="text" id="sites" name="sites">
	                                  <option value="{{ $partners->sites }}">@if($partners->sites == 'L' )Luzon @elseif($partners->sites == 'V') Visayas @else Mindanao @endif</option>
	                                  <option value="L">Luzon</option>
	                                  <option value="V">Visayas</option>
	                                  <option value="M">Mindanao</option>
	                                </select>
	                                <label for="sites">Sites</label>
                            	</div>

	                        </div>
	                         
	                        <div class="row">
								<div class="input-field col s4">
	                                <i class="material-icons prefix">contact_phone</i>
	                                <input type="text" name="primary_contact" id="primary_contact" class="validate" placeholder="0930*******" value="{{ $partners['primary_contact'] }}" data-length="11">
	                                <label for="primary_contact">Primary Contact</label>
	                            </div>
	                            <div class="input-field col s4">
	                                <i class="material-icons prefix">local_phone</i>
	                                <input type="text" name="secondary_contact" id="secondary_contact" class="validate" placeholder="0906*******" value="{{ $partners['secondary_contact'] }}" data-length="11">
	                                <label for="secondary_contact">Secondary Contact</label>
	                            </div>
	                            <div class="input-field col s4">
	                                <i class="material-icons prefix">cake</i>
	                                <input type="date" name="date_of_birth" id="date_of_birth" class="datepicker" value="{{ $partners['birthdate'] }}">
	                                <label for="date_of_birth">Date of Birth</label>
	                            </div>  

	                        </div> 
	                        <div class="row">
	                            <div class="input-field col s5">
	                                    <i class="material-icons prefix">mail_outline</i>
	                                    <input type="email" name="email" id="email" class="validate" class="validate" value="{{ $partners->email }}">
	                                    <label for="email">Email</label>
	                            </div>
	                            <div class="input-field col s5">
	                                    <i class="material-icons prefix">mail_outline</i>
	                                    <input type="email" name="secondary_email" id="secondary_email" class="validate" value="{{ $partners->secondary_email }}">
	                                    <label for="secondary_email">Secondary Email</label>
	                            </div>
	                            <div class="input-field col s2">
	                                <select type="text" id="is_active" name="is_active">
	                                  <option value="{{ $partners->is_active }}" >{{ $partners->is_active == 'Y' ? 'Active' : 'In Active' }}</option>
	                                  <option value="N" >In Active</option>
	                                  <option value="Y" >Active</option>
	                                </select>
	                                <label for="is_active">Is Active</label>
                            	</div>
                        	</div>
	                        <div class="row">
	                        	<button type="submit" class="waves-effect waves-light btn left">Submit<i class="material-icons right">send</i></button>
	                    	    <a href="{{ route('partner.index') }}" class="waves-effect waves-green btn-flat left" style="margin-left:5px"><i class="material-icons left">keyboard_arrow_left</i>Close</a>
	                    		{{ method_field('PUT') }}
	                    	</div>	

	              </form>
	</div>

@endsection
