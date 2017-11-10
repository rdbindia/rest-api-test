<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';

class Student extends REST_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('student_m');
	}
	
	// list of all student)
	public function student_list_get()
	{
		$start=microtime(true);
		$arr=array();
		$list=$this->student_m->get_list();
		$end=microtime(true);
		$response_time=$end-$start;
		$arr['status']='success';
		$arr['response_time']=number_format($response_time,3).' seconds';
		$arr['data']=empty($list) ? '' : $list;
		$arr['message']='success';
		$this->response($arr,200);
	}
	
	// add student data
	
	public function student_add_post()
	{
		$start=microtime(true);
		$name=$this->post('name');
		$std=$this->post('std');
		$age=$this->post('age');
		$roll_no=$this->post('roll_no');
		$date=date('Y-m-d H:i:s');
		$data=array();	
		$arr =[$name,$roll_no,$age,$std,$date,$date];
		$this->student_m->insert_details($arr);	
		$end=microtime(true);
		$response_time=$end-$start;
		$data['status']='success';
		$data['response_time']=number_format($response_time,3).' seconds';
		$data['message']='details added successfuly';
		$this->response($data,200);	
	}
	
	//delete sutdent data
	public function delete_student_post()
	{
		$start=microtime(true);
		$student_id=$this->post('id');
		$this->student_m->delete_student($student_id);	
		$end=microtime(true);
		$response_time=$end-$start;
		$arr['status']='success';
		$arr['response_time']=number_format($response_time,3).' seconds';
		$arr['message']='successfully deleted';
		$this->response($arr,200);	
	}
	
}