<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SubServiceController;
use App\Http\Controllers\SubServiceFieldController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\ForumReplyController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CityController;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return ["status"=>"hello"];
});

Route::get('/test', function () {
    return response()->json(["server"=>"running"], 200);
});

Route::post('register', [UserController::class, 'create']);
Route::post('verify/{email}', [UserController::class, 'verify']);
Route::post('social/verify/{email}', [UserController::class, 'google_verify']);
Route::post('social/{email}', [UserController::class, 'google_phone']);
Route::post('login', [UserController::class, 'login']);
Route::post('social', [UserController::class, 'google']);
Route::get('logout', [UserController::class, 'logout'])->middleware('auth:sanctum');
Route::post('service/create', [ServiceController::class, 'create'])->middleware('auth:sanctum');
Route::get('service/view', [ServiceController::class, 'view']);
Route::post('service/update/{id}', [ServiceController::class, 'update'])->middleware('auth:sanctum');
Route::get('service/view-by-id/{id}', [ServiceController::class, 'viewById'])->middleware('auth:sanctum');
Route::post('service/update-logo/{id}', [ServiceController::class, 'update_logo'])->middleware('auth:sanctum');
Route::delete('service/delete/{id}', [ServiceController::class, 'delete'])->middleware('auth:sanctum');
Route::post('sub-service/create/{service_id}', [SubServiceController::class, 'create'])->middleware('auth:sanctum');
Route::get('sub-service/view', [SubServiceController::class, 'view']);
Route::get('sub-service/view-by-service-id/{service_id}', [SubServiceController::class, 'viewById']);
Route::get('sub-service/view-by-id/{sub_service_id}', [SubServiceController::class, 'viewBySubServiceId'])->middleware('auth:sanctum');
Route::post('sub-service/update/{id}', [SubServiceController::class, 'update'])->middleware('auth:sanctum');
Route::delete('sub-service/delete/{id}', [SubServiceController::class, 'delete'])->middleware('auth:sanctum');
Route::post('sub-service-fields/create/{sub_service_id}', [SubServiceFieldController::class, 'create'])->middleware('auth:sanctum');
Route::get('sub-service-fields/view/{sub_service_id}', [SubServiceFieldController::class, 'view'])->middleware('auth:sanctum');
Route::get('sub-service-fields/view-for-admin', [SubServiceFieldController::class, 'view_admin'])->middleware('auth:sanctum');
Route::get('sub-service-fields/view-for-admin-id/{sub_service_id}', [SubServiceFieldController::class, 'view_admin_sub_service_id'])->middleware('auth:sanctum');
Route::post('sub-service-fields/set-status/{sub_service_field_id}', [SubServiceFieldController::class, 'set_status'])->middleware('auth:sanctum');
Route::post('sub-service-fields/enter-data/{sub_service_id}', [SubServiceFieldController::class, 'create_custom_sub_service_field_data'])->middleware('auth:sanctum');
Route::post('testimonial/create', [TestimonialController::class, 'create'])->middleware('auth:sanctum');
Route::get('testimonial/view', [TestimonialController::class, 'view']);
Route::post('forum/create', [ForumController::class, 'create'])->middleware('auth:sanctum');
Route::get('forum/view', [ForumController::class, 'view']);
Route::put('forum/update/{id}', [ForumController::class, 'update'])->middleware('auth:sanctum');
Route::delete('forum/delete/{id}', [ForumController::class, 'delete'])->middleware('auth:sanctum');
Route::post('forum-reply/create/{forum_id}', [ForumReplyController::class, 'create'])->middleware('auth:sanctum');
Route::put('forum-reply/update/{id}', [ForumReplyController::class, 'update'])->middleware('auth:sanctum');
Route::delete('forum-reply/delete/{id}', [ForumReplyController::class, 'delete'])->middleware('auth:sanctum');

Route::post('city/create', [CityController::class, 'create'])->middleware('auth:sanctum');
Route::get('city/view', [CityController::class, 'view']);
Route::post('city/update/{id}', [CityController::class, 'update'])->middleware('auth:sanctum');
Route::get('city/view-by-id/{id}', [CityController::class, 'viewById'])->middleware('auth:sanctum');
Route::delete('city/delete/{id}', [CityController::class, 'delete'])->middleware('auth:sanctum');

Route::get('forum-reply/view/{forum_id}', [ForumReplyController::class, 'view']);
Route::post('admin/login', [AdminController::class, 'login']);
Route::post('admin/forgot-password', [AdminController::class, 'forgot_password']);
Route::post('admin/reset-password/{email}', [AdminController::class, 'reset_password']);

Route::get('admin/check', [AdminController::class, 'checkAdmin'])->middleware('auth:sanctum');