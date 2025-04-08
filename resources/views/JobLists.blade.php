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
        <div class="mt-2">
            <h1 style="text-align: center">CAREER THAT FITS YOUR DREAMS</h1>
        </div>
        <div>
            @if (Auth::check())
                <h2><a class="btn btn-primary" style="margin-left:1000px;" href="/jobFields">Add Job</a></h2>
                <h2><a class="btn btn-primary" style="margin-left:1000px;" href="/applicationData">Applied User</a></h2>
            @else
                <a class="btn btn-primary" style="margin-left:1000px;" href="/loginForm">Login</a>
            @endif
        </div>
        @if (empty($jobData))
        <div class="mt-5">
            <h3>No Job Currently Not Available!</h3>
        </div>
        @else
            @session('success')
            <div class="alert alert-danger alert-dismissible mt-1">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
            @endsession
            <div class="mt-3">
                @foreach ($jobData as $data)
                <div class="card mt-3">
                    <div class="card-body">
                        <h3 class="card-title"> {{ $data['job_name'] }} </h3>
                        <p class="card-text"> {{ $data['job_des'] }} </p>
                        <a class="btn btn-primary" href="/jobDetails/selectedJob/{{$data['job_details_id']}}">Job Details</a>
                    </div>
                </div>
                @endforeach
            </div>
        @endif
    </div>
</body>
</html>