@extends('frontend/layouts/app');
@section('title', 'Track Application Page');
@section('content')
    <div class="container">
        <div class="text-center"><h1>MY APPLICATIONS</h1></div>
        
        @if ($data->isEmpty())
            <p>No, Application Is Found!</p>
        @else
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Sno</th>
                            <th>name</th>
                            <th>email</th>
                            <th>Job Name</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        <div class="mt-4">
                            @foreach ($data as $item)
                                <tr>
                                    <td>{{ $no }}</td>
                                    <td>{{ $item['name'] }}</td>
                                    <td>{{ $item['email'] }}</td>
                                    <td>{{ $item['careerJob']->title ?? '' }}</td>
                                    <td> <a class="btn btn-primary" href="">{{ $item['status'] }}</a></td>
                                </tr>
                                @php
                                    $no++;
                                @endphp
                            @endforeach
                        </div>
                    </tbody>
                </table>
            </div>
        @endif
    </div>
@endsection