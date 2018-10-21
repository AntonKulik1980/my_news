<?php

$router->get('', 'HomeController@index');


$router->get('blog/page-{page}', 'BlogController@index');
$router->get('blog', 'BlogController@index');
$router->post('blog/search', 'BlogController@search');



$router->get('blog/{id}', 'BlogController@show');

$router->get('404', 'PagesController@notFound');

$router->get('admin', 'Admin\DashboardController@index');



$router->get('admin/posts', 'Admin\PostsController@index');
$router->get('admin/posts/create', 'Admin\PostsController@create');
$router->get('admin/posts/edit/{id}', 'Admin\PostsController@edit');
$router->get('admin/posts/delete/{id}', 'Admin\PostsController@delete');
$router->post('admin/posts/store', 'Admin\PostsController@store');
$router->post('admin/posts/update/{id}', 'Admin\PostsController@update');
$router->post('admin/posts/delete/{id}', 'Admin\PostsController@delete');




