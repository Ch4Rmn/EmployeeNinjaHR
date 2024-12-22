@extends('layouts.app')

@section('title', 'Employee Create Page')

@section('customCss')
    <style>
        /* Add custom styles here if needed */
    </style>
@endsection

@section('content')

    {{--  --}}
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h3 class="text-center">Employee Create</h3>
            </div>
            {{--  --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            {{--  --}}
            <div class="card-body">
                <form action="{{ route('employee.store') }}" method="POST">
                    @csrf

                    <!-- Name -->
                    <div class="row mb-3">
                        <label for="name" class="col-md-3 col-form-label text-md-end">Name</label>
                        <div class="col-md-9">
                            <input type="text" name="name" id="name" class="form-control" required
                                value="{{ old('name') }}">
                        </div>
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Github ID -->
                    <div class="row mb-3">
                        <label for="github_id" class="col-md-3 col-form-label text-md-end">Github ID</label>
                        <div class="col-md-9">
                            <input type="text" name="github_id" id="github_id" class="form-control" disabled>
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="row mb-3">
                        <label for="email" class="col-md-3 col-form-label text-md-end">Email</label>
                        <div class="col-md-9">
                            <input type="email" name="email" id="email" class="form-control" required>
                        </div>
                    </div>

                    <!-- Password -->
                    <div class="row mb-3">
                        <label for="password" class="col-md-3 col-form-label text-md-end">Password</label>
                        <div class="col-md-9">
                            <input type="password" name="password" id="password" class="form-control" required>
                        </div>
                    </div>

                    <!-- Employee ID -->
                    <div class="row mb-3">
                        <label for="employee_id" class="col-md-3 col-form-label text-md-end">Employee ID</label>
                        <div class="col-md-9">
                            <input type="text" disabled name="employee_id" id="employee_id" class="form-control">
                        </div>
                    </div>

                    <!-- Department ID -->
                    <div class="row mb-3">
                        <label class="col-md-3 col-form-label text-md-end">Department</label>
                        <div class="col-md-9">
                            <select name="department_id" class="form-select" required>
                                <option value="">Select Department</option>
                                @foreach ($departments as $department)
                                    <option value="{{ $department->id }}">{{ $department->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Gender -->
                    <div class="row mb-3">
                        <label class="col-md-3 col-form-label text-md-end">Gender</label>
                        <div class="col-md-9">
                            <select name="gender" class="form-select" required>
                                <option value="">Select Gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                    </div>

                    <!-- Phone -->
                    <div class="row mb-3">
                        <label for="phone" class="col-md-3 col-form-label text-md-end">Phone</label>
                        <div class="col-md-9">
                            <input type="text" name="phone" id="phone" class="form-control">
                        </div>
                    </div>

                    <!-- Address -->
                    <div class="row mb-3">
                        <label for="address" class="col-md-3 col-form-label text-md-end">Address</label>
                        <div class="col-md-9">
                            <textarea name="address" id="address" class="form-control"></textarea>
                        </div>
                    </div>

                    <!-- NRC Number -->
                    <div class="row mb-3">
                        <label for="nrc_number" class="col-md-3 col-form-label text-md-end">NRC Number</label>
                        <div class="col-md-9">
                            <input type="text" name="nrc_number" id="nrc_number" class="form-control">
                        </div>
                    </div>

                    <!-- Birthday -->
                    <div class="row mb-3">
                        <label for="birthday" class="col-md-3 col-form-label text-md-end">Birthday</label>
                        <div class="col-md-9">
                            <input type="date" name="birthday" id="birthday" class="form-control">
                        </div>
                    </div>

                    <!-- Date of Join -->
                    <div class="row mb-3">
                        <label for="date_of_join" class="col-md-3 col-form-label text-md-end">Date of Join</label>
                        <div class="col-md-9">
                            <input type="date" name="date_of_join" id="date_of_join" class="form-control">
                        </div>
                    </div>

                    <!-- Is Present -->
                    <div class="row mb-3">
                        <label class="col-md-3 col-form-label text-md-end">Is Present</label>
                        <div class="col-md-9">
                            <select name="is_present" class="form-select" required>
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                        </div>
                    </div>

                    <!-- Created By -->
                    <div class="row mb-3">
                        <label for="created_by" class="col-md-3 col-form-label text-md-end">Created By</label>
                        <div class="col-md-9">
                            <input type="text" disabled name="created_by" id="created_by" class="form-control">
                        </div>
                    </div>

                    <!-- Updated By -->
                    <div class="row mb-3">
                        <label for="updated_by" class="col-md-3 col-form-label text-md-end">Updated By</label>
                        <div class="col-md-9">
                            <input type="text" disabled name="updated_by" id="updated_by" class="form-control">
                        </div>
                    </div>

                    <!-- Deleted By -->
                    <div class="row mb-3">
                        <label for="deleted_by" class="col-md-3 col-form-label text-md-end">Deleted By</label>
                        <div class="col-md-9">
                            <input type="text" disabled name="deleted_by" id="deleted_by" class="form-control">
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="row mb-0">
                        <div class="col-md-9 offset-md-3">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <button type="reset" class="btn btn-secondary">Reset</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
        {{--  --}}



    </div>
@endsection

@section('javascript')
    <script>
        $(document).ready(function() {})
    </script>
@endsection
