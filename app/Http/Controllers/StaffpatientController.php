<?php

// namespace App\Http\Controllers;

// use App\Models\{Staffpatient, Department, Doctor, Room, Bed};
// use Illuminate\Http\Request;

// class StaffpatientController extends Controller
// {
//     public function index()
//     {
//         $patients = Staffpatient::with(['department', 'doctor', 'room', 'bed'])->get();
//         return view('staffpatients.index', compact('patients'));
//     }

//     public function create()
//     {
//         $departments = Department::all();
//         $rooms = Room::all();

//         return view('staffpatients.create', compact('departments', 'rooms'));
//     }

//     public function store(Request $request)
//     {

//         Staffpatient::create($request->all());

//         return redirect()->route('staffpatients.index')->with('success', 'Patient admitted successfully.');
//     }
// //    $doctors = Doctor::select('id','name','department_id')->get();
//  // $doctors = Doctor::where('department_id', $dept_id)->select('id', 'name')->get();
//     // Fetch doctors dynamically by department
//     public function getDoctors($dept_id)
//     { 
//         //  dump('$dept_id');
       
//        $doctors = Doctor::select('id','name','department_id')->get();
//        $doctors = Doctor::where('department_id', $dept_id)->select('id', 'name')->get();
      

//         //  dump('$doctors');
//         return response()->json($doctors);
//     }

//     //  Fetch beds dynamically by room
//     public function getBeds($room_id)
//     {
//         $beds = Bed::where('room_id', $room_id)->select('id', 'bed_no')->get();
//         return response()->json($beds);
//     }

    
// }

















namespace App\Http\Controllers;

use App\Models\{Staffpatient, Department, Doctor, Room, Bed, Staff};
use Illuminate\Http\Request;

class StaffpatientController extends Controller
{
    // public function index()
    // {
    //     $patients = Staffpatient::with(['department', 'doctor', 'room', 'bed'])->get();
    //     return view('staffpatients.index', compact('patients'));
    // }

   function search_data(Request $request){

    $data= $request->input('filter');

   
$patients = Staffpatient::where('patient_name', 'like', '%' . $data . '%')
                        ->orWhere('department_id', 'like', '%' . $data . '%')
                        ->paginate(10);

   return view('staffpatients.index',compact('patients'));

   }
  
    public function index(Request $request)
{
    $status = $request->query('status');

    $query = Staffpatient::with(['department', 'doctor', 'room', 'bed']);

    if ($status && in_array($status, ['Admitted', 'Discharged'])) {
        $query->where('status', $status);
    }

    $patients = $query->paginate(10);

    return view('staffpatients.index', compact('patients', 'status'));
}


    public function create()
    {
        $departments = Department::all();
        $rooms = Room::all();
        return view('staffpatients.create', compact('departments', 'rooms'));
    }

    public function store(Request $request)
    {
        // $request->validate([
        //     'patient_name' => 'required|string|max:255',
        //     'mobile' => 'required|string|max:15',
        //     'department_id' => 'required|integer',
        //     'doctor_id' => 'required|integer',
        //     'room_id' => 'required|integer',
        //     'bed_id' => 'required|integer',
        // ]);

        Staffpatient::create([
            'patient_name' => $request->patient_name,
            'mobile' => $request->mobile,
            'department_id' => $request->department_id,
            'doctor_id' => $request->doctor_id,
            'room_id' => $request->room_id,
            'bed_id' => $request->bed_id,
            'status' => 'Admitted',
        ]);

        return redirect()->route('staffpatients.index')->with('success', 'Patient admitted successfully.');
    }

    // Fetch doctors dynamically by department
    public function getDoctors($dept_id)
    {
        // yaha pr hmne done selecter lga rakha hai jisse koi bhi fetch kr sakte ho aap estemal kr ke  kyo ki ye new jo hmne banaya hai add department uske liye 
        // ye kaam krega jo abhi comment hai---------

        // $doctors = Doctor::select('id','name','department_id')->get();----------
        $doctors = Doctor::where('department_id', $dept_id)->select('id', 'name')->get();
        return response()->json($doctors);
    }

    // Fetch beds dynamically by room
    public function getBeds($room_id)
    {
        $beds = Bed::where('room_id', $room_id)->select('id', 'bed_no')->get();
        return response()->json($beds);
    }

    // Edit patient
    public function edit($id)
    {
        $patient = Staffpatient::findOrFail($id);
        $departments = Department::all();
        $rooms = Room::all();
        $beds = Bed::all();
        $doctors = Doctor::all();

        return view('staffpatients.edit', compact('patient', 'departments', 'rooms', 'beds', 'doctors'));
    }

    // Update patient
    public function update(Request $request, $id)
    {
        $patient = Staffpatient::findOrFail($id);
        $patient->update($request->all());

        return redirect()->route('staffpatients.index')->with('success', 'Patient updated successfully!');
    }

    // Delete patient (GET)
    public function destroy($id)
    {
        $patient = Staffpatient::findOrFail($id);
        $patient->delete();

        return redirect()->route('staffpatients.index')->with('success', 'Patient deleted successfully!');
    }

    // Discharge patient
    public function discharge($id)
    {
        $patient = Staffpatient::findOrFail($id);
        $patient->status = 'Discharged';
        $patient->save();

        return redirect()->route('staffpatients.index')->with('success', 'Patient discharged successfully!');
    }
    
    public function dischargedList()
{
    $patients = Staffpatient::with(['department', 'doctor', 'room', 'bed'])
                ->where('status', 'Discharged')
                ->paginate(10);

    return view('staffpatients.discharged', compact('patients'));
}

}

