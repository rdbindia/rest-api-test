<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Student_m extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}
	
	public function get_list()
	{
		$sql="select id,name,age,roll_no,std from student_details";
		$query=$this->db->query($sql);
		return $query->result_array();
	}
	
	public function insert_details($arr)
	{
		$sql="insert into student_details (name,roll_no,age,std,created_at,updated_at) values(?,?,?,?,?,?)";
		$this->db->query($sql,$arr);
	}
	
	public function delete_student($id)
	{
		$sql="delete from student_details where id=?";
		$arr=[$id];
		$this->db->query($sql,$arr);
	}
}	
