<?php 
namespace HerbertExtraDemo;

$router->get([
		'as'   => 'listAuthors',
		'uri'  => '/listAuthors',
		'uses' => __NAMESPACE__ . '\Controllers\AuthorController@listAuthors'
]);

$router->post([
		'as'   => 'listAuthors',
		'uri'  => '/listAuthors',
		'uses' => __NAMESPACE__ . '\Controllers\AuthorController@listAuthors'
]);

$router->get([
		'as'   => 'askEditAuthor',
		'uri'  => '/askEditAuthor/{id}',
		'uses' => __NAMESPACE__ . '\Controllers\AuthorController@askEditAuthor'
]);

$router->post([
		'as'   => 'editAuthor',
		'uri'  => '/editAuthor',
		'uses' => __NAMESPACE__ . '\Controllers\AuthorController@editAuthor'
]);
