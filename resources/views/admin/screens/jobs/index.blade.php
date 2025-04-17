@extends('admin.layouts.app')
@section('title', 'Admin Dashboard')
<div class="text-center">
    <h1>Welcome To Admin Dashboard</h1>
</div>
@section('content')
    <div class="container">
        @session('success')
            <div class="alert alert-danger alert-dismissible mt-1">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endsession
        <div>
            @if ($job->isEmpty())
            <div>
                <p class="mt-2 ms-5 h3">Currently, No job Is Available...! <strong><a class="btn btn-primary p-1 mb-2" href="/admin/addJobForm">ADD JOB</a></strong></p>
            </div>
            @else
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Sno</th>
                                <th>Job Name</th>
                                <th>Description</th>
                                <th>Qualification</th>
                                <th>Type</th>
                                <th>Vacancy</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no=1;
                            @endphp
                            @foreach ($job as $item)
                                <tr>
                                    <td>{{ $no }}</td>
                                    <td>{{ $item['title'] }}</td>
                                    <td>{{ $item['description'] }}</td>
                                    <td>{{ $item['qualification'] }}</td>
                                    <td>{{ $item['type'] }}</td>
                                    <td>{{ $item['vacancy'] }}</td>
                                    <td>
                                        <a href="/admin/edit/{{ $item['id'] }}" class="btn btn-primary m-1">Edit</a>
                                        <a href="/admin/closeJob/{{ $item['id'] }}" class="btn btn-danger">Delete</a>
                                    </td>

                                </tr>
                            @php
                                $no++;
                            @endphp
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mt-4">
                        {{ $job->links() }}
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection