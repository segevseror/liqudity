@extends('layouts.app')

@section('content')
<div class=row>
    <div class="col-12">
        <div class="card">
            <h5 class="card-header">Comapny {{$company->name}}</h5>
            <div class="card-body">
                <div class="col-12">
                    <div class="row">
                        <div class="col-6">
                            <a href="../employees/{{$id}}/create" class="btn btn-primary">Create New Employees</a>
                        </div>
                        <div class="col-6 text-right">
                            <a href="/" class="btn btn-dark" title="back">></a>
                        </div>
                    </div>
                </div>
                <div class="col-12 card mt-3">
                    <h5 class="card-header">Employees</h5>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">First Name</th>
                                    <th scope="col">Last Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">phone</th>
                                    <th scope="col">Otiopns</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($employees->count())
                                @foreach( $employees as $user )
                                <tr>
                                    <td>{{$user->fname}}</td>
                                    <td>{{$user->lname}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->phone}}</td>
                                    <td>
                                        <a href="/employees/{{$user->id}}/delete" class="btn btn-danger">del</a>
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="5" class="text-center alert alert-warning">
                                        <b>no found employees</b>
                                    </td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection