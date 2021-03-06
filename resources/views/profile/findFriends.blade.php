@extends('profile.master')

@section('content')

<div class="container">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{url('/profile')}}/{{Auth::user()->slug}}">Profile</a></li>
            <li class="breadcrumb-item"><a href="">Find Friends</a></li>
        </ol>
    </nav>

    <div class="row justify-content-center">

        @include('profile.sidebar')

        <div class="col-md-9">
            <div class="card">
                <div class="card-header">{{Auth::user()->name}}</div>

                <div class="card-body">
                    @foreach($allUsers as $uList)

                    <div class="row">
                        <div class="col-md-2">
                            <p align="center"><img src="{{url('../')}}/public/img/{{$uList->pic}}"
                                                    width="100px" height="100px" class="rounded-circle"/></p>

                        </div>

                        <div class="col-md-7">

                            <h3><a href="{{url('/profile')}}/{{$uList->slug}}">
                                    {{ucwords($uList->name)}}</a></h3>
                            <p><i class="fas fa-globe-americas"></i> {{$uList->city}}  - {{$uList->country}}</p>
                            <p>{{$uList->about}}</p>
                        </div>

                        <div class="col-md-3">

                            <?php
                            $check = DB::table('friendships')
                                ->where('user_requested', '=', $uList->id)
                                ->where('requester', '=', Auth::user()->id)
                                ->first();
                            if($check ==''){
                                ?>
                                <br>
                                <p align="center">
                                    <a href="{{url('/')}}/addFriend/{{$uList->id}}"
                                       class="btn btn-primary">Add to Friend</a>
                                </p>
                            <?php } else {?>
                                <br>
                                <p align="center">
                                    <button type="button" class="btn btn-primary" disabled>Request Sent</button>
                                </p>
                            <?php }?>
                        </div>

                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
