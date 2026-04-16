<?php



namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Staff;
use App\Models\Doctor;

class AdminController extends Controller
{
    // 🧾 Show Add Form
    public function insertform()
    {
        // return view('admin.staff');
        return view('admin.index');

    }

    // ➕ Store Data
    public function store(Request $request)
    {
        $staff = new Staff();

        $staff->name = $request->name;
        // $staff->staff_id = $request->staff_id;
        $staff->email = $request->email;
        $staff->password = $request->password;
        $staff->mobile = $request->mobile;
        $staff->department = $request->department;
        $staff->post = $request->post;
        $staff->qualification = $request->qualification;
        // $staff->cabin_location = $request->cabin_location;
        $staff->experience = $request->experience;

       if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/staffs'), $imageName);
            $staff->image = 'uploads/staffs/' . $imageName;

        }

        //  dd($request->file('image'));
        // here is go image in data base but not show on list page and update page little mistake is here


        $staff->save();
        return redirect('staff/list')->with('success', 'Staff added successfully!');
    }

    // 📋 List All Staff
    public function list()
    {
        $staffs = Staff::all();
        return view('admin.stafflist', compact('staffs'));
    }

    // ✏️ Edit Form
    public function edit($id)
    {
        $staff = Staff::find($id);
        return view('admin.staff', compact('staff'));
    }





    // 🔄 Update Staff
    public function update(Request $request, $id)
    {
        
        $staff = Staff::find($id);

        $staff->name = $request->name;
        // $staff->staff_id = $request->staff_id;
        $staff->email = $request->email;
        $staff->password = $request->password;
        $staff->mobile = $request->mobile;
        $staff->department = $request->department;
        $staff->post = $request->post;
        $staff->qualification = $request->qualification;
        // $staff->cabin_location = $request->cabin_location;
        $staff->experience = $request->experience;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/staffs/', $filename);
            

            $staff->image = $filename;
        }

        $staff->save();
        return redirect('staff/list')->with('success', 'Staff updated successfully!');
    }

    // ❌ Delete Staff
    public function delete($id)
    {
        $staff = Staff::find($id);
        $staff->delete();
        return redirect('staff/list')->with('success', 'Staff deleted successfully!');
    }
}
