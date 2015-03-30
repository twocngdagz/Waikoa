<?php

// Home
Breadcrumbs::register('home', function($breadcrumbs)
{
    $breadcrumbs->push('Home', route('home'));	
});

// Home > courses
Breadcrumbs::register('courses', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Courses', route('courses'));
});

// Home > courses > create
Breadcrumbs::register('courseCreate', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Courses', route('courses'));
    $breadcrumbs->push('Create');
});

// Home > courses > edit
Breadcrumbs::register('courseEdit', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Courses', route('courses'));
    $breadcrumbs->push('Edit');
});

// Home > courses > page
Breadcrumbs::register('coursePage', function($breadcrumbs, $model)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Courses', route('courses'));
    $breadcrumbs->push($model->name);
});

// Home > lessons
Breadcrumbs::register('lessons', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Lessons', route('lessons'));
});

// Home > lessons > create
Breadcrumbs::register('lessonCreate', function($breadcrumbs, $course)
{
    $breadcrumbs->parent('home');
	$breadcrumbs->push('Courses', route('courses'));
    $breadcrumbs->push('Course Profile', route('courseEdit',$course->id));
    $breadcrumbs->push('Create');
});