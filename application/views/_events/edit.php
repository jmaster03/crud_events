<title>Event edit - <?= $event->title?> </title>

<?php
	$this->load->library('form_validation');

	echo validation_errors(); 
?>


<h2 class="text-center">Edit event <b><?= $event->title?></b></h2>

<?php echo form_open('event/update') ?>
	<input type="hidden" name="id" value="<?= $event->id?>">

	<div class="input-group py-3">
		<span class="input-group-text">Title</span>
		<input type="text" id="title" name="title" class="form-control" value="<?= $event->title?>" required>
	</div>

	<div class="input-group mb-3">
		<span class="input-group-text">Start</span>
		<input type="text" class="form-control datetimepicker-input" id="datetimepicker7" name="start" data-toggle="datetimepicker" data-target="#datetimepicker7" />
		<span class="input-group-text">To</span>
		<input type="text" class="form-control datetimepicker-input" id="datetimepicker8" name="end" data-toggle="datetimepicker" data-target="#datetimepicker8" />
	</div>

	<div class="input-group mb-3">
		<span class="input-group-text">Description</span> <textarea type="text" id="description" name="description" class="form-control" > <?= $event->description?></textarea>
	</div>
	<input type="hidden" id="lat" name="lat"  value="<?= $event->lat?>" required>
	<input type="hidden" id="lng" name="lng" value="<?= $event->lng?>"  required>

	<div class="group py-2 mt-5">
		<label>Location</label>
		<div id="mapid"></div>
	</div>
	<div class="text-center py-4">
		<button type="submit" class="btn btn-primary btn-block">Save</button>
	</div>

<?php echo form_close() ?>

<style>
	#mapid {
    height: 200px;
}
</style>
<script>
//Leaftlet
	var lati = <?= $event->lat?>;
	var lngd = <?= $event->lng?>;

	var mymap = L.map('mapid').setView([lati, lngd], 13);

	L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
		attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors',
		id: 'mapbox.streets',
	}).addTo(mymap);

	var marker = L.marker([lati, lngd]).addTo(mymap);

	function onMapClick(e) {
		var lat = (e.latlng.lat).toFixed(6);
		var lng = (e.latlng.lng).toFixed(6);

		$('#lat').val(lat);
		$('#lng').val(lng);
	
		var newLatLng = new L.LatLng(lat, lng);
   		marker.setLatLng(newLatLng);
		   //alert('Location changed!');
	}
	mymap.on('click', onMapClick);
//end

//tempus dominus
var startDate = "<?= $event->start?>";
var endDate = "<?= $event->end?>";

$(function() {
    $('#datetimepicker7').datetimepicker({
		format: 'YYYY-MM-DD HH:mm',
		date: startDate,
        icons: {
            time: "fas fa-clock",
            date: "fa fa-calendar",
            up: "fas fa-chevron-up",
            down: "fas fa-chevron-down"
        }
    });
    $('#datetimepicker8').datetimepicker({
		format: 'YYYY-MM-DD HH:mm',
		date: endDate,
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
//
</script>




