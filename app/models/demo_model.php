<?php

	class Demo_model extends CI_Model
	{
		function __construct()
		{
			parent::__construct();
		}	

		function insert_it()
		{
			$data = array
			(
			  	'name'     =>$this->input->post('name',TRUE),
				'psw'      =>$this->input->post('psw',TRUE),
				'realname' =>$this->input->post('realname',TRUE),
				'sex'      =>$this->input->post('sex',TRUE),
				'IDcard'   =>$this->input->post('IDcard',TRUE),
				'gtel'     =>$this->input->post('gtel',TRUE),
				'mtel'     =>$this->input->post('mtel',TRUE),
				'email'    =>$this->input->post('email',TRUE),
				'home'     =>$this->input->post('home',TRUE)
			);
			$this->db->insert('tb_member',$data);
		}

		function find_it()
		{
			$array = array('name'=>$this->input->post('name',TRUE));
			$query = $this->db->get_where('tb_member',$array);
			if ($query->num_rows() > 0)
			{
				return 1;
			} else 
				return 0;
		}

		function check_it()
		{
			$query = $this->db->get_where('tb_member',array('name'=>$this->input->post('name',TRUE),'psw'=>$this->input->post('psw',TRUE)));
			if ($query->num_rows() > 0)
			{
				return 1;
			} else 
				return 0;
		}
	}
	
?>