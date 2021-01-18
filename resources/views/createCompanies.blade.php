@extends('layouts.app')

@section('content')
<div class=row>
    <div class="col-12">
        <h3><b>Create Company</b></h3>
    </div>
    <div class="col-12">
        @if($company)
        <form action="/companies/{{$company->id}}/update" method="POST">
            @csrf
            <div class="form-group">
                <input type="text" class="form-control @error('comapnyName') is-invalid @enderror" name="comapnyName" placeholder="Comapny Name" value="{{$company->name}}">
            </div>
            <div class="form-group">
                <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email" value="{{$company->email}}">
            </div>
            <div class="form-group">
                <input type="text" class="form-control @error('website') is-invalid @enderror" name="website" placeholder="Website" value="{{$company->website}}">
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-auto">
                        <label for="logoImg">Upload Logo</label>
                        <input type="file" class="form-control-file" name="logoImg">
                    </div>
                    <div class="col-6">
                        <img src="{{ Storage::url($company->logo) }}" class="img-fluid" width="50px">
                        <a href="delete">delete</a>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-outline-success">update</button>
            <a href="/" class="btn btn-outline-danger">Cancle</a>
        </form>
        @else
        <form action="/companies/create" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <input type="text" class="form-control @error('comapnyName') is-invalid @enderror" name="comapnyName" value="{{ old('comapnyName') }}" placeholder="Comapny Name">
            </div>
            <div class="form-group">
                <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email">
            </div>
            <div class="form-group">
                <input type="text" class="form-control @error('website') is-invalid @enderror" name="website" value="{{ old('website') }}" placeholder="Website">
            </div>
            <div class="form-group">
                <label for="logoImg">Upload Logo</label>
                <input type="file" class="form-control-file" name="logoImg">
            </div>
            <button type="submit" class="btn btn-outline-success">Create</button>
            <a href="/" class="btn btn-outline-danger">Cancle</a>
        </form>
        @endif
        @if ($errors->any())
        <div class="alert alert-danger mt-3">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif


    </div>
</div>

@endsection