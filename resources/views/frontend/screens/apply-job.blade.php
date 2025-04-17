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

        <div class="mt-3">
            <h2 style="text-align: center">{{ $selectedJob['title'] }}</h2>
            <div class="mt-2">
                <h5>JOB DESCRIPTION</h5>
                <div class="data">
                    {{ $selectedJob['description'] }}
                </div>
            </div>
            <div class="mt-3">
                <h5>KEY SKILLS</h5>
                <div class="data">
                    @foreach ($selectedJob['skills'] as $item)
                        {{ strtoupper($item->name) }},
                    @endforeach
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
            <div class="mt-3">
                <h5>Type</h5>
                <div class="data">
                    {{ $selectedJob['type'] }}
                </div>
            </div>
        </div>
        <div class="mt-2">
            <h3 style="text-align: center">APPLICATION FORM</h3>
        </div>
        <div class="m-5 border border-5">
            <form class="p-3" action="/user/store" method="POST">
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
                    <label class="form-label" style="font-weight: bold" for="position_applied">Position Applied</label>
                    <input class="form-control" type="text" name="position_applied" id="position_applied" value="{{ old('position_applied', $selectedJob['title']) }}" readonly>
                    @error('position_applied')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mt-2">
                    <label class="form-label" style="font-weight: bold" for="cover_letter">Cover Letter </label>
                    <input class="form-control" type="text" name="cover_letter" id="cover_letter" value="{{ old('cover_letter')}}">
                    @error('cover_letter')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mt-2">
                    <label class="form-label" style="font-weight: bold" for="type">Experience </label>
                    <select class="form-control" name="type" id="type" value="{{old('type')}}">
                        <option value="">...select...</option>
                        <option value="Fresher" {{ old('type') == 'Fresher' ? 'selected' : ''}}>Fresher</option>
                        <option value="Experience" {{ old('type') == 'Experience' ? 'selected' : ''}}>Experience</option>
                    </select>

                    @error('type')
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
                    <input class="form-control" type="number" name="notice_period" id="notice_period" value="{{ old('notice_period')}}">
                    @error('notice_period')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mt-2">
                    <input type="hidden" name="job_id" , value="{{old('job_id', $selectedJob['id'])}}">
                    <input type="hidden" name="user_id" , value="{{old('user_id', Auth::user()->id ?? '')}}">
                </div>
                <div class="form-group mt-2 mb-2">
                    <button class="btn btn-primary">Submit</button>
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