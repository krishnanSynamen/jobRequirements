@extends('admin.layouts.app')
@section('title', 'Show User')

@section('content')
    <div class="container">
        <div>
            <h1 class="text-center">User Details</h1>
        </div>
        <div>
            <label for="">Name</label>
            <div>
                <p class="ms-5">{{ $user['name'] }}</p>
            </div>
        </div>
        <div>
            <label for="">Email</label>
            <div>
                <p class="ms-5">{{ $user['email'] }}</p>
            </div>
        </div>
        <div>
            <label for="">JobName</label>
            <div>
                <p class="ms-5">{{ $user['careerjob']->title ?? '' }}</p>
            </div>
        </div>
        <div>
            <label for="">Current Ctc</label>
            <div>
                <p class="ms-5">{{ $user['current_ctc'] }}</p>
            </div>
        </div>
        <div>
            <label for="">Expected Ctc</label>
            <div>
                <p class="ms-5">{{ $user['expected_ctc'] }}</p>
            </div>
        </div>
        <div>
            <label for="">Current Status</label>
            <p class="ms-5">{{ $user['status'] }}</p>
        </div>
        <div>
            <label for="">Update Status</label>
            <div>
                <form action="/admin/changeStatus/{{$user['id']}}">
                    <select class="form-select mt-2" name="status" id="">
                        <option value="New"><a href="/">New</a></option>
                        <option value="Under Review">Under Review</option>
                        <option value="Selected">Selected</option>
                        <option value="Rejected">Rejected</option>
                    </select>
                    <button class="btn btn-primary mt-2 ">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
