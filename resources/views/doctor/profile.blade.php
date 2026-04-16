@extends('layouts.app')

@section('content')
<div class="container mt-5">
    @if($doctor)
        <div class="card">
            <div class="card-header">
                <h3>Doctor Profile</h3>
            </div>
            <div class="card-body">
                <p><strong>Name:</strong> {{ $doctor->name }}</p>
                <p><strong>Email:</strong> {{ $doctor->email }}</p>
                <p><strong>Phone:</strong> {{ $doctor->phone }}</p>
                <p><strong>Specialist:</strong> {{ $doctor->specilist }}</p>
                <p><strong>Experience:</strong> {{ $doctor->experience }} years</p>
                <p><strong>Qualification:</strong> {{ $doctor->qualification }}</p>
                <p><strong>Department ID:</strong> {{ $doctor->department_id }}</p>

                @if($doctor->photo)
                    <img src="{{ asset('uploads/doctors/'.$doctor->photo) }}" width="150">
                @endif
            </div>
        </div>
    @else
        <div class="alert alert-danger">
            Doctor not found.
        </div>
    @endif
</div>
@endsection
