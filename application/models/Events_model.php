<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Events_model extends CI_Model {

	public function store()
	{
		$event = array(
			"title" => $this->input->post("title"),
			"start" => $this->input->post("start"),
			"end" => $this->input->post("end"),
			"description" => $this->input->post("description"),
			"lat" => $this->input->post("lat"),
			"lng" => $this->input->post("lng"),
		);
		$this->db->insert("events", $event);
	}

	public function getEvents(){
		$query = $this->db->get('events');
		if ($query->num_rows() > 0) {
			return $query->result();
		}
	}

	public function getEvent($id){
		return $this->db->query("SELECT * FROM events WHERE id = {$id}")->row();
	}

	public function update($event)
	{
		$this->db->where('id', $this->input->post('id'));
		return $this->db->update('events', $event);
	}

	public function destroy($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('events');
	}


}

/* End of file ModelName.php */
