<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Admin;
use App\Models\Profile;
use Illuminate\Http\RedirectResponse;
class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():View
    {
        $session = session();
        $userData = $session->get('user_data');
        return view("students.adminprofile");
    }

    /**
     * Show the form for creating a new resource.
     */
  

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        // Validate the request data
        // $request->validate([
        //     // Add validation rules for other fields as needed
        //     'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust image validation rules
        // ]);
     $model = new Admin();
     $model->id = $request->id;
     
        // Handle file upload
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('profileimage', $fileName, 'public'); // Adjust storage path as needed
        } else {
            // Handle the case where no image is provided
            $fileName = null;
        }
    
        // Create a new admin record
        Profile::create([
            'admin_id' => $request->input('admin_id'),
            'role' => $request->input('role'),
            'company' => $request->input('company'),
            'dob' => $request->input('dob'),
            'country' => $request->input('country'),
            'experinece' => $request->input('experinece'),
            // Add other fields here
            'image' => $fileName,
        ]);
    
        return redirect('/')->with('success', 'Profile added successfully.');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit():View
    {
        $Admin = Profile::all();
        return view('students.adminprofileupdate')->with('admin', $Admin);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request): RedirectResponse
    {
        $inputArr = $request->all();
        $filename = '';
        
        $id = $inputArr['admin_id'];
        $admin = Profile::find($id);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('profileimage', $fileName, 'public'); // Adjust storage path as needed
        } else {
            // Handle the case where no image is provided
            $fileName = null;
        }

        $admin->update([
            // 'admin_id' => $inputArr['admin_id'],
       
            'role' => $request->input('role'),
            'company' => $request->input('company'),
            'dob' => $request->input('dob'),
            'country' => $request->input('country'),
            'experinece' => $request->input('experinece'),
            // Add other fields here
            'image' => $fileName,
        ]);

        return redirect('dashboard')->with('flash_message', 'profile Updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
