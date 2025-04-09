<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <div style="text-align: center">
            <h2 class="mt-2"> Applied User List</h2>
        </div>
        @session('success')
            <div class="alert alert-danger alert-dismissible mt-1">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endsession
        <div>
            <h2><a class="btn btn-danger" href="logout">Logout</a></h2>
            <h2><a class="btn btn-primary" href="/jobFields">Add Job</a></h2>
        </div>
        <div>
            <h2><a class="btn btn-secondary" href="/">Jobs</a></h2>
        </div>
        @if ($status_code == 301)
        <div>
            <h5>NO, USER IS APPLIED! <strong><a href="/">APPLY NOW</a></strong></h5>
        </div>
        @else
        <div class="mt-2">
            @php
                $sno = 1;
            @endphp
            <table class="table" style="border: 1px solid black">
                <thead>
                    <tr>
                        <th>Sno</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mobile No</th>
                        <th>Position</th>
                        <th>Experience</th>
                        <th>Designation</th>
                        <th>Current CTC</th>
                        <th>Expected CTC</th>
                        <th>Notice Period</th>
                        <th>Status</th>
                        <th>Display</th>
                        <th>Resume</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($appliedData as $data)
                        <tr>
                            <td>{{ $sno }}</td>
                            <td>{{ $data['name'] }}</td>
                            <td>{{ $data['email'] }}</td>
                            <td>{{ $data['mobile_no'] }}</td>
                            <td>{{ $data['position_applied'] }}</td>
                            <td>{{ $data['experience'] }}</td>
                            <td>{{ $data['designation'] }}</td>
                            <td>{{ $data['current_ctc'] }}</td>
                            <td>{{ $data['expected_ctc'] }}</td>
                            <td>{{ $data['notice_period'] }}</td>
                            <td>
                                @php
                                $checked = $data['status'] == 'A' ? "checked" : '';
                            @endphp

                                <div class="form-check form-switch" >
                                    <input {{ $checked }} readonly class="form-check-input" type="checkbox" id="">
                                </div>
                            </td>
                            <td>
                                <embed src="{{ Storage::url('resumes/'.$data['resume']) }}" width="100px" height="100px" type="application/pdf">
                            </td>
                            <td>
                                <a class="btn btn-primary" href="/downloadresume/{{$data['resume']}}">Resume</a>
                            </td>                            
                            <td>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete">Delete</button>
                            </td>
                            <div class="modal fade" id="delete">
                                <div class="modal-dialog">
                                    <div class="modal-content">

                                        <div class="modal-header">
                                            <h4 class="modal-title">Delete</h4>
                                        </div>
                                        <div class="modal-body">
                                            <p>Are you Sure, You Want to Delete it ?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <a class="btn btn-danger" href="/status/D/user/{{$data['application_details_id']}}">Yes</a>
                                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">No</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </tr>
                        @php
                            $sno++;
                        @endphp
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif
    </div>
</body>
</html>