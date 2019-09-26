<title>Home</title>
<div class="py-4">
	<div id='calendar'></div>
</div>



<script>
	document.addEventListener('DOMContentLoaded', function() {
		var calendarEl = document.getElementById('calendar');
		
		$.post("<?php echo base_url('main/getEvents') ?>", function(data) {
			var calendar = new FullCalendar.Calendar(calendarEl, {
				
				titleFormat: {
					month: 'long',
					year: 'numeric',
					day: 'numeric',
					weekday: 'long'
				},

				plugins: ['dayGrid', 'timeGrid', 'interaction'],
				header: {
					left: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek',
					center: 'title',
					right: 'prev,next today',
				},

				format: "dddd, MMMM DD, YYYY, HH:mm",
				defaultDate: new Date(),
				navLinks: true, // can click day/week names to navigate views
				editable: false,
				eventLimit: true, // allow "more" link when too many events
				events: $.parseJSON(data),
				eventClick: function(info) {
					var id = info.event.id;
					location.href = ("<?php echo base_url() ?>main/event/" + id);
				}

			});
			calendar.render();

		});
	});
</script>
