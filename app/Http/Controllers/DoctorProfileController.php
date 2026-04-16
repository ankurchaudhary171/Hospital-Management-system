<?php


// namespace App\Http\Controllers;

// use App\Models\DoctorProfile;
// use Illuminate\Http\Request;

// class DoctorProfileController extends Controller
// {
//     public function index()
//     {
//         $doctors = DoctorProfile::all();
//         return view('doctor_profiles.index', compact('doctors'));
//     }

//     public function create()
//     {
//         return view('doctor_profiles.create');
//     }

//     public function store(Request $request)
//     {
//         $request->validate([
//             'name' => 'required|string|max:255',
//             'qualification' => 'required|string|max:255',
//             'specialist' => 'required|string|max:255',
//             'phone' => 'required|string|max:15',
//             'email' => 'required|email|unique:doctor_profiles,email',
//         ]);

//         DoctorProfile::create($request->all());
//         return redirect()->route('doctor_profiles.index')->with('success', 'Doctor profile added successfully.');
//     }

//     public function edit($id)
//     {
//         $doctor = DoctorProfile::findOrFail($id);
//         return view('doctor_profiles.edit', compact('doctor'));
//     }

//     public function update(Request $request, $id)
//     {
//         $doctor = DoctorProfile::findOrFail($id);
//         $doctor->update($request->all());
//         return redirect()->route('doctor_profiles.index')->with('success', 'Doctor profile updated successfully.');
//     }

//     public function destroy($id)
//     {
//         DoctorProfile::findOrFail($id)->delete();
//         return redirect()->route('doctor_profiles.index')->with('success', 'Doctor profile deleted successfully.');
//     }
// }







namespace App\Http\Controllers;

use App\Models\DoctorProfile;
use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorProfileController extends Controller
{

// Active doctors list
public function activeDoctors()
{
    $doctors = Doctor::where('status', 1)->get();
    return view('doctor.active_list', compact('doctors'));
}

// Inactive doctors list
public function inactiveDoctors()
{
    $doctors = Doctor::where('status', 0)->get();
    return view('doctor.inactive_list', compact('doctors'));
}

public function dashboard()
{
    $activeDoctors = Doctor::where('status', 1)->get();
    $inactiveDoctors = Doctor::where('status', 0)->get();

    return view('doctor.dashboard', compact('activeDoctors', 'inactiveDoctors'));
}


}