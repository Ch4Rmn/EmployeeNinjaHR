@extends('layouts.app')

@section('content')

<div class="card container-fluid">
    <div class="card-header text-center">
        <h3>Employee Details</h3>
    </div>
    <div class="card-body align-self-start w-100">
        @if ($employee)
        <!-- Name -->
        <div class="row mb-3">
            <label for="name" class="col-md-3 col-form-label text-md-end">Name</label>
            <div class="col-md-9">
                <input type="text" id="name" class="form-control" value="{{ $employee->name }}" disabled>
            </div>
        </div>

        <!-- Github ID -->
        <div class="row mb-3">
            <label for="github_id" class="col-md-3 col-form-label text-md-end">Github ID</label>
            <div class="col-md-9">
                <input type="text" id="github_id" class="form-control" value="{{ $employee->github_id }}" disabled>
            </div>
        </div>

        <!-- Email -->
        <div class="row mb-3">
            <label for="email" class="col-md-3 col-form-label text-md-end">Email</label>
            <div class="col-md-9">
                <input type="email" id="email" class="form-control" value="{{ $employee->email }}" disabled>
            </div>
        </div>

        <!-- Employee ID -->
        <div class="row mb-3">
            <label for="employee_id" class="col-md-3 col-form-label text-md-end">Employee ID</label>
            <div class="col-md-9">
                <input type="text" id="employee_id" class="form-control" value="{{ $employee->employee_id }}" disabled>
            </div>
        </div>

        <!-- Department -->
        <div class="row mb-3">
            <label class="col-md-3 col-form-label text-md-end">Department</label>
            <div class="col-md-9">
                <input type="text" class="form-control" value="{{ $employee->department->name ?? 'N/A' }}" disabled>
            </div>
        </div>

        <!-- Gender -->
        <div class="row mb-3">
            <label class="col-md-3 col-form-label text-md-end">Gender</label>
            <div class="col-md-9">
                <input type="text" class="form-control" value="{{ ucfirst($employee->gender) }}" disabled>
            </div>
        </div>

        <!-- Phone -->
        <div class="row mb-3">
            <label for="phone" class="col-md-3 col-form-label text-md-end">Phone</label>
            <div class="col-md-9">
                <input type="text" id="phone" class="form-control" value="{{ $employee->phone }}" disabled>
            </div>
        </div>

        <!-- Address -->
        <div class="row mb-3">
            <label for="address" class="col-md-3 col-form-label text-md-end">Address</label>
            <div class="col-md-9">
                <textarea id="address" class="form-control" disabled>{{ $employee->address }}</textarea>
            </div>
        </div>

        <!-- Image -->
        <div class="row mb-3">
            <label for="img" class="col-md-3 col-form-label text-md-end">Image</label>
            <div class="col-md-9">
                @if ($employee->img)
                    <img src="{{ asset('storage/employee/' . $employee->id . '/' . $employee->img) }}" alt="Employee Image" class="img-fluid" style="max-width: 200px;">
                @else
                    <p>No image available</p>
                @endif
            </div>
        </div>

        <!-- NRC Number -->
        <div class="row mb-3">
            <label for="nrc_number" class="col-md-3 col-form-label text-md-end">NRC Number</label>
            <div class="col-md-9">
                <input type="text" id="nrc_number" class="form-control" value="{{ $employee->nrc_number }}" disabled>
            </div>
        </div>

        <!-- Birthday -->
        <div class="row mb-3">
            <label for="birthday" class="col-md-3 col-form-label text-md-end">Birthday</label>
            <div class="col-md-9">
                <input type="date" id="birthday" class="form-control" value="{{ $employee->birthday }}" disabled>
            </div>
        </div>

        <!-- Date of Join -->
        <div class="row mb-3">
            <label for="date_of_join" class="col-md-3 col-form-label text-md-end">Date of Join</label>
            <div class="col-md-9">
                <input type="date" id="date_of_join" class="form-control" value="{{ $employee->date_of_join }}" disabled>
            </div>
        </div>

        <!-- Is Present -->
        <div class="row mb-3">
            <label class="col-md-3 col-form-label text-md-end">Is Present</label>
            <div class="col-md-9">
                <input type="text" class="form-control" value="{{ $employee->is_present ? 'Yes' : 'No' }}" disabled>
            </div>
        </div>

        <!-- Created By -->
        <div class="row mb-3">
            <label for="created_by" class="col-md-3 col-form-label text-md-end">Created By</label>
            <div class="col-md-9">
                <input type="text" id="created_by" class="form-control" value="{{ $employee->created_by }}" disabled>
            </div>
        </div>

        <!-- Updated By -->
        <div class="row mb-3">
            <label for="updated_by" class="col-md-3 col-form-label text-md-end">Updated By</label>
            <div class="col-md-9">
                <input type="text" id="updated_by" class="form-control" value="{{ $employee->updated_by }}" disabled>
            </div>
        </div>

        <!-- Deleted By -->
        <div class="row mb-3">
            <label for="deleted_by" class="col-md-3 col-form-label text-md-end">Deleted By</label>
            <div class="col-md-9">
                <input type="text" id="deleted_by" class="form-control" value="{{ $employee->deleted_by }}" disabled>
            </div>
        </div>



        <!-- Back Button -->
        <div class="row mb-0">
            <div class="col-md-9 offset-md-3">
                <a href="{{ route('employee.index') }}" class="btn btn-secondary">Back to List</a>
            </div>
        </div>
        @else
        <div>404 Error</div>
        @endif
    </div>
</div>
@endsection
