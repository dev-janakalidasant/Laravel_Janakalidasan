<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\View\View;
use App\Models\Admin;
use App\Models\Profile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {

        return view('students.register');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function logout()
    {
        Auth::logout();
    
        // Redirect to the login page after logout
        return redirect('/');
    }
    public function login(Request $request): RedirectResponse
    {
      
        // Validation rules
        $rules = [
            'email' => 'required|email|max:255',
            'password' => 'required',
        ];

        // Validate the request data
        $validatedData = $request->validate($rules);

        // Convert email to lowercase
        $email = strtolower($validatedData['email']);
        $password = $validatedData['password'];

        // Check if user exists with the given email
        $user = Admin::where('email', $email)->first();

        if ($user) {
            if ($user->password === $password) {
                
               $profileState = 0;
                $profilemodel = new Profile();
                $profiledata['adminprofile'] = $profilemodel->all();

                foreach ($profiledata['adminprofile'] as $profile) {
                    if ($user['id'] == $profile['admin_id']) {
                        // Set profile state to '1' and exit the loop
                        $profileState = 1;
                        break;
                    }
                }
                
                $session = $request->session();
                $userData = [
                    'name' => $user->name,
                    'id' => $user->id,
                    'state' => $profileState,
                    // Add other necessary user data
                ];
                $session->put('user_data', $userData);
                // $session->forget('entered_email');
                return redirect()->to('dashboard');
            } else {
                // Invalid email or password
                // $request->session()->put('entered_email', $email);
                return redirect()->to('/')->with('error', 'Invalid password')->with('email',$email);
            }
        }
        else {
            return redirect()->to('/')->with('error_email', 'Invalid email');
        }

     
    }


    public function store(Request $request): RedirectResponse
    {
        // Validation rules
        $rules = [
            'name' => 'required|min:3|alpha',
            'email' => 'required|email|unique:admin|regex:/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/|max:255',
            'password' => 'required|min:8|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/',
        ];

        // Custom validation messages
        $messages = [
            'name.min' => 'Name should be at least 3 characters.',
            'name.alpha' => 'Name should contain only alphabets.',
            'email.email' => 'Please provide a valid email address.',
            'email.unique' => 'This email is already in use.',
            'email.regex' => 'Please provide a valid email address.',
            'password.min' => 'Password should be at least 8 characters.',
            'password.regex' => 'Password should contain at least one lowercase letter, one uppercase letter, and one number.',
        ];

        // Validate the request data
        $validatedData = $request->validate($rules, $messages);

        // Create a new admin record
        Admin::create([
            'email' => strtolower($validatedData['email']),
            'password' => $validatedData['password'],
            'name' => $validatedData['name'],
        ]);

        return redirect('/')->with('success', 'Admin added successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
