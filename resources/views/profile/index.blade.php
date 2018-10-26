@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{Auth::user()->name}}</div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6 col-md-4">
                                <div class="card">
                                    <br>
                                    <h3>{{Auth::user()->name}}</h3>
                                    <p align="center">
                                        <img src="{{url('../')}}/public/img/{{Auth::user()->pic}}" width="120px" height="120px">
                                    </p>
                                    <div class="card-body">
                                        <p align="center"></p>
                                        <p align="center">
                                            <a href="{{url('/editProfile')}}" class="btn btn-primary">Edit Profile</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4">
                                <h4><span class="badge badge-secondary">About</span></h4>

                            </div>
                        </div>
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif




                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection