<?php

return [
	/* Url                                                              => Controller/action */
//	'/' => 'site/index',
	'/' => 'admin/default/index',
	'login.html' => 'site/login',
	'about.html' => 'site/about',
	'contact.html' => 'site/contact',



	/* Admin module
	Url                                                                 => 'module/controller/action
	*/
	'admin/login' => 'admin/login/index',
	'admin/logout' => 'admin/login/logout',
	'admin' => 'admin/default/index',

    /* Auth module
	*/
    '/auth'                 => 'auth/auth-assignment/index',
    '/auth/auth-assignment' => 'auth/auth-assignment/index',
    '/auth/auth-rule'       => 'auth/auth-rule/index',
    '/auth/auth-item'       => 'auth/auth-item/index',
    '/auth/auth-item-child' => 'auth/auth-item-child/index',

    /* User module
	*/
    '/user' => 'user/user/index',
    '/user/create' => 'user/user/create',

    /* User system
	*/
    '/system' => 'system/migration/index',
    '/system/migration' => 'system/migration/index',
















	/*'<username:[a-zA-Z0-9_ -@.]+>/view/<slug:[a-zA-Z0-9_ -]+>.html' => 'resume/view',
	'<username:[a-zA-Z0-9_ -@.]+>/update/<slug:[a-zA-Z0-9_ -]+>.html' => 'resume/update',
	'<username:[a-zA-Z0-9_ -@.]+>/profile.html' => 'profile/view',
	'<username:[a-zA-Z0-9_ -@.]+>/profile/update.html' => 'profile/update',
	'tin-tuc.html' => 'site/news',
	'tin-tuc/<slug:[a-zA-Z0-9_ -]+>.html' => 'site/news-detail',*/



];