
@extends('admin.layouts.app')
@section('title', 'Applied Jobs')
@section('content')
<section class="container">
    @session('success')
        <div class="alert alert-danger alert-dismissible mt-1">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endsession
    @if ($job->isEmpty())
        <p class="text-center"> NO ONE IS APPLIED..!</p>
    @else
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>S No</th>
                        <th>NAME</th>
                        <th>EMAIL</th>
                        <th>JOB NAME</th>
                        <th>CURRENT CTC</th>
                        <th>EXPECTED CTC</th>
                        <th>NOTICE PERIOD</th>
                        <th>STATUS</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($job as $item)
                        <tr>
                            <td> {{ $item['id'] }} </td>
                            <td> {{ $item['name'] }} </td>
                            <td> {{ $item['email'] }} </td>
                            <td>{{ $item['careerJob']->title ?? '' }}</td>
                            <td> {{ $item['current_ctc'] }} </td>
                            <td> {{ $item['expected_ctc'] }} </td>
                            <td> {{ $item['notice_period'] }} </td>
                            <td> {{ $item['status'] }} </td>
                            <td>
                                <a href="/admin/showJob/{{ $item['id'] }}" class="btn btn-warning">Show</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-2">
                {{ $job->links() }}
            </div>
        </div>
    @endif
</section>
@endsection