<?php
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DependencyController;
use App\Http\Controllers\TodoListController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::post('/info_create',[HomeController::class,'info_create'])->name('info.create');
Route::get('/info_data_show',[HomeController::class,'info_data_show'])->name('info.data.show');
Route::get('/info_edit/{id}',[HomeController::class,'info_edit'])->name('info.edit');
Route::post('/info_update/{id}',[HomeController::class,'info_update'])->name('info.update');
Route::get('/info_delete/{id}',[HomeController::class,'info_delete'])->name('info.delete');
Route::post('/status/change/',[HomeController::class,'status_change'])->name('status.change');

// Route::get('logout',[LoginController::class,'logout'])->name('logout');
Route::get('user/data',[HomeController::class,'user_data'])->name('user.data');
Route::get('api/data',[HomeController::class,'api_data'])->name('api.data');

Route::get('dependent/drop',[DependencyController::class,'dependent_drop'])->name('dependent.drop');
Route::get('get_state',[DependencyController::class,'get_state'])->name('get.state');
Route::get('get_city',[DependencyController::class,'get_city'])->name('get.city');

// todo list

Route::get('/todo/list/create',[TodoListController::class,'todo_list_create'])->name('todo.list');
Route::post('/todolist/insert',[TodoListController::class,'todolist_insert'])->name('todolist.insert');
Route::get('/all_member',[TodoListController::class,'all_member'])->name('all.member');
Route::get('/member/edit/{id}',[TodoListController::class,'member_edit'])->name('member.edit');
Route::post('/member/update/{id}',[TodoListController::class,'member_update'])->name('member.update');
Route::get('/member/view/{id}',[TodoListController::class,'member_view'])->name('member.view');
Route::get('/member/delete/{id}',[TodoListController::class,'member_delete'])->name('member.delete');

Route::get('/todo/edit/{id}',[TodoListController::class,'todo_edit'])->name('todo.edit');
Route::post('/todo/update/{id}',[TodoListController::class,'todo_update'])->name('todo_update');
Route::get('/todo/delete/{id}',[TodoListController::class,'todo_delete'])->name('todo_delete');
Route::get('/todo/view/{id}',[TodoListController::class,'todo_view'])->name('todo_view');

// task

Route::post('/task/list/insert',[TodoListController::class,'task_list_insert'])->name('task.list.insert');
Route::get('/task/edit/{id}',[TodoListController::class,'task_edit'])->name('task.edit');
Route::post('/task/update/{id}',[TodoListController::class,'task_update'])->name('task.update');
Route::get('/task/delete/{id}',[TodoListController::class,'task_delete'])->name('task.delete');
Route::get('/task/view/{id}',[TodoListController::class,'task_view'])->name('task_view');
Route::get('/todo/list/view',[TodoListController::class,'todo_list_view'])->name('todo.list.view');
Route::POST('/status/change',[ToDoController::class,'status_change'])->name('status.change');


