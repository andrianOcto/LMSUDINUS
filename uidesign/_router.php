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
		# code...
		break;

	case 'coursematerial':
		# code...
		break;

	case 'courseassignment':
		# code...
		break;

	case 'coursegrade':
		# code...
		break;

	case 'profile':
		# code...
		break;

	case 'logout':
		# code...
		break;
	
	default:
		include "dashboard.php";
		break;
}
