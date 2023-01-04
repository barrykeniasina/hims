<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmergencyController;
use App\Http\Controllers\AdmissionController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\InternalMedicineController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'auth.isAdmin'])->name('dashboard');

Route::get('lab/dashboard', function () {
    return view('hims.lab.index');
})->middleware(['auth', 'auth.isLab'])->name('lab.dashboard');

Route::get('/emergency/dashboard', function () {
    return view('hims.index');
})->middleware(['auth', 'auth.isEmergency'])->name('emergency.dashboard');

Route::get('/internalmedicine/dashboard', function () {
    return view('hims.admission.index');
})->middleware(['auth', 'auth.isInternalMedicine'])->name('Internalmedicine.dashboard');

Route::group(['middleware'=>['auth','auth.isAdmin']],function() {

    Route::get('/user',[UserController::class,'index'])->name('user.index');
    Route::get('user/edit/{id}',[UserController::class,'edit'])->name('user.edit');
    Route::get('/user/create',[UserController::class,'create'])->name('user.create');
    Route::get('/user/delete/{id}',[UserController::class,'delete'])->name('user.delete');
    Route::post('/user/delete/{id}',[UserController::class,'destroy'])->name('user.destroy');
    Route::post('/user/store', [UserController::class, 'store'])->name('user.store');
    Route::post('/user/edit/{id}', [UserController::class, 'update'])->name('user.update');
});

Route::group(['middleware'=>['auth','auth.isLab']],function() {

   // Route::get('/lab',[DepartmentController::class,'index'])->name('lab.index');
    Route::get('lab/edit/{id}',[DepartmentController::class,'edit'])->name('lab.edit');
    Route::get('/lab/create',[DepartmentController::class,'create'])->name('lab.create');
    Route::get('/lab/delete/{id}',[DepartmentController::class,'delete'])->name('lab.delete');
    Route::post('/lab/delete/{id}',[DepartmentController::class,'destroy'])->name('lab.destroy');
    Route::post('/lab/store', [DepartmentController::class, 'store'])->name('lab.store');
    Route::post('/lab/edit/{id}', [DepartmentController::class, 'update'])->name('lab.update');

});

Route::group(['middleware'=>['auth','auth.isEmergency']],function() {

    Route::get('/emergency/patient',[EmergencyController::class,'index'])->name('emergency.index');
    Route::get('/emergency/visit/{id}',[EmergencyController::class,'visit'])->name('emergency.visit');
    Route::get('/emergency/visit/edit/{id}',[EmergencyController::class,'edit'])->name('emergency.visit.edit');
    Route::get('/emergency/visit/',[EmergencyController::class,'visitlist'])->name('emergency.visitlist');
    Route::get('/emergency/Resus/',[EmergencyController::class,'resuslist'])->name('emergency.resuslist');
    Route::get('/emergency/acute/',[EmergencyController::class,'acutelist'])->name('emergency.acutelist');
    Route::post('/emergency/visit/store', [EmergencyController::class, 'store'])->name('emergency.visit.store');
    Route::post('/emergency/visit/update', [EmergencyController::class, 'update'])->name('emergency.visit.update');

    //create emergency admission request
    Route::get('/emergency/admission/createRequest/{id}',[AdmissionController::class,'createRequest'])->name('createRequest.create');
    Route::get('/emergency/admission/requestList/',[AdmissionController::class,'emergency_admission_request'])->name('EmergencyAdmissionRequest.list');
    Route::get('/emergency/admission/IncomingRequest/edit/{id}',[AdmissionController::class,'emergency_admission_incoming_request_edit'])->name('EmergencyIncomingRequest.edit');
    Route::get('/emergency/admission/IncomingRequestList/',[AdmissionController::class,'emergency_admission_incoming_request'])->name('emergency_admission_incoming_request.list');
    Route::post('/emergency/admission/storeRequest/',[AdmissionController::class,'storeRequest'])->name('storeRequest.store');
    Route::post('/emergency/admission/updateIncomingRequest/',[AdmissionController::class,'updateIncomingRequest'])->name('updateIncomingRequest.update');

});

Route::group(['middleware'=>['auth','auth.isInternalMedicine']],function() {

    Route::get('/internal_medicine/patient',[InternalMedicineController::class,'index'])->name('internal_medicine.index');
    Route::get('/internal_medicine/visit',[InternalMedicineController::class,'visitlist'])->name('internal_medicine.visit');
    Route::get('/internal_medicine/TB',[InternalMedicineController::class,'tblist'])->name('internal_medicine.TB');
    Route::get('/internal_medicine/diabetic',[InternalMedicineController::class,'diabeticlist'])->name('internal_medicine.diabetic');
    Route::get('/internal_medicine/oncology',[InternalMedicineController::class,'oncologylist'])->name('internal_medicine.oncology');
    Route::get('/internal_medicine/visit/{id}',[InternalMedicineController::class,'visit'])->name('internal_medicine.editVisit');
    Route::get('/internal_medicine/visit/edit/{id}',[InternalMedicineController::class,'edit'])->name('internal_medicine.edit');
    Route::post('/internal_medicine/visit/store', [InternalMedicineController::class, 'store'])->name('internal_medicine.visit.store');
    Route::post('/internal_medicine/visit/update', [InternalMedicineController::class, 'update'])->name('internal_medicine.visit.update');
    Route::get('/internal_medicine/medical/list', [InternalMedicineController::class, 'medical_list'])->name('medical_list.list');


    //create internal medicine request
    Route::get('/internal_medicine/admission/createRequest/{id}',[AdmissionController::class,'createInternalMedicineRequest'])->name('internal_medicine_request.create');
    Route::get('/internal_medicine/admission/editRequest/{id}',[AdmissionController::class,'editRequest'])->name('internal_medicine_admission.edit');
    Route::get('/internal_medicine/admission/requestList/',[AdmissionController::class,'internal_medicine_admission_request'])->name('internal_medicine_admission_request.list');
    Route::get('/internal_medicine/admission/OutgoingRequestList/',[AdmissionController::class,'internal_medicine_admission_OutgoingRequest'])->name('internal_medicine_admission_OutgoingRequest.list');
    Route::post('/internal_medicine/admission/updateRequest',[AdmissionController::class,'updateRequest'])->name('internal_medicine_admission.update');
    Route::post('/internal_medicine/admission/storeInternalMedicineRequest',[AdmissionController::class,'storeInternalMedicineRequest'])->name('internal_medicine_request.store');
    
});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::controller(AdminController::class)->group(function () {
    Route::get('/admin/logout', 'destroy')->name('admin.logout');
});

require __DIR__.'/auth.php';
