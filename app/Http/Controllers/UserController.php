<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    // Show the user creation form
    public function create()
    {
        return view('users.create');
    }

    // Handle the form submission and store data
    public function store(Request $request)
    {
        // Validate the incoming data, with a simple check for unique email (including soft-deleted users)
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email', // Ensure the email is unique
            'password' => 'required|string|min:8',
            'gender' => 'required|in:Male,Female',
            'birthday' => 'required|date',
            'status_active' => 'required|in:0,1',
        ]);

        // Create the user record
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password), // Hash the password
            'gender' => $request->gender,
            'birthday' => $request->birthday,
            'status_active' => $request->status_active, // Directly use the value (0 or 1)
        ]);

        // Redirect to the table page with a success message
        return redirect()->route('users.index')->with('success', 'User created successfully');
    }

    public function index()
    {
        // Fetch users from the database
        $users = User::all();
        
        // Return the view for the table page with the users data
        return view('users.index', compact('users'));
    }

        public function destroy(User $user)
    {
        // Soft delete the user
        $user->delete();

        // Redirect to the index page with a success message
        return redirect()->route('users.index')->with('success', 'User deleted successfully');
    }
    
}