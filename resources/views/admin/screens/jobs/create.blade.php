@extends('admin.layouts.app')
@section('title', 'Add Job')
<div class="text-center">
    <h1>Add JOB</h1>
</div>

@section('content')
<div class="container">
    <div>
        <form action="/admin/addJob" method="post">
            <div class="form-group">
                @csrf
                <label class="form-label" for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
                @error('title')
                    <div class="mt-2" style="color: red">{{ ucwords($message) }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label class="form-label" for="description">Description</label>
                <input type="text" class="form-control" id="description" name="description" value="{{ old('description') }}">
                @error('description')
                    <div class="mt-2" style="color: red">{{ ucwords($message) }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label class="form-label" for="qualification">Qualification</label>
                <input type="text" class="form-control" id="qualification" name="qualification" value="{{ old('qualification') }}">
                @error('qualification')
                    <div class="mt-2" style="color: red">{{ ucwords($message) }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label class="form-label" for="vacancy">vacancy</label>
                <input type="number" class="form-control" id="vacancy" name="vacancy" value="{{ old('vacancy') }}">
                @error('vacancy')
                    <div class="mt-2" style="color: red">{{ ucwords($message) }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label class="form-label" for="type">Type</label>
                <select class="form-select" name="type" id="type">
                    <option value="">..Select..</option>
                    <option value="Fresher">Fresher</option>
                    <option value="Experience">Experience</option> 
                </select>
                @error('vacancy')
                    <div class="mt-2" style="color: red">{{ ucwords($message) }}</div>
                @enderror
            </div>
            <div class="form-group mt-3">
                <button class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>
@endsection
