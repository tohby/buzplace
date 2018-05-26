<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="createPostTitle">Edit Profile</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
        </div>
      <div class="modal-body">
        <form method="POST" enctype="multipart/form-data" action="{{action("ProfilesController@update", "$profile->id")}}"> @csrf {{-- COMPANY NAME --}}
          <div class="form-group row">
            <label for="title" class="col-md-2 col-form-label text-md-left">Company Name:</label>
            <div class="col-md-10">
              <input id="compName" type="text" value="{{$profile->companyName}}" class="form-control{{ $errors->has('compName') ? ' is-invalid' : '' }}"
                name="compName" value="{{ old('compName') }}" required autofocus> @if ($errors->has('compName'))
              <span class="invalid-feedback">
                <strong>{{ $errors->first('compName') }}</strong>
            </span>@endif
            </div>
          </div>

            {{-- LOCATION --}}
            <div class="form-group row">
              <label for="title" class="col-md-2 col-form-label text-md-left">Location:</label>
              <div class="col-md-10">
                <input id="location" type="text" value="{{$profile->location}}" class="form-control{{ $errors->has('location') ? ' is-invalid' : '' }}"
                  name="location" value="{{ old('location') }}" required autofocus> @if ($errors->has('location'))
                <span class="invalid-feedback">
                  <strong>{{ $errors->first('location') }}</strong>
              </span>@endif
              </div>
            </div>

            {{-- DESCRIPTION --}}
            <div class="form-group row">
              <label for="title" class="col-md-2 col-form-label text-md-left">Description:</label>
              <div class="col-md-10">
                <textarea rows="5" id="description" type="text" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}"
                  name="description" value="{{ old('description') }}" required autofocus>{{$profile->description}}</textarea>  @if ($errors->has('description'))
                <span class="invalid-feedback">
                <strong>{{ $errors->first('description') }}</strong> 
            </span> @endif
              </div>
            </div>

            {{--PROFILE IMAGE --}}
            <div class="form-group row">
              <label for="title" class="col-md-2 col-form-label text-md-left">Profile Image:</label>
              <div class="col-md-10">
                <input id="img" name="img" type="file" accept="image/*">
              </div>
            </div>
            <input type="hidden" name="_method" value="put" />
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn" style="background-color:#373f51; color:aliceblue;"> Update Post</button>
            </div>
        </form>
        </div>
      </div>
    </div>
  </div>