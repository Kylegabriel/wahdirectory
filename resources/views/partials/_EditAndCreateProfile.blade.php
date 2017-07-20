                        {{ csrf_field() }}
                        <div class="row">
                            <div class="input-field col s3">
                                <i class="material-icons prefix">person_pin</i>
                                <input type="text" name="last_name" id="last_name" class="validate" value="{{ isset($users->last_name) ? $users->last_name : null }}" data-length="20">
                                <label for="last_name">Last Name</label>
                            </div>
                            <div class="input-field col s3">
                                <input type="text" name="first_name" id="first_name" class="validate" value="{{ isset($users->first_name) ? $users->first_name : null  }}" data-length="20">
                                <label for="first_name">First Name</label>
                            </div>
                            <div class="input-field col s3">
                                <input type="text" name="middle_name" id="middle_name" class="validate" value="{{ isset($users->middle_name) ? $users->middle_name : null }}" data-length="20">
                                <label for="middle_name">Middle Name</label>
                            </div>
                            <div class="input-field col s3">
                                <select type="text" id="suffix_name" name="suffix_name">
                                  <option value="{{ isset($users->suffix['suffix_code']) ? $users->suffix['suffix_code'] : 'NOTAP' }}">{{ isset($users->suffix['suffix_desc']) ? $users->suffix['suffix_desc'] : 'N/A' }}</option>
                                  @foreach( App\SuffixName::get() as $suffix)
                                    <option value="{{ $suffix['suffix_code'] }}">{{ $suffix['suffix_desc'] }}</option>
                                  @endforeach
                                </select>
                                <label for="suffix_name">Suffix Name</label>
                            </div>
                        </div>    
                        <div class="row">
                            <div class="input-field col s6">
                                    <i class="material-icons prefix">add_location</i>
                                    <select type="text" id="designation" name="designation">
                                      <option value="{{ isset($users->designations['role_id']) ? $users->designations['role_id'] : null }}">{{ isset($users->designations['role_name']) ? $users->designations['role_name'] : null }}</option>
                                        @foreach(App\UserRole::get() as $role)
                                            <option value="{{ $role['role_id'] }}">{{ $role['role_name'] }}</option>
                                        @endforeach
                                    </select>
                                    <label for="designation">Designation</label>
                             </div>
                            <div class="input-field col s3">
                                <select type="text" id="gender" name="gender">
                                  <option value="{{ isset($users->gender) ? $users->gender : null }}">{{ isset($users->gender) ? $users->gender : null }}</option>
                                  <option value="M">Male</option>
                               	  <option value="F">Female</option>
                                </select>
                            <label for="gender">Gender</label>
                        	</div>
                            <div class="input-field col s3">
                                <select type="text" id="sites" name="sites">
                                  <option value="{{ isset($users->sites) ? $users->sites : null }}">{{ isset($users->sites) ? $users->sites : null }}</option>
                                  <option value="L">Luzon</option>
                                  <option value="V">Visayas</option>
                                  <option value="M">Mindanao</option>
                                </select>
                                <label for="sites">Sites</label>
                            </div>
                    	</div>
                        <div class="row">
                        	<div class="input-field col s4">
                                    <i class="material-icons prefix">mail</i>
                                    <input type="email" name="email" id="email" class="validate" value="{{ isset($users->email) ? $users->email : null  }}">
                                    <label for="email">Email</label>
                            </div>
                            <div class="input-field col s4">
                                <i class="material-icons prefix">perm_contact_calendar</i>
                                <input type="date" name="date_of_hired" id="date_of_hired" class="datepicker" value="{{ isset($users->birthdate) ? $users->birthdate : null }}">
                                <label for="date_of_hired">Date Of Hired</label>
                            </div>
                            <div class="input-field col s4">
                                <i class="material-icons prefix">perm_contact_calendar</i>
                                <input type="date" name="date_of_birth" id="date_of_birth" class="datepicker" value="{{ isset($users->datehired) ? $users->datehired : null }}">
                                <label for="date_of_birth">Date of Birth</label>
                            </div>  
                        </div>
                        <div class="row">
                            <div class="input-field col s4">
                                    <i class="material-icons prefix">mail_outline</i>
                                    <input type="email" name="secondary_email" id="secondary_email" class="validate" value="{{ isset($users->secondary_email) ? $users->secondary_email : null }}">
                                    <label for="secondary_email">Secondary Email</label>
                            </div>
                            <div class="input-field col s3">
                            	<i class="material-icons prefix">contact_phone</i>
                                <input type="text" name="primary_contact" id="primary_contact" class="validate" placeholder="0906*******" value="{{ isset($users->primary_contact) ? $users->primary_contact : null }}" data-length="11">
                                <label for="primary_contact">Primary Contact</label>
                            </div>
                            <div class="input-field col s3">
                            	<i class="material-icons prefix">local_phone</i>
                                <input type="text" name="secondary_contact" id="secondary_contact" class="validate" placeholder="0930*******" value="{{ isset($users->secondary_contact) ? $users->secondary_contact : null }}" data-length="11">
                                <label for="secondary_contact">Secondary Contact</label>
                            </div>
                            <div class="input-field col s2">
                                <select type="text" id="is_active" name="is_active">
                                  <option value="{{ isset($users->is_active) ? $users->is_active : null  }}" >{{ isset($users->is_active) ? $users->is_active : null }}</option>
                                  <option value="N" >In Active</option>
                                  <option value="Y" >Active</option>
                                </select>
                                <label for="is_active">Is Active</label>
                             </div>
                        </div>