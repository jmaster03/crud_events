<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Event extends CI_Controller
{

	public function store()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('start', 'Start date', 'required');
		$this->form_validation->set_rules('end', 'end date', 'required');
		$this->form_validation->set_rules('description', 'Description', 'required');

		if ($this->form_validation->run() === FALSE) {
			$this->session->set_flashdata('event_failed', 'Try again');
			$this->load->view('layouts/header');
			$this->load->view('_events/create');
			$this->load->view('layouts/footer');
		} else {
			$this->Events_model->store();
			$this->session->set_flashdata('event_created', 'The event have been created successfully!');
			redirect('main/events');
		}
	}

	public function edit($id = null)
	{
		$id = $this->db->escape((int) $id);
		$event = $this->Events_model->getEvent($id);

		$this->load->view('layouts/header');
		$this->load->view('_events/edit', compact('event'));
		$this->load->view('layouts/footer');
	}

	public function update()
	{
		
		$event = array(
			"id" => $this->input->post("id"),
			"title" => $this->input->post("title"),
			"start" => $this->input->post("start"),
			"end" => $this->input->post("end"),
			"description" => $this->input->post("description"),
			"lat" => $this->input->post("lat"),
			"lng" => $this->input->post("lng"),
		);
		$this->Events_model->update($event);
		$this->session->set_flashdata('event_updated', 'The event have been updated successfully!');
		redirect('main/events');
	}

	public function destroy($id)
	{
		$this->Events_model->destroy($id);
		$this->session->set_flashdata('event_deleted', 'The event have been deleted successfully!');
		redirect('main/events');
	}
}

