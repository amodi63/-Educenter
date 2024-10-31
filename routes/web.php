<?php

use Illuminate\Support\Facades\Auth;
use App\Events\Category1Notification;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\Admin\NewController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\TeacherController;
use App\Http\Controllers\Admin\CategoryController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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









//


Auth::routes();

Route::group(['middleware' => ['auth']], function(){
Route::get('/',[SiteController::class, 'index'])->name('site.index');

 Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
 Route::get('/about',[SiteController::class, 'about'])->name('site.about');
Route::get('/course',[SiteController::class, 'course'])->name('site.course');
Route::get('/teacher',[SiteController::class, 'teacher'])->name('site.teacher');
Route::get('/event',[SiteController::class, 'event'])->name('site.event');
Route::get('/contact', [SiteController::class, 'contact'])->name('contact');
Route::post('/contact', [SiteController::class, 'contact_data'])->name('contact_data');

});


Route::prefix(LaravelLocalization::setLocale())->group(function(){
    Route::prefix('admin')->name('admin.')->middleware('auth','check_user')->group(function() {
        Route::get('/', [AdminController::class, 'index'])->name('index');
        Route::resource('categories', CategoryController::class);
        Route::resource('courses', CourseController::class);
        Route::resource('teachers',  TeacherController::class);
        Route::resource('abouts',  AboutController::class);
        Route::resource('events', EventController::class);
        Route::resource('news',  NewController::class);
        Route::get('users', [UserController::class, 'index'])->name('users.index');
        Route::delete('users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
        Route::resource('roles', RoleController::class);

    });

    });


    Route::view('not_allowed', 'not_allowed');




   //Route::get('/home',function(){

   // if(Auth::check()){
   //    if(Auth::user()->type =='admin'){
       //    return view('admin.index');

      //  }else{

      //      return redirect()->route('site.index');
      // }
   // }
//});


Route::get('/send',function(){
    event(new Category1Notification('bouthaina'));
});
