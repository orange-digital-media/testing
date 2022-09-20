
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class User_Model extends CI_Model{
		function __construct()
		{
		parent:: __construct();

		// $this->load->library('form_validation');

		}

		public function insertData($data)
		{
			return $query = $this->db->insert('register', $data);
		}
		public function dateGet()
		 {
		 	$query = $this->db->select('updated_at')->get('register');
		 	 return $query->result();
		 }
    private $set_builder_id = "00000028";
	private $set_builder_project_id = "00000064";

	public function insertOdm($data)
	{
		$odm_db = $this->load->database('odm',true);
		$data['builder_id'] = $this->set_builder_id;//builder_id 
		echo "<br/>builder_id:".$data['builder_id'];
		$data['builder_project_id'] = $this->set_builder_project_id;//builder_project_id
		echo "<br/>builder_project_id:".$data['builder_project_id'];
		$data['builder_name'] = $this->getName("builder_name", "builder_master_table", $data['builder_id']);
		echo "<br/>builder_name:".$data['builder_name'];
		$data['builder_project_name'] = $this->getName("builder_project_name", "builder_project_master_table", $data['builder_project_id']);
		echo "<br/>builder_project_name:".$data['builder_project_name'];
		
		$min_emp_id = $this->get_min_emp_id($data['builder_id'], $data['builder_project_id']);
		echo "<br/>min_emp_id :".$min_emp_id;

		$max_emp_id = $this->get_max_emp_id($data['builder_id'], $data['builder_project_id']);
		echo "<br/>max_emp_id :".$max_emp_id;
		
		if($max_emp_id != ""){
// 			$arr = explode('SBRS', $max_emp_id);
// 			$max_postfix = $arr[1];
    		$max_postfix = substr($max_emp_id, 4);
    		$max_postfix = (int)$max_postfix;

		}
		else{ $max_postfix = 0; }
		echo "<br/>max_postfix :".$max_postfix;
		
		$last_emp_id = $this->get_last_id($data['builder_id'], $data['builder_project_id']);
		echo "<br/>last_emp_id :".$last_emp_id;

		$emp_prefix = substr($last_emp_id, 0, 4);

		echo "<br/>emp_prefix :".$emp_prefix;

		if ($last_emp_id !="") {
// 			$arr1 = explode('SBRS', $last_emp_id);
// 			$last_emp_postfix = $arr1[1];
		    $last_emp_postfix = substr($last_emp_id, 4);
            $last_emp_postfix = (int)$last_emp_postfix;
            
		} else { $last_emp_postfix = 0; }
		echo "<br/>last_emp_postfix :".$last_emp_postfix;

		$repeat_data ="";
		$repeat_data = $this->checkRepeatation($data['mobile']);
		if(!empty($repeat_data)){
			$data['employee_id'] = $repeat_data;
				echo "<br/>repeat : employee_id:".$data['employee_id'];
		} else {
			if($last_emp_postfix < $max_postfix){
				$next_id = $this->getNextId($last_emp_id, $data['builder_id'], $data['builder_project_id']);
				$data['employee_id'] = $next_id;
				echo "<br/>if : employee_id:".$data['employee_id'];
				
			} 
			else {
				$data['employee_id'] = $min_emp_id;
				echo "<br/>else : employee_id:".$data['employee_id'];
			}
		}
		echo "<br/>res : employee_id:".$data['employee_id'];
		$data['employee_name'] = $this->getName("employee_name", "employees_table", $data['employee_id']);
		echo "<br/>res : employee_name:".$data['employee_name'];

		$this->makeRatioZero();

		$odm_db->insert('leads', $data);
		$this->updateRatioDone($data['employee_id']);
		return $data['employee_name'];
	}

	public function checkRepeatation($mobile){
		$odm_db = $this->load->database('odm',true);
		$sql="SELECT employee_id FROM leads WHERE  builder_id='".$this->set_builder_id."' and builder_project_id = '".$this->set_builder_project_id."' and mobile='".$mobile."' ORDER BY id ASC LIMIT 1";    
		$query = $odm_db->query($sql);
		foreach ($query->result() as $row)
		{
			return $row->employee_id;
		}
	}

	public function curr_day_from_db(){
		$odm_db = $this->load->database('odm',true);
		$curr_day_sql = "SELECT DAYNAME(CURDATE()) as curr_day"; 
		$curr_day_query = $odm_db->query($curr_day_sql);
		foreach ($curr_day_query->result() as $row) {
			return strtolower($row->curr_day);
		}
	}


	public function makeRatioZero(){
		$odm_db = $this->load->database('odm',true);
		
		$sql="SELECT SUM(leads_ratio) AS leads_ratio_sum FROM project_employees_table WHERE  status='1' and  builder_id='".$this->set_builder_id."' and builder_project_id = '".$this->set_builder_project_id."' and ".$this->curr_day_from_db()."='1' ";    
		$query = $odm_db->query($sql);
		foreach ($query->result() as $row) {
			$sum_leads_ratio = $row->leads_ratio_sum;
		}

		$sql="SELECT SUM(ratio_done) AS ratio_done_sum FROM project_employees_table WHERE status='1' and  builder_id='".$this->set_builder_id."' and builder_project_id = '".$this->set_builder_project_id."' and ".$this->curr_day_from_db()."='1' ";    
		$query = $odm_db->query($sql);
		foreach ($query->result() as $row) {
			$sum_ratio_done = $row->ratio_done_sum;
		}
		$sum_ratio_done = (int)$sum_ratio_done;
		$sum_leads_ratio = (int)$sum_leads_ratio;
		if($sum_ratio_done >= $sum_leads_ratio){
			// echo "entered Make zero if: ratio_done:".$sum_ratio_done."leads_ratio".$sum_leads_ratio;
			$sql="UPDATE project_employees_table SET ratio_done='0' WHERE builder_id='".$this->set_builder_id."' and builder_project_id = '".$this->set_builder_project_id."' and ".$this->curr_day_from_db()."='1' ";    
			$query = $odm_db->query($sql);
			return;	
		}
		else{
			// echo "<br/>entered Make zero else: ratio_done:".$sum_ratio_done."leads_ratio".$sum_leads_ratio;
			return;
		}

	}

	public function updateRatioDone($employee_id){
		$odm_db = $this->load->database('odm',true);
		$this->makeRatioZero();
		$ratio_done = $this->getRatioDone($employee_id); 
		$update_ratio_done = (int)$ratio_done+1;
		$sql="UPDATE project_employees_table SET ratio_done='".$update_ratio_done."' WHERE status='1' and  builder_id='".$this->set_builder_id."' and builder_project_id = '".$this->set_builder_project_id."' and employee_id = '".$employee_id."' and ".$this->curr_day_from_db()."='1' ";    
		$query = $odm_db->query($sql);
		return;
	}

	public function getRatioDone($employee_id){
		$odm_db = $this->load->database('odm',true);
		$this->makeRatioZero();
		$sql="SELECT ratio_done FROM project_employees_table WHERE status='1' and  builder_id='".$this->set_builder_id."' and builder_project_id = '".$this->set_builder_project_id."' and employee_id = '".$employee_id."' and ".$this->curr_day_from_db()."='1' ";    
		$query = $odm_db->query($sql);
		foreach ($query->result() as $row)
		{
			return $row->ratio_done;
		}
	}

	public function getNextId($last_id, $builder_id, $builder_project_id){
		$odm_db = $this->load->database('odm',true);
		$this->makeRatioZero();

		$sql="SELECT employee_id FROM project_employees_table WHERE status='1' and  builder_id='".$builder_id."' and builder_project_id='".$builder_project_id."' and leads_ratio > ratio_done and employee_id > '".$last_id."'  and ".$this->curr_day_from_db()."='1' ORDER BY employee_id ASC LIMIT 1";    
		$query = $odm_db->query($sql);
		foreach ($query->result() as $row)
		{
			if (empty($row->employee_id)){
				$employee_id = null;
    		} else{
				$employee_id = $row->employee_id;
			}
		}
		if(empty($employee_id)){
			$sql="SELECT employee_id FROM project_employees_table WHERE status='1' and  builder_id='".$builder_id."' and builder_project_id='".$builder_project_id."' and leads_ratio > ratio_done and ".$this->curr_day_from_db()."='1' ORDER BY employee_id ASC LIMIT 1";    
			$query = $odm_db->query($sql);
			foreach ($query->result() as $row)
			{
				$employee_id = $row->employee_id;
			}
		} 

		return $employee_id;
	}


	public function get_last_id($builder_id, $builder_project_id)
	{
		$odm_db = $this->load->database('odm',true);
		$sql="SELECT employee_id FROM leads WHERE builder_id='".$builder_id."' and builder_project_id='".$builder_project_id."' ORDER BY id DESC LIMIT 1";    
		$query = $odm_db->query($sql);
		foreach ($query->result() as $row)
		{
			return $row->employee_id;
		}
	}
	public function get_max_emp_id($builder_id, $builder_project_id)
	{
		$odm_db = $this->load->database('odm',true);
		$sql="SELECT employee_id FROM project_employees_table WHERE  status='1' and  builder_id='".$builder_id."' and builder_project_id='".$builder_project_id."' and ".$this->curr_day_from_db()."='1' ORDER BY employee_id DESC LIMIT 1";    
		$query = $odm_db->query($sql);
		foreach ($query->result() as $row)
		{
			return $row->employee_id;
		}
	}
	public function get_min_emp_id($builder_id, $builder_project_id)
	{
		$odm_db = $this->load->database('odm',true);
		$sql="SELECT employee_id FROM project_employees_table WHERE status='1' and  builder_id='".$builder_id."' and builder_project_id='".$builder_project_id."' and ".$this->curr_day_from_db()."='1' ORDER BY employee_id ASC LIMIT 1";    
		$query = $odm_db->query($sql);
		foreach ($query->result() as $row)
		{
			return $row->employee_id;
		}
	}
	function getName($column_name, $table_name, $id){
		if($table_name == "employees_table"){ 
			$column_id = "employee_id";
		}
		if($table_name == "builder_master_table"){ 
			$column_id = "builder_id";
		}
		if($table_name == "builder_project_master_table"){ 
			$column_id = "builder_project_id";
		}
		$odm_db = $this->load->database('odm',true);
		$sql="SELECT ".$column_name." FROM ".$table_name." WHERE ".$column_id."='".$id."'";    
		$query = $odm_db->query($sql);
		foreach ($query->result() as $row)
		{
			return $row->$column_name;
		}
	}

	function get_sms_permission(){
		$odm_db = $this->load->database('odm',true);
		$sql="SELECT * FROM builder_project_master_table WHERE builder_id = '".$this->set_builder_id."' and builder_project_id = '".$this->set_builder_project_id."' ";    
		$query = $odm_db->query($sql);
		foreach ($query->result() as $row)
		{
			return $row->sms_permission;
		}	
	}
		function get_id($name, $mobile, $email, $employee_name){
		$odm_db = $this->load->database('odm',true);
		$sql="SELECT id FROM leads WHERE name='".$name."' and email='".$email."' and mobile='".$mobile."' and employee_name='".$employee_name."' and builder_id = '".$this->set_builder_id."' and builder_project_id = '".$this->set_builder_project_id."' ORDER BY id DESC LIMIT 1";    
		$query = $odm_db->query($sql);
		foreach ($query->result() as $row)
		{
			return $row->id;
		}

	}
	function add_to_sms_sent($sms_data){
		$odm_db = $this->load->database('odm',true);
		$odm_db->insert('sms_sent', $sms_data);
		return;

	}

}