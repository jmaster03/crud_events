<title>Event - <?= $event->title ?> </title>

<h2 class="text-center mb-4"><?= $event->title ?></h2>
<div id="mapid" class="mb-4"></div>

<style>
	#mapid {
    height: 500px;
}
</style>
<div class="row">
	<div class="col-md-6">
		<p id="start"><b>Start: </b></p>
		<p id="end"><b>End: </b></p>
	</div>



	<div class="col-md-6">
		<p> <b>Description: </b><?= $event->description ?></p>
	</div>
</div>

<div class="text-center">
	<a href="<?= base_url("event/edit/{$event->id}") ?>" class="btn btn-warning">Edit</a>
	<a href="" class="btn btn-danger" data-toggle="modal" data-target="#delConfirm">Delete</a>
</div>



<!-- Modal -->
<div class="modal fade" id="delConfirm" tabindex="-1" role="dialog" aria-labelledby="centerModal" aria-hidden="true">

	<!-- Add .modal-dialog-centered to .modal-dialog to vertically center the modal -->
	<div class="modal-dialog modal-dialog-centered  animated  bounceIn" role="document">


		<div class="modal-content text-center">
		<h5 class="modal-title" id="centerModal">Do you want delete this event?</h5>
		<div class="modal-body">
				<a href="<?= base_url("event/destroy/{$event->id}") ?>" class="btn btn-danger">Yes</a>
				<a href="" class="btn btn-primary" data-dismiss="modal">No</a>
				</div>
			
		</div>
	</div>
</div>



<script>
	var lati = <?= $event->lat ?>;
	var lngd = <?= $event->lng ?>;

	var mymap = L.map('mapid').setView([lati, lngd], 13);
	L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
		attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors',
		id: 'mapbox.streets',
	}).addTo(mymap);

	var marker = L.marker([lati, lngd]).addTo(mymap);

	//time formatting	
	var startDate = moment("<?= $event->start ?>").format("dddd, MMMM Do YYYY, h:mm a");
	var endDate = moment("<?= $event->end ?>").format("dddd, MMMM Do YYYY, h:mm a");

	var st = document.getElementById("start");
	var en = document.getElementById("end");


	st.innerHTML += startDate;
	en.innerHTML += endDate;
</script>
