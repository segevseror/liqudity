@extends('layouts.app')

@section('content')
<div class=row>
    <div class="col-12">
        <h3><b>Create Employees</b></h3>
    </div>
    <div class="col-12">

        <form action="/employees/{{$id}}/create" method="POST">
            @csrf
            <div class="form-group">
                <input type="text" class="form-control @error('fname') is-invalid @enderror" name="fname" value="{{ old('fname') }}" placeholder="First Name">
            </div>
            <div class="form-group">
                <input type="text" class="form-control @error('lname') is-invalid @enderror" name="lname" value="{{ old('lname') }}" placeholder="Lest Name">
            </div>
            <div class="form-group">
                <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email">
            </div>
            <div class="form-group">
                <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" placeholder="Phone">
            </div>
            <!-- <div class="form-group ">
                <label for="exampleFormControlSelect1">Companies</label>
                <select class="form-control @error('company') is-invalid @enderror" name="company" id="exampleFormControlSelect1">
                    <option value="">Select Company</option>
                    @foreach($companies as $company)
                    <option value="{{$company->id}}">{{$company->name}}</option>
                    @endforeach
                </select>
            </div> -->
            <button type="submit" class="btn btn-outline-success">Create</button>
            <a href="/" class="btn btn-outline-danger">Cancle</a>
        </form>


    </div>
</div>
@endsection