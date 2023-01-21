<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// New User Register Api 
Route::post('register-user', 'UserApiController@register_user')->name('register-user');
// User Login Apis 
Route::post('login-user', 'UserApiController@login_user')->name('login-user');
// Check Token Apis 
Route::get('token-check', 'UserApiController@token_check')->name('token-check');

Route::middleware('auth:api')->group(function () {
    
    Route::any('home-api', 'UserApiController@home_api')->name('home-api');
    // Get All Company Unit Apis 
    Route::get('get-all-company-unit', 'UserApiController@get_client_company_unit')->name('get-all-company');
    // Change Company Unit 
    Route::post('edit-company-unit/{company_unit}', 'UserApiController@edit_client_company_unit')->name('edit-company-unit');
    // Get All Company With Unit Apis
    Route::get('get-all-company-with-unit', 'UserApiController@get_client_company_with_unit')->name('get-all-company-with-unit');
    // Show User Profile Apis
    Route::get('profile-user', 'UserApiController@profile_user')->name('profile-user');
    // Get All Branch / Location Apis
    Route::get('get-all-branch', 'UserApiController@get_all_branch')->name('get-all-branch');
    // Change /Edit Branch Apis
    Route::post('edit-branch/{branch}', 'UserApiController@edit_branch')->name('edit-branch');
    // Get Company By Branch Id Apis
    Route::post('get-company-by-branch-id', 'UserApiController@get_company_by_branch_id')->name('get-company-by-branch-id');
    // Get Company Unit By company Id Apis 
    Route::post('get-company-unit-by-company-id', 'UserApiController@get_company_unit_by_company_id')->name('get-company-unit-by-company-id');
    // Get All Area Rounder Apis 
    Route::get('get-all-area-rounder', 'UserApiController@get_all_area_rounder')->name('get-all-area-rounder');
    // New Are Rounder Add / Create Apis 
    Route::post('create-area-rounder', 'UserApiController@create_area_rounder');
    // Edit / Change Area Rounder 
    Route::post('edit-area-rounder', 'UserApiController@edit_area_rounder');

    //Get Employee Field 
    Route::get('emp-field', 'UserApiController@get_emp_field')->name('emp-field');
    // Add Employee
    Route::post('add-emp', 'UserApiController@add_employee')->name('add-emp');
    // Get all Departmrnt Details 
    Route::get('get-all-department', 'UserApiController@get_all_department')->name('get-all-department');
    // Get Single Department By Id  
    Route::post('get-department-by-id', 'UserApiController@get_department_by_id')->name('get-department-by-id');
    // Get All Designation
    Route::get('get-all-designation', 'UserApiController@get_all_designation')->name('get-all-designation');
    // Get All Company 
    Route::get('get-all-company', 'UserApiController@get_client_company')->name('get-all-company'); //
    // Edit Client Company  
    Route::post('edit-client-company/{company}', 'UserApiController@edit_client_company')->name('edit-client-company'); //
    // Get company By id Apis
    Route::post('get-company-by-id', 'UserApiController@get_company_by_id')->name('get-company-by-id');
    // Get User Status Apis
    Route::post('user-status/{id}', 'UserApiController@user_status');
    // Transfer Employee Apis 
    Route::post('transfer-employee', 'UserApiController@edit_transfer_employee');
     // Get All Transfer Employee Apis 
    Route::get('get-transfer-employee', 'UserApiController@show_transfer_employee');
    // pending Attendance Apis 
    Route::post('pending-attendance/{id}', 'UserApiController@pending_attendance');
    
    // Show All Employee Attendance Apis
    Route::get('all-attendance', 'UserApiController@show_attendance')->name('show_attendance');
    // Show All Employee Details Apis 
    Route::get('all-employee', 'UserApiController@show_employee')->name('show_employee');
    // Show  All new employee field Apis
    Route::get('emp-field-new', 'UserApiController@get_emp_field_2')->name('emp-field-new');
    // Add Employee Static Data Apis
    Route::post('add-emp-static', 'UserApiController@add_employee_static')->name('add-emp-static');
    // Check Aadhar Already Exist $ Not Exist Apis
    Route::post('aadhar-check', 'UserApiController@aadhar_check')->name('aadhar-check');
    // Add New Employee Apis
    Route::post('add-emp-new', 'UserApiController@add_employee_new')->name('add-emp-new');
    // Get All Employee Roles Apis
    Route::get('get-all-emp-role', 'EmpRoleController@get_all_emp_role')->name('get-all-emp-role');
    // Get all employee under company unit  Apis
    Route::post('get-all-emp-under-company-unit', 'UserApiController@get_all_emp_company_unit')->name('get-all-emp-role'); //
    // Attendance Status Apis
    Route::post('status-attendance', 'UserApiController@status_attendance')->name('status-attendance');
    // Add Division Apis
    Route::post('add-division', 'BranchController@add_division')->name('add-division');
    // Add New Company Apis
    Route::post('add-company', 'ClientCompanyController@add_company')->name('add-company');
    // Add Multi Attendance Apis
    Route::post('add-attendance', 'UserApiController@multiAttendance')->name('add-attendance');
    //Role Fillter Api 
    Route::get('filter-role/{id}', 'UserApiController@filter_role')->name('filter-role');
     //Search Fillter Api By Name
    Route::get('search-filter-name/{name}', 'UserApiController@search_filter_name')->name('search-filter');
    //Search Fillter Api By mobile
    Route::get('search-filter-mobile/{mobile}', 'UserApiController@search_filter_mobile')->name('search-filter');
    //Search Fillter Api By Employee Id
    Route::get('search-filter-id/{id}', 'UserApiController@search_filter_employee_id')->name('search-filter');
    //Search Fillter Api By Aadhar Number
    Route::get('search-filter-aadhar/{aadhar_card_no}', 'UserApiController@search_filter_aadhar_card')->name('search-filter');

    // Add Single Employee Attendance Apis
    Route::post('add-attendance-2/{id}', 'UserApiController@b ulkAttendance_2')->name('add-attendance-2');
    // Add New Company Unit Apis
    Route::post('add-company-unit', 'ClientCompanyUnitController@add_company_unit')->name('add-company-unit');

    Route::get('get-employee', 'UserApiController@getEmployee')->name('get-employee');
    
    Route::get('employee-by-role', 'UserApiController@employeeByRole')->name('employee-by-role');
});

Route::post('/notification','NotificationController@sendNotification')->name('notification');
Route::post('/savePushNotificationToken','NotificationController@savePushNotificationToken')->name('savePushNotificationToken');
Route::post('/sendPushNotification','NotificationController@sendPushNotification')->name('sendPushNotification');
