@extends('layouts.app') {{-- Extending the base layout --}}

@section('content') {{-- Start of the content section --}}
    <div class="flex items-center justify-center min-h-screen px-4 py-8 bg-gradient-to-r from-blue-400 via-purple-500 to-pink-600">
        <div class="bg-white p-6 rounded-lg shadow-lg max-w-full w-full">
            <!-- Title and Button at the top -->
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-2xl font-semibold text-gray-900">User List</h1>
                <a href="{{ route('users.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition duration-200">Create New User</a>
            </div>

            <!-- Table to display users -->
            <div class="overflow-x-auto">
                <table class="min-w-full table-auto border-collapse mb-6 bg-white shadow-lg rounded-lg">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="border px-4 py-2 text-left text-sm font-medium text-gray-700">ID</th>
                            <th class="border px-4 py-2 text-left text-sm font-medium text-gray-700">Name</th>
                            <th class="border px-4 py-2 text-left text-sm font-medium text-gray-700">Email</th>
                            <th class="border px-4 py-2 text-left text-sm font-medium text-gray-700">Gender</th>
                            <th class="border px-4 py-2 text-left text-sm font-medium text-gray-700">Birthday</th>
                            <th class="border px-4 py-2 text-left text-sm font-medium text-gray-700">Created At</th>
                            <th class="border px-4 py-2 text-left text-sm font-medium text-gray-700">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr class="bg-gray-50 hover:bg-gray-100 transition duration-200">
                                <td class="border px-4 py-2">{{ $user->id }}</td>
                                <td class="border px-4 py-2">{{ $user->name }}</td>
                                <td class="border px-4 py-2">{{ $user->email }}</td>
                                <td class="border px-4 py-2">{{ $user->gender }}</td>
                                <td class="border px-4 py-2">
                                    {{ \Carbon\Carbon::parse($user->birthday)->format('d/m/Y') }}
                                </td>
                                <td class="border px-4 py-2">
                                    {{ \Carbon\Carbon::parse($user->created_at)->format('d M Y, h:i A') }}
                                </td>
                                <td class="border px-4 py-2">
                                    <!-- Soft delete form -->
                                    <form action="{{ route('users.delete', $user->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 transition duration-200">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection {{-- End of the content section --}}
