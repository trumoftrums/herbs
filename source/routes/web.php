<?php

/**
 * Authentication
 */

Route::get('/', [
    'as' => 'frontend.home',
    'uses' => 'FrontEndController@index'
]);
Route::get('/tin-tuc/{idSlug}', [
    'as' => 'frontend.detailNews',
    'uses' => 'FrontEndController@detailNews'
]);
Route::get('/tin-doanh-nghiep/{id_type}', [
    'as' => 'frontend.tintuc',
    'uses' => 'FrontEndController@tintuc'
]);
Route::get('/tin-thi-truong/{id_type}', [
    'as' => 'frontend.tintuc',
    'uses' => 'FrontEndController@tintuc'
]);
Route::get('/tin-tuc/{id_type}', [
    'as' => 'frontend.tintuc',
    'uses' => 'FrontEndController@tintuc'
]);
Route::get('/tin-tuc/{id}/{name_url}', [
    'as' => 'frontend.tintuc.detail',
    'uses' => 'FrontEndController@tintucDetail'
]);
Route::get('/phan-phoi', [
    'as' => 'frontend.phanphoi',
    'uses' => 'FrontEndController@phanphoi'
]);
Route::get('/gioi-thieu', [
    'as' => 'frontend.gioithieu',
    'uses' => 'FrontEndController@gioithieu'
]);
Route::get('/tu-dien-duoc-lieu', [
    'as' => 'frontend.tudienduoclieu',
    'uses' => 'FrontEndController@tudienduoclieu'
]);
Route::get('/tu-dien-duoc-lieu/{idSlug}', [
    'as' => 'frontend.tudienduoclieu.detail',
    'uses' => 'FrontEndController@tudienduoclieudetail'
]);
Route::get('/du-an/{id_type}/{name_url}', [
    'as' => 'frontend.duan',
    'uses' => 'FrontEndController@duan'
]);
Route::get('san-pham', [
    'as' => 'frontend.sanpham',
    'uses' => 'FrontEndController@sanpham'
]);







// Allow registration routes only if registration is enabled.
if (settings('reg_enabled')) {
    Route::get('register', 'Auth\AuthController@getRegister');
    Route::post('register', 'Auth\AuthController@postRegister');
    Route::get('register/confirmation/{token}', [
        'as' => 'register.confirm-email',
        'uses' => 'Auth\AuthController@confirmEmail'
    ]);
}

// Register password reset routes only if it is enabled inside website settings.
if (settings('forgot_password')) {
    Route::get('password/remind', 'Auth\PasswordController@forgotPassword');
    Route::post('password/remind', 'Auth\PasswordController@sendPasswordReminder');
    Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
    Route::post('password/reset', 'Auth\PasswordController@postReset');
}

/**
 * Two-Factor Authentication
 */
if (settings('2fa.enabled')) {
    Route::get('auth/two-factor-authentication', [
        'as' => 'auth.token',
        'uses' => 'Auth\AuthController@getToken'
    ]);

    Route::post('auth/two-factor-authentication', [
        'as' => 'auth.token.validate',
        'uses' => 'Auth\AuthController@postToken'
    ]);
}

/**
 * Social Login
 */
Route::get('auth/{provider}/login', [
    'as' => 'social.login',
    'uses' => 'Auth\SocialAuthController@redirectToProvider',
    'middleware' => 'social.login'
]);

Route::get('auth/{provider}/callback', 'Auth\SocialAuthController@handleProviderCallback');

Route::get('auth/twitter/email', 'Auth\SocialAuthController@getTwitterEmail');
Route::post('auth/twitter/email', 'Auth\SocialAuthController@postTwitterEmail');
Route::get('login', 'Auth\AuthController@getLogin');
Route::post('login', 'Auth\AuthController@postLogin');

Route::get('logout', [
    'as' => 'auth.logout',
    'uses' => 'Auth\AuthController@getLogout'
]);
Route::group(['prefix' => 'admin','middleware' => 'auth'], function () {


    /**
     * Dashboard
     */

    Route::get('/', [
        'as' => 'dashboard',
        'uses' => 'DashboardController@index'
    ]);

    /**
     * User Profile
     */

    Route::get('profile', [
        'as' => 'profile',
        'uses' => 'ProfileController@index'
    ]);

    Route::get('profile/activity', [
        'as' => 'profile.activity',
        'uses' => 'ProfileController@activity'
    ]);

    Route::put('profile/details/update', [
        'as' => 'profile.update.details',
        'uses' => 'ProfileController@updateDetails'
    ]);

    Route::post('profile/avatar/update', [
        'as' => 'profile.update.avatar',
        'uses' => 'ProfileController@updateAvatar'
    ]);

    Route::post('profile/avatar/update/external', [
        'as' => 'profile.update.avatar-external',
        'uses' => 'ProfileController@updateAvatarExternal'
    ]);

    Route::put('profile/login-details/update', [
        'as' => 'profile.update.login-details',
        'uses' => 'ProfileController@updateLoginDetails'
    ]);

    Route::put('profile/social-networks/update', [
        'as' => 'profile.update.social-networks',
        'uses' => 'ProfileController@updateSocialNetworks'
    ]);

    Route::post('profile/two-factor/enable', [
        'as' => 'profile.two-factor.enable',
        'uses' => 'ProfileController@enableTwoFactorAuth'
    ]);

    Route::post('profile/two-factor/disable', [
        'as' => 'profile.two-factor.disable',
        'uses' => 'ProfileController@disableTwoFactorAuth'
    ]);

    Route::get('profile/sessions', [
        'as' => 'profile.sessions',
        'uses' => 'ProfileController@sessions'
    ]);

    Route::delete('profile/sessions/{session}/invalidate', [
        'as' => 'profile.sessions.invalidate',
        'uses' => 'ProfileController@invalidateSession'
    ]);

    /**
     * User Management
     */
    Route::get('user', [
        'as' => 'user.list',
        'uses' => 'UsersController@index'
    ]);

    Route::get('user/create', [
        'as' => 'user.create',
        'uses' => 'UsersController@create'
    ]);

    Route::post('user/create', [
        'as' => 'user.store',
        'uses' => 'UsersController@store'
    ]);

    Route::get('user/{user}/show', [
        'as' => 'user.show',
        'uses' => 'UsersController@view'
    ]);

    Route::get('user/{user}/edit', [
        'as' => 'user.edit',
        'uses' => 'UsersController@edit'
    ]);

    Route::put('user/{user}/update/details', [
        'as' => 'user.update.details',
        'uses' => 'UsersController@updateDetails'
    ]);

    Route::put('user/{user}/update/login-details', [
        'as' => 'user.update.login-details',
        'uses' => 'UsersController@updateLoginDetails'
    ]);

    Route::delete('user/{user}/delete', [
        'as' => 'user.delete',
        'uses' => 'UsersController@delete'
    ]);

    Route::post('user/{user}/update/avatar', [
        'as' => 'user.update.avatar',
        'uses' => 'UsersController@updateAvatar'
    ]);

    Route::post('user/{user}/update/avatar/external', [
        'as' => 'user.update.avatar.external',
        'uses' => 'UsersController@updateAvatarExternal'
    ]);

    Route::post('user/{user}/update/social-networks', [
        'as' => 'user.update.socials',
        'uses' => 'UsersController@updateSocialNetworks'
    ]);

    Route::get('user/{user}/sessions', [
        'as' => 'user.sessions',
        'uses' => 'UsersController@sessions'
    ]);

    Route::delete('user/{user}/sessions/{session}/invalidate', [
        'as' => 'user.sessions.invalidate',
        'uses' => 'UsersController@invalidateSession'
    ]);

    Route::post('user/{user}/two-factor/enable', [
        'as' => 'user.two-factor.enable',
        'uses' => 'UsersController@enableTwoFactorAuth'
    ]);

    Route::post('user/{user}/two-factor/disable', [
        'as' => 'user.two-factor.disable',
        'uses' => 'UsersController@disableTwoFactorAuth'
    ]);


    /**
     * Roles & Permissions
     */

    Route::get('role', [
        'as' => 'role.index',
        'uses' => 'RolesController@index'
    ]);

    Route::get('role/create', [
        'as' => 'role.create',
        'uses' => 'RolesController@create'
    ]);

    Route::post('role/store', [
        'as' => 'role.store',
        'uses' => 'RolesController@store'
    ]);

    Route::get('role/{role}/edit', [
        'as' => 'role.edit',
        'uses' => 'RolesController@edit'
    ]);

    Route::put('role/{role}/update', [
        'as' => 'role.update',
        'uses' => 'RolesController@update'
    ]);

    Route::delete('role/{role}/delete', [
        'as' => 'role.delete',
        'uses' => 'RolesController@delete'
    ]);


    Route::post('permission/save', [
        'as' => 'permission.save',
        'uses' => 'PermissionsController@saveRolePermissions'
    ]);

    Route::resource('permission', 'PermissionsController');

    /**
     * Settings
     */

    Route::get('settings', [
        'as' => 'settings.general',
        'uses' => 'SettingsController@general',
        'middleware' => 'permission:settings.general'
    ]);

    Route::post('settings/general', [
        'as' => 'settings.general.update',
        'uses' => 'SettingsController@update',
        'middleware' => 'permission:settings.general'
    ]);

    Route::get('settings/auth', [
        'as' => 'settings.auth',
        'uses' => 'SettingsController@auth',
        'middleware' => 'permission:settings.auth'
    ]);

    Route::post('settings/auth', [
        'as' => 'settings.auth.update',
        'uses' => 'SettingsController@update',
        'middleware' => 'permission:settings.auth'
    ]);

// Only allow managing 2FA if AUTHY_KEY is defined inside .env file
    if (env('AUTHY_KEY')) {
        Route::post('settings/auth/2fa/enable', [
            'as' => 'settings.auth.2fa.enable',
            'uses' => 'SettingsController@enableTwoFactor',
            'middleware' => 'permission:settings.auth'
        ]);

        Route::post('settings/auth/2fa/disable', [
            'as' => 'settings.auth.2fa.disable',
            'uses' => 'SettingsController@disableTwoFactor',
            'middleware' => 'permission:settings.auth'
        ]);
    }

    Route::post('settings/auth/registration/captcha/enable', [
        'as' => 'settings.registration.captcha.enable',
        'uses' => 'SettingsController@enableCaptcha',
        'middleware' => 'permission:settings.auth'
    ]);

    Route::post('settings/auth/registration/captcha/disable', [
        'as' => 'settings.registration.captcha.disable',
        'uses' => 'SettingsController@disableCaptcha',
        'middleware' => 'permission:settings.auth'
    ]);

    Route::get('settings/notifications', [
        'as' => 'settings.notifications',
        'uses' => 'SettingsController@notifications',
        'middleware' => 'permission:settings.notifications'
    ]);

    Route::post('settings/notifications', [
        'as' => 'settings.notifications.update',
        'uses' => 'SettingsController@update',
        'middleware' => 'permission:settings.notifications'
    ]);

    /**
     * Activity Log
     */

    Route::get('activity', [
        'as' => 'activity.index',
        'uses' => 'ActivityController@index'
    ]);

    Route::get('activity/user/{user}/log', [
        'as' => 'activity.user',
        'uses' => 'ActivityController@userActivity'
    ]);

});



/**
 * News Management
 */
Route::get('tin-tuc', [
    'as' => 'news.danh-sach',
    'uses' => 'ManageNewsController@listTinTuc'
]);


/**
 * Manage news
 */
Route::get('quan-ly-tin-tuc', [
    'as' => 'newsadmin.list',
    'uses' => 'ManageNewsController@listNews'
]);
Route::post('quan-ly-tin-tuc/getNewCategory', [
    'as' => 'newsadmin.getNewCategory',
    'uses' => 'ManageNewsController@getNewCategory'
]);
Route::get('quan-ly-tin-tuc/create', [
    'as' => 'newsadmin.create',
    'uses' => 'ManageNewsController@createNews'
]);
Route::post('quan-ly-tin-tuc/add', [
    'as' => 'newsadmin.add',
    'uses' => 'ManageNewsController@addNews'
]);
Route::get('quan-ly-tin-tuc/{idNews}/edit', [
    'as' => 'newsadmin.edit',
    'uses' => 'ManageNewsController@editNews'
]);
Route::put('quan-ly-tin-tuc/{idNews}/update', [
    'as' => 'newsadmin.update',
    'uses' => 'ManageNewsController@updateNews'
]);
Route::delete('quan-ly-tin-tuc/{idNews}/delete', [
    'as' => 'newsadmin.delete',
    'uses' => 'ManageNewsController@deleteNews'
]);
// new category

Route::get('quan-ly-category', [
    'as' => 'catnewadmin.list',
    'uses' => 'ManageNewsController@listTypeNews'
]);
Route::get('quan-ly-category/create', [
    'as' => 'catnewadmin.create',
    'uses' => 'ManageNewsController@createCat'
]);
Route::post('quan-ly-category/add', [
    'as' => 'catnewadmin.add',
    'uses' => 'ManageNewsController@addCat'
]);
Route::get('quan-ly-category/{idNews}/edit', [
    'as' => 'catnewadmin.edit',
    'uses' => 'ManageNewsController@editCat'
]);
Route::put('quan-ly-category/{idNews}/update', [
    'as' => 'catnewadmin.update',
    'uses' => 'ManageNewsController@updateCat'
]);
Route::delete('quan-ly-category/{idNews}/delete', [
    'as' => 'catnewadmin.delete',
    'uses' => 'ManageNewsController@deleteCat'
]);


/**
 * Manage dict
 */
Route::get('quan-ly-tu-dien', [
    'as' => 'dictadmin.list',
    'uses' => 'ManageTuDienController@listDict'
]);
Route::get('quan-ly-tu-dien/create', [
    'as' => 'dictadmin.create',
    'uses' => 'ManageTuDienController@createDict'
]);
Route::post('quan-ly-tu-dien/add', [
    'as' => 'dictadmin.add',
    'uses' => 'ManageTuDienController@addDict'
]);
Route::get('quan-ly-tu-dien/{idNews}/edit', [
    'as' => 'dictadmin.edit',
    'uses' => 'ManageTuDienController@editDict'
]);
Route::put('quan-ly-tu-dien/{idNews}/update', [
    'as' => 'dictadmin.update',
    'uses' => 'ManageTuDienController@updateDict'
]);
Route::delete('quan-ly-tu-dien/{idNews}/delete', [
    'as' => 'dictadmin.delete',
    'uses' => 'ManageTuDienController@deleteDict'
]);


/**
 * Manage QA
 */
Route::get('quan-ly-hoi-dap', [
    'as' => 'qaadmin.list',
    'uses' => 'ManageQAController@listQA'
]);
Route::get('quan-ly-hoi-dap/create', [
    'as' => 'qaadmin.create',
    'uses' => 'ManageQAController@createQA'
]);
Route::post('quan-ly-hoi-dap/add', [
    'as' => 'qaadmin.add',
    'uses' => 'ManageQAController@addQA'
]);
Route::get('quan-ly-hoi-dap/{idQA}/edit', [
    'as' => 'qaadmin.edit',
    'uses' => 'ManageQAController@editQA'
]);
Route::put('quan-ly-hoi-dap/{idQA}/update', [
    'as' => 'qaadmin.update',
    'uses' => 'ManageQAController@updateQA'
]);
Route::delete('quan-ly-hoi-dap/{idQA}/delete', [
    'as' => 'qaadmin.delete',
    'uses' => 'ManageQAController@deleteQA'
]);

/**
 * News for user
 */
Route::get('tin-tuc-noi-bo', [
    'as' => 'newsuser.list',
    'uses' => 'NewsController@listNews'
]);
Route::get('tin-tuc-noi-bo/{idNews}/{name}', [
    'as' => 'newsuser.detail',
    'uses' => 'NewsController@detailNews'
]);
Route::get('ban-lanh-dao-hsg', [
    'as' => 'leadergroup',
    'uses' => 'NewsController@leaderHSG'
]);



Route::get('docs/list-tai-lieu/', [
    'as' => 'docs.tai-lieu.list',
    'uses' => 'DocsController@listDocs'
]);
Route::get('docs/add-tai-lieu/', [
    'as' => 'docs.tai-lieu.add',
    'uses' => 'DocsController@addDoc'
]);
Route::get('docs/tai-lieu/{idDoc}/edit', [
    'as' => 'docs.tai-lieu.edit',
    'uses' => 'DocsController@editDoc'
]);
Route::post('docs/tai-lieu/{idDoc}/edit', [
    'as' => 'docs.tai-lieu.edit',
    'uses' => 'DocsController@submitEditDoc'
]);


Route::delete('docs/del-tai-lieu/{idDoc}', [
    'as' => 'docs.tai-lieu.delete',
    'uses' => 'DocsController@delDoc'
]);

Route::post('docs/add-tai-lieu/', [
    'as' => 'docs.tai-lieu.add',
    'uses' => 'DocsController@submitAddDoc'
]);


Route::post('docs/get-project/', [
    'as' => 'docs.get-project',
    'uses' => 'DocsController@getProject'
]);


Route::get('docs/list-du-an/', [
    'as' => 'docs.du-an.list',
    'uses' => 'DocsController@listDuAn'
]);
Route::get('docs/list-chi-nhanh/', [
    'as' => 'docs.chi-nhanh.list',
    'uses' => 'DocsController@listChiNhanh'
]);

Route::get('docsview/list/', [
    'as' => 'docsview.list',
    'uses' => 'DocsviewController@listDocs'
]);
Route::get('docsview/detail-du-an/{idProject}/', [
    'as' => 'docsview.detail-du-an',
    'uses' => 'DocsviewController@detailProject'
]);

/**
 * Manage ads
 */
Route::get('quan-ly-ads', [
    'as' => 'adsadmin.lists',
    'uses' => 'ManageAdsController@lists'
]);
Route::get('quan-ly-ads/create', [
    'as' => 'adsadmin.create',
    'uses' => 'ManageAdsController@create'
]);
Route::post('quan-ly-ads/add', [
    'as' => 'adsadmin.add',
    'uses' => 'ManageAdsController@add'
]);
Route::get('quan-ly-ads/{idNews}/edit', [
    'as' => 'adsadmin.edit',
    'uses' => 'ManageAdsController@edit'
]);
Route::put('quan-ly-ads/{idNews}/update', [
    'as' => 'adsadmin.update',
    'uses' => 'ManageAdsController@update'
]);
Route::delete('quan-ly-ads/{idNews}/delete', [
    'as' => 'adsadmin.delete',
    'uses' => 'ManageAdsController@delete'
]);


/**
 * Manage options
 */
Route::get('quan-ly-options', [
    'as' => 'options.all',
    'uses' => 'ManageOptionsController@index'
]);
Route::put('quan-ly-options/update', [
    'as' => 'options.update',
    'uses' => 'ManageOptionsController@update'
]);



/**
 * Manage options
 */
Route::post('uploadsmng/upload', [
    'as' => 'uploadsmng.upload',
    'uses' => 'UploadFilesController@upload'
]);
Route::post('uploadsmng/delete', [
    'as' => 'uploadsmng.delete',
    'uses' => 'UploadFilesController@delete'
]);


/**
 * Manage video
 */
Route::get('quan-ly-videos', [
    'as' => 'videoadmin.lists',
    'uses' => 'ManageVideosController@lists'
]);
Route::get('quan-ly-videos/create', [
    'as' => 'videoadmin.create',
    'uses' => 'ManageVideosController@create'
]);
Route::post('quan-ly-videos/add', [
    'as' => 'videoadmin.add',
    'uses' => 'ManageVideosController@add'
]);
Route::get('quan-ly-videos/{idNews}/edit', [
    'as' => 'videoadmin.edit',
    'uses' => 'ManageVideosController@edit'
]);
Route::put('quan-ly-videos/{idNews}/update', [
    'as' => 'videoadmin.update',
    'uses' => 'ManageVideosController@update'
]);
Route::delete('quan-ly-videos/{idNews}/delete', [
    'as' => 'videoadmin.delete',
    'uses' => 'ManageVideosController@delete'
]);


Route::get('/xem-video/{idSlug}', [
    'as' => 'frontend.viewVideo',
    'uses' => 'FrontEndController@viewVideo'
]);