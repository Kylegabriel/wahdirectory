<!-- Modal Structure -->
  <div id="wahngoModal" class="modal">
    <div class="modal-content" style="padding:0px">
      <div class="row">
            <div class="col s12">
                    <form method="POST" action="{{ route('profile.store') }}" class="formValidate">
                        {{ csrf_field() }}

                    <div class="card">    
                        <h4><div class="card blue" style="padding:10px"><i class="material-icons small">add</i>WAH NGO</div></h4>                
                        <div class="row">
                            <div class="input-field col s3">
                                <i class="material-icons prefix">person_pin</i>
                                <input type="text" name="last_name" id="last_name" class="validate" data-length="20"> 
                                <label for="last_name">Last Name</label>
                            </div>
                            
                            <div class="input-field col s3">
                                <input type="text" name="first_name" id="first_name" class="validate" data-length="20">
                                <label for="first_name">First Name</label>
                            </div>
                            <div class="input-field col s3">
                                <input type="text" name="middle_name" id="middle_name" class="validate" data-length="20">
                                <label for="middle_name">Middle Name</label>
                            </div>
                            <div class="input-field col s3">
                                <select type="text" id="suffix_name" name="suffix_name">
                                      <option value="NOTAP">N/A</option>
                                      @foreach( App\SuffixName::get() as $suffix )
                                      <option value="{{ $suffix['suffix_code'] }}">{{ $suffix['suffix_desc'] }}</option>
                                      @endforeach
                                </select>
                                <label for="suffix_name">Suffix Name</label>
                            </div>
                        </div>    
                        
                        <div class="row">
                            <div class="input-field col s8">
                                <i class="material-icons prefix">add_location</i>
                                <select type="text" id="designation" name="designation">
                                  <option value="" disabled selected>Choose your option</option>
                                  @foreach( App\UserRole::get() as $role)
                                  <option value="{{ $role['role_id'] }}">{{ $role['role_name'] }}</option>
                                  @endforeach
                                </select>
                                <label for="designation">Designation</label>
                            </div>
                            <div class="input-field col s4">
                                <select type="text" id="gender" name="gender">
                                  <option value="" disabled selected>Choose your option</option>
                                  <option value="M">Male</option>
                                  <option value="F">Female</option>
                                </select>
                                <label for="gender">Gender</label>
                            </div>
                        </div>
                         
                        <div class="row">
                            <div class="input-field col s4">
                                <i class="material-icons prefix">mail</i>
                                <input type="email" name="email" id="email" class="validate">
                                <label for="email">Email</label>
                            </div>
                            <div class="input-field col s4">
                                <i class="material-icons prefix">perm_contact_calendar</i>
                                <input type="date" name="date_of_hired" id="date_of_hired" class="datepicker">
                                <label for="date_of_hired">Date Of Hired</label>
                            </div>
                            <div class="input-field col s4">
                                <i class="material-icons prefix">perm_contact_calendar</i>
                                <input type="date" name="date_of_birth" id="date_of_birth" class="datepicker">
                                <label for="date_of_birth">Date of Birth</label>
                            </div>  
                        </div>
                        <div class="row">
                            <div class="input-field col s4">
                                <i class="material-icons prefix">mail_outline</i>
                                <input type="email" name="secondary_email" id="secondary_email" class="validate">
                                <label for="secondary_email">Secondary Email</label>
                            </div>
                            <div class="input-field col s4">
                                <i class="material-icons prefix">contact_phone</i>
                                <input type="text" name="primary_contact" id="primary_contact" class="validate" data-length="11">
                                <label for="primary_contact">Primary Contact</label>
                            </div>
                            <div class="input-field col s4">
                                <i class="material-icons prefix">local_phone</i>
                                <input type="text" name="secondary_contact" id="secondary_contact" class="validate" data-length="11">
                                <label for="secondary_contact">Secondary Contact</label>
                            </div>
                        </div>
                    </div>   
                    <div class="modal-footer">
                            <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat right">Close</a>
                            <button type="submit" class="waves-effect waves-light btn">Submit<i class="material-icons right">send</i></button>
                    </div>
                  </form>
            </div>
          </div>
    </div>
  </div>