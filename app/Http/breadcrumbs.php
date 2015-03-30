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

// Home > courses > edit
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

// Home > courses > edit
Breadcrumbs::register('lessonCreate', function($breadcrumbs, $course)
{
    $breadcrumbs->parent('home');
	$breadcrumbs->push('Courses', route('courses'));
    $breadcrumbs->push('Course Profile', route('courseEdit',$course->id));
    $breadcrumbs->push('Create');
});

// Home > Blog
// Breadcrumbs::register('blog', function($breadcrumbs)
// {
    // $breadcrumbs->parent('home');
    // $breadcrumbs->push('Blog', route('blog'));
// });

// Home > Blog > [Category]
// Breadcrumbs::register('category', function($breadcrumbs, $category)
// {
    // $breadcrumbs->parent('blog');
    // $breadcrumbs->push($category->title, route('category', $category->id));
// });

// Home > Blog > [Category] > [Page]
// Breadcrumbs::register('page', function($breadcrumbs, $page)
// {
    // $breadcrumbs->parent('category', $page->category);
    // $breadcrumbs->push($page->title, route('page', $page->id));
// });