<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
define('DB_HOST', 'localhost');
define('DB_NAME', 'book');   //id1966072_test_fjp
define('DB_USER', 'root');          //id1966072_admin
define('DB_PASS', '');              //123456

/////////////////////////////

define('COMMENT_LIMITED', 2);

//connect db
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if($conn->connect_error){
    die("Error: " . $conn->connect_error);
}

function query_exc($query){
    global $conn;
    if($conn->multi_query($query) === TRUE){
        return 1;
    }else{
        echo "Error: ". $conn->error;
    }
    $conn->close();
}

function get_book_id_from_comment_id($comment_id){
	global $conn;
	$sql = "SELECT book_id from book_comment where comment_id='$comment_id'";
	$result = $conn->query($sql);
	if($result->num_rows > 0){
		$row = $result->fetch_assoc();
		return $row['book_id'];
	}
	return 0;

}

function get_book_from_book_id($book_id){
	global $conn;
	$sql = "SELECT * FROM book where book_id='$book_id'";
	$result = $conn->query($sql);
	if($result->num_rows > 0){
		$row = $result->fetch_assoc();
		return $row;
	}
	return 0;
}

function get_comment_from_comment_id($comment_id){
	global $conn;
	$sql = "SELECT * FROM book_comment where comment_id='$comment_id'";
	$result = $conn->query($sql);
	if($result->num_rows > 0){
		$row = $result->fetch_assoc();
		return $row;
	}
	return 0;
}