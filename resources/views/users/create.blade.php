@extends('layouts.app') {{-- Extending the base layout --}}

@section('content') {{-- Start of the content section --}}
    <h1>Create User</h1>

    {{-- Display Validation Errors --}}
    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Form to submit user data --}}
    <form action="{{ route('users.store') }}" method="POST">
        @csrf  {{-- CSRF Token for security --}}

        {{-- Name Field --}}
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="{{ old('name') }}" required><br><br>

        {{-- Email Field --}}
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}" required><br><br>

        {{-- Password Field --}}
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>

        {{-- Gender Field --}}
        <label for="gender">Gender:</label>
        <select id="gender" name="gender" required>
            <option value="">Select Gender</option>
            <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
            <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
        </select><br><br>

        {{-- Birthday Field --}}
        <label for="birthday">Birthday:</label>
        <input type="date" id="birthday" name="birthday" value="{{ old('birthday') }}" required><br><br>

        {{-- Status Active Checkbox --}}
        <label for="status_active">Status:</label><br>
        <input type="radio" id="active" name="status_active" value="1" {{ old('status_active') == '1' ? 'checked' : '' }}>
        <label for="active">Active</label><br>
        <input type="radio" id="inactive" name="status_active" value="0" {{ old('status_active') == '0' ? 'checked' : '' }}>
        <label for="inactive">Inactive</label><br><br>

        {{-- Submit Button --}}
        <button type="submit">Submit</button>
    </form>

    <br>
    <a href="{{ route('users.index') }}">Go to Table Page</a>
@endsection {{-- End of the content section --}}