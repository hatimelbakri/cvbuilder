<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\backend\backendController;
use App\Http\Controllers\frontend\frontendController;
use App\Http\Controllers\ProfileController;
use App\Models\cv;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/', [frontendController::class, 'index']);


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

Route::get('/user/cv', [backendController::class, 'Usercv'])->name('usercv');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::controller(backendController::class)->group(function () {
        Route::get('user/edit', 'editUser')->name('editUser');
        Route::post('user/update', 'updateUser')->name('updateUser');
        Route::get('/user/cv', 'Usercv')->name('usercv');
        Route::post('/user/logout', [AuthenticatedSessionController::class, 'userLogout'])->name('user.logout');
        
        // Template Routes
        Route::post('/save/template', 'saveTemplate')->name('save.template');
        Route::get('/edit/template', 'editTemplate')->name('edit.template');
        Route::post('/update/template', 'updateTemplate')->name('update.template');
        
        // Basic Information Routes
        Route::get('/user/info', 'Userinfo')->name('user.info');
        Route::post('/save/info', 'saveInfo')->name('save.info');
        Route::get('/edit/info', 'editInfo')->name('edit.info');
        Route::post('/update/info', 'updateInfo')->name('update.info');
        
        // User Profile Routes
        Route::get('/user/profile', 'Userprofile')->name('user.profile');
        Route::post('/save/profile', 'saveProfile')->name('save.profile');
        Route::get('/edit/profile', 'editProfile')->name('edit.profile');
        Route::post('/update/profile', 'updateProfile')->name('update.profile');
        
        // User Skills Routes
        Route::get('/user/skills', 'UserSkills')->name('user.skills');
        Route::post('/save/skills', 'saveSkills')->name('save.skills');
        Route::get('/edit/skills', 'editSkills')->name('edit.skills');
        Route::post('/update/skills', 'updateSkills')->name('update.skills');
        
        // User Education Routes
        Route::get('/user/education', 'UserEducation')->name('user.education');
        Route::post('/save/education', 'saveEducation')->name('save.education');
        Route::get('/edit/education', 'listEducation')->name('edit.education');
        Route::get('/edit/edu/{id}', 'editEducation')->name('edit.edu');
        Route::post('/update/education', 'updateEducation')->name('update.education');
        Route::get('/edit/education/{id}', 'deleteEducation')->name('delete.education');
        
        // User Experience Routes
        Route::get('/user/experience', 'UserExperience')->name('user.experience');
        Route::post('/save/experience', 'saveExperience')->name('save.experience');
        Route::get('/edit/experience', 'listExperience')->name('edit.experience');
        Route::get('/edit/exper/{id}', 'editExperience')->name('edit.exper');
        Route::post('/update/experience', 'updateExperience')->name('update.experience') ;
        Route::get('/edit/experience/{id}', 'deleteExperience')->name('delete.experience');

        //User Language
        Route::get('/user/language', 'UserLanguage')->name('user.language');
        Route::post('/save/language', 'saveLanguage')->name('save.language');
        Route::get('/edit/language', 'editLanguage')->name('edit.language');
        Route::post('/update/language', 'updateLanguage')->name('update.language');

        //User Image
        Route::get('/user/image', 'UserImage')->name('user.image');
        Route::post('/save/image', 'saveImage')->name('save.image');
        Route::get('/edit/image', 'editImage')->name('edit.image');
        Route::post('/update/image', 'updateImage')->name('update.image');

        //User Projects
        Route::get('/user/project', 'UserProject')->name('user.project');
        Route::post('/save/project', 'saveProject')->name('save.project');
        Route::get('/edit/projects', 'listProject')->name('edit.projects');
        Route::get('/edit/proje/{id}', [BackendController::class, 'editProject'])->name('edit.proje')->middleware('auth');
        Route::post('/update/project', 'updateProject')->name('update.project') ;
        Route::get('/edit/project/{id}', 'deleteProject')->name('delete.project');

        //User CV
        Route::get('/user/showcv', 'cv')->name('user.showcv');
        Route::get('/user/downloadcv', 'downloadCv')->name('user.downloadcv');

        Route::get('SendEmail', 'SendEmail')->name('SendEmail');
        Route::get('user/contact','userContact')->name('user.contact');
        Route::post('user/message','sendMessage')->name('sendMessage');
        Route::get('/list/message', 'listMessage')->name('listMessage');
        Route::get('/show/message/{id}', 'showMessage')->name('showMessage');

        Route::get('listCV', [BackendController::class, 'listCV'])->name('listCV');
        Route::get('/admin', [BackendController::class, 'admin'])->name('admin');
        Route::get('listCVAdmin', [BackendController::class, 'listCVAdmin'])->name('listCVAdmin');
        Route::get('show/cv/{id}', [BackendController::class, 'showcv'])->name('show.cv');
        Route::get('/list/cv/{id}', 'deleteCV')->name('delete.cv');
    });
});


require __DIR__.'/auth.php';