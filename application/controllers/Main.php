<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Main extends CI_Controller
{
	public function index()
	{
		$rs = $this->Events_model->getEvents();

		$this->load->view('layouts/header');
		$this->load->view('index', compact('rs'));
		$this->load->view('layouts/footer');
	}

	public function create()
	{
		$this->load->view('layouts/header');
		$this->load->view('_events/create');
		$this->load->view('layouts/footer');
	}

	public function event($id = null)
	{
		$id = $this->db->escape((int) $id);
		$event = $this->Events_model->getEvent($id);

		$this->load->view('layouts/header');
		$this->load->view('_events/event', compact('event'));
		$this->load->view('layouts/footer');
	}

	public function events()
	{
		$rs = $this->Events_model->getEvents();

		$this->load->view('layouts/header');
		$this->load->view('_events/events', compact('rs'));
		$this->load->view('layouts/footer');
	}

	public function getEvents()
	{
		$query = $this->Events_model->getEvents();
		echo json_encode($query);
	}
}
