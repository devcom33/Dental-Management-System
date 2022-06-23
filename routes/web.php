<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\FullCalenderController;
use App\Http\Controllers\FullCalenderController_D;
use App\Http\Controllers\AssistantController;
use App\Http\Controllers\ConsultationassistantController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Logout;
use App\Http\Controllers\TraitementsController;
use App\Http\Controllers\OperationController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\homeController;


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
Route::post('/dashboard',[Controller::class,'dashboard'])->name('home');
Route::group(['middleware'=>['AuthCheck']], function(){
    Route::get('/',[Controller::class,'login']);


    Route::get('/dashboard/{id}', [Controller::class,'indx'])->name('home.indx');

    Route::get('/dashboard/{id}/{id2}', [Controller::class,'indxassistant'])->name('home.indxassistant');

    Route::get('/dashboard', [Controller::class,'indexadmin'])->name('home.indexadmin');

    //Admin
Route::get('Admin/doctor',[AdminController::class,'index'])->name('addoctor');
Route::get('Admin/doctor/create', [AdminController::class, 'create']);
Route::post('Admin/doctor', [AdminController::class, 'store'])->name('admind.store');
Route::get('Admin/doctor/{id}/edit', [AdminController::class, 'edit'])->name('admind.edit');
Route::put('Admin/doctor/{id}', [AdminController::class, 'update'])->name('admind.update');
Route::get('Admin/doctor/{id}', [AdminController::class, 'show'])->name('admind.show');
Route::delete('Admin/doctor/{id}', [AdminController::class, 'destroy'])->name('admind.destroy');

Route::get('Admin/assistant',[AdminController::class,'index'])->name('adassistant');
Route::get('Admin/assistant/create', [AdminController::class, 'create']);
Route::post('Admin/assistant', [AdminController::class, 'store'])->name('admin.store');
Route::get('Admin/assistant/{id}/edit', [AdminController::class, 'edit'])->name('admin.edit');
Route::put('Admin/assistant/{id}', [AdminController::class, 'update'])->name('admin.update');
Route::get('Admin/assistant/{id}', [AdminController::class, 'show'])->name('admin.show');
Route::delete('Admin/assistant/{id}', [AdminController::class, 'destroy'])->name('admin.destroy');

// Route::get('admin/{id}',[AdminController::class,'AdminController']);
//Route::resource('Admin/assistant', AdminController::class);



//doctor

Route::get('doctor/patient/{id1}',[DoctorController::class,'index'])->name('doctor.index');
Route::get('doctor/patient/create', [DoctorController::class, 'create']);
Route::post('doctor/patient', [DoctorController::class, 'store'])->name('doctor.store');
Route::get('doctor/patient/{id}/{idd}', [DoctorController::class, 'show'])->name('doctor.show');
Route::get('doctor/patient/{id}/edit', [DoctorController::class, 'edit'])->name('doctor.edit');
Route::put('doctor/patient/{id}', [DoctorController::class, 'update'])->name('doctor.update');
Route::delete('doctor/patient/{id}', [DoctorController::class, 'destroy'])->name('doctor.destroy');
Route::get('doctorR/patient/pdf/{id}', [AssistantController::class, 'pdf'])->name('doctor.pdf');
//Assistant
Route::get('assistant/patient/{id1a}/{id2b}',[AssistantController::class,'index'])->name('assistant.index');
Route::get('assistant/patient/create', [AssistantController::class, 'create']);
Route::post('assistant/patient', [AssistantController::class, 'store'])->name('assistant.store');
Route::get('assistant/patient/{id}/edit', [AssistantController::class, 'edit'])->name('assistant.edit');
Route::put('assistant/patient/{id}', [AssistantController::class, 'update'])->name('assistant.update');
Route::get('assistantT/patient/{idw1}/{idw2}/{idw3}', [AssistantController::class, 'show'])->name('assistant.show');
//pdf
Route::get('assistantT/patient/pdf/{id}', [AssistantController::class, 'pdf'])->name('assistant.pdf');


Route::delete('assistant/patient/{id}', [AssistantController::class, 'destroy'])->name('assistant.destroy');

//Route::get('/assistant/{id1}/{id2}',[AssistantController::class,'index_Ass'])->name('assistant');
//Route::get('/assistant/{id1}/{id2}',[AssistantController::class,'index_Ass'])->name('assistant');


//Route::get('/edit-industry/{id}', 'Industries@edit')->name('admin.editIndustry');

Route::get('/SearchDoctor',[AdminController::class,'searchD'])->name('admin.searchD');
Route::get('/Search',[AdminController::class,'searchA'])->name('admin.assistant');
Route::get('/Search1/{id1c}/{id2c}',[AssistantController::class,'search'])->name('assistant.search');
Route::get('/Search1/{id1c}',[DoctorController::class,'search'])->name('doctor.search');


// Route::get('/admin/{key}',[AdminController::class,'click']);

Route::get('doctor/consultation/{id0}',[ConsultationController::class,'index'])->name('consultationdoctor.index');
Route::get('doctor/consultation/create', [ConsultationController::class, 'create']);
Route::post('doctor/consultation', [ConsultationController::class, 'store'])->name('consultationdoctor.store');
Route::get('doctor/consultation/{id}/edit', [ConsultationController::class, 'edit'])->name('consultationdoctor.edit');
Route::put('doctor/consultation/{id}', [ConsultationController::class, 'update'])->name('consultationdoctor.update');
Route::get('doctor/consultation/{id}', [ConsultationController::class, 'show'])->name('consultationdoctor.show');
Route::delete('doctor/consultation/{id}', [ConsultationController::class, 'destroy'])->name('consultationdoctor.destroy');

Route::get('assistant/consultation/{id1a}/{id2b}',[ConsultationassistantController::class,'index'])->name('consultationassistant.index');
Route::get('assistant/consultation/create', [ConsultationassistantController::class, 'create']);
Route::post('assistant/consultation', [ConsultationassistantController::class, 'store'])->name('consultationassistant.store');
Route::get('assistant/consultation/{id}/edit', [ConsultationassistantController::class, 'edit'])->name('consultationassistant.edit');
Route::put('assistant/consultation/{id}', [ConsultationassistantController::class, 'update'])->name('consultationassistant.update');
Route::get('assistant/consultation/{id}', [ConsultationassistantController::class, 'show'])->name('consultationassistant.show');
Route::delete('assistant/consultation/{id}', [ConsultationassistantController::class, 'destroy'])->name('consultationassistant.destroy');

// Route::get('/Search1/{id1c}/{id2c}}',[AssistantController::class,'search'])->name('assistant.search');


//fullcalender
Route::get('assistant/fullcalender/{ida}/{idb}', [FullCalenderController::class, 'index'])->name('fullcalenderA.index');
Route::post('assistant/fullcalender', [FullCalenderController::class, 'store'])->name('fullcalender.store');
Route::post('assistant/fullcalenderAjax', [FullCalenderController::class, 'ajax']);

//fullcalender
Route::get('doctor/fullcalender/{idd}', [FullCalenderController_D::class, 'index'])->name('fullcalender.index');
Route::post('doctor/fullcalender', [FullCalenderController_D::class, 'store'])->name('fullcalender.store');
Route::post('doctor/fullcalenderAjax', [FullCalenderController_D::class, 'ajax']);


Route::get('doctor/pending/{id}', [FullCalenderController_D::class, 'pending'])->name('pendingX');
Route::get('doctor/completed/{id}', [FullCalenderController_D::class, 'completed'])->name('completedX');
Route::get('doctor/validier/{id}', [FullCalenderController_D::class, 'valider'])->name('doctor.validerX');


Route::get('assistant/pending/{idp1}/{idp2}', [FullCalenderController::class, 'pending'])->name('pending');
Route::get('assistant/completed/{idc}/{idc2}', [FullCalenderController::class, 'completed'])->name('completed');

Route::get('doctor/service/{id}', [ServicesController::class, 'index'])->name('service.index');
Route::post('doctor/service', [ServicesController::class, 'store'])->name('service.store');


Route::resource('dent', DentsController::class);

Route::resource('traitement', TraitementsController::class);
Route::resource('operation', OperationController::class);
});


Route::get('doctor/logout', [Logout::class, 'logout'])->name('logout');
Route::get('assistant/logout', [Logout::class, 'logout'])->name('logoutAssistant');
