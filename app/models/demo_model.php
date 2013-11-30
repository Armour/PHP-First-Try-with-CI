<?php

	class Demo_model extends CI_Model
	{
		function __construct()
		{
			parent::__construct();
		}	

		function insert_it($name,$psw,$realname,$sex,$IDcard,$gtel,$mtel,$email,$home)
		{
			$data = array
			(
				'name'     =>$name,
				'psw'      =>$psw,
				'realname' =>$realname,
				'sex'      =>$sex,
				'IDcard'   =>$IDcard,
				'gtel'     =>$gtel,
				'mtel'     =>$mtel,
				'email'    =>$email,
				'home'     =>$home 
			);
			$this->db->insert('tb_member',$data);
		}

		function find_it($name)
		{
			$array = array('name'=>$name);
			$query = $this->db->get_where('tb_member',$array);
			if ($query->num_rows() > 0)
			{
				return 1;
			} else 
				return 0;
		}

		function check_it($name,$psw)
		{
			$query = $this->db->get_where('tb_member',array('name'=>$name,'psw'=>$psw));
			if ($query->num_rows() > 0)
			{
				return 1;
			} else 
				return 0;
		}
	}
	
?>