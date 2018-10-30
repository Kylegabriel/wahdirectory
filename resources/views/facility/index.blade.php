@extends('settings.index')
@section('settings') 

   <div class="row">
        <div class="col-md-8">
              <nav class="navbar navbar-expand-lg navbar-dark bg-primary rounded">
                  <a class="navbar-brand" href="">Facility Config</a>
                  @include('partials._headerNav')
                      </li>
                    </ul>
                  </div>
              </nav>
               <div class="card shadow border-0 border-primary">
                    @if(isset($facility))
                      {!! Form::model($facility, ['route' => ['facility.update', $facility->id], 'method' => 'PUT']) !!}
                    @else
                    {!! Form::open(['route' => 'facility.store','method' => 'POST']) !!}

                    @endif
                    <div class="card-body">
<!--                           <div class="row">
                              <div class="col-md-12">
                                  {{ Form::label('site', "Site") }}
                                  {{ Form::select('site', ['' => 'Choose you option','L' => 'Luzon','V' => 'Visayas','M' => 'Mindanao'],isset($facility->site) ? $facility->site : null, ['class' => 'form-control','id' => 'site','name' => 'site']) }}
                              </div>
                          </div> -->
                          <div class="row">    
                              <div class="col-md-12">
                                  {{ Form::label('region_code','Region') }}
                                  @if(isset($facility->region))
                                  <select type="text" id="region_code" name="region_code" class="form-control">
                                    <option value="{{ $facility->region['region_code'] }}">{{ $facility->region['region_name'] }}</option>
                                      @foreach($region as $ion)
                                        <option value="{{ $ion->region_code }}">{{ $ion->region_name }}</option>
                                      @endforeach
                                  </select>
                                  @else
                                  <select type="text" id="region_code" name="region_code" class="form-control">
                                    <option disabled selected>Choose your option</option>
                                    @foreach($region as $ion)
                                      <option value="{{ $ion->region_code }}">{{ $ion->region_name }}</option>
                                    @endforeach
                                  </select>
                                  @endif
                              </div>
                          </div>
                          <div class="row">    
                              <div class="col-md-12">
                                  {{ Form::label('province_code','Province') }}
                                  @if(isset($facility->province))
                                  {{ Form::select('province_code', $province,null, ['class' => 'form-control','id' => 'province_code','name' => 'province_code']) }}
                                  @else
                                  <select type="text" id="province_code" name="province_code" class="form-control">

                                  </select>
                                  @endif
                              </div>
                          </div>
                          <div class="row">    
                              <div class="col-md-12">
                                  {{ Form::label('muncity_code','Municipality') }}
                                  @if(isset($facility->municipality))
                                  {{ Form::select('muncity_code', $muncity,null, ['class' => 'form-control','id' => 'muncity_code','name' => 'muncity_code']) }}
                                  @else
                                  <select type="text" id="muncity_code" name="muncity_code" class="form-control">

                                  </select>
                                  @endif
                              </div>
                          </div>
                          <div class="row">    
                              <div class="col-md-12">
                                  {{ Form::label('brgy_code','Barangay') }}
                                  @if(isset($facility->barangay))
                                  {{ Form::select('brgy_code', $brgy,null, ['class' => 'form-control','id' => 'brgy_code','name' => 'brgy_code']) }}
                                  @else
                                  <select type="text" id="brgy_code" name="brgy_code" class="form-control">

                                  </select>
                                  @endif
                              </div>
                          </div>
                          <div class="row">    
                              <div class="col-md-12">
                                  {{ Form::label('hfhudcode','Facility Name') }}
                                  @if(isset($facility->hfhudcode))
                                  {{ Form::select('hfhudcode', $fac,null, ['class' => 'form-control','id' => 'hfhudcode','name' => 'hfhudcode']) }}
                                  @else
                                  <select type="text" id="hfhudcode" name="hfhudcode" class="form-control">

                                  </select>
                                  @endif
                              </div>
                          </div>
                      </div>
                      <div class="card-footer border-primary">
                          <button type="submit" class="btn btn-icon btn-3 btn-primary" type="button" id="save">
                              <span class="btn-inner--icon">
                                <i class="fa fa-save"></i>
                                @if(isset($facility))
                                Save Changes
                                @else
                                Save
                                @endif
                              </span>
                              <span class="btn-inner--text"></span>
                          </button>
                      </div> 
                </div>
        </div>
  {!! Form::close() !!}

@endsection
@section('scripts')        
    @include('partials._sitesScript')
    // <script>
    //     $("#save").click(function() {
    //       // alert('Hi');
    //         $.ajax({
    //           type: 'POST',
    //           headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
    //           url: "{{ route('facility.store') }}",
    //           data: {
    //             'region_code': $('input[name="region_code"]').val(),
    //             'province_code': $('input[name="province_code"]').val(),
    //             'muncity_code': $('input[name="muncity_code"]').val(),
    //             'brgy_code': $('input[name="brgy_code"]').val(),
    //             'hfhudcode': $('input[name="hfhudcode"]').val()
    //           },
    //           success: function(data) {
    //             console.log(data);
    //           },
    //         });
    //       });
    // </script>
@endsection
