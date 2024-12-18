@extends('layouts.app')

@section('content')
    <div class="flex items-center justify-center min-h-screen px-4 py-8 bg-gradient-to-r from-gray-800 via-gray-900 to-blue-900">
        <div class="bg-white p-6 rounded-lg shadow-lg max-w-md w-full">
            <h1 class="text-3xl font-bold text-center mb-6 text-gray-900">User Form</h1>

            <hr class="border-t-2 border-gray-100 mb-6">

            {{-- Display Validation Errors --}}
            @if ($errors->any())
                <div class="bg-red-100 text-red-700 p-4 rounded-lg mb-6">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li class="mb-2">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Form to submit user data --}}
            <form action="{{ route('users.store') }}" method="POST">
                @csrf {{-- CSRF Token for security --}}

                {{-- Name Field --}}
                <x-form-input 
                    name="name" 
                    label="Full Name" 
                    placeholder="Enter your full name" 
                    value="{{ old('name') }}" 
                    class="focus:ring-blue-500 focus:border-blue-500"
                />

                {{-- Email Field --}}
                <x-form-input 
                    name="email" 
                    label="Email" 
                    type="email" 
                    placeholder="Enter your email address" 
                    value="{{ old('email') }}" 
                    class="focus:ring-blue-500 focus:border-blue-500"
                />

                {{-- Password Field --}}
                <label for="password" class="block text-sm font-medium text-gray-900 mb-2">Password</label>
                <div class="mb-4 relative">
                    <input 
                        type="password" 
                        name="password" 
                        id="password" 
                        placeholder="Enter your password" 
                        value="{{ old('password') }}"
                        class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    />
                    <button type="button" id="togglePassword" class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-500 hover:text-gray-700">
                        <i class="fas fa-eye"></i>
                    </button>
                </div>

                {{-- Gender Field --}}
                <div class="mb-4">
                    <label for="gender" class="block text-sm font-medium text-gray-900 mb-2">Gender</label>
                    <select 
                        name="gender" 
                        id="gender" 
                        class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        <option value="" disabled selected class="text-gray-400">Select Gender</option>
                        <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                        <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                    </select>
                </div>

                {{-- Birthday Field --}}
                <x-form-input 
                    name="birthday" 
                    label="Birthday" 
                    type="date" 
                    value="{{ old('birthday') }}" 
                    class="focus:ring-blue-500 focus:border-blue-500"
                />

                {{-- Status Field --}}
                <div class="mb-4 flex items-center">
                    <label for="status_active" class="block text-sm font-medium text-gray-900 mr-4">Status</label>
                    <input 
                        type="checkbox" 
                        name="status_active" 
                        id="status_active" 
                        value="1" 
                        class="w-4 h-4 border border-gray-300 rounded-lg focus:ring-blue-500 bg-transparent text-blue-500">
                    <span class="text-sm text-gray-900 ml-2">Active</span>
                </div>

                {{-- Submit Button --}}
                <div class="text-center mt-6">
                    <x-button type="submit" class="w-full py-3 text-lg bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition duration-300">Submit</x-button>
                </div>
            </form>

            {{-- Go to Table Page Link --}}
            <div class="mt-4 text-center">
                <a href="{{ route('users.index') }}" class="text-blue-500 text-md hover:text-blue-600">See Table</a>
            </div>
        </div>
    </div>

    {{-- JavaScript to Toggle Password Visibility --}}
    <script>
        document.getElementById('togglePassword').addEventListener('click', function () {
            const passwordInput = document.getElementById('password');
            const icon = this.querySelector('i');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text'; // Show password
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password'; // Hide password
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        });
    </script>
@endsection
