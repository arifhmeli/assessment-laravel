@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User</title>
</head>
<body>
    <h1>Create User</h1>

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
        <select id="gender" name="gender">
            <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
            <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
        </select><br><br>

        {{-- Birthday Field --}}
        <label for="birthday">Birthday:</label>
        <input type="date" id="birthday" name="birthday" value="{{ old('birthday') }}" required><br><br>

        <!-- Status Active Checkbox -->
        <label for="status_active">Active:</label>
        <input type="checkbox" id="status_active" name="status_active" value="1" {{ old('status_active') ? 'checked' : '' }}><br><br>

        {{-- Submit Button --}}
        <button type="submit">Submit</button>
    </form>
    
    <br>
    <a href="{{ route('users.index') }}">Go to Table Page</a>
</body>
</html>