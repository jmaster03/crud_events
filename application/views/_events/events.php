<title>Events</title>
<h2 class="text-center">Events</a></h2>

<div class="card-body">

	<div class="table-responsive text-wrap card-body">


		<table class="table table-hover text-center" id="dataTable">
			<thead class="blue white-text">
				<tr>
					<th scope="col">Title</th>
					<th scope="col">Start</th>
					<th scope="col">End</th>
					<th scope="col">Actions</th>
				</tr>
			</thead>
			<tbody>

				<?php

				if (is_array($rs)) {

					foreach ($rs as $event) {
						$urlShow = base_url("main/event/{$event->id}");
						$urlEdit = base_url("event/edit/{$event->id}");
						$urlDel = base_url("event/destroy/{$event->id}");

						echo "
								<tr>    
									<td>{$event->title}</td>
									<td>{$event->start}</td>
									<td>{$event->end}</td>
									<td>	
										<a href='{$urlShow}' class='text-primary mr-2'><i class='far fa-eye fa-2x'></i></a>				  
										<a href='{$urlEdit}' class='text-warning mr-2'><i class='fas fa-edit fa-2x'></i></a>				  
										<a onclick= \"return confirm('Are you sure you want to delete {$event->title}?')\" href='{$urlDel}' class='text-danger'><i class='fas fa-trash-alt fa-2x'></i></a>
									</td>
								</tr>
							";
					}
				}
				?>
			</tbody>
		</table>
	</div>
</div>
