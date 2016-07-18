<?php 
if(isset($_GET['page']))
	$page = $_GET['page'];
else
	$page = '';
switch ($page) {
	case 'allusers':
		# code...
		break;

	case 'importusers':
		# code...
		break;

	case 'allcourses':
		# code...
		break;

	case 'importcourses':
		# code...
		break;

	case 'enrollusers':
		# code...
		break;

	case 'logactivities':
		# code...
		break;

	case 'backups':
		# code...
		break;

	case 'coursearchives':
		# code...
		break;

	case 'coursefront':
		require "coursefront.php";
		break;

	case 'courseoutline':
		require "courseoutline.php";
		break;

	case 'coursematerial':
		require "coursematerial.php";
		break;

	case 'formmaterial':
		require 'formmaterial.php';
		break;

	case 'courseassignment':
		require "courseassignment.php";
		break;

	case 'formassignment':
		require 'formassignment.php';
		break;	

	case 'coursegrade':
		require "coursegrade.php";
		break;

	case 'profile':
		require "profile.php";
		break;

	case 'logout':
		# code...
		break;
	
	default:
		include "dashboard.php";
		break;
}
