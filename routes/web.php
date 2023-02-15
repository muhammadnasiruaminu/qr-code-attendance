<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CourseOfStudyController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\CurriculumController;
use App\Http\Controllers\CreateAttendanceController;
use App\Http\Controllers\JoinAttendanceController;
use App\Http\Controllers\UserController;

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

Route::get('/qrcode', function () {
    return view('qrcode')->name('qrcode');
});

Route::get('/index', [StudentController::class, 'index'])->name('student.index');
Route::get('/dashboard/{key:student}', [StudentController::class, 'show'])->name('student.show');
Route::get('/register', [StudentController::class, 'registerPage'])->name('student.registerPage');
Route::post('/register', [StudentController::class, 'register'])->name('student.register');
Route::get('/sign-up/{key:uuid}', [StudentController::class, 'create'])->name('student.create');
Route::post('/sign-up/{key:uuid}', [StudentController::class, 'store'])->name('student.store');

/* course of study */
Route::get('/courses', [CourseOfStudyController::class, 'index'])->name('course.index');
Route::get('/course/create', [CourseOfStudyController::class, 'create'])->name('course.create');
Route::post('/course/create', [CourseOfStudyController::class, 'store'])->name('course.store');
Route::post('/course/update/{courseOfStudy:uuid}', [CourseOfStudyController::class, 'update'])->name('course.update');

/* staff */
// Route::get('/staff', [StaffController::class, 'create'])->name('staff.create');
// Route::post('/staff', [StaffController::class, 'store'])->name('staff.store');

/*  page for creating attendance i.e the course/lecture to be attended */
Route::get('/create-attendance', [CreateAttendanceController::class, 'create'])->name('attendance.create');
Route::post('/create-attendance', [CreateAttendanceController::class, 'store'])->name('attendance.store');
Route::get('/qrcode/{uuid}', [CreateAttendanceController::class, 'qrcode'])->name('attendance.qrcode');
// Route::post('/attendance/start/{uuid}', [CreateAttendanceController::class, 'startAttendance'])->name('attendance.startAttendance');
Route::get('/attendance/start/{uuid}', [CreateAttendanceController::class, 'startAttendance'])->name('attendance.startAttendance');
Route::post('/attendance/stop/{uuid}', [CreateAttendanceController::class, 'stopAttendance'])->name('attendance.stopAttendance');

/*  page for creating the real attendance i.e the students that attended/join an attendance */
Route::get('/join-attendance/{course_code}', [JoinAttendanceController::class, 'create'])->name('join.attendance.create');
Route::post('/join-attendance', [JoinAttendanceController::class, 'store'])->name('join.attendance.store');


// Route::get('/register-staff', [StaffController::class, 'registerStfPage'])->name('staff.registerStfPage');
// Route::post('/register-staff', [StaffController::class, 'registerStf'])->name('staff.registerStf');
Route::get('/staff-dashboard', [StaffController::class, 'index'])->name('staff.index');
Route::get('/sign-up', [StaffController::class, 'create'])->name('staff.create');
Route::post('/sign-up', [StaffController::class, 'store'])->name('staff.store');
Route::get('/staff-login', [StaffController::class, 'staffLoginPage'])->name('staff.staffLoginPage');
Route::post('/staff-login', [StaffController::class, 'staffLogin'])->name('staff.login');
Route::get('/logout', [StaffController::class, 'logout'])->name('staff.logout');


/* Department */
Route::get('/department', [DepartmentController::class, 'index'])->name('department.index');
Route::get('/department/create', [DepartmentController::class, 'create'])->name('department.create');
Route::post('/department/create', [DepartmentController::class, 'store'])->name('department.store');
Route::post('/department/update/{uuid}', [DepartmentController::class, 'update'])->name('department.update');

/* curriculum */
Route::get('/curriculum/create', [CurriculumController::class, 'create'])->name('curriculum.create');
Route::post('/curriculum/create', [CurriculumController::class, 'store'])->name('curriculum.store');
Route::post('/curriculum/update/{curriculum:uuid}', [CurriculumController::class, 'update'])->name('curriculum.update');

/* USER LOGIN AND REGISTRATION */
/* student user; check if student is uploaded to the DB by admin*/
Route::get('/check-user', [UserController::class, 'checkUserPage'])->name('user.checkUserPage');
Route::post('/check-user', [UserController::class, 'checkUser'])->name('user.checkUser');
/*  if user found i.e if reg number found, register/sign up the student */
Route::get('/register-user', [UserController::class, 'create'])->name('user.create');
Route::post('/register-user', [UserController::class, 'store'])->name('user.store');
Route::get('/dashboard', [UserController::class, 'index'])->name('user.index');
Route::get('/login', [UserController::class, 'loginPage'])->name('user.loginPage');
Route::post('/login', [UserController::class, 'login'])->name('user.login');
Route::get('/logout', [UserController::class, 'logout'])->name('user.logout');
Route::get('/open-camera', [UserController::class, 'openCamera'])->name('user.openCamera');

Route::get('/upload-students', [UserController::class, 'uploadStudentsPage'])->name('user.uploadStudentsPage');
Route::post('/upload-students', [UserController::class, 'uploadStudents'])->name('user.uploadStudents');

Route::post('/upload-users', [UserController::class, 'uploadUsers'])->name('user.uploadUsers');

// the page after sanning qr-code
Route::get('/authenticate-student', [UserController::class, 'authenticateStudentPage'])->name('user.authenticateStudentPage');
Route::post('/authenticate-student', [UserController::class, 'authenticateStudent'])->name('user.authenticateStudent');

