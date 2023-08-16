<?php

use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubUserController;
use App\Http\Controllers\VisiteurController;
use App\Http\Controllers\VisitorController;
use App\Http\Controllers\RespoAuthController;
use App\Http\Controllers\RecepAuthController;
use App\Http\Controllers\SuivieVisiteurController;
use App\Http\Controllers\UploadImageController;
use App\Http\Controllers\FilterVisiteur;
use App\Models\Visiteur;
use App\Models\Visit;
use Illuminate\Support\Facades\Route;
use App\Mail\TestMail;

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
Route::get('/', [HomeController::class, 'index'])->name('home');
// Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('about', [HomeController::class, 'about'])->name('about');

Auth::routes();

Route::get('registration', [CustomAuthController::class, 'registration'])->name('register');
Route::get('login', [CustomAuthController::class, 'index'])->name('login');

Route::post('custom-registration', [CustomAuthController::class, 'custom_registration'])->name('register.custom');
Route::post('custom-login', [CustomAuthController::class, 'custom_login'])->name('login.custom');

Route::get('dashboard', [CustomAuthController::class, 'dashboard'])->name('dashboard');



Route::get('logout', [CustomAuthController::class, 'logout'])->name('logout');




Route::get('login_respo', [RespoAuthController::class, 'index'])->name('login_respo');
Route::post('respo-login', [RespoAuthController::class, 'respo_login'])->name('login.respo');
Route::get('logout-respo', [RespoAuthController::class, 'logout'])->name('logout.respo');


Route::get('login_recep', [RecepAuthController::class, 'index'])->name('login_recep');
Route::post('recep_login', [RecepAuthController::class, 'accueil_login'])->name('login.recep');
// Route::get('logout-recep', [RecepAuthController::class, 'logout'])->name('login.recep');


Route::get('profile', [ProfileController::class, 'index'])->name('profile');
Route::post ('profile/edit_validation', [ProfileController::class, 'edit_validation'])->name('profile.edit_validation');

Route::get('sub_user', [SubUserController::class, 'index'])->name('sub_user');
Route::get('sub_user/fetchall', [SubUserController::class, 'fetch_all'])->name('sub_user.fetchall');

Route::get('sub_user/add', [SubUserController::class, 'add'])->name('sub_user.add');
Route::post('sub_user/add_validation', [SubUserController::class, 'add_validation'])->name('sub_user.add_validation');

Route::get('sub_user/edit/{id}', [SubUserController::class, 'edit'])->name('edit');
Route::post('sub_user/edit_validation', [SubUserController::class, 'edit_validation'])->name('sub_user.edit_validation');

Route::get('sub_user/delete/{id}', [SubUserController::class, 'delete'])->name('delete');









Route::post('images', [UploadImageController::class, 'updateProfile'])->name('img');








Route::get('recherche_visit',[FilterVisiteur::class,'rechercheVisiteur'])->name('recherche');



Route::get('visitor/{id}', [SuivieVisiteurController::class, 'index'])->name('visitors.index');
Route::get('info_visitor/{id}', [VisiteurController::class, 'info_visiteur'])->name('info.index');

Route::get('/visit/{id}/edit', [SuivieVisiteurController::class, 'edit'])->name('visit.edit');


Route::post('/visit/{id}/store', [SuivieVisiteurController::class, 'store'])->name('visit.store');








Route::resource('/visiteur',VisiteurController::class);

Route::get('/get_visiteurs/{id}', [VisiteurController::class, 'getVisiteur']);    
    