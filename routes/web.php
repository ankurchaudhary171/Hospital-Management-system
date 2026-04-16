<?php

// use App\Http\Controllers\RegisterController;
// use App\Http\Middleware\ValidUser;
// use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });


// Route::get('/register',[RegisterController::class,'showform']);
// Route::post('/register',[RegisterController::class,'store']);

// Route::get('/login', [RegisterController::class, 'showformlogin'])->name('login');

// // After login, redirect here to check role and send to correct dashboard
// // This route just triggers the ValidUser middleware to redirect properly

// Route::get('/check-role', function () {
    
// })->middleware('validuser:check');

// // Dashboards (role protected)

// Route::get('/admindash',[RegisterController::class,'admindash'])->middleware('validuser:1');
// Route::post('/admindash',[RegisterController::class,'admindash'])->middleware('validuser:1');
// // Route::get('/admindash', function () {
// //     return 'Welcome Admin';
// // })
// Route::get('/staffdash',[RegisterController::class,'staffdash'])->middleware('validuser:0');
// Route::post('/staffdash',[RegisterController::class,'staffdash'])->middleware('validuser:0');

// // Route::get('/staffdash', function () {
// //     return 'Welcome Staff';
// // })->middleware('validuser:0');

// Route::get('/doctordash',[RegisterController::class,'doctordash'])->middleware('validuser:3');
// Route::post('/doctordash',[RegisterController::class,'doctordash'])->middleware('validuser:3');


// // Route::get('/doctordash', function () {
// //     return 'Welcome Doctor';
// // })->middleware('validuser:3');



use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register',[RegisterController::class,'showform']);
Route::post('/register',[RegisterController::class,'store']);

// login form show
Route::get('/login', [RegisterController::class, 'showformlogin'])->name('login');

// login submit
Route::post('/login', [RegisterController::class, 'login'])->name('login.submit');

// check role after login
Route::get('/check-role', function () {
    return "Checking role...";
})->middleware('validuser:check');

// Dashboards
Route::get('/admindash',[RegisterController::class,'admindash'])->middleware('validuser:1');
Route::get('/staffdash',[RegisterController::class,'staffdash'])->middleware('validuser:0');
Route::get('/doctordash',[RegisterController::class,'doctordash'])->middleware('validuser:3');



use App\Http\Controllers\AdminController;

Route::get('/admin/index', [AdminController::class, 'insertform']);
// Store Staff
Route::get('/staff/store', [AdminController::class, 'store']);
Route::post('/staff/store', [AdminController::class, 'store']);

// List Staff
Route::get('/staff/list', [AdminController::class, 'list']);

// Edit Staff
Route::get('/staff/edit/{id}', [AdminController::class, 'edit']);

// Update Staff
Route::post('/staff/update/{id}', [AdminController::class, 'update']);

// Delete Staff
Route::get('/staff/delete/{id}', [AdminController::class, 'delete']);


// Doctor route

use App\Http\Controllers\DoctorController;

// Add form
Route::get('/doctor/add', [DoctorController::class, 'insert']);

// Store
Route::post('/doctor/store', [DoctorController::class, 'store']);

// List
Route::get('/doctor/list', [DoctorController::class, 'list']);

// Edit
Route::get('/doctor/edit/{id}', [DoctorController::class, 'edit']);

// Update
Route::post('/doctor/update/{id}', [DoctorController::class, 'update']);

// Delete
Route::get('/doctor/delete/{id}', [DoctorController::class, 'delete']);

// Toggle Active/Inactive
Route::get('/doctor/status/{id}', [DoctorController::class, 'toggleStatus']);





use App\Http\Controllers\PatientController;

// // Add Patient
// Route::get('/patient/add', [PatientController::class, 'insert']);

// // Store Patient
// Route::post('/patient/store', [PatientController::class, 'store']);

// // List Patients
// Route::get('/patient/list', [PatientController::class, 'list']);

// // Edit Patient
// Route::get('/patient/edit/{id}', [PatientController::class, 'edit']);

// // Update Patient
// Route::post('/patient/update/{id}', [PatientController::class, 'update']);

// // Delete Patient
// Route::get('/patient/delete/{id}', [PatientController::class, 'delete']);



// use App\Http\Controllers\PatientController;

// Patient routes
// Route::get('/patient/add', [PatientController::class, 'insert'])->name('patient.add');
// Route::post('/patient/store', [PatientController::class, 'store'])->name('patient.store');
// Route::get('/patient/list', [PatientController::class, 'list'])->name('patient.list');
// Route::get('/patient/edit/{id}', [PatientController::class, 'edit'])->name('patient.edit');
// Route::post('/patient/update/{id}', [PatientController::class, 'update'])->name('patient.update');
// Route::get('/patient/delete/{id}', [PatientController::class, 'delete'])->name('patient.delete');

// // Discharge actions
// // discharge via GET link (quick) OR POST if you want reason input — here I'll show GET for quick discharge
// Route::get('/patient/discharge/{id}', [PatientController::class, 'discharge'])->name('patient.discharge');
// // Discharge list
// Route::get('/patient/discharge-list', [PatientController::class, 'dischargeList'])->name('patient.discharge.list');

// Route::get('/patients/list', [PatientController::class, 'nameList'])->name('patients.nameList');
// use App\Http\Controllers\PatientController;

Route::get('/patients', [PatientController::class, 'index'])->name('patients.index');
Route::get('/patients/discharged', [PatientController::class, 'dischargedList'])->name('patients.discharged');
Route::get('/patients/create', [PatientController::class, 'create'])->name('patients.create');
Route::post('/patients/store', [PatientController::class, 'store'])->name('patients.store');
Route::get('/patients/discharge/{id}', [PatientController::class, 'discharge'])->name('patients.discharge');


use App\Http\Controllers\RoomController;

// Room CRUD
Route::get('/room/add', [RoomController::class, 'addRoomForm'])->name('room.add');
Route::post('/room/store', [RoomController::class, 'storeRoom'])->name('room.store');
Route::get('/room/list', [RoomController::class, 'roomList'])->name('room.list');
Route::get('/room/edit/{id}', [RoomController::class, 'editRoom'])->name('room.edit');
Route::post('/room/update/{id}', [RoomController::class, 'updateRoom'])->name('room.update');
Route::get('/room/delete/{id}', [RoomController::class, 'deleteRoom'])->name('room.delete');

// View beds of a specific room
Route::get('/room/{room_id}/beds', [RoomController::class, 'bedList'])->name('room.beds');


use App\Http\Controllers\StaffpatientController;

// Route::get('/staffpatients', [StaffpatientController::class, 'index'])->name('staffpatients.index');
// Route::get('/staffpatients/create', [StaffpatientController::class, 'create'])->name('staffpatients.create');
// Route::post('/staffpatients/store', [StaffpatientController::class, 'store'])->name('staffpatients.store');
// Route::get('/staffpatients/{id}/edit', [StaffpatientController::class, 'edit'])->name('staffpatients.edit');
// Route::post('/staffpatients/{id}/update', [StaffpatientController::class, 'update'])->name('staffpatients.update');
// Route::get('/staffpatients/{id}/delete', [StaffpatientController::class, 'destroy'])->name('staffpatients.destroy');
// Route::get('/staffpatients/{id}/discharge', [StaffpatientController::class, 'discharge'])->name('staffpatients.discharge');
// Route::get('/get-doctors/{dept_id}', [StaffpatientController::class, 'getDoctors']);
// Route::get('/get-beds/{room_id}', [StaffpatientController::class, 'getBeds']);
// Route::resource('staffpatients', StaffPatientController::class);

// Route::get('/get-doctors/{dept_id}', [StaffPatientController::class, 'getDoctors']);
// Route::get('/get-beds/{room_id}', [StaffPatientController::class, 'getBeds']);




// important ---------------------------------

// use App\Http\Controllers\StaffpatientController;

// Route::get('/staffpatients', [StaffpatientController::class, 'index'])->name('staffpatients.index');
// Route::get('/staffpatients/create', [StaffpatientController::class, 'create'])->name('staffpatients.create');
// Route::post('/staffpatients/store', [StaffpatientController::class, 'store'])->name('staffpatients.store');

// // AJAX Routes for Dynamic Fetch
// Route::get('/get-doctors/{dept_id}', [StaffpatientController::class, 'getDoctors'])->name('get.doctors');
// Route::get('/get-beds/{room_id}', [StaffpatientController::class, 'getBeds'])->name('get.beds');

// -------------------




// use App\Http\Controllers\StaffpatientController;

Route::get('/staffpatients', [StaffpatientController::class, 'index'])->name('staffpatients.index');
Route::get('/staffpatients/create', [StaffpatientController::class, 'create'])->name('staffpatients.create');
Route::post('/staffpatients/store', [StaffpatientController::class, 'store'])->name('staffpatients.store');

Route::get('/staffpatients/{id}/edit', [StaffpatientController::class, 'edit'])->name('staffpatients.edit');
Route::post('/staffpatients/update/{id}', [StaffpatientController::class, 'update'])->name('staffpatients.update');

Route::get('/staffpatients/delete/{id}', [StaffpatientController::class, 'destroy'])->name('staffpatients.destroy');

Route::get('/staffpatients/discharge/{id}', [StaffpatientController::class, 'discharge'])->name('staffpatients.discharge');

// AJAX dynamic fetch routes
Route::get('/get-doctors/{dept_id}', [StaffpatientController::class, 'getDoctors'])->name('get.doctors');
Route::get('/get-beds/{room_id}', [StaffpatientController::class, 'getBeds'])->name('get.beds');


Route::get('/staffpatients/discharged', [StaffpatientController::class, 'dischargedList'])->name('staffpatients.discharged');


Route::get('search_data',[StaffpatientController::class,'search_data']);


use App\Http\Controllers\DepartmentController;

// Show form + list on the same page (index with form)
// Route::get('/departments', [DepartmentController::class, 'index'])->name('departments.index');
Route::get('/departments', [DepartmentController::class, 'index'])->name('departments.index');
// Store department (form submit)
Route::post('/departments', [DepartmentController::class, 'store'])->name('departments.store');

// Show edit form
Route::get('/departments/{id}/edit', [DepartmentController::class, 'edit'])->name('departments.edit');

// Update department
Route::put('/departments/{id}', [DepartmentController::class, 'update'])->name('departments.update');

// Delete department
Route::delete('/departments/{id}', [DepartmentController::class, 'destroy'])->name('departments.destroy');

// Route::resource('departments', DepartmentController::class);





use App\Http\Controllers\DoctorProfileController;
use App\Http\Controllers\ProfileController;

// Route::get('/doctor-profiles', [DoctorProfileController::class, 'index'])->name('doctor_profiles.index');
// Route::get('/doctor-profiles/create', [DoctorProfileController::class, 'create'])->name('doctor_profiles.create');
// Route::post('/doctor-profiles/store', [DoctorProfileController::class, 'store'])->name('doctor_profiles.store');
// Route::get('/doctor-profiles/{id}/edit', [DoctorProfileController::class, 'edit'])->name('doctor_profiles.edit');
// Route::post('/doctor-profiles/{id}/update', [DoctorProfileController::class, 'update'])->name('doctor_profiles.update');
// Route::get('/doctor-profiles/{id}/delete', [DoctorProfileController::class, 'destroy'])->name('doctor_profiles.destroy');

Route::get('doctor-profiles/active', [DoctorController::class, 'activeDoctors']);
Route::get('doctor-profiles/inactive', [DoctorController::class, 'inactiveDoctors']);
Route::get('doctor/dashboard', [DoctorProfileController::class, 'dashboard'])->name('doctor.dashboard');





Route::post('/logout', function() {
    Auth::logout();
    return redirect('/login');
})->name('logout');


// Route::get('/profileimage/{id}',[ProfileController::class,'profile']);
// Route::get('/profileimage',[ProfileController::class,'profile']);



Route::get('doctor/profile/{id}', [DoctorController::class, 'profile']);