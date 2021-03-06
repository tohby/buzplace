@extends('layouts/app') 
@section('content')
        <div class="container">
                <hr>
            <div class="row">
                @if(count($profile) > 0)
                    <div class="col-sm-4">
                        <div class="card" style="max-width: 300px;">
                            <img src="/images/{{$profile->profileImg}}" alt="John" style="width:100%">
                            <div class="card-body">
                                   <h3> {{$profile->user->name}}</h3>
                                    <p>Location: {{$profile->location}}</p>
                            </div>
                        </div>
                    </div>
                <div class="col-sm-8">
                    <div class="card text-white bg-dark mb-3">
                        <div class="card-header">Company Name: <strong>{{$profile->companyName}}</strong></div>
                        <div class="card-body">
                          <h5 class="card-title">Description</h5>
                          <p class="card-text">{{$profile->description}}</p>
                        </div>
                      </div>
                </div>
                @endif
            </div>
        </div>
@endsection