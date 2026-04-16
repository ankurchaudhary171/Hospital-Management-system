<?php

// namespace App\Http\Controllers;

// use App\Models\Patient;
// use Illuminate\Http\Request;

// class PatientController extends Controller
// {
//     // Add Form
//     public function insert() {
//         return view('patients.add');
//     }

//     // Store
//     public function store(Request $request) {
      

//         $patient = new Patient();
//         $patient->name = $request->name;
//         $patient->email = $request->email;
//         $patient->phone = $request->phone;
//         $patient->address = $request->address;
//         $patient->gender = $request->gender;
//         $patient->dob = $request->dob;

//         if($request->hasFile('photo')){
//             $file = $request->file('photo');
//             $filename = time().'.'.$file->getClientOriginalExtension();
//             $file->move(public_path('uploads/patients'), $filename);
//             $patient->photo = $filename;
//         }

//         $patient->save();
//         return redirect('patient/list')->with('success', 'Patient added successfully!');
//     }

//     // List
//     public function list() {
//         $patients = Patient::all();
//         return view('patients.list', compact('patients'));
//     }

//     // Edit
//     public function edit($id) {
//         $patient = Patient::findOrFail($id);
//         return view('patients.edit', compact('patient'));
//     }

//     // Update
//     public function update(Request $request, $id) {
//         $patient = Patient::findOrFail($id);
//         $patient->name = $request->name;
//         $patient->email = $request->email;
//         $patient->phone = $request->phone;
//         $patient->address = $request->address;
//         $patient->gender = $request->gender;
//         $patient->dob = $request->dob;

//         if($request->hasFile('photo')){
//             $file = $request->file('photo');
//             $filename = time().'.'.$file->getClientOriginalExtension();
//             $file->move(public_path('uploads/patients'), $filename);
//             $patient->photo = $filename;
//         }

//         $patient->save();
//         return redirect('patient/list')->with('success', 'Patient updated successfully!');
//     }

//     // Delete
//     public function delete($id){
//         $patient = Patient::findOrFail($id);
//         $patient->delete();
//         return redirect('patient/list')->with('success', 'Patient deleted!');
//     }
// }






// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use App\Models\Patient;
// use App\Models\Discharge;

// class PatientController extends Controller
// {
//     // show add form
//     public function insert()
//     {
//         return view('patients.add');
//     }

//     // store new patient
//     public function store(Request $request)
//     {
//         $validated = $request->validate([
//             'name' => 'required|string|max:255',
//             'email' => 'required|email|unique:patients,email',
//             'phone' => 'required|string|max:50',
//             'disease' => 'nullable|string',
//             'admit_date' => 'nullable|date',
//         ]);

//         Patient::create($validated + ['is_discharged' => false]);

//         return redirect()->route('patient.list')->with('success', 'Patient added successfully!');
//     }

//     // list all patients
//     public function list()
//     {
//         $patients = Patient::orderBy('id','desc')->get();
//         return view('patients.list', compact('patients'));
//     }

//     // edit form
//     public function edit($id)
//     {
//         $patient = Patient::findOrFail($id);
//         return view('patients.edit', compact('patient'));
//     }

//     // update patient
//     public function update(Request $request, $id)
//     {
//         $patient = Patient::findOrFail($id);

//         $validated = $request->validate([
//             'name' => 'required|string|max:255',
//             'email' => 'required|email|unique:patients,email,'.$patient->id,
//             'phone' => 'required|string|max:50',
//             'disease' => 'nullable|string',
//             'admit_date' => 'nullable|date',
//         ]);

//         $patient->update($validated);

//         return redirect()->route('patient.list')->with('success', 'Patient updated.');
//     }

//     // delete
//     public function delete($id)
//     {
//         Patient::destroy($id);
//         return redirect()->route('patient.list')->with('success', 'Patient deleted.');
//     }

//     // discharge a patient (flag + create discharge record)
//     public function discharge($id, Request $request)
//     {
//         $patient = Patient::findOrFail($id);

//         $reason = $request->input('reason', 'Treatment completed');

//         $patient->update([
//             'is_discharged' => true,
//             'discharge_date' => now()->toDateString(),
//         ]);

//         Discharge::create([
//             'patient_id' => $patient->id,
//             'discharge_date' => now()->toDateString(),
//             'reason' => $reason,
//         ]);

//         return redirect()->route('patient.discharge.list')->with('success', 'Patient discharged.');
//     }

//     // show discharge list page
//     public function dischargeList()
//     {
//         $discharges = Discharge::with('patient')->orderBy('discharge_date','desc')->get();
//         return view('patients.discharge', compact('discharges'));
//     }
// }










namespace App\Http\Controllers;

use App\Models\Patient;

use App\Models\{Staffpatient, Department, Doctor, Room, Bed, Staff};
use Illuminate\Http\Request;

class PatientController extends Controller
{
  
public function index(Request $request)
{
    $status = $request->query('status'); // e.g., ?status=Admitted

    $query = Staffpatient::with(['department', 'doctor', 'room', 'bed']);

    if ($status && in_array($status, ['Admitted', 'Discharged'])) {
        $query->where('status', $status);
    }

    $patients = $query->paginate(10)->withQueryString();

    return view('patients.index', compact('patients', 'status'));
}


    public function create()
    {
        $departments = Department::all();
        $rooms = Room::all();
        return view('patients.index', compact('departments', 'rooms'));
    }

    public function store(Request $request)
    {

        Staffpatient::create([
            'patient_name' => $request->patient_name,
            'mobile' => $request->mobile,
            'department_id' => $request->department_id,
            'doctor_id' => $request->doctor_id,
            'room_id' => $request->room_id,
            'bed_id' => $request->bed_id,
            'status' => 'Admitted',
        ]);

        return redirect()->route('patients.index')->with('success', 'Patient admitted successfully.');
    }

    // Discharge patient
    public function discharge($id)
    {
        $patient = Staffpatient::findOrFail($id);
        $patient->status = 'Discharged';
        $patient->save();

        return redirect()->route('patients.index')->with('success', 'Patient discharged successfully!');
    }
    
    public function dischargedList()
{
    $patients = Staffpatient::with(['department', 'doctor', 'room', 'bed'])
                ->where('status', 'Discharged')
                ->paginate(10);

    return view('patients.discharged', compact('patients'));
}




}




