@extends('layouts.main')

@section('content')
<div class="card">
    <div class="card-header">
        <div class="float-start">
            <strong>Add Data Category</strong>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <form action="{{ url('category/store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name Category</label>
                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" autofocus>
                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="publish">Publish</label>
                        <select name="publish" id="publish" class="form-control @error('publish') is-invalid @enderror">
                            <option value="">- Select -</option>
                            <option value="0" @if (old('publish') == "0") {{ 'selected' }} @endif>No</option>
                            <option value="1" @if (old('publish') == "1") {{ 'selected' }} @endif>Yes</option>
                        </select>
                        @error('publish')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-success mt-2"><i class="fa-regular fa-floppy-disk"></i>&nbsp;Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
