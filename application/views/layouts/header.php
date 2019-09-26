<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="author" content="Jesus Medrano">
	<meta name="description" content="CRUD for events">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">

	<!--CSS imports-->
		<!-- Font Awesome -->
			<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
		<!--end-->

		<!--Css mdbootstrap-->
			<link rel="stylesheet" href="<?= base_url('assets/plugins/mdbootstrap/css/bootstrap.min.css') ?>">
			<link rel="stylesheet" href="<?= base_url('assets/plugins/mdbootstrap/css/mdb.min.css') ?>">
		<!--end-->

		<!--Full calendar-->
			<link rel="stylesheet" href="<?= base_url('assets/plugins/fullcalendar/packages/core/main.css') ?>">
			<link rel="stylesheet" href="<?= base_url('assets/plugins/fullcalendar/packages/daygrid/main.css') ?>">
		<!--end-->

		<!--tempusdominus bootstrap-->
			<link rel="stylesheet" href="<?= base_url('assets/plugins/tempusdominus-bootstrap/tempusdominus-bootstrap-4.min.css') ?>">
		<!-- end-->

		<!-- map plugins css + js -->
			<link rel="stylesheet" href="https://unpkg.com/leaflet@1.5.1/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin="" />
			<script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js" integrity="sha512-GffPMF3RvMeYyc1LWMHtK8EbPv0iNZ8/oTtHPx9/cc2ILxQ+u905qIwdpULaqDkyBKgOaB57QTMg7ztg8Jm2Og==" crossorigin=""></script>
		<!--end-->

		<!--Datatable-->
			<link rel="stylesheet" href="<?= base_url('assets/plugins/datatables/dataTables.bootstrap4.min.css') ?>">
		<!--end-->

		<!--General styles-->
			<link rel="stylesheet" href="<?= base_url('assets/css/main.css') ?>">
		<!--end-->
	<!--END-->

	<!--Jquery import-->
		<script src="<?= base_url('assets/plugins/mdbootstrap/js/jquery-3.4.1.min.js') ?>"></script>
	<!--end-->

	<!-- moment-->
		<script src="<?= base_url('assets/plugins/moment/moment.min.js') ?>"></script>
	<!-- end-->
</head>

<body>

	<nav class="navbar navbar-expand-lg navbar-dark primary-color ">
		<div class="mr-auto">
			<a class="navbar-brand" href="<?= base_url('main/index'); ?>">Full Calendar</a>
		</div>

		<div class="ml-auto">
			<a href="<?= base_url('main/create') ?>" class="mr-2 text-white" data-toggle="tooltip" title="Add a new event"><i class="fas fa-calendar-plus fa-2x"></i></a>
			<a href="<?= base_url('main/events') ?>" class="text-white" data-toggle="tooltip" title="See all events"><i class="fas fa-clipboard-list fa-2x"></i></a>
		</div>

	</nav>

	<!--Container for body pages (close in the footer layout-->
	<div class="container py-4">
	
	<?php 
	
		if($this->session->flashdata('event_created')){
			echo "<p class='alert alert-success'>{$this->session->flashdata('event_created')}</p>";
		}

		if($this->session->flashdata('event_failed')){
			echo "<p class='alert alert-danger'>{$this->session->flashdata('event_failed')}</p>";
		}

		if($this->session->flashdata('event_updated')){
			echo "<p class='alert alert-success'>{$this->session->flashdata('event_updated')}</p>";
		}

		if($this->session->flashdata('event_deleted')){
			echo "<p class='alert alert-success'>{$this->session->flashdata('event_deleted')}</p>";
		}

	?>

	