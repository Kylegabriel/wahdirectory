<div class="modal fade" id="createSites" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h5 class="modal-title text-white" id="exampleModalLabel">Add New Sites Partner</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        {!! Form::open(['route' => 'sites.store','method' => 'POST']) !!}
                {{ csrf_field() }} 
						<div class="row">
                            <div class="col-md-3">
                                {{ Form::label('last_name','Last Name*') }}
                                {{ Form::text('last_name',null,['class'=>'form-control','id'=>'last_name']) }} 
                            </div>
                            <div class="col-md-3">
                                {{ Form::label('first_name','First Name*') }}
                                {{ Form::text('first_name',null,['class'=>'form-control','id'=>'first_name']) }} 
                            </div>
                            <div class="col-md-3">
                                {{ Form::label('middle_name','Middle Name*') }}
                                {{ Form::text('middle_name',null,['class'=>'form-control','id'=>'middle_name']) }} 
                            </div>
                            <div class="col-md-3">
								{{ Form::label('suffix_name', "Suffix Name") }}
								{{ Form::select('suffix_name', $suffix,'NOTAP', ['class' => 'form-control','id' => 'suffix_name','name' => 'suffix_name']) }}
                            </div>
                    </div>    

                    <div class="row">
                        <div class="col-md-3">
                            {{ Form::label('site','Site*') }}
                            <select type="text" id="site" name="site" class="form-control">
                                <option value="" disabled selected>Choose your option</option>
                                <option value="L">Luzon</option>
                                <option value="V">Visayas</option>
                                <option value="M">Mindanao</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            {{ Form::label('regions','Region*') }}
                            <select type="text" id="region" name="region" class="form-control">
                            </select>
                        </div>
                        <div class="col-md-3">
                            {{ Form::label('provinces','Province*') }}
                            <select type="text" id="province" name="province" class="form-control">
                            </select>
                        </div>
                        <div class="col-md-3">
                            {{ Form::label('municipalities','Municipality*') }}
                            <select type="text" id="municipality" name="municipality" class="form-control">
                            </select>
                        </div>
                    </div>
                     
                    <div class="row">
                        <div class="col-md-4">
                            {{ Form::label('primary_contact','Primary Contact*') }}
                            {{ Form::text('primary_contact',null,['class'=>'form-control','id'=>'primary_contact','data-length'=>'11','placeholder'=>'0930*******']) }} 
                        </div>
                        <div class="col-md-4">
                            {{ Form::label('secondary_contact','Secondary Contact*') }}
                            {{ Form::text('secondary_contact',null,['class'=>'form-control','id'=>'secondary_contact','data-length'=>'11','placeholder'=>'0906*******']) }} 
                        </div>
                        <div class="col-md-4">
                            {{ Form::label('sitDesignation','Designation*') }}
                            <select type="text" id="sitDesignation" name="sitDesignation" class="form-control">
                              <option value="" disabled selected>Choose your option</option>
                             @foreach($siteDesig as $siteDesig)
                              <option value="{{ $siteDesig['sites_code'] }}">{{ $siteDesig['sites_desc'] }}</option>  
                              @endforeach
                            </select>
                        </div>
                    </div> 

                    <div class="row">
                        <div class="col-md-4">
                            {{ Form::label('email','Email*') }}
                            {{ Form::email('email',null,['class'=>'form-control','id'=>'email']) }} 
                        </div>
                        <div class="col-md-4">
                            {{ Form::label('secondary_email','Secondary Email*') }}
                            {{ Form::email('secondary_email',null,['class'=>'form-control','id'=>'secondary_email']) }} 
                        </div> 
                        <div class="col-md-4">
                            {{ Form::label('date_of_birth','Date of Birth**') }}
                            <input type="date" name="date_of_birth" id="date_of_birth" class="form-control">
                        </div> 
                    </div>  
                    <div class="row">
                        <div class="col-md-4">
                            {{ Form::label('status','Status*') }}
                            <select type="text" id="status" name="status" class="form-control">
                                <option value="" disabled selected>Choose your option</option>
                                <option value="Y">Site Partner</option>
                                <option value="N">Warm Leads</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            {{ Form::label('is_active','Is Active*') }}
                            <select type="text" id="is_active" name="is_active" class="form-control">
                              <option value="" disabled selected>Choose your option</option>
                              <option value="Y" >Active</option>
                              <option value="N" >In Active</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            {{ Form::label('gender','Gender*') }}
                            <select type="text" id="gender" name="gender" class="form-control">
                                <option value="" disabled selected>Choose your option</option>
                                <option value="M">Male</option>
                                <option value="F">Female</option>
                            </select>
                        </div>
                    </div>       
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save</button>
            </div>
            {!! Form::close() !!}     
      </div>            
		</div>        
</div>