<?php

use App\Http\Middleware\LogMiddleware;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

define('PAGINATE_NUMBERT', 5);

// ROUTE TO MAKE TRANSLATE TO ALERTS
Route::post('translate', 'TranslateController@translate');

Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
    Route::get('login', 'LoginController@viewLogin')->name('viewLogin');
    Route::post('login', 'LoginController@login')->name('login');
    Route::post('logout', 'LoginController@logout')->name('logout');
});

Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']], function () {
    Route::group(['prefix' => 'dashboard', 'middleware' => ['auth:user'], 'as' => 'dashboard.'], function () {
        // Route::group(['middleware' => ['LogMiddleware']], function () {
        // ROUTE TO DASHBOARD HOME
        Route::get('/', 'HomeController@index')->name('home');

        // BEGIN ROUTES Roles MODEL
        Route::group(['prefix' => 'roles', 'as' => 'roles.'], function () {
            // ROUTE TO DESTROY THE USERS [ SOFT DELETE ]
            Route::post('destroy', 'RolesController@destroy')->name('destroy');
            // ROUTE TO EXPORT FILES
            Route::get('export/{file}', 'RolesController@export')->name('export');
            // ROUTE TO LOAD THE FORM PAGE
            Route::get('import', 'RolesController@getImport')->name('import');
            // ROUTE TO Import FILES
            Route::post('import', 'RolesController@import')->name('import');
        }); // END OF [ ROLES ] PREFIX
        Route::resource('roles', 'RolesController')->except(['destroy']);
        // END ROUTES Roles MODE


        // BEGIN ROUTES Permissions MODEL
        Route::group(['prefix' => 'permissions', 'as' => 'permissions.'], function () {
            // ROUTE TO DESTROY THE USERS [ SOFT DELETE ]
            Route::post('destroy', 'PermissionsController@destroy')->name('destroy');
            // ROUTE TO EXPORT FILES
            Route::get('export/{file}', 'PermissionsController@export')->name('export');
            // ROUTE TO LOAD THE FORM PAGE
            Route::get('import', 'PermissionsController@getImport')->name('import');
            // ROUTE TO Import FILES
            Route::post('import', 'PermissionsController@import')->name('import');
        }); // END OF [ Permissions ] PREFIX
        Route::resource('permissions', 'PermissionsController')->except(['destroy']);
        // END ROUTES Permissions MODE


        // BEGIN ROUTES USERS MODEL
        Route::group(['prefix' => 'users', 'as' => 'users.'], function () {
            // ROUTE TO DESTROY THE USERS [ SOFT DELETE ]
            Route::post('destroy', 'UsersController@destroy')->name('destroy');
            // ROUTE TO EXPORT FILES
            Route::get('export/{file}', 'UsersController@export')->name('export');
            // ROUTE TO LOAD THE FORM PAGE
            Route::get('import', 'UsersController@getImport')->name('import');
            // ROUTE TO Import FILES
            Route::post('import', 'UsersController@import')->name('import');
            // ROUTE TO GET THE USER CARD BLADE
            Route::get('{user}/card', 'UsersController@card')->name('card');
        }); // END OF [ USERS ] PREFIX
        // ALL ROUTES [ INDEX, CREATE, STORE, EDIT, UPDATE, SHOW ]
        Route::resource('users', 'UsersController')->except(['destroy']);
        // END ROUTES USERS MODE


        // BEGIN ROUTES Absence MODEL
        Route::group(['prefix' => 'absences', 'as' => 'absences.'], function () {
            // ROUTE TO DESTROY THE USERS [ SOFT DELETE ]
            Route::post('destroy', 'AbsencesController@destroy')->name('destroy');
            // ROUTE TO EXPORT FILES
            Route::get('export/{file}', 'AbsencesController@export')->name('export');
            // ROUTE TO LOAD THE FORM PAGE
            Route::get('import', 'AbsencesController@getImport')->name('import');
            // ROUTE TO Import FILES
            Route::post('import', 'AbsencesController@import')->name('import');
        }); // END OF [ ABSENCES ] PREFIX
        Route::resource('absences', 'AbsencesController')->except(['destroy']);
        // END ROUTES Absence MODE


        // BEGIN ROUTES Salaries MODEL
        Route::group(['prefix' => 'salaries', 'as' => 'salaries.'], function () {
            // ROUTE TO DESTROY THE USERS [ SOFT DELETE ]
            Route::post('destroy', 'SalariesController@destroy')->name('destroy');
            // ROUTE TO EXPORT FILES
            Route::get('export/{file}', 'SalariesController@export')->name('export');
            // ROUTE TO LOAD THE FORM PAGE
            Route::get('import', 'SalariesController@getImport')->name('import');
            // ROUTE TO Import FILES
            Route::post('import', 'SalariesController@import')->name('import');
            // ROUTE TO LOAD THE Abscence
            Route::get('abscence', 'SalariesController@getAbsence')->name('getabsence');
        }); // END OF [ SALARIES ] PREFIX
        Route::resource('salaries', 'SalariesController')->except(['destroy']);
        // END ROUTES Salaries MODE

        // BEGIN ROUTES Subject MODEL
        Route::group(['prefix' => 'subjects', 'as' => 'subjects.'], function () {
            // ROUTE TO DESTROY THE subjects
            Route::post('destroy', 'SubjectsController@destroy')->name('destroy');
        }); // END OF [ Subject ] PREFIX
        Route::resource('subjects', 'SubjectsController')->except(['destroy']);
        // END ROUTES Subject MODE

        // BEGIN ROUTES Row MODEL
        Route::group(['prefix' => 'rows', 'as' => 'rows.'], function () {
            // ROUTE TO DESTROY THE ROWS
            Route::post('destroy', 'RowsController@destroy')->name('destroy');
        }); // END OF [ Row ] PREFIX
        Route::resource('rows', 'RowsController')->except(['destroy']);
        // END ROUTES Row MODE

        // BEGIN ROUTES EXAMS MODEL
        Route::group(['prefix' => 'exams', 'as' => 'exams.'], function () {
            // ROUTE TO DESTROY THE EXAMS
            Route::post('destroy', 'ExamsController@destroy')->name('destroy');
            Route::post('create.questions', 'ExamsController@questions')->name('create.questions');
        }); // END OF [ EXAMS ] PREFIX
        Route::resource('exams', 'ExamsController')->except(['destroy']);
        // END ROUTES EXAMS MODE

        // BEGIN ROUTES QUESTIONS MODEL
        Route::group(['prefix' => 'questions', 'as' => 'questions.'], function () {
            // ROUTE TO DESTROY THE QUESTIONS
            Route::post('destroy', 'QuestionsController@destroy')->name('destroy');
        }); // END OF [ QUESTIONS ] PREFIX
        Route::resource('questions', 'QuestionsController')->except(['destroy']);
        // END ROUTES QUESTIONS MODE


        // }); // END OF Middleware [ LogMiddleware ] PREFIX

        // // BEGIN ROUTES Logs MODEL
        // Route::group(['prefix' => 'logs', 'as' => 'logs.'], function () {
        //     // ROUTE TO DESTROY THE USERS [ SOFT DELETE ]
        //     Route::post('destroy', 'LogsController@destroy')->name('destroy');
        //     // ROUTE TO EXPORT FILES
        //     Route::get('export/{file}', 'LogsController@export')->name('export');
        //     // ROUTE TO Import FILES
        //     Route::post('import', 'LogsController@import')->name('import');
        // }); // END OF [ LOGS ] PREFIX
        // Route::resource('logs', 'LogsController')->except(['destroy']);
        // // ROUTE TO LOGS INDEX

    }); // END OF 'DASHBOARD' PREFIX
});
