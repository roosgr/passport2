<?
	// load in database wrapper
	include_once('php/Db.class.php');
	// create new database
	$db = new Db();
	// $cats is the contents of the textarea
	$cats = $_POST['categories'];
	// make a list of categories by splitting $cats for every newline
	$categories = explode(PHP_EOL, $cats);
	// we want to know which categories. make a string that will contain this list.
	$catIds = '';
	foreach ($categories as $category) {
		// for the category, look in the database if it exists
		$isCategory = $db->query('SELECT * FROM categories WHERE name = :name', array('name'=>trim($category)));
		
		// if it exists, add the id of the category to the $catIds string
		if(count($isCategory) > 0){
			$catIds .= $isCategory[0]->id."|";
		}
	}
	// insert all the ids as values of categories in the table passports
	$db->query('INSERT INTO passports (categories) VALUES(:categories)', array('categories'=>$catIds));
?>
