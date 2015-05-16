<?php

// DB FUNCTIONS
function dbConnect() {
	$db = mysql_connect(DBHOST, DBLOGIN, DBPW) or die("could not connect to database: ".mysql_error());
	mysql_select_db(DBNAME) or die("could not select database");
	return $db;
}

function dbClose($db) {
	mysql_close($db);
}

function execInsert($query) {
	$result = mysql_query($query) or die("Query failed: ".mysql_error());
	return mysql_insert_id();
}

function execUpdate($query) {
	$result = mysql_query($query) or die("Query failed: ".mysql_error());
	return $result;
}

function execDelete($query) {
	$result = mysql_query($query) or die("Query failed: ".mysql_error());
	return $result;
}

function execTruncate($query) {
	$result = mysql_query($query) or die("Query failed: ".mysql_error());
	return $result;
}

function execSelect($query) {
	$result = mysql_query($query) or die("Query failed: ".mysql_error());
	$data=array();
	while($row = mysql_fetch_object($result)){
		$data[]=$row;
	}
	return $data;
}

function quote_smart($value) {
    if (get_magic_quotes_gpc()) {
        $value = stripslashes($value);
    }
    if (!is_numeric($value)) {
    	$value = mysql_real_escape_string($value);
    }
    return $value;
}

?>