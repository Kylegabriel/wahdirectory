	{{ csrf_field() }} 
	<div class="row">
		    <div class="input-field col s3">
                {{ Form::text('last_name',null,['class'=>'validate','id'=>'last_name','data-length'=>'20']) }} 
                {{ Form::label('last_name','Last Name') }}
		    </div>
		    <div class="input-field col s3">
		        {{ Form::text('first_name',null,['class'=>'validate','id'=>'first_name','data-length'=>'20']) }} 
                {{ Form::label('first_name','First Name') }}
		    </div>
		    <div class="input-field col s3">
		        {{ Form::text('middle_name',null,['class'=>'validate','id'=>'middle_name','data-length'=>'20']) }} 
                {{ Form::label('middle_name','Middle Name') }}
		    </div>
		    <div class="input-field col s3">
		        <select type="text" id="suffixName" name="suffixName" class="validate">
		          <option value="{{ isset($partners->partnerSuffix['suffix_code']) ? $partners->partnerSuffix['suffix_code'] : '' }}">{{ isset($partners->partnerSuffix['suffix_desc']) ? $partners->partnerSuffix['suffix_desc'] : '--Select--' }}</option>
		          @foreach( App\SuffixName::get() as $suffix )
		                <option value="{{ $suffix['suffix_code'] }}">{{ $suffix['suffix_desc'] }}</option>
		          @endforeach
		        </select>
		        {{ Form::label('suffixName','Suffix Name') }}
		    </div>
	</div>    

	<div class="row">
	    <div class="input-field col s4">
	        <i class="material-icons prefix">add_location</i>
	        <select type="text" id="partnerDesignation" name="partnerDesignation">
	          <option value="{{ isset($partners->partnerDesignation['designation_id']) ? $partners->partnerDesignation['designation_id'] : null }}">{{ isset($partners->partnerDesignation['designation']) ? $partners->partnerDesignation['designation'] : '--Select--' }}</option>
	          @foreach( App\PartnerDesignation::get() as $designation )
	                <option value="{{ $designation['designation_id'] }}">{{ $designation['designation'] }}</option>
	          @endforeach
	        </select>
	        {{ Form::label('partnerDesignation','Designation') }}

	    </div>
	    <div class="input-field col s4">
	        <i class="material-icons prefix">place</i>
	        <select type="text" id="partnerOrganization" name="partnerOrganization">
	         	  <option value="{{ isset($partners->partnerOrganization['organization_id']) ? $partners->partnerOrganization['organization_id'] : null }}">{{ isset($partners->partnerOrganization['organization']) ? $partners->partnerOrganization['organization'] : '--Select--' }}</option>
				  @foreach( App\PartnerOrganization::get() as $organization )
	                    <option value="{{ $organization['organization_id'] }}">{{ $organization['organization'] }}</option>
	              @endforeach
	        </select>
	        {{ Form::label('partnerOrganization','Organization') }}
	    </div>
	    <div class="input-field col s2">
	        <select type="text" id="gender" name="gender">
	        	<option value="{{ isset($partners->gender) ? $partners->gender : null }}">{{ isset($partners->gender) ? $partners->gender : '--Select--' }}</option>
	          	<option value="Male">Male</option>
	            <option value="Female">Female</option>
	        </select>
	        {{ Form::label('gender','Gender') }}
	    </div>
	    <div class="input-field col s2">
	        <select type="text" id="sites" name="sites">
	          <option value="{{ isset($partners->sites) ? $partners->sites : null }}">{{ isset($partners->sites) ? $partners->sites : '--Select--' }}</option>
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
	       	{{ Form::text('primary_contact',null,['class'=>'validate','id'=>'primary_contact','data-length'=>'11']) }} 
            {{ Form::label('primary_contact','Primary Contact') }}
	    </div>
	    <div class="input-field col s4">
	        <i class="material-icons prefix">local_phone</i>
	       	{{ Form::text('secondary_contact',null,['class'=>'validate','id'=>'secondary_contact','data-length'=>'11']) }} 
            {{ Form::label('secondary_contact','Secondary Contact') }}
	    </div>
	    <div class="input-field col s4">
	        <i class="material-icons prefix">cake</i>
	        <input type="date" name="date_of_birth" id="date_of_birth" class="datepicker" value="{{ isset($partners['birthdate']) ? $partners['birthdate'] : null }}">
	        <label for="date_of_birth">Date of Birth</label>
	    </div>  
	</div> 

	<div class="row">
	    <div class="input-field col s4">
            <i class="material-icons prefix">mail</i>
            {{ Form::email('email',null,['class'=>'validate','id'=>'email']) }} 
       		{{ Form::label('email','Email') }}
	    </div>
	    <div class="input-field col s4">
            <i class="material-icons prefix">mail_outline</i>
            {{ Form::email('secondary_email',null,['class'=>'validate','id'=>'secondary_email']) }} 
       		{{ Form::label('secondary_email','Secondary Email') }}
	    </div>
	    <div class="input-field col s2">
	        <select type="text" id="is_active" name="is_active">
	          <option value="{{ isset($partners->is_active) ? $partners->is_active : null }}" >{{ isset($partners->is_active) ? $partners->is_active : '--Select--' }}</option>
	          <option value="N" >In Active</option>
	          <option value="Y" >Active</option>
	        </select>
	        <label for="is_active">Is Active</label>
		</div>
		<div class="input-field col s2">
	        <select type="text" id="status" name="status">
	          <option value="{{ isset($partners->status) ? $partners->status : null  }}">{{ isset($partners->status) ? $partners->status : '--Select--'  }}</option>
	          <option value="Warm Lead">Warm Leads</option>
	          <option value="Partner">Partner</option>
	        </select>
	        <label for="status">Status</label>
		</div>
	</div>