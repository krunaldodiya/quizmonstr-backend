<?php

Route::group(['prefix' => 'auth'], function () {
    Route::post('/request-otp', 'OtpController@requestOtp');
    Route::post('/verify-otp', 'OtpController@verifyOtp');
});

Route::group(['prefix' => 'users', 'middleware' => 'auth:api'], function () {
    Route::post('/me', 'UserController@me');
    Route::post('/profile/create', 'UserController@createUserProfile');
});

Route::group(['prefix' => 'wallet', 'middleware' => 'auth:api'], function () {
    Route::post('/info', 'UserController@wallet');
});

Route::group(['prefix' => 'quiz', 'middleware' => 'auth:api'], function () {
    Route::post('/all', 'QuizController@getAll');
});