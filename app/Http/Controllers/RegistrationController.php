<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\View\View;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
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

     public function login(Request $request): RedirectResponse
     {
        $model= new Admin();
        $email = $request->input('email');
        $password = $request->input('password');
        $user = $model->where('email', $email)
        ->where('password', $password)
        ->first();
        if ($user) {
            $session = $request->session();
            $userData = [
                'name' => $user->name,
                // Add other necessary user data
            ];
            $session->put('user_data', $userData);
            return redirect()->to('dashboard');
        }
        else{
            return redirect()->to('/')->with('error', 'Invalid email or password');
        }
    
    
     }
    public function store(Request $request): RedirectResponse
    {
    

        // Create a new admin record
        Admin::create([
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'name' => $request->input('name'),
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
