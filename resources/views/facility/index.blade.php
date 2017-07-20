@extends('layouts.app')

@section('content')
    <br>
    	<div class="card">
           <!-- <div class="row">
                    <div class="input-field col s12">
                        <select type="text" id="region_code" name="region_code">
                          <option value="" disabled selected>Choose your option</option>
                              @foreach(App\DemographicRegion::get() as $region)
                                <option value="{{ $region->region_code }}">{{ $region->region_name }}</option>
                              @endforeach
                        </select>
                        <label for="region_code">Region</label>
                    </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <select type="text" id="province_code" name="province_code">
                      <option value="" disabled selected>Choose your option</option>

                    </select>
                    <label for="province_code">Province</label>
                </div>
            </div> 
            

              <br>
            <form class="right" role="search" method="GET" action="{{ route('sites.index') }}">
                <input type="text" name="first_name" id="first_name" class="form-control" placeholder="Search">
                <button class="btn " type="submit">Search</button>
          </form>
          -->
          @foreach($try as $try)
              {{ $try->first_name }}
          @endforeach
        </div>
@endsection
@section('scripts')
    <script>
          $(document).ready(function() {
            $('select').material_select();
          });
    </script>
@endsection
