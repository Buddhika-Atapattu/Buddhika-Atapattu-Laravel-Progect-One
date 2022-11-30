<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\adminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Home\HomeSliderController;
use App\Http\Controllers\Home\AnimatedSliderController;
use App\Http\Controllers\Gallery\GalleryController;
use App\Http\Controllers\frontend\frontend_all;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\LoginResetPassword;
use App\Http\Controllers\CheckUserLoginStatus;

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

//Route::get('/', function () {
//    return view('frontend.index');
//});

//prevent go back
Route::group(['middleware' => 'prevent-back-history'],function(){


//check auth login
Route::middleware('auth')->group(function(){
    
//check login status
Route::controller(CheckUserLoginStatus::class)->group(function(){
    Route::get('/user/login/status','UserLoginStatus')->name('login.reset.password'); // route for home page
});

//admin all route group
Route::controller(adminController::class)->group(function(){
    Route::get('/admin','Admin')->name('admin'); // route for logout page
    Route::get('/admin/logout','destroy')->name('admin.logout'); // route for logout page
    Route::get('/admin/profile','profile')->name('admin.profile');// route for view profile page
    Route::get('/edit/profile','editProfile')->name('edit.profile'); // route for edit page
    Route::get('/change/password','changePassword')->name('change.password');// route for change password page
    Route::get('/admin/about','adminAbout')->name('admin.about');// route for about form
    Route::get('/admin/contact','adminContact')->name('admin.contact');// route for about form
    Route::get('/admin/role/management','adminRoleManagement')->name('admin.role.management');// route for view role
    Route::get('/admin/role/add','adminRoleAdd')->name('admin.role.add');// route for new role form
    Route::get('/admin/role/edit/{id}','adminRoleEdit')->name('admin.role.edit');// route for edit role form
    Route::get('/admin/role/delete/{id}','adminRoleDelete')->name('admin.role.delete');// route for delete role form
    Route::get('/admin/view/all/role/permissions','adminViewAllRollPermissions')->name('admin.view.all.role.permissions');// route for view all role permissions
    Route::get('/admin/edit/role/permission/{id}','adminEditRolePermission')->name('admin.edit.permission');// route for edit role permissions
    Route::get('/admin/delete/role/permission/{id}','adminDeleteRolePermission')->name('admin.delete.permission');// route for delete role permissions
    Route::get('/admin/add/new/role/permission','adminAddNewRolePermission')->name('admin.add.new.role.permission');// route for add new role permission
    
    Route::post('/admin/update/role/permission/{id}','adminUpdateRolePermission')->name('admin.update.role.permission');// route for update role permissions
    Route::post('/admin/store/role/permission','adminStoreRolePermission')->name('admin.store.role.permission');// route for update role permissions
    Route::post('/admin/role/store','adminRoleStore')->name('admin.role.store');// route for store role form
    Route::post('/admin/role/update/{id}','adminRoleUpdate')->name('admin.role.update');// route for update role role form
    Route::post('/store/profile','storeProfile')->name('store.profile'); // for update user detailes
    Route::post('/admin/image_crop','crop')->name('crop.image'); // for crop image in edit user profile
    Route::post('/update/password','updatePassword')->name('update.password'); // change the password by user
    Route::post('/update/about','updateAbout')->name('update.about'); // update about page
    Route::post('/update/contact','updateContact')->name('update.contact'); // update about page
});

//admin all route group
Route::controller(UserController::class)->group(function(){
    Route::get('/admin/user/view','AdminUserView')->name('admin.user.view'); // route for view users
    Route::get('/admin/user/add','AdminUserAdd')->name('admin.user.add'); // route for view users
    Route::get('/admin/user/edit/{id}','AdminUserEdit')->name('admin.user.edit');// route for edit user
    Route::get('/admin/user/delete/{id}','AdminUserDelete')->name('admin.user.delete');// route for edit user
    Route::get('/admin/rest/password/{id}','AdminResetPassword')->name('admin.reset.password');// route for reset password
    Route::get('/admin/rest/password/make/pdf/{id}/{password}/{status}','AdminResetPasswordMakePDF')->name('admin.reset.password.make.pdf');// route for reset password
    Route::get('/admin/rest/password/make/pdf/{name}/{username}/{email}/{password}/{role}/{status}/{login_status}/{address}','AdminNewUserMakePDF')->name('admin.new.user.make.pdf');// route for reset password
    
    Route::post('/admin/update/rest/password/{id}','AdminUpdateResetPassword')->name('admin.update.reset.password');// route for update reset password
    Route::post('/admin/update/user/{id}','AdminUpdateUser')->name('admin.update.user');// route for update reset password
    Route::post('/admin/store/user','AdminStoreUser')->name('admin.store.user');// route for update reset password
});

//home slides route group
Route::controller(HomeSliderController::class)->group(function(){
    Route::get('/home/slide','homeSlider')->name('home.slide'); // route home slide
    Route::post('/update/slider','updateSlider')->name('update.slider'); // route update home slide
});

//animated slider    slides route group
Route::controller(AnimatedSliderController::class)->group(function(){
    Route::get('/animated/slide','animatedSlider')->name('animated.slide'); // route home slide
    Route::post('/update/animated','updateAnimated')->name('update.animated'); // route update home slide
});

//blog route group
Route::controller(BlogController::class)->group(function(){
    Route::get('/all/blog/content','AllBlogContent')->name('all.blog.content');
    Route::get('/add/blog/content','AddBlogContent')->name('add.blog.content');
    Route::get('/all/blog/category','AllBlogCategory')->name('all.blog.category');
    Route::get('/add/blog/category','AddBlogCategory')->name('add.blog.category');
    Route::get('/all/blog/tags','AllBlogTags')->name('all.blog.tags');
    Route::get('/add/blog/tags','AddBlogTags')->name('add.blog.tags');
    
    Route::get('/edit/blog/category/{id}','EditBlogCategory')->name('edit.blog.category');
    Route::get('/delete/blog/category/{id}','DeleteBlogCategory')->name('delete.blog.category');
    Route::get('/edit/blog/tag/{id}','EditBlogTag')->name('edit.blog.tag');
    Route::get('/delete/blog/tag/{id}','DeleteBlogTag')->name('delete.blog.tag');
    Route::get('/edit/blog/{id}','EditBlog')->name('edit.blog');
    Route::get('/delete/blog/{id}','DeleteBlog')->name('delete.blog');
    Route::get('/delete/blog/image/{id}','DeleteBlogImage')->name('delete.blog.image');
    
    Route::post('/store/blog/category','StoreBlogCategory')->name('store.blog.category');
    Route::post('/store/blog/tag','StoreBlogTag')->name('store.blog.tag');
    Route::post('/store/blog/content','StoreBlogContent')->name('store.blog.content');
    
    Route::post('/update/blog/category/{id}','UpdateBlogCategory')->name('update.blog.category');
    Route::post('/update/blog/tag/{id}','UpdateBlogTag')->name('update.blog.tag');
    Route::post('/update/blog/{id}','UpdateBlog')->name('update.blog');
});

//gallery route group
Route::controller(GalleryController::class)->group(function(){
    Route::get('/admin/view/gallery','AdminViewGallery')->name('admin.view.gallery');
    Route::get('/gallery/view/image/{id}','ViewImage')->name('view.image');
    Route::get('/gallery/delete/image/{id}','DeleteImage')->name('delete.image');
    Route::post('/admin/upload/gallery','AdminUploadGallery')->name('admin.upload.gallery');
    Route::post('/fetch','ImageFetch')->name('image.fetch');
});

//reset passowrd route group
Route::controller(LoginResetPassword::class)->group(function(){
    Route::get('/login/reset/password','LoginResetPassword')->name('login.reset.password'); // route for home page
    Route::post('/login/update/password','LoginUpdatePassword')->name('login.update.password'); // route for home page
});



});//end middleware auth

});//end middleware go back

//register route group
Route::controller(RegisteredUserController::class)->group(function(){
    Route::post('/register/crop/image','crop')->name('crop.image'); // for crop image in edit user profile
});


//frontend route group
Route::controller(frontend_all::class)->group(function(){
    Route::get('/','home')->name('home'); // route for home page
    Route::get('/about','about')->name('about'); // route for about page
    Route::get('/blog','blog')->name('blog'); // route for blog page
    Route::get('/contact','contact')->name('contact'); // route for contact page
    Route::get('/shop','shop')->name('shop'); // route for shop page
    Route::get('/search','search')->name('search'); // route for blog search
    Route::get('/terms','terms')->name('terms'); // route for contact page
    Route::get('/view/blog/{id}','ViewBlog')->name('view.blog'); // route for contact page
    Route::post('/send/email','SendEmail')->name('send.email'); // route for contact page
});


Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth','verified'])->name('dashboard');

require __DIR__.'/auth.php';
