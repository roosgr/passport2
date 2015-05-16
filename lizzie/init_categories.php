<?php
/*
This script checks if the categories table is created, and if it is filled with
the categories.
*/

// load in the names of the categoreis
require_once("adwords_categories.php");

// load in database wrapper
require_once('php/Db.class.php');

// create new database
$db = new Db();

// This query checks whether the table categories can be found
if ($db->query("SELECT * FROM INFORMATION_SCHEMA.TABLES WHERE table_schema = 'passport' AND table_name ='categories'")) {
	// if it can be found,
	// does it contain categories?
	$categories = $db->query("SELECT * FROM categories");
	if( count($categories) == 0) {
		// if not, add them!
		foreach($adwords_categories as $category_name) {
			$db->query('INSERT INTO categories (name) VALUES(:name)', array('name'=>$category_name));
		}
	} 
} else {
	// in this case the table categories has not been created yet,
	// so create it
	$sql = "CREATE TABLE categories (
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
	name VARCHAR(60) NOT NULL)";
	$db->query($sql);
}

// If the table passports can not be found (the exclamation mark before `if` means ‘not’)
if (! $db->query("SELECT * FROM INFORMATION_SCHEMA.TABLES WHERE table_schema = 'passport' AND table_name ='passports'")) {
	// create it
	$sql = "CREATE TABLE passports (
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
	categories TEXT NOT NULL)";
	$db->query($sql);
}
