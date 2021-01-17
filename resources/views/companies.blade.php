@extends('layouts.app')

@section('content')

<div class=row>
    <div class="col-12">
        <div class="card">
            <h5 class="card-header">Companies</h5>
            <div class="card-body">
                <div class="col-12">
                    <a href="companies/create" class="btn btn-primary">Create New Comapny</a>
                </div>
                <div class="col-12 card mt-3">
                    <h5 class="card-header">Companies</h5>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Website</th>
                                    <th scope="col">Otiopns</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach( $companies as $company )
                                <tr>
                                    <td class="text-center"><img src="{{ Storage::url($company->logo) }}" class="img-fluid" width="50px"></td>
                                    <td>{{$company->name}}</td>
                                    <td>{{$company->email}}</td>
                                    <td>{{$company->website}}</td>
                                    <td>
                                        <a href="/companies/{{$company->id}}/delete" class="btn btn-danger">del</a>
                                        <a href="/companies/{{$company->id}}/update" class="btn btn-primary">edit</a>
                                        <a href="/companies/{{$company->id}}" class="btn btn-primary">show</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection