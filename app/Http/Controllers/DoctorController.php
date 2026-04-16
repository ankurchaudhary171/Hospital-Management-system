<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Department;
use App\Helpers\DoctorHelper;

class DoctorController extends Controller
{
    // 🧾 Show Add Form
    public function insert()
    {
        $departments = Department::all();       // Departments fetch karo
        return view('doctor.index', compact('departments'));
    }

    // ➕ Store Doctor
    public function store(Request $request)
    {
        $doctor = new Doctor();
        $doctor->name = $request->name;
        $doctor->email = $request->email;
        $doctor->phone = $request->phone;
        $doctor->specilist = $request->specilist;
        $doctor->experience = $request->experience;
        $doctor->qualification = $request->qualification;
        $doctor->department_id = $request->department_id;

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $file->move('uploads/doctors/', $filename);
            $doctor->photo = $filename;
        }

        $doctor->status = 1;
        $doctor->save();

        return redirect('doctor/list')->with('success', 'Doctor added successfully!');
    }

    // 📋 List all doctors
    public function list()
    {
        $doctors = Doctor::all();
        return view('doctor.list', compact('doctors'));
    }

    // ✏️ Edit form
    public function edit($id)
    {
        $doctor = Doctor::find($id);
        $departments = Department::all();       // Departments fetch karo
        return view('doctor.index', compact('doctor', 'departments'));
    }

    // 🔄 Update doctor
    public function update(Request $request, $id)
    {
        $doctor = Doctor::find($id);
        $doctor->name = $request->name;
        $doctor->email = $request->email;
        $doctor->phone = $request->phone;
        $doctor->specilist = $request->specilist;
        $doctor->experience = $request->experience;
        $doctor->qualification = $request->qualification;
        $doctor->department_id = $request->department_id;

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $file->move('uploads/doctors/', $filename);
            $doctor->photo = $filename;
        }

        $doctor->save();
        return redirect('doctor/list')->with('success', 'Doctor updated successfully!');
    }

    // ❌ Delete doctor
    public function delete($id)
    {
        $doctor = Doctor::find($id);
        $doctor->delete();
        return redirect('doctor/list')->with('success', 'Doctor deleted successfully!');
    }

    // 🔁 Toggle Active/Inactive
    public function toggleStatus($id)
    {
        $doctor = Doctor::find($id);
        $doctor->status = $doctor->status == 1 ? 0 : 1;
        $doctor->save();

        return redirect('doctor/list')->with('success', 'Doctor status updated!');
    }

public function profile($id)
{
    $doctor = DoctorHelper::getProfileById($id);
    return view('doctor.profile', compact('doctor'));
}
    
}
