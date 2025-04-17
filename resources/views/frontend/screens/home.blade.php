@extends('frontend/layouts/app');
@section('title', 'Home Page');

@section('content')
    <h1 class="text-center">JOB DETAILS</h1>
    <div class="m-5">
        @session('success')
            <div class="alert alert-danger alert-dismissible mt-1">
                {!! session('success') !!}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endsession
        @if ($job->isEmpty())
            <div>
                <p>CURRENTLY, NO JOB IS FOUND!</p>
            </div>
        @else
            @foreach ($job as $item)
                <div class="card mt-3">

                    <div class="card-body">
                        <h3 class="card-title"> {{ strtoupper($item['title']) }} </h3>
                        <p class="card-text"> {{ $item['description'] }} </p>
                        <div class="d-flex justify-content-end">
                            <a href="/user/selectedJob/{{ $item['slug']}}/job/{{$item['id'] }}" class="btn btn-primary">Apply Now</a>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
        <div class="mt-4">
            {{ $job->links() }}
        </div>
    </div>
@endsection