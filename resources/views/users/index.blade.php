@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<h1>Users Index</h1>
<a href="{{ route('users.create') }}">Create New User</a>

<h1>Users List</h1>

<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Gender</th>
            <th>Birthday</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->gender }}</td>
                <td>{{ \Carbon\Carbon::parse($user->birthday)->format('d/m/Y') }}</td>
                <td>{{ $user->status_active ? 'Active' : 'Inactive' }}</td>
                <td>
                    <!-- Soft Delete button -->
                    <form action="{{ route('users.delete', $user->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<!-- Display pagination links -->
<div>
    {{ $users->links() }}
</div>