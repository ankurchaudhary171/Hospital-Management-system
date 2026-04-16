<?php

// namespace App\Http\Controllers;

// use App\Models\Register;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Facades\Auth;


// class RegisterController extends Controller
// {

// public function showform() {
//     return view('/register'); // remove the slash
// }

// public function store(Request $request) {
//     $register = new Register();

//     $register->name = $request->name;
//     $register->email = $request->email;
//     $register->password = Hash::make($request->password);
//     $register->mobile = $request->mobile;
  

//     // Image upload (optional)
//     if ($request->hasFile('image')) {
//         $image = $request->file('image');
//         $imageName = time().'.'.$image->getClientOriginalExtension();
//         $image->move(public_path('uploads'), $imageName);
//         $register->image = $imageName;
//     } else {
//         $register->image = null;
//     }

//     $register->save();

//      return view('/login');
// }

// public function showformlogin() {
//     return view('login');
// }

// public function adminpage(){

//    return redirect('/admindash');
   
// }

// public function staffpage(){

//    return redirect('/staffdash');

// }

// public function doctorpage(){

//    return redirect('/doctordash');
   
// }



// }



namespace App\Http\Controllers;

use App\Models\Register;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function showform() {
        return view('register');
    }

    public function store(Request $request) {
        $register = new Register();
        $register->name = $request->name;
        $register->email = $request->email;
        $register->password = Hash::make($request->password);
        $register->mobile = $request->mobile;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('uploads'), $imageName);
            $register->image = $imageName;
        }

        $register->save();

        return redirect('/login');
    }

    public function showformlogin() {
        return view('login');
    }

    public function login(Request $request) {
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();

    // 👇 Debug
    // dd('Auth failed', $credentials, Register::where('email', $request->email)->first());

        $role = Auth::user()->role;

        if ($role == 1) {
            return redirect('/admindash');
        } elseif ($role == 0) {
            return redirect('/staffdash');
        } elseif ($role == 3) {
            return redirect('/doctordash'); // ✅ doctor redirect
        } else {
            Auth::logout();
            return redirect('/login')->with('error', 'Unauthorized role.');
        }
    }

    return back()->withErrors([
        'email' => 'Invalid credentials.',
    ]);
}
    // Dashboards
    public function admindash() {
        return view('admindash');
    }

    public function staffdash() {
        return view('staffdash');
    }

    public function doctordash() {
        return view('doctordash');
    }
}
