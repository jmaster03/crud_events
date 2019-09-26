<title>New event</title>

<?php
	$this->load->library('form_validation');

	echo validation_errors(); 
?>

<style>
	#mapid {
    height: 200px;
}
</style>

<h2 class="text-center">Create new event</h2>

<?php echo form_open('event/store') ?>

	<div class="input-group py-3">
		<span class="input-group-text">Title</span>
		<input type="text" id="title" name="title" class="form-control">
	</div>

	<div class="input-group mb-3">
		<span class="input-group-text">Start</span>
		<input type="text" class="form-control datetimepicker-input" id="datetimepicker7" name="start" data-toggle="datetimepicker" data-target="#datetimepicker7"/>
		<span class="input-group-text">To</span>
		<input type="text" class="form-control datetimepicker-input" id="datetimepicker8" name="end" data-toggle="datetimepicker" data-target="#datetimepicker8"/>
	</div>

	<div class="input-group mb-3">
		<span class="input-group-text">Description</span> <textarea type="text" id="description" name="description" class="form-control"></textarea>
	</div>
	<input type="hidden" id="lat" name="lat" required>
	<input type="hidden" id="lng" name="lng" required>

	<div class="group py-2 mt-5">
		<label>Location</label>
		<div id="mapid"></div>
	</div>
	<div class="text-center py-4">
		<button type="submit" class="btn btn-primary btn-block">Save</button>
	</div>

<?php echo form_close() ?>

<script>
//Leaftlet map
	let mymap = L.map('mapid').setView([18.483402, -69.929611], 13);
	$('#lat').val(18.483402);
	$('#lng').val(-69.929611);

	L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
		attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors',
		id: 'mapbox.streets',
	}).addTo(mymap);

	let marker = L.marker([18.483402, -69.929611]).addTo(mymap);

	function onMapClick(e) {

		let lat = (e.latlng.lat).toFixed(6);
		let lng = (e.latlng.lng).toFixed(6);

		$('#lat').val(lat);
		$('#lng').val(lng);

		let newLatLng = new L.LatLng(lat, lng);
		marker.setLatLng(newLatLng);

		//alert('Coordenadas obtenidas!');
	}
	mymap.on('click', onMapClick);

//end

//tempus dominus
	$(function() {
		$('#datetimepicker7').datetimepicker({
			format: 'YYYY-MM-DD HH:mm',
			icons: {
				time: "fas fa-clock",
				date: "fa fa-calendar",
				up: "fas fa-chevron-up",
				down: "fas fa-chevron-down"
			}
		});
		$('#datetimepicker8').datetimepicker({
			format: 'YYYY-MM-DD HH:mm',
			useCurrent: false,
			icons: {
				time: "fas fa-clock",
				date: "fa fa-calendar",
				up: "fas fa-chevron-up",
				down: "fas fa-chevron-down"
			}
		});

		$("#datetimepicker7").on("change.datetimepicker", function(e) {
			$('#datetimepicker8').datetimepicker('minDate', e.date);
		});
		$("#datetimepicker8").on("change.datetimepicker", function(e) {
			$('#datetimepicker7').datetimepicker('maxDate', e.date);
		});
	});
//end
</script>




