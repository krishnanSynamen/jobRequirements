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
        @session('success')
            <div class="alert alert-danger alert-dismissible mt-1">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endsession
        @php
            // print_r($selectedJob);exit;
        @endphp
        <div class="mt-3">
            <h2 style="text-align: center">{{ $selectedJob['job_name'] }}</h2>
            <div class="mt-2">
                <h5>JOB DESCRIPTION</h5>
                <div class="data">
                    {{ $selectedJob['job_des'] }}
                </div>
            </div>
            <div class="mt-3">
                <h5>IDEAL CANDIDATE REQUIREMENTS</h5>
                <div class="data">
                    {{ $selectedJob['job_requirements'] }}
                </div>
            </div>
            <div class="mt-3">
                <h5>EXPECTATIONS FROM THE CANDIDATE</h5>
                <div class="data">
                    {{ $selectedJob['exp_from_cand'] }}
                </div>
            </div>
            <div class="mt-3">
                <h5>KEY SKILLS</h5>
                <div class="data">
                    {{ $selectedJob['skills'] }}
                </div>
            </div>
            <div class="mt-3">
                <h5>EDUCATIONAL QUALIFICATION</h5>
                <div class="data">
                    {{ $selectedJob['qualification'] }}
                </div>
            </div>
            <div class="mt-3">
                <h5>NUMBER OF POSITIONS</h5>
                <div class="data">
                    {{ $selectedJob['vacancy'] }}
                </div>
            </div>
        </div>
        <div class="mt-2">
            <h3 style="text-align: center">APPLICATION FORM</h3>
        </div>
        <div class="m-5 border border-5">
            <form class="p-3" action="/store" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group mt-2">
                    <label class="form-label" style="font-weight: bold" for="name">Name </label>
                    <input class="form-control" type="text" name="name" id="name" value="{{ old('name')}}">
                    @error('name')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mt-2">
                    <label class="form-label" style="font-weight: bold" for="email">Email </label>
                    <input class="form-control" type="text" name="email" id="email" value="{{ old('email')}}">
                    @error('email')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mt-2">
                    <label class="form-label" style="font-weight: bold" for="mobile_no">Mobile No </label>
                    <input class="form-control" type="text" name="mobile_no" id="mobile_no" value="{{ old('mobile_no')}}">
                    @error('mobile_no')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mt-2">
                    <label class="form-label" style="font-weight: bold" for="position_applied">Position Applied</label>
                    <input class="form-control" type="text" name="position_applied" id="position_applied" value="{{ old('position_applied', $selectedJob['job_name']) }}" readonly>
                    @error('position_applied')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mt-2">
                    <label class="form-label" style="font-weight: bold" for="experience">Experience </label>
                    <select class="form-control" name="experience" id="experience" value="{{old('experience')}}">
                        <option value="">...select...</option>
                        <option value="fresher" {{ old('experience') == 'fresher' ? 'selected' : ''}}>Fresher</option>
                        <option value="experience" {{ old('experience') == 'experience' ? 'selected' : ''}}>Experience</option>
                    </select>

                    @error('experience')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mt-2">
                    <label class="form-label" style="font-weight: bold" for="designation">Current Designation</label>
                    <input class="form-control" type="text" name="designation" id="designation" value="{{ old('designation')}}">
                    @error('designation')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mt-2">
                    <label class="form-label" style="font-weight: bold" for="current_ctc">Current CTC</label>
                    <input class="form-control" type="text" name="current_ctc" id="current_ctc" value="{{ old('current_ctc')}}">
                    @error('current_ctc')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mt-2">
                    <label class="form-label" style="font-weight: bold" for="expected_ctc">Expected CTC </label>
                    <input class="form-control" type="text" name="expected_ctc" id="expected_ctc" value="{{ old('expected_ctc')}}">
                    @error('expected_ctc')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mt-2">
                    <label class="form-label" style="font-weight: bold" for="notice_period">Notice Period</label>
                    <select class="form-control" name="notice_period" id="notice_period" value="{{old('notice_period')}}">
                        <option value="">...select...</option>
                        <option value="immediate">Immediate</option>
                        <option value="15">15 Days</option>
                        <option value="30">30 Days</option>
                        <option value="45">45 Days</option>
                        <option value="60">60 Days</option>
                        <option value="75">More than 60 Days</option>
                    </select>
                    @error('notice_period')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mt-2">
                    <label class="form-label" style="font-weight: bold" for="resume">Attach Resume</label>
                    <input class="form-control" type="file" name="resume" id="resume">
                    @error('resume')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mt-2">
                    <label class="form-label" style="font-weight: bold" for="cover_letter">Cover Letter</label>
                    <input class="form-control" type="text" name="cover_letter" id="cover_letter" value="{{ old('cover_letter')}}">
                    @error('cover_letter')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mt-2 mb-2">
                    <button class="btn btn-primary">Submit</button>
                    <a class="btn btn-primary" href="/loginForm">Login</a>
                </div>
            </form>
        </div>
    </div>
</body>
<style>
    .data{
        text-indent: 50px;
        letter-spacing: 2px;
        margin-top: 20px;
    }
</style>
</html>