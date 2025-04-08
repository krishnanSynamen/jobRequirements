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
            <h1 style="text-align: center">User Login</h1>
        </div>
        <div class="border border-5" style="margin-left: 350px;margin-right: 350px;margin-top: 50px">
            <form class="p-3" action="/login" method="POST">
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
                    <label class="form-label" style="font-weight: bold" for="email">Email </label>
                    <input class="form-control" type="text" name="email" id="email" value="{{ old('email')}}">
                    @error('email')
                        <div class="mt-2" style="color: red">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mt-2">
                    <label class="form-label" style="font-weight: bold" for="password">Password</label>
                    <input class="form-control" type="password" name="password" id="password" value="{{ old('password')}}">
                    @error('password')
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