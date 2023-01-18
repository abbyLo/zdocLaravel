<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Web\AdminController;
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

// Route::get('/', function () {
//     return view('index');
// });
Route::group([
    
    "prefix" => "admin"
], function($router) {
    Route::controller(AdminController::class)->group(function() {
        //列表
        Route::get("list","list");
        //新增
        Route::get("create","create");
        //編輯
        Route::get("edit/{id}","edit");
        //儲存(新增、編輯、刪除)
        Route::post("update","update");
        Route::post("inset","ajaxCreate");
    });
});