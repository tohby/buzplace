@extends('layouts.master') 
@section('content')
<div class="container-fluid">
    <a href="/directories/create" class="btn btn-outline-primary"><i class="fas fa-plus"></i> Add new directory</a> @if(count($directories)
    > 0) @foreach($directories as $directory)
    <div class="row">
        <div class="col-sm-10">
            <div class="card m-3">
                <div class="card-body">
                    <h5 class="card-title">{{$directory->name}}</h5>
                    <p class="card-text">
                        {{$directory->details}}
                    </p>
                    <small class="float-right">
                        {{$directory->location}}
                    </small>
                </div>
            </div>
        </div>
        <div class="col-sm-2 mt-5">
            <div class="float-right">
                <a href="/directories/{{$directory->id}}/edit" class="btn btn-primary"><i class="fas fa-edit"></i> Edit</a>
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCenter">
                        <i class="fas fa-trash"></i> Delete
                    </button>
    @include('directory.delete')
            </div>
        </div>
    </div>
    @endforeach @endif
@endsection