@extends('layouts.app') {{-- Extending the base layout --}}

@section('content') {{-- Start of the content section --}}
    <div class="flex items-center justify-center min-h-screen px-4 py-8 bg-gradient-to-r from-gray-800 via-gray-900 to-blue-900">
        <div class="bg-white p-6 rounded-lg shadow-lg w-full">
            <!-- Title and Button at the top -->
            <div class="flex justify-between items-center mb-6">
                <h1 class="block font-sans text-xl antialiased font-semibold leading-snug tracking-normal text-blue-gray-900">User List</h1>
                <a href="{{ route('users.create') }}" class="flex items-center gap-3 bg-blue-600 hover:bg-blue-900 py-2 px-4 text-white font-bold text-xs uppercase rounded-lg shadow-md hover:shadow-lg focus:opacity-85 active:opacity-85 transition-all">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                        <path d="M6.25 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM3.25 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM19.75 7.5a.75.75 0 00-1.5 0v2.25H16a.75.75 0 000 1.5h2.25v2.25a.75.75 0 001.5 0v-2.25H22a.75.75 0 000-1.5h-2.25V7.5z"></path>
                    </svg>
                    ADD NEW USER
                </a>
            </div>

            <!-- Table to display users -->
            <table class="w-full mt-4 text-left table-auto border-collapse">
                <thead>
                    <tr class="bg-blue-gray-100">
                        @foreach (['ID', 'User', 'Gender', 'Birthday', 'Created At', 'Action'] as $header)
                            <th class="p-4 border-b border-blue-gray-200 text-sm text-blue-gray-900 opacity-80">{{ $header }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr class="hover:bg-gray-50 transition duration-200">
                            <td class="p-4 border-b border-blue-gray-50 text-sm">{{ $user->id }}</td>
                            <td class="p-4 border-b border-blue-gray-50 text-sm">
                                <p class="text-sm text-blue-gray-900">{{ $user->name }}</p>
                                <p class="text-xs text-blue-gray-900 opacity-70">{{ $user->email }}</p>
                            </td>
                            <td class="p-4 border-b border-blue-gray-50 text-sm">{{ $user->gender }}</td>
                            <td class="p-4 border-b border-blue-gray-50 text-sm">{{ \Carbon\Carbon::parse($user->birthday)->format('d/m/Y') }}</td>
                            <td class="p-4 border-b border-blue-gray-50 text-sm">{{ \Carbon\Carbon::parse($user->created_at)->format('d M Y, h:i A') }}</td>
                            <td class="p-4 border-b border-blue-gray-50 text-sm">
                                <!-- Soft delete form -->
                                <form action="{{ route('users.delete', $user->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?');">
                                    @csrf
                                    @method('DELETE')
                                    <div class="flex gap-2">
                                        <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600 transition duration-200 flex items-center justify-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                                            </svg>
                                        </button>
                                        <button type="button" class="bg-blue-500 text-white px-2 py-1 rounded hover:bg-blue-600 transition duration-200 flex items-center justify-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4">
                                                <path d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-12.15 12.15a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32L19.513 8.2z"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    
@endsection {{-- End of the content section --}}
