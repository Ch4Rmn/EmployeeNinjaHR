@extends('layouts.app')
@section('title', 'Employee Edit Page')

@section('customCss')
    <style>
        /* Add custom styles here if needed */
    </style>
@endsection

@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <span><a href="{{ route('employee.index') }}" class=""><i class="fa phpdebugbar-fa-arrow-alt-circle-left fs-2 mt-3 text-dark"></i></a></span>
                <h3 class="text-center">Edit Employee</h3>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="card-body">
                <form action="{{ route('employee.update', $employee->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Name -->
                    <div class="row mb-3">
                        <label for="name" class="col-md-3 col-form-label text-md-end">Name</label>
                        <div class="col-md-9">
                            <input type="text" name="name" id="name" class="form-control" required
                                value="{{ old('name', $employee->name) }}">
                        </div>
                        {{-- @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror --}}
                    </div>

                    <!-- Email -->
                    <div class="row mb-3">
                        <label for="email" class="col-md-3 col-form-label text-md-end">Email</label>
                        <div class="col-md-9">
                            <input type="email" name="email" id="email" class="form-control" required
                                value="{{ old('email', $employee->email) }}">
                        </div>
                        {{-- @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror --}}
                    </div>

                    <!-- Department -->
                    <div class="row mb-3">
                        <label class="col-md-3 col-form-label text-md-end">Department</label>
                        <div class="col-md-9">
                            <select name="department_id" class="form-select" required>
                                <option value="">Select Department</option>
                                @foreach ($departments as $department)
                                    <option value="{{ $department->id }}"
                                        {{ $employee->department_id && $employee->department->id == $department->id ? 'selected' : '' }}>
                                        {{ $department->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        {{-- @error('department_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror --}}
                    </div>

                    <!-- Gender -->
                    <div class="row mb-3">
                        <label class="col-md-3 col-form-label text-md-end">Gender</label>
                        <div class="col-md-9">
                            <select name="gender" class="form-select" required>
                                <option value="">Select Gender</option>
                                <option value="male" {{ old('gender', $employee->gender) == 'male' ? 'selected' : '' }}>
                                    Male</option>
                                <option value="female" {{ old('gender', $employee->gender) == 'female' ? 'selected' : '' }}>
                                    Female</option>
                                <option value="other" {{ old('gender', $employee->gender) == 'other' ? 'selected' : '' }}>
                                    Other</option>
                            </select>
                        </div>
                        {{-- @error('gender')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror --}}
                    </div>

                    <!-- Phone -->
                    <div class="row mb-3">
                        <label for="phone" class="col-md-3 col-form-label text-md-end">Phone</label>
                        <div class="col-md-9">
                            <input type="text" name="phone" id="phone" class="form-control"
                                value="{{ old('phone', $employee->phone) }}">
                        </div>
                        {{-- @error('phone')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror --}}
                    </div>

                    <!-- Address -->
                    <div class="row mb-3">
                        <label for="address" class="col-md-3 col-form-label text-md-end">Address</label>
                        <div class="col-md-9">
                            <textarea name="address" id="address" class="form-control">{{ old('address', $employee->address) }}</textarea>
                        </div>
                        {{-- @error('address')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror --}}
                    </div>

                    <!-- Birthday -->
                    <div class="row mb-3">
                        <label for="birthday" class="col-md-3 col-form-label text-md-end">Birthday</label>
                        <div class="col-md-9">
                            <input type="date" name="birthday" id="birthday" class="form-control"
                                value="{{ old('birthday', $employee->birthday) }}">
                        </div>
                        {{-- @error('birthday')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror --}}
                    </div>

                    <!-- Is Present -->
                    <div class="row mb-3">
                        <label class="col-md-3 col-form-label text-md-end">Is Present</label>
                        <div class="col-md-9">
                            <select name="is_present" class="form-select" required>
                                <option value="1"
                                    {{ old('is_present', $employee->is_present) == 1 ? 'selected' : '' }}>Yes</option>
                                <option value="0"
                                    {{ old('is_present', $employee->is_present) == 0 ? 'selected' : '' }}>No</option>
                            </select>
                        </div>
                        {{-- @error('is_present')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror --}}
                    </div>

                    <!-- Submit Button -->
                    <div class="row mb-0">
                        <div class="col-md-9 offset-md-3">
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="{{ route('employee.index') }}" class="btn btn-secondary">Cancel</a>
                            <a href="" type="reset" class="btn btn-dark">Reset</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
@endsection
