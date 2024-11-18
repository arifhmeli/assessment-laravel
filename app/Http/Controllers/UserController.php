<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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
        // Validate the incoming data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'gender' => 'required|in:Male,Female',
            'birthday' => 'required|date',
            'status_active' => 'nullable|boolean', // Accepts true or false, or null
        ]);

        // Create the user record
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password), // Hash the password
            'gender' => $request->gender,
            'birthday' => $request->birthday,
            'status_active' => $request->has('status_active'), // This will return true or false
        ]);

        // Redirect to the table page or show a success message
        return redirect()->route('users.index');
    }

    public function index()
    {
        // Fetch active users with pagination (change 10 to whatever number you want per page)
        $users = User::where('status_active', 1)->paginate(10);

        // Return the view with the users data
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