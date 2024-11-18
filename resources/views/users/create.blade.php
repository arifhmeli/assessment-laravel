@extends('layouts.app') {{-- Extending the base layout --}}

@section('content') {{-- Start of the content section --}}
    <div class="flex items-center justify-center min-h-screen px-4 py-8">
        <div class="bg-white p-6 rounded-lg shadow-md max-w-md w-full">
            <h1 class="text-2xl font-semibold text-center mb-6">Create User</h1>

            {{-- Display Validation Errors --}}
            @if ($errors->any())
                <div class="text-red-500">
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
                <x-form-input name="name" label="Name" value="{{ old('name') }}" />

                {{-- Email Field --}}
                <x-form-input name="email" label="Email" type="email" value="{{ old('email') }}" />

                {{-- Password Field --}}
                <x-form-input name="password" label="Password" type="password" />

                {{-- Gender Field --}}
                <div class="mb-4">
                    <label for="gender" class="block text-sm font-medium text-gray-700">Gender</label>
                    <select name="gender" id="gender" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option value="">Select Gender</option>
                        <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                        <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                    </select>
                </div>

                {{-- Birthday Field --}}
                <x-form-input name="birthday" label="Birthday" type="date" value="{{ old('birthday') }}" />

                {{-- Status Active Radio Buttons --}}
                <div class="mb-4">
                    <span class="block text-sm font-medium text-gray-700">Status</span>
                    <div class="flex items-center">
                        <input type="radio" id="active" name="status_active" value="1" class="mr-2" {{ old('status_active') == '1' ? 'checked' : '' }}>
                        <label for="active" class="mr-4">Active</label>

                        <input type="radio" id="inactive" name="status_active" value="0" class="mr-2" {{ old('status_active') == '0' ? 'checked' : '' }}>
                        <label for="inactive">Inactive</label>
                    </div>
                </div>

                {{-- Submit Button --}}
                <x-button type="submit">Submit</x-button>

            </form>

            <br>
            <a href="{{ route('users.index') }}" class="text-blue-500">Go to Table Page</a>
        </div>
    </div>
@endsection {{-- End of the content section --}}