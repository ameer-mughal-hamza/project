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

Route::get('/doctor/view/{id}', [
    'uses' => 'IndexController@getDoctor',
    'as' => 'view-doctor-on-main-web'
]);

Route::get('/service/{category}', [
    'uses' => 'IndexController@getService',
    'as' => 'service-page'
]);

/*-----------------------------Blog Routes----------------------------------*/

Route::get('send', 'Doctor\MailController@send');

// Admin Routes
Route::group(['middleware' => 'auth:admin'], function () {
    Route::get('blog', [
        'uses' => 'Admin\PostController@getPostForAdminBlog',
        'as' => 'admin.blog'
    ]);

    Route::get('admin-settings', [
        'uses' => 'Admin\AdminController@showSettings',
        'as' => 'admin.settings'
    ]);

    Route::post('admin/change-password', [
        'uses' => 'Admin\AdminController@changeAdminPassword',
        'as' => 'admin.change.password'
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

    Route::get('medicine', [
        'uses' => 'Admin\MedicineNameController@show',
        'as' => 'medicine.show'
    ]);

    Route::post('medicine/store', [
        'uses' => 'Admin\MedicineNameController@store_medicine',
        'as' => 'medicine.store'
    ]);

    Route::post('medicine/delete', [
        'uses' => 'Admin\MedicineNameController@delete',
        'as' => 'medicine.delete'
    ]);

    Route::get('admin_view_report/{id}', [
        'uses' => 'Admin\MedicineController@view_report',
        'as' => 'admin.view_report'
    ]);

    Route::get('show-patient/{id}', [
        'uses' => 'Admin\PatientController@show_patient',
        'as' => 'admin.patient.show' //Show details of single patient
    ]);

    Route::get('all-patient', [
        'uses' => 'Admin\PatientController@show_all_patients',
        'as' => 'admin.show.all.patients' //Show details of single patient
    ]);

    Route::post('admin/medicine/delete', [
        'uses' => 'Admin\MedicineController@destroy',
        'as' => 'admin.medicine.destroy'
    ]);

    /*-----------------------------Pharmacist Routes----------------------------------*/
    Route::get('pharmacist/create', [
        'uses' => 'Admin\PharmacistController@create',
        'as' => 'pharmacist.create'
    ]);

    Route::post('pharmacist/create', [
        'uses' => 'Admin\PharmacistController@store',
        'as' => 'pharmacist.store'
    ]);

    Route::get('pharmacist/index', [
        'uses' => 'Admin\PharmacistController@index',
        'as' => 'pharmacist.index'
    ]);

});

// Patient Routes
Route::group(['middleware' => 'auth:patient'], function () {

    Route::get('show-patients-details/{id}', [
        'uses' => 'Patient\PatientController@showPatientDetail',
        'as' => 'show.patient.detail'
    ]);

    Route::get('patient/profile/{id}', [
        'uses' => 'Patient\PatientController@patientProfile',
        'as' => 'patient.profile'
    ]);

    Route::post('patient/profile-update/{id}', [
        'uses' => 'Patient\PatientController@editProfile',
        'as' => 'patient.update'
    ]);

    Route::get('patient-setting', [
        'uses' => 'Patient\PatientController@showSetting',
        'as' => 'patient.settings'
    ]);

    Route::post('patient-change-password', [
        'uses' => 'Patient\PatientController@changePassword',
        'as' => 'patient.change.password'
    ]);


    Route::get('patient_view_report/{id}', [
        'uses' => 'Patient\PatientController@view_report',
        'as' => 'patient.view_report'
    ]);

    Route::get('appointment/{doctor_id}/{patient_id}', [
        'uses' => 'Patient\PatientController@appointment',
        'as' => 'appointment'
    ]);
    Route::post('appointment', [
        'uses' => 'Patient\PatientController@saveAppointment',
        'as' => 'appointment.store'
    ]);

    Route::post('getAppointmentTimes', [
        'uses' => 'Patient\PatientController@getAppointmentTime',
        'as' => 'get.appointment.time'
    ]);

    Route::get('show/patient/doctor', [
        'uses' => 'Patient\PatientController@showAllDoctors',
        'as' => 'show.patient.doctor'
    ]);

    Route::get('show/patient/doctor/info/{id}', [
        'uses' => 'Patient\PatientController@showDoctorInfoPage',
        'as' => 'show.patient.doctor.info'
    ]);


    Route::get('show-booked-appointment', [
        'uses' => 'Patient\PatientController@showBookedPpointment',
        'as' => 'show.booked.appointment'
    ]);
    Route::get('view/doctor/patient/{id}', [
        'uses' => 'Patient\PatientController@showDoctor',
        'as' => 'show.doctor'
    ]);
});

// Doctor Routesss
Route::group(['middleware' => 'auth:doctor'], function () {

    Route::post('appointment_store', [
        'uses' => 'Doctor\DoctorController@storeTimings',
        'as' => 'doctor.appointment.timings'
    ]);

    Route::get('doctor/all-appointment/{id}', [
        'uses' => 'Doctor\DoctorController@allAppointments',
        'as' => 'all-appointment'
    ]);

    Route::get('doctor-change-password', [
        'uses' => 'Doctor\DoctorController@showPasswordPage',
        'as' => 'doctor.password'
    ]);

    Route::post('doctor/change-password', [
        'uses' => 'Doctor\DoctorController@changePassword',
        'as' => 'doctor.change.password'
    ]);

    Route::get('doctor/detail-appointment/{id}/{appointment_id}', [
        'uses' => 'Doctor\DoctorController@detailAppointment',
        'as' => 'appointment-detail'
    ]);

    Route::get('doctor/appointment/settings/{id}', [
        'uses' => 'Doctor\DoctorController@showSettingPage',
        'as' => 'doctor.appointment-setting'
    ]);

    Route::get('doctor/delete-appointment/{id}', [
        'uses' => 'Doctor\DoctorController@deleteAppointment',
        'as' => 'appointment-delete'
    ]);

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

    Route::get('doctor/show-all-patients', [
        'uses' => 'Doctor\PatientController@show_all_patients',
        'as' => 'doctor.show.all.patients'
    ]);

    Route::get('doctor/show-patient/{id}', [
        'uses' => 'Doctor\PatientController@show_patient_detail',
        'as' => 'doctor.patient.show' //Show details of single patient
    ]);

    Route::post('doctor/medicine/delete', [
        'uses' => 'Doctor\MedicineController@delete',
        'as' => 'doctor.medicine.delete'
    ]);


    Route::post('patient/destroy', [
        'uses' => 'Doctor\PatientController@destroy',
        'as' => 'patient.destroy'
    ]);

    Route::post('history', [
        'uses' => 'Doctor\PatientController@history',
        'as' => 'patient.history'
    ]);

    Route::get('doctor_view_report/{id}', [
        'uses' => 'Admin\MedicineController@view_report',
        'as' => 'doctor.view_report'
    ]);

    Route::post('update-doctor', [
        'uses' => 'Doctor\DoctorController@update_doctor',
        'as' => 'doctor.update'
    ]);

    Route::get('doctor/profile/{id}', [
        'uses' => 'Doctor\DoctorController@profile',
        'as' => 'doctor.profile'
    ]);
});

//Pharmicist Routes
Route::group(['middleware' => 'auth:pharmacist'], function () {

    Route::get('pharmacist', [
        'uses' => 'Admin\PharmacistController@index',
        'as' => 'pharmacist.dashboard'
    ]);

    Route::post('pharmacist/medicne/store', [
        'uses' => 'Pharmacist\MedicineController@store',
        'as' => 'pharmacist.medicine.store'
    ]);

    Route::get('pharmacist/medicne', [
        'uses' => 'Pharmacist\MedicineController@create',
        'as' => 'pharmacist.medicine.create'
    ]);

    Route::get('pharmacist/med/edit/{id}', [
        'uses' => 'Pharmacist\MedicineController@edit',
        'as' => 'pharmacist.med.edit'
    ]);

    Route::post('pharmacist/med/edit', [
        'uses' => 'Pharmacist\MedicineController@update',
        'as' => 'pharmacist.med.update'
    ]);

    Route::get('pharmacist/settings', [
        'uses' => 'Pharmacist\MedicineController@showSettings',
        'as' => 'pharmacist.settings'
    ]);

    Route::post('pharmacist/settings', [
        'uses' => 'Pharmacist\MedicineController@storeSettings',
        'as' => 'pharmacist.settings.store'
    ]);

    Route::get('pharmacist/search-prescription', [
        'uses' => 'Pharmacist\PharmacistController@showSearchPrescriptionPage',
        'as' => 'pharmacist.search-prescription'
    ]);

    Route::post('pharmacist/search-prescription', [
        'uses' => 'Pharmacist\PharmacistController@searchPrescription',
        'as' => 'pharmacist.show-prescription'
    ]);

    Route::get('pharmacist_view_report/{id}', [
        'uses' => 'Pharmacist\PharmacistController@view_report',
        'as' => 'pharmacist.view_report'
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
    Route::get('/', 'Doctor\DoctorController@doctorDashboard')->name('doctor.dashboard');
});

Route::group(['prefix' => 'patient'], function () {
    Route::get('/login', 'PatientAuth\PatientLoginController@showPatientLoginForm')->name('patient.login');
    Route::post('/login', 'PatientAuth\PatientLoginController@patientLogin')->name('patient.login.submit');
    Route::get('/', 'Patient\PatientController@patientdashboard')->name('patient.dashboard');
});

Route::group(['prefix' => 'pharmacist'], function () {
    Route::get('/login', 'PharmacistAuth\PharmacistLoginController@showPharmacistLoginForm')->name('pharmacist.login');
    Route::post('/login', 'PharmacistAuth\PharmacistLoginController@pharmacistLogin')->name('pharmacist.login.submit');
    Route::get('/', 'Pharmacist\PharmacistController@pharmacistdashboard')->name('pharmacist.dashboard');
});

Route::group(['prefix' => 'labortarian'], function () {
    Route::get('/login', 'LabortarianAuth\LabortarianLoginController@showLabortarianLoginForm')->name('labortarian.login');
    Route::post('/login', 'LabortarianAuth\LabortarianLoginController@labortarianLogin')->name('labortarian.login.submit');
    Route::get('/', 'Labortarian\LabortarianController@labortariandashboard')->name('labortarian.dashboard');
});