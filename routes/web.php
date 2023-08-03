<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\CampaignController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\MetaFormsController;
use App\Http\Controllers\ParameterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UniversityController;
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

Route::post('reset-password-by-id', [AuthController::class, 'resetPassword'])->name('reset.password');
Route::get('reset-password/{id}', [AuthController::class, 'resetPasswordIndex'])->name('reset.index');
Route::group(['middleware' => 'guest'], function () {
    Route::get('login', [AuthController::class, 'index'])->name('login');
    Route::get('student-login', [AuthController::class, 'studentLogin'])->name('studentlogin');
    Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post');
    Route::post('student-post-login', [AuthController::class, 'studentPostLogin'])->name('studentlogin.post');
    Route::get('registration', [AuthController::class, 'registration'])->name('register');
    Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [AuthController::class, 'dashboard'])->name('dashboard');
    Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
    Route::get('change-password', [AuthController::class, 'changePassword'])->name('change.password');
    Route::post('change-password-by-id', [AuthController::class, 'changePasswordById'])->name('change.password.by.id');

    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('profile', [AuthController::class, 'profile'])->name('profile.index');
    Route::get('profile/data', [AuthController::class, 'profileData'])->name('profile.data');


    Route::get('notifications', [NotificationController::class, 'index'])->name('notifications.index');
    Route::get('notifications/list', [NotificationController::class, 'list'])->name('notifications.list');
    Route::get('notifications/{id}/delete', [NotificationController::class, 'delete'])->name('notifications.delete');
    Route::get('notifications/users/{id}', [NotificationController::class, 'updateNotifications'])->name('notifications.update');

    Route::post('leads/multiple/convert', [LeadController::class, 'convertMultipleLeads'])->name('leads.multiple.convert');
    Route::post('leads/multiple/assign', [LeadController::class, 'assignMultipleLeads'])->name('leads.multiple.assign');
    Route::post('leads/multiple/delete', [LeadController::class, 'deleteMultipleLeads'])->name('leads.multiple.delete');


    Route::get('leads/subcategories/{category_id}', [LeadController::class, 'subcategoriesList'])->name('leads.subcategories.list');

    Route::get('leads/status/{status}', [LeadController::class, 'indexByStatus'])->name('leads.status.index');
    Route::get('leads/status/{status}/list', [LeadController::class, 'lisByStatus'])->name('leads.status.list');

    Route::get('documents/initialize/{leadId}', [DocumentController::class, 'initializeDocument'])->name('documents.initialize');
    Route::post('leads/import', [LeadController::class, 'import'])->name('leads.import');
    Route::post('leads/addRemarks', [LeadController::class, 'addRemarks'])->name('leads.addRemarks');
    Route::get('leads/export', [LeadController::class, 'export'])->name('leads.export');
    Route::get('leads/list', [LeadController::class, 'list'])->name('leads.list');
    Route::get('leads/create', [LeadController::class, 'create'])->name('leads.create');
    Route::get('leads/{id}', [LeadController::class, 'view'])->name('leads.view');
    Route::get('leads', [LeadController::class, 'index'])->name('leads.index');
    Route::post('leads', [LeadController::class, 'store'])->name('leads.store');
    Route::get('leads/{id}/edit', [LeadController::class, 'edit'])->name('leads.edit');
    Route::get('leads/{id}/mail', [LeadController::class, 'mail'])->name('leads.mail');
    Route::post('leads/mail', [LeadController::class, 'sendMail'])->name('leads.sendMail');
    Route::get('leads/{id}/convert', [LeadController::class, 'convert'])->name('leads.convert');
    Route::get('leads/{id}/delete', [LeadController::class, 'delete'])->name('leads.delete');
    Route::put('leads/{id}', [LeadController::class, 'update'])->name('leads.update');
    Route::get('student-profile', [LeadController::class, 'studentProfile'])->name('profile.student');
    Route::get('getSubcategories', [LeadController::class, 'getSubcategoriesList'])->name('leads.info');
    Route::get('getLeadsFromMeta', [CampaignController::class, 'getCampaigns'])->name('leads.from.meta');
    Route::get('getDuplicateLeadsFromMeta/{lead_id}', [CampaignController::class, 'getDuplicateLeads'])->name('duplicate.leads.meta');
    Route::post('getDuplicateLeadsValues', [CampaignController::class, 'getLeadsValues'])->name('leads.field.values');
    Route::post('updateAllLeads', [CampaignController::class, 'updateAllLeads'])->name('leads.update.all');
    Route::post('updateLeadsById', [CampaignController::class, 'updateLeadsById'])->name('leads.update.id');
    Route::post('checkDuplicate', [LeadController::class, 'checkDuplicate'])->name('leads.check.duplicate');
    Route::get('getPageName/{lead_id}', [CampaignController::class, 'getLeads'])->name('leads.getLeads.meta');
    Route::post('mapFields', [CampaignController::class, 'mapFields'])->name('leads.map.fields');
    Route::get('meta', [CampaignController::class, 'index'])->name('leads.meta');
    Route::post('metaCredentialUpdate', [CampaignController::class, 'metaCredentialUpdate'])->name('meta.update');
    Route::get('getMetaCredential', [CampaignController::class, 'getCredential'])->name('meta.get');



    Route::get('users/list', [UserController::class, 'list'])->name('users.list');
    Route::get('cro/list', [UserController::class, 'croList'])->name('cro.list');
    Route::get('super-admin/list', [UserController::class, 'superAdminList'])->name('super-admin.list');
    Route::get('users/{id}/tasks', [UserController::class, 'tasks'])->name('users.tasks');
    Route::get('users/{id}', [UserController::class, 'view'])->name('users.view');
    Route::get('users', [UserController::class, 'index'])->name('users.index');
    Route::post('users/task', [UserController::class, 'storeTask'])->name('users.store.task');
    Route::post('users', [UserController::class, 'store'])->name('users.store');
    Route::get('users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::get('users/{id}/delete', [UserController::class, 'delete'])->name('users.delete');
    Route::put('users/{id}', [UserController::class, 'update'])->name('users.update');
    Route::get('appointments', [UserController::class, 'appointments'])->name('appointments.index');
    Route::get('appointments/list', [UserController::class, 'appointmentsList'])->name('appointments.list');


    Route::get('students/list', [StudentController::class, 'list'])->name('students.list');
    Route::get('students/create', [StudentController::class, 'create'])->name('students.create');
    Route::get('students/{id}/edit', [StudentController::class, 'edit'])->name('students.edit');
    Route::get('students/{id}', [StudentController::class, 'view'])->name('students.view');
    Route::get('students', [StudentController::class, 'index'])->name('students.index');
    Route::post('students', [StudentController::class, 'store'])->name('students.store');
    Route::get('students/{id}/edit', [StudentController::class, 'edit'])->name('students.edit');
    Route::get('students/{id}/delete', [StudentController::class, 'delete'])->name('students.delete');
    Route::put('students/{id}', [StudentController::class, 'update'])->name('students.update');
    Route::get('pending-docs', [StudentController::class, 'studentProfileView'])->name('students.view.nav');

    Route::get('documents/pending', [DocumentController::class, 'pendingDocuments'])->name('documents.pending');
    Route::post('documents/download/{leadId}', [DocumentController::class, 'downloadDocument'])->name('documents.download');

    Route::post('documents/upload/{leadId}', [DocumentController::class, 'uploadDocument'])->name('documents.upload');
    Route::get('documents', [DocumentController::class, 'index'])->name('documents.index');

    Route::get('applications/list', [ApplicationController::class, 'list'])->name('applications.list');
    Route::get('applications/list/lead/{id}', [ApplicationController::class, 'listByLeadId'])->name('applications.listByLeadId');
    Route::get('applications/create', [ApplicationController::class, 'create'])->name('applications.create');
    Route::post('applications', [ApplicationController::class, 'store'])->name('applications.store');
    Route::get('applications', [ApplicationController::class, 'index'])->name('applications.index');
    Route::put('applications/{id}', [ApplicationController::class, 'update'])->name('applications.update');
    Route::get('applications/{id}/edit', [ApplicationController::class, 'edit'])->name('applications.edit');
    Route::get('applications/{id}/delete', [ApplicationController::class, 'delete'])->name('applications.delete');
    Route::get('applications/list/students', [ApplicationController::class, 'applicationsForStudents'])->name('applications.list.students');

    Route::get('calendar-events-pending', [TaskController::class, 'calendarEventsPending']);
    Route::get('calendar-events-resolved', [TaskController::class, 'calendarEventsResolved']);
    Route::get('calendar-events-canceled', [TaskController::class, 'calendarEventsCanceled']);
    Route::post('calendar-crud-ajax', [TaskController::class, 'calendarEvents']);

    Route::get('todo/list', [TaskController::class, 'todoList'])->name('tasks.todolist');
    Route::get('todo/today/scheduled/list', [TaskController::class, 'todoScheduledList'])->name('tasks.todoScheduledList');
    Route::get('todo/list/assignee/{id}', [TaskController::class, 'todoListByAssignee'])->name('tasks.todolistByAssignee');
    Route::get('todo/list/filter/{type}', [TaskController::class, 'todoListByDateRange'])->name('tasks.todoListByDateRange');
    Route::get('tasks/list', [TaskController::class, 'list'])->name('tasks.list');
    Route::get('tasks', [TaskController::class, 'index'])->name('tasks.index');
    Route::get('tasks/create', [TaskController::class, 'create'])->name('tasks.create');
    Route::get('tasks/{id}', [TaskController::class, 'view'])->name('tasks.view');
    Route::post('tasks', [TaskController::class, 'store'])->name('tasks.store');
    Route::get('tasks/{id}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
    Route::get('tasks/{id}/complete', [TaskController::class, 'complete'])->name('tasks.complete');
    Route::put('tasks/{id}/cancel', [TaskController::class, 'cancel'])->name('tasks.cancel');
    Route::get('tasks/{id}/delete', [TaskController::class, 'delete'])->name('tasks.delete');
    Route::put('tasks/{id}', [TaskController::class, 'update'])->name('tasks.update');

    Route::get('reports', [ReportController::class, 'index'])->name('reports.index');
    Route::post('reports', [ReportController::class, 'store'])->name('reports.store');
    Route::get('reports/list', [ReportController::class, 'list'])->name('reports.list');
    Route::get('reports/count', [ReportController::class, 'reportList'])->name('reports.count');
    Route::get('reports/leads-statistics', [ReportController::class, 'leadsStatistics'])->name('reports.leads-statistics');

    Route::get('countries/list', [CountryController::class, 'list'])->name('countries.list');
    Route::get('countries', [CountryController::class, 'index'])->name('countries.index');
    Route::post('countries', [CountryController::class, 'store'])->name('countries.store');
    Route::get('countries/{id}/edit', [CountryController::class, 'edit'])->name('countries.edit');
    Route::get('countries/{id}/delete', [CountryController::class, 'delete'])->name('countries.delete');
    Route::put('countries/{id}', [CountryController::class, 'update'])->name('countries.update');
    Route::get('getCountries', [CountryController::class, 'getCountries'])->name('countries.info');

    Route::get('universities/list', [UniversityController::class, 'list'])->name('universities.list');
    Route::get('universities', [UniversityController::class, 'index'])->name('universities.index');
    Route::post('universities', [UniversityController::class, 'store'])->name('universities.store');
    Route::get('universities/{id}/edit', [UniversityController::class, 'edit'])->name('universities.edit');
    Route::get('universities/{id}/delete', [UniversityController::class, 'delete'])->name('universities.delete');
    Route::put('universities/{id}', [UniversityController::class, 'update'])->name('universities.update');

    Route::get('activities/list', [ActivityController::class, 'list'])->name('activities.list');
    Route::get('activities', [ActivityController::class, 'index'])->name('activities.index');

    Route::get('parameters', [ParameterController::class, 'index'])->name('parameters.index');
    Route::get('parameters/list', [ParameterController::class, 'list'])->name('parameters.list');
    Route::post('parameters', [ParameterController::class, 'store'])->name('parameters.store');

    Route::post('metaforms', [MetaFormsController::class, 'store'])->name('metaforms.store');

    Route::get('cros', [UserController::class, 'croIndex'])->name('cros.index');
    Route::get('admins', [UserController::class, 'superAdminIndex'])->name('super-admin.index');

    Route::get('chat/{id}', [MessageController::class, 'chatView'])->name('chat.index');
    Route::get('messages/list/{id}', [MessageController::class, 'list'])->name('messages.list');
    Route::post('messages/send', [MessageController::class, 'messageSend'])->name('message.send');
});
