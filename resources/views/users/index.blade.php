@extends('layouts.app') {{-- Extending the base layout --}}

@section('content') {{-- Start of the content section --}}
    <div class="flex items-center justify-center min-h-screen px-4 py-8">
        <div class="bg-white p-6 rounded-lg shadow-md max-w-full w-full">
            <!-- Title and Button at the top -->
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-2xl font-semibold">User List</h1>
                <a href="{{ route('users.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Create New User</a>
            </div>

            <!-- Table to display users -->
            <table class="min-w-full table-auto border-collapse mb-6">
                <thead>
                    <tr>
                        <th class="border px-4 py-2">ID</th>
                        <th class="border px-4 py-2">Name</th>
                        <th class="border px-4 py-2">Email</th>
                        <th class="border px-4 py-2">Gender</th>
                        <th class="border px-4 py-2">Birthday</th>
                        <th class="border px-4 py-2">Created At</th>
                        <th class="border px-4 py-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
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
                                    <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection {{-- End of the content section --}}
