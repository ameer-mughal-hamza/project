<?php

/*This is for guests how want to visit our site and this section need no authentication*/
//Index Controller Shows All pages that are visible to guests only

Route::get('/', [
    'uses' => 'IndexController@getHomePage',
    'as' => 'home'
]);

Route::get('/index/service', [
    'uses' => 'IndexController@getServicePage',
    'as' => 'service'
]);

Route::get('/index/blog', [
    'uses' => 'IndexController@getBlogPage',
    'as' => 'blog'
]);

Route::get('/index/post/{id}', [
    'uses' => 'IndexController@getPost',
    'as' => 'post'
]);

/*-----------------------------Blog Routes----------------------------------*/
Route::group(['middleware' => 'auth:admin'], function () {
    Route::get('blog', [
        'uses' => 'Admin\PostController@getPostForAdminBlog',
        'as' => 'admin.blog'
    ]);

    Route::get('blog/posts', [
        'uses' => 'Admin\PostController@getPosts',
        'as' => 'blog.posts'
    ]);

    Route::get('blog/create', [
        'uses' => 'Admin\PostController@getPostCreate',
        'as' => 'blog.create'
    ]);

    Route::get('blog/edit/{id}', [
        'uses' => 'Admin\PostController@getPostEdit',
        'as' => 'blog.edit'
    ]);

    Route::post('blog/create', [
        'uses' => 'Admin\PostController@postCreate',
        'as' => 'blog.post.create'
    ]);

    Route::post('blog/edit/{id}', [
        'uses' => 'Admin\PostController@postUpdate',
        'as' => 'blog.post.update'
    ]);

    Route::get('delete/{id}', [
        'uses' => 'Admin\PostController@delete',
        'as' => 'blog.post.delete'
    ]);

    /*-----------------------------Categories Routes----------------------------------*/

    Route::resource('categories', 'Admin\CategoryController');
    Route::get('categories/delete/{id}', [
        'uses' => 'Admin\CategoryController@destroy',
        'as' => 'categories.destroy'
    ]);

    /*-------------------------------Tag Routes---------------------------------------*/

    Route::resource('tags', 'Admin\TagController');
    Route::get('tags/delete/{id}', [
        'uses' => 'Admin\TagController@destroy',
        'as' => 'tags.destroy'
    ]);
    Route::post('tags/{id}', [
        'uses' => 'Admin\TagController@update',
        'as' => 'tags.update'
    ]);

    /*-----------------------------Doctors Routes----------------------------------*/

    Route::resource('doctors', 'Admin\DoctorController');
    Route::get('doctors/delete/{id}', [
        'uses' => 'Admin\DoctorController@destroy',
        'as' => 'doctors.destroy'
    ]);
    Route::get('doctors-all', [
        'uses' => 'Admin\DoctorController@showAllDoctors',
        'as' => 'show.all.doctors'
    ]);
    Route::get('doctors/all/view', [
        'uses' => 'Admin\DoctorController@getAllDoctors',
        'as' => 'doctors.all'
    ]);
    Route::get('doctors/edit/{id}', [
        'uses' => 'Admin\DoctorController@edit',
        'as' => 'doctors.edit'
    ]);

    /*-----------------------------Degree Routes----------------------------------*/

    Route::resource('degrees', 'Admin\DegreeController');
    Route::get('degrees/delete/{id}', [
        'uses' => 'Admin\DegreeController@destroy',
        'as' => 'degrees.destroy'
    ]);

});

Route::group(['middleware' => 'auth:doctor'], function () {
    Route::get('doctor/blog', [
        'uses' => 'Doctor\PostController@getPostForDoctorBlog',
        'as' => 'doctor.blog'
    ]);

    Route::get('doctor/blog/posts', [
        'uses' => 'Doctor\PostController@getPosts',
        'as' => 'doctor.blog.posts'
    ]);

    Route::get('doctor/blog/create', [
        'uses' => 'Doctor\PostController@getPostCreate',
        'as' => 'doctor.blog.create'
    ]);

    Route::get('doctor/blog/edit/{id}', [
        'uses' => 'Doctor\PostController@getPostEdit',
        'as' => 'doctor.blog.edit'
    ]);

    Route::post('doctor/blog/create', [
        'uses' => 'Doctor\PostController@postCreate',
        'as' => 'doctor.blog.post.create'
    ]);

    Route::post('doctor/blog/edit/{id}', [
        'uses' => 'Doctor\PostController@postUpdate',
        'as' => 'doctor.blog.post.update'
    ]);

    Route::get('doctor/delete/{id}', [
        'uses' => 'Doctor\PostController@delete',
        'as' => 'doctor.blog.post.delete'
    ]);

    Route::get('doctor/medicine/prescription', [
        'uses' => 'Doctor\MedicineController@getMedicineView',
        'as' => 'doctor.medicine.prescription'
    ]);

    Route::get('search', 'Doctor\MedicineNameController@search');

    Route::post('add_patient', [
        'uses' => 'Doctor\PatientController@add_patient',
        'as' => 'add_patient'
    ]);

    Route::post('insert_prescription', [
        'uses' => 'Doctor\MedicineController@insert_prescription',
        'as' => 'insert_prescription'
    ]);

    Route::get('prescribe_medicine_to_existing_patient/{id}', [
        'uses' => 'Doctor\MedicineController@prescribeMedicineToExistingPatient',
        'as' => 'prescribe_medicine_to_existing_patient'
    ]);

    Route::get('show_patient_detail/{id}', [
        'uses' => 'Doctor\PatientController@show_patient_detail',
        'as' => 'show_patient_detail'
    ]);

    Route::get('view_report/{id}', [
        'uses' => 'Doctor\MedicineController@view_report',
        'as' => 'view_report'
    ]);

});


Auth::routes();

Route::group(['prefix' => 'admin'], function () {
    Route::get('/login', 'AdminAuth\AdminLoginController@showAdminLoginForm')->name('admin.login');
    Route::post('/login', 'AdminAuth\AdminLoginController@adminLogin')->name('admin.login.submit');
    Route::get('/', 'Admin\AdminController@index')->name('admin.dashboard');
});

Route::group(['prefix' => 'doctor'], function () {
    Route::get('/login', 'DoctorAuth\DoctorLoginController@showDoctorLoginForm')->name('doctor.login');
    Route::post('/login', 'DoctorAuth\DoctorLoginController@doctorLogin')->name('doctor.login.submit');
    Route::get('/', 'Doctor\DoctorController@doctordashboard')->name('doctor.dashboard');
});