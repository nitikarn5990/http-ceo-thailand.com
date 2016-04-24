<?php

// Global Defines

include_once($_SERVER["DOCUMENT_ROOT"] . '/lib/define.php');

// Simpl Framework
include_once(FS_SIMPL . 'simpl.php');

// Custom Functions and Classes
include_once(FS_LIB . 'controllers.php');
include_once(FS_LIB . 'classes.php');
include_once(FS_LIB . 'btce-api.php');
include_once(FS_LIB . 'functions.php');
include_once(FS_LIB . 'pagination.php');


// Make the DB Connection
$db = new DB;
$db->Connect();

$functions = new Utility;


// New Class For Table
//$category = new Category; 
$users = new Users;

$home = new Home;

$contact = new Contact;
$contact_message = new Contact_message;

$slides = new Slides;
$slides_file = new Slide_files;


$ProID = $_GET['productID'];


$location = new Location;

//$programs = new Programs;
//$gallery = new Gallery;
//$guestbook = new Guestbook;
//$social = new Social;
//$social_script = new Social_script;
$text_slide = new Text_slide();
$home_banner = new Home_banner();
$footer = new Footer();
$plan_make_money = new Plan_make_money();

$work_system = new Work_system();
$registration = new Registration();

$member = new Member();
$user_banner = new User_banner();



?>
