@extends('layouts.app')

@section('content')

<div class="col-12">
    <div class="row justify-content-center">
        <div class="col-6  text-center">
            <form action="login" method="POST">
                @csrf
                <div class="form-group">
                    <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email">
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password">
                </div>
                <div class="col-12 text-center text-danger">
                    {{ $errors->login->first('details') }}
                </div>
                <button type="submit" class="btn btn-primary">login</button>
            </form>
        </div>
    </div>
</div>

@endsection