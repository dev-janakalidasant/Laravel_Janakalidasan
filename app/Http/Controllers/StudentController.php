<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\student;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $students = student::all();
        return view('students.index')->with('students', $students);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        // Validate the form fields
        $request->validate([
            'image' => 'required|image|mimes:jpeg,jpg,gif|max:2048',
        ]);

        // Handle the image upload
        $filename = '';
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = $image->getClientOriginalName();
            $image->move('images', $filename);
        }

        // Create a new student record
        student::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'mobile' => $request->input('mobile'),
            'image' => $filename,
        ]);

        return redirect('student')->with('success', 'Record added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $student = student::find($id);
        return view('students.show')->with('students', $student);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $student = student::find($id);
        return view('students.edit')->with('students', $student);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $student = student::find($id);
    
    
        if ($request->hasFile('image')) {
            $image = $request->file('image');
    
            // Check if the uploaded file is an image and has an allowed extension
            $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
            $extension = strtolower($image->getClientOriginalExtension());
    
            if (!in_array(strtolower($extension), $allowedExtensions)) {
                return redirect('/student/' . $id . '/edit')->with('error_message', 'Invalid file type. Please upload an image -> jpg, jpeg, png, gif.');
            }
    
            $filename = $image->getClientOriginalName();
            $image->move('images', $filename);
    
            // Delete the old image if it exists
            // ...
    
            // Update the image field in the database
            $student->update([
                'image' => $filename,
            ]);
        }
    
        // Update the other fields
        $student->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'mobile' => $request->input('mobile'),
        ]);
    
        return redirect('student')->with('flash_message', 'Student Updated!');
    }
    



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        student::destroy($id);
        return redirect('student')->with('flash_message', 'Student deleted!');
    }
}
