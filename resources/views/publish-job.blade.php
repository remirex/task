@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @foreach($allJobs as $job)
                <div class="card mb-3">
                    <div class="card-header"> {{$job->title}}</div>
                    <div class="card-body">
                        <p>{{$job->description}}</p>
                    </div>
                    <div class="card-footer">
                        <p class="float-right">Posted By: <span class="font-weight-bold">{{$job->user->name}}</span></p>
                        <p class="float-left">Created At: <span class="font-weight-bold">{{$job->created_at}}</span></p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    @endsection
