<?php 


use \vilar\catalog\models\catalog;
use \vilar\catalog\models\category;

Route::get('products', function() {
	$products = Catalog::with(['image','category'])->get();
	return $products;
});

Route::get('category', function() {
	$category = Category::all();
	return $category;
});

Route::get('category/new', function() {
	$category = Category::all();

	foreach ($category as $categories) {
		$categories['value'] = $categories['id'];
		unset($categories['id']);
	}

	return $category;
});