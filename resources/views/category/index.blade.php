@extends('layouts.main')

@section('content')
@if (session('status'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('status') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
    <div class="card">
        <div class="card-header">
          <div class="float-start">
            <strong>List Data Category</strong>
          </div>
          <div class="float-end">
            <a href="{{ url('category/create') }}" class="btn btn-sm btn-success"><i class="fas fa-plus"></i> Tambah Data</a>
          </div>
        </div>
        @include('category.data')
      </div>
@endsection