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
            <h1 style="text-align: center">JOB DETAILS</h1>
        </div>
        <div class="border border-5" style="margin-left: 350px;margin-right: 350px;margin-top: 50px">
            <form class="p-3" action="jobDetails/store" method="POST">
                @session('success')
                <div class="alert alert-danger alert-dismissible mt-1">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div> 
                @endsession
                @session('logout')
                    <div class="alert alert-danger alert-dismissible mt-1">
                        {{ session('logout') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endsession
                @csrf
                <div class="form-group mt-2">
                    <label class="form-label" style="font-weight: bold" for="job_name">Job Name</label>
                    <input class="form-control" type="text" name="job_name" id="job_name" value="{{ old('job_name')}}">
                    @error('job_name')
                        <div class="mt-2" style="color: red">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mt-2">
                    <label class="form-label" style="font-weight: bold" for="job_des">JOB DESCRIPTION</label>
                    <input class="form-control" type="text" name="job_des" id="job_des" value="{{ old('job_des')}}">
                    @error('job_des')
                        <div class="mt-2" style="color: red">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mt-2">
                    <label class="form-label" style="font-weight: bold" for="job_requirements">CANDIDATE REQUIREMENTS</label>
                    <input class="form-control" type="text" name="job_requirements" id="job_requirements" value="{{ old('job_requirements')}}">
                    @error('job_requirements')
                        <div class="mt-2" style="color: red">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mt-2">
                    <label class="form-label" style="font-weight: bold" for="exp_from_cand">Expect From Candidate</label>
                    <input class="form-control" type="text" name="exp_from_cand" id="exp_from_cand" value="{{ old('exp_from_cand')}}">
                    @error('exp_from_cand')
                        <div class="mt-2" style="color: red">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <label class="form-label" for="tags">Select Tags:</label>
                    <select class="form-control" name="tags[]" id="tags" multiple="multiple" size="5">
                        <option value="tag1">Tag 1</option>
                        <option value="tag2">Tag 2</option>
                        <option value="tag3">Tag 3</option>
                        <option value="tag4">Tag 4</option>
                        <option value="tag5">Tag 5</option>
                    </select>            
                </div>
                <div class="form-group mt-2">
                    <label class="form-label" style="font-weight: bold" for="skills">Key Skills</label>
                    <input class="form-control" type="text" name="skills" id="skills" value="{{ old('skills')}}">
                    @error('skills')
                        <div class="mt-2" style="color: red">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mt-2">
                    <label class="form-label" style="font-weight: bold" for="qualification">Educational Qualification</label>
                    <input class="form-control" type="text" name="qualification" id="qualification" value="{{ old('qualification')}}">
                    @error('qualification')
                        <div class="mt-2" style="color: red">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mt-2">
                    <label class="form-label" style="font-weight: bold" for="vacancy">NUMBER OF POSITIONS</label>
                    <input class="form-control" type="text" name="vacancy" id="vacancy" value="{{ old('vacancy')}}">
                    @error('vacancy')
                        <div class="mt-2" style="color: red">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mt-2 mb-2">
                    <button class="btn btn-primary">Submit</button>
                    {{-- <a class="btn btn-primary" href="/register">Register</a> --}}
                </div>
            </form>
        </div>
    </div>
</body>
</html>