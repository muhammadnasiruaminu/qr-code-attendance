<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\CurriculumController;
use App\Http\Controllers\CourseOfStudyController;
use App\Http\Controllers\JoinAttendanceController;
use App\Http\Controllers\CreateAttendanceController;

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

// Route::get('/qrcode', function () {
//     return view('qrcode')->name('qrcode');
// });

/* USER (staff) LOGIN AND REGISTRATION */

Route::get('/dashboard', [UserController::class, 'index'])->name('staff.index');
Route::get('/users', [UserController::class, 'users'])->name('staff.users');
Route::get('/register-staff', [UserController::class, 'create'])->name('staff.create');
Route::post('/register-staff', [UserController::class, 'store'])->name('staff.store');
Route::get('/login', [UserController::class, 'loginPage'])->name('staff.loginPage');
Route::post('/login', [UserController::class, 'login'])->name('staff.login');
Route::get('/logout', [UserController::class, 'logout'])->name('staff.logout');
Route::put('update-user/{user}', [UserController::class, 'update'])->name('staff.update');
// upload students to DB
Route::get('/upload-students', [UserController::class, 'uploadStudentsPage'])->name('staff.uploadStudentsPage');
Route::post('/upload-students', [UserController::class, 'uploadStudents'])->name('staff.uploadStudents');


/* STUDENT LOGIN AND REGISTRATION */
/* student user; check if student is uploaded to the DB by admin*/
Route::get('/check-student', [StudentController::class, 'checkStudentPage'])->name('student.checkStudentPage');
Route::post('/check-student', [StudentController::class, 'checkStudent'])->name('student.checkstudent');
/*  if student found i.e if reg number found, register/sign up the student */
Route::get('/register-student/{check}', [StudentController::class, 'create'])->name('student.create');
Route::post('/register-student', [StudentController::class, 'store'])->name('student.store');
Route::get('/student-dashboard', [StudentController::class, 'index'])->name('student.index');
Route::get('/student-login', [StudentController::class, 'studentLoginPage'])->name('student.loginPage');
Route::post('/student-login', [StudentController::class, 'studentLogin'])->name('student.login');
Route::get('/student-logout', [StudentController::class, 'studentLogout'])->name('student.logout');
Route::get('/open-camera', [StudentController::class, 'openCamera'])->name('student.openCamera');


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
// Route::post('/join-attendance', [JoinAttendanceController::class, 'store'])->name('join.attendance.store');
Route::get('/delete-attendance/{joinAttendance:uuid}', [JoinAttendanceController::class, 'destroy'])->name('join.attendance.destroy');


// Route::get('/register-staff', [StaffController::class, 'registerStfPage'])->name('staff.registerStfPage');
// Route::post('/register-staff', [StaffController::class, 'registerStf'])->name('staff.registerStf');
// Route::get('/staff-dashboard', [StaffController::class, 'index'])->name('staff.index');
// Route::get('/sign-up', [StaffController::class, 'create'])->name('staff.create');
// Route::post('/sign-up', [StaffController::class, 'store'])->name('staff.store');
// Route::get('/staff-login', [StaffController::class, 'staffLoginPage'])->name('staff.staffLoginPage');
// Route::post('/staff-login', [StaffController::class, 'staffLogin'])->name('staff.login');
// Route::get('/logout', [StaffController::class, 'logout'])->name('staff.logout');


/* Faculty */
Route::get('/faculty', [FacultyController::class, 'index'])->name('faculty.index');
Route::get('/faculty/create', [FacultyController::class, 'create'])->name('faculty.create');
Route::post('/faculty/create', [FacultyController::class, 'store'])->name('faculty.store');
Route::post('/faculty/update/{uuid}', [FacultyController::class, 'update'])->name('faculty.update');


/* Department */
Route::get('/department', [DepartmentController::class, 'index'])->name('department.index');
Route::get('/department/create', [DepartmentController::class, 'create'])->name('department.create');
Route::post('/department/create', [DepartmentController::class, 'store'])->name('department.store');
Route::post('/department/update/{uuid}', [DepartmentController::class, 'update'])->name('department.update');

/* curriculum */
Route::get('/curriculum/create', [CurriculumController::class, 'create'])->name('curriculum.create');
Route::post('/curriculum/create', [CurriculumController::class, 'store'])->name('curriculum.store');
Route::post('/curriculum/update/{curriculum:uuid}', [CurriculumController::class, 'update'])->name('curriculum.update');

// /* USER LOGIN AND REGISTRATION */
// Route::get('/upload-students', [UserController::class, 'uploadStudentsPage'])->name('user.uploadStudentsPage');
// Route::post('/upload-students', [UserController::class, 'uploadStudents'])->name('user.uploadStudents');

// Route::post('/upload-users', [UserController::class, 'uploadUsers'])->name('user.uploadUsers');

// the page after scanning qr-code
Route::get('/authenticate-student/{token}', [UserController::class, 'authenticateStudentPage'])->name('user.authenticateStudentPage');
// Route::post('/authenticate-student', [UserController::class, 'authenticateStudent'])->name('user.authenticateStudent');

// Route::group(['middleware' => ['auth:staff']], function() {
//     Route::get('/users', [UserController::class, 'users']);
//   });