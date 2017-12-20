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

/***************************************************************************************/

Route::group(['middleware'=>'auth:admin'], function (){

    Route::resource('doctors', 'DoctorController');
    Route::get('doctors/delete/{id}',[
       'uses' => 'DoctorController@destroy',
       'as' => 'doctors.destroy'
    ]);
    Route::get('doctors/all/view', [
        'uses' => 'DoctorController@getAllDoctors',
        'as' => 'doctors.all'
    ]);

    Route::resource('degrees','DegreeController');
    Route::get('degrees/delete/{id}',[
        'uses' => 'DegreeController@destroy',
        'as' => 'degrees.destroy'
    ]);


    Route::resource('tags', 'TagController');
    Route::get('tags/delete/{id}',[
        'uses' => 'TagController@destroy',
        'as' => 'tags.destroy'
    ]);
    Route::post('tags/{id}',[
        'uses' => 'TagController@update',
        'as' => 'tags.update'
    ]);

    Route::resource('categories', 'CategoryController');
    Route::get('categories/delete/{id}',[
        'uses' => 'CategoryController@destroy',
        'as' => 'categories.destroy'
    ]);

    Route::get('blog', [
       'uses' => 'PostController@getPostForAdminBlog',
       'as' => 'admin.blog'
    ]);

    Route::get('blog/posts', [
        'uses' => 'PostController@getPosts',
        'as' => 'blog.posts'
    ]);

    Route::get('blog/create', [
        'uses' => 'PostController@getPostCreate',
        'as' => 'blog.create'
    ]);

    Route::get('blog/edit/{id}', [
        'uses' => 'PostController@getPostEdit',
        'as' => 'blog.edit'
    ]);

    Route::post('blog/create', [
        'uses' => 'PostController@postCreate',
        'as' => 'blog.post.create'
    ]);

    Route::post('blog/edit/{id}', [
        'uses' => 'PostController@postUpdate',
        'as' => 'blog.post.update'
    ]);

    Route::get('delete/{id}', [
        'uses' => 'PostController@delete',
        'as' => 'blog.post.delete'
    ]);
});

Auth::routes();

Route::group(['prefix'=>'admin'],function (){
    Route::get('/login','Auth\AdminLoginController@showAdminLoginForm')->name('admin.login');
    Route::post('/login','Auth\AdminLoginController@adminLogin')->name('admin.login.submit');
    Route::get('/','AdminController@index')->name('admin.dashboard');
});


