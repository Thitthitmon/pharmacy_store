@extends('layouts.frontend')

@section('content')
   <br>
    <div class="container">
    <form action="{{ route('update') }}" method="post">
        @csrf
        <input type="hidden" name="id" value="{{ $user->id }}">
        
        <div class="form-group row">
            <label for="inputPassword3" class="col-sm-2 col-sm-offset-2 col-form-label">Name</label>
            <div class="col-sm-8 ">
                <input type="text" class="form-control" id="inputPassword3" name="name" value="{{ $user->name }}">
            </div>
        </div>
         <div class="form-group row">
            <label for="inputPassword3" class="col-sm-2 col-sm-offset-2 col-form-label">Address</label>
            <div class="col-sm-8 ">
                <input type="text" class="form-control" id="inputPassword3" name="address" value="{{ $user->address }}">
            </div>
        </div>
         <div class="form-group row">
            <label for="inputPassword3" class="col-sm-2 col-sm-offset-2 col-form-label">Phone Number</label>
            <div class="col-sm-8 ">
                <input type="text" class="form-control" id="inputPassword3" name="phone" value="{{ $user->phone }}">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-8 col-sm-offset-2">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
    </form>
    </div>
@endsection




