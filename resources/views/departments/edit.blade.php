@extends('layouts.app')

@section('content')
<h1>Edit Department</h1>

@if ($errors->any())
  <div class="alert alert-danger">
    <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
  </div>
@endif

<form action="{{ route('departments.update', $department->id) }}" method="POST">
  @csrf
  @method('PUT')
  <div class="mb-3">
    <label for="name" class="form-label">Department Name:</label>
    <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $department->name) }}" required>
  </div>
  <button type="submit" class="btn btn-primary">Update</button>
  <a href="{{ route('departments.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
