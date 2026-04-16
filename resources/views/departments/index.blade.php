@extends('layouts.app')

@section('content')
<h1 class="mb-4">Departments Management</h1>

{{-- Show success message --}}
@if(session('success'))
  <div class="alert alert-success">{{ session('success') }}</div>
@endif

{{-- Add Department Form --}}
<div class="card mb-4">
  <div class="card-header bg-primary text-white">Add Department</div>
  <div class="card-body">
    <form action="{{ route('departments.store') }}" method="POST">
      @csrf
      <div class="mb-3">
        <label for="name" class="form-label">Department Name:</label>
        <input type="text" name="name" id="name" class="form-control" placeholder="Enter Department Name" required>
      </div>
      <button type="submit" class="btn btn-success">Add</button>
    </form>
  </div>
</div>

{{-- Department Table --}}
<div class="card">
  <div class="card-header bg-dark text-white">Department List</div>
  <div class="card-body">
    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>ID</th>
          <th>Department Name</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach($departments as $department)
        <tr>
          <td>{{ $department->id }}</td>
          <td>{{ $department->name }}</td>
          <td>
            <a href="{{ route('departments.edit', $department->id) }}" class="btn btn-warning btn-sm">Edit</a>
            <form action="{{ route('departments.destroy', $department->id) }}" method="POST" style="display:inline;">
              @csrf
              @method('DELETE')
              <button onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm">Delete</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection
