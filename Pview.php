	<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Pview extends CI_Controller {

		public function index()
		{
			$this->load->view('index');
		}
		public function privacy()
		{
			$this->load->view('privacy');
		}
		public function downloadBrochurePdf()
		{
			$this->load->view('downloadBrochurePdf');
		}
		public function thankyou()
		{
			$this->load->view('thankyou');
		}
		public function disclaimer()
		{
			$this->load->view('disclaimer');
		}

		public function sendSMS($sendData, $send_to, $lead_id){
			$url = 'http://sms1.infiflyer.co.in/api/mt/SendSMS?user=Viswanath&password=Orange@999&senderid=SANABU&channel=trans&DCS=0&flashsms=0&number='.(string)$send_to.'&text='.(string)$sendData.'&route=08';
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
			curl_setopt($ch, CURLOPT_POST, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1); // change to 1 to verify cert
		curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
		$result = curl_exec($ch);
		curl_close($ch);

		$array = json_decode($result, true);

		$sms_status = $array['ErrorMessage'];
		$sms_job_id = $array['JobId'];

		$array1 = $array['MessageData'];
		
		$sms_message_id = $array1[0]['MessageId'];
		$sms_sent_to = $array1[0]['Number'];

		$sms_data = array(
			'lead_id' => $lead_id,
			'sms_status' => $sms_status,
			'sms_job_id' => $sms_job_id,
			'sms_message_id' => $sms_message_id,
			'sms_sent_to' => $sms_sent_to,
		);
		$this->User_Model->add_to_sms_sent($sms_data);
		if (empty($result)){
			print "Nothing returned from url.";
		}
		else{
			print $url;
			echo "<br><br>";
			echo $result;

			$array = json_decode($result, true);

			echo $array['ErrorMessage'];
		}

		return;

	}
	
//		public function sendToPool($name,$email,$phone,$utm_source,$utm_medium,$utm_campaign,$utm_term,$utm_content,$utm_site,$utm_url,$utm_title,$utm_timestamp,$utm_itemID)
//	{
//
//        $name=urlencode($name);
//        $email=urlencode($email);
//        $phone=urlencode($phone);
//        $utm_source=urlencode($utm_source);
//        $utm_medium=urlencode($utm_medium);
//        $utm_campaign=urlencode($utm_campaign);
//        $utm_term=urlencode($utm_term);
//        $utm_content=urlencode($utm_content);
//        $utm_site=urlencode($utm_site);
//        $utm_url=urlencode($utm_url);
//        $utm_title=urlencode($utm_title);
//        $utm_timestamp=urlencode($utm_timestamp);
//        $utm_itemID=urlencode($utm_itemID);
//
//		$url = 'https://www.poolcrm.co.in/addLeadAPI.php?api_username=prestigeUser&api_password=prestigePass&builder_id=00000028&project_id=00000084&first_name='.$name.'&phone='.$phone.'&email='.$email.'&utm_source='.$utm_source.'&utm_medium='.$utm_medium.'&utm_campaign='.$utm_campaign.'&utm_term='.$utm_term.'&utm_content='.$utm_content.'&utm_site='.$utm_site.'&utm_url='.$utm_url.'&utm_title='.$utm_title.'&utm_timestamp='.$utm_timestamp.'&utm_itemID='.$utm_itemID;
//		$ch = curl_init();
//		curl_setopt($ch, CURLOPT_URL, $url);
//		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
//		curl_setopt($ch, CURLOPT_POST, 0);
//		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1); // change to 1 to verify cert
//		curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
//		$result = curl_exec($ch);
//		curl_close($ch);
//
//		$array = json_decode($result, true);
//
//		$status = $array['status'];
//		if($status == "done"){
//			$data =  array('lead_id' => $array["lead_id"], "lead_owner_name" => $array["lead_owner_name"] );
//			return $data;
//		} else {
//			return false;
//		}
//
//	}


public function sendToCentral($name,$email,$mobile, $utm_source,$utm_medium,$utm_campaign,$utm_term,$utm_content,$utm_site,$utm_url,$utm_title,$utm_timestamp,$utm_itemID)
	{

		if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
			$link = "https";
		else
			$link = "http";
		$link .= "://";
		$link .= $_SERVER['HTTP_HOST'];
		$link .= $_SERVER['REQUEST_URI'];

		$builder_name = "PRESTIGE GROUP";
		$project_name = "Prestige Lakeside Habitat ";

		$name = urlencode($name);
		$email = urlencode($email);
		$mobile = urlencode($mobile);
		$utm_source = urlencode($utm_source);
		$utm_medium = urlencode($utm_medium);
		$utm_campaign = urlencode($utm_campaign);
		$utm_term = urlencode($utm_term);
		$utm_content = urlencode($utm_content);
		$utm_site = urlencode($utm_site);
		$utm_url = urlencode($utm_url);
		$utm_title = urlencode($utm_title);
		$utm_timestamp = urlencode($utm_timestamp);
		$utm_itemID = urlencode($utm_itemID);

		$builder_name = urlencode($builder_name);
		$project_name = urlencode($project_name);
		$link = urlencode($link);
		
		$url = 'http://api.sanatibuilders.com/addLeadAPICentral.php/?api_username=sb_websites_username&api_password=sb_websites_password&name=' . $name . '&mobile=' . $mobile . '&email=' . $email . '&builder_name=' . $builder_name . '&project_name=' . $project_name . '&website_url=' . $link .  '&utm_source=' . $utm_source . '&utm_medium=' . $utm_medium . '&utm_campaign=' . $utm_campaign . '&utm_term=' . $utm_term . '&utm_content=' . $utm_content . '&utm_site=' . $utm_site . '&utm_url=' . $utm_url . '&utm_title=' . $utm_title . '&utm_timestamp=' . $utm_timestamp . '&utm_itemID=' . $utm_itemID;

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($ch, CURLOPT_POST, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1); // change to 1 to verify cert
		curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
		$result = curl_exec($ch);
		curl_close($ch);
		
		$array = json_decode($result, true);
		return $array;
	}

	public function sendWhatsapp()
	{
		$this->load->helper('date');
		$datestring = 'Year: %Y Month: %m Day: %d -time: %h:%i %a';
		$time = time();
		echo mdate($datestring, $time);
	        // die();
			// $ip = $this->input->ip_address();

		$utm_source = $this->input->post('utm_source');
		$utm_medium = $this->input->post('utm_medium');
		$utm_term = $this->input->post('utm_term');
		$utm_campaign = $this->input->post('utm_campaign');
		$utm_content = $this->input->post('utm_content');
		$utm_site = $this->input->post('utm_site');
		$utm_url = $this->input->post('utm_url');
		$utm_title = $this->input->post('utm_title');
		$utm_timestamp = $this->input->post('utm_timestamp');
		$utm_itemID= $this->input->post('utm_itemID');

		$this->load->helper('url');
		$currentURL = current_url();
		$params = $_SERVER['REQUEST_URI'];
		$fullURL = $currentURL . '?' . $params .'?' .$utm_source.'?'.$utm_medium.'?'.$utm_campaign;
		$name = $this->input->post('name');

		$mobile = $this->input->post('mobile');
		$mobile_country_code = $this->input->post('mobile_country_code');
		$mobile = "+".$mobile_country_code.$mobile;

		$whatsapp_mobile = $this->input->post('whatsapp_mobile');
		$whatsapp_mobile_country_code = $this->input->post('whatsapp_mobile_country_code');
		$whatsapp_mobile = "+".$whatsapp_mobile_country_code.$whatsapp_mobile;

		$current_city = $this->input->post('current_city');
		$email = $this->input->post('email');
		$data = array(
			'name' => $name,
			'mobile' => $mobile,
			'whatsapp_mobile' => $whatsapp_mobile,
			'current_city' => $current_city,
			'email' => $email,
			'utm_source' => $utm_source,
			'utm_medium' => $utm_medium,
			'utm_campaign' => $utm_campaign,
			'utm_term' => $utm_term,
			'utm_content' => $utm_content,
			'utm_site' => $utm_site,
			'utm_url' => $utm_url,
			'utm_title' => $utm_title,
			'utm_timestamp' => $utm_timestamp,
			'utm_itemID' => $utm_itemID,
		);
		if($this->User_Model->insertData($data))
		{

			date_default_timezone_set('Asia/Kolkata');
			$current_date = date('Y/m/d', time());
			$current_date = (string)$current_date;
			$current_time = date('H:i:s', time());
			$current_time = (string)$current_time;

//				$resultData = $this->sendToPool($name,$email,$mobile,$utm_source,$utm_medium,$utm_campaign,$utm_term,$utm_content,$utm_site,$utm_url,$utm_title,$utm_timestamp,$utm_itemID);
//				$lead_id = $resultData["lead_id"] ? $resultData["lead_id"] : "";
//				$employee_name = $resultData["lead_owner_name"] ? $resultData["lead_owner_name"] : "";
//				echo $lead_id;
//				echo $employee_name;
				
				$centralData = $this->sendToCentral($name,$email,$mobile, $utm_source,$utm_medium,$utm_campaign,$utm_term,$utm_content,$utm_site,$utm_url,$utm_title,$utm_timestamp,$utm_itemID);

			$from = "vrao.dm@gmail.com";    
			$to = "vrao.dm@gmail.com";
			$this->email->cc('vishwanath.rao@sanatibuilders.com,manjunath.rao@sanatibuilders.com,surendra.reddy@sanatibuilders.com,surendra.reddy@sanatibuilders.com');
			$this->email->bcc('vrao.dm@gmail.com');
			$subject = 'Contact Us | Prestige Lakeside Habitat '; 
			$message = 'Leads For Prestige Lakeside Habitat :
			(FROM WHATSAPP BUTTON)
			----------------------------------------------------------------------------------------------------
			Prestige Lakeside Habitat 

			
			Name='.$name.'
			Mobile='.$mobile.' (Not Verified)
			Email='.$email.'
			Date Time='.$current_date." ".$current_time.'

			
			----------------------------------------------------------------------------------------------------

			utm_source='.$utm_source.'
			utm_medium='.$utm_medium.'
			utm_campaign='.$utm_campaign.'
			utm_term='.$utm_term.'
			utm_content='.$utm_content.'
			utm_site='.$utm_site.'
			utm_url='.$utm_url.'
			utm_title='.$utm_title.'
			utm_timestamp='.$utm_timestamp.'
			utm_itemID='.$utm_itemID.'
			url='.$fullURL.'';

			$config['protocol'] = 'smtp';
			$config['smtp_host'] = 'mail.orangedigitalmedia.in';
			$config['smtp_port'] =  '993'; 
			$config['smtp_user'] = $from;
			$config['smtp_pass'] = 'Sanati@2021';
			$config['mailtype'] = 'html';
			$config['charset'] = 'iso-8859-1';
			$config['wordwrap'] = TRUE;
			$config['newline'] = "\r\n";

			$this->load->library('email', $config);
			$this->email->set_newline("\r\n");
			$this->email->from($from); 
			$this->email->to($to);
			$this->email->subject('Leads for Prestige Lakeside Habitat ');
			
	        // $this->email->message($link);
			$this->email->message($message);
			if($mobile == $whatsapp_mobile){
				$mobile = $mobile." WA Same";
			} else {
				$mobile = $mobile." WA".$whatsapp_mobile;
			}

			$name = substr($name, 0, 29);
			$email = substr($email, 0, 29);
			$mobile = substr($mobile, 0, 29);

			$project_name = "PrestigeLakesideHabitat";
			$sendData = $project_name."\n\nId=".$lead_id."\n\nName=".$name."\nMobile=".$mobile."\nEmail=".$email."\nDate=".$current_date."\nTime=".$current_time."\n\nAssigned=".$employee_name;

			$sendData = urlencode($sendData);

			$send_to1 = 8197967475;
			$send_to2 = 9632000888;
			$send_to3 = 9986136555;
			$send_to4 = 6360690190;


	// 		$sms_permission = $this->User_Model->get_sms_permission();
	// 		if($sms_permission == 1){
	        // $this->sendSMS($sendData, $send_to1);

	// 		}
			$this->sendSMS($sendData, $send_to1, $lead_id);
			$this->sendSMS($sendData, $send_to2, $lead_id);
			$this->sendSMS($sendData, $send_to3, $lead_id);
			$this->sendSMS($sendData, $send_to4, $lead_id);
			
			if($this->email->send())
			{
		//	echo 'Email sent.';
				redirect('https://api.whatsapp.com/send?phone=+916360690190&text=Hi%20I%20am%20interested%20in%20Prestige%20Lakeside%20Habitat%20,20Project%20pls%20call%20back%20and%20share%20the%20project%20details.');
			}
			else
			{
				show_error($this->email->print_debugger());
			}
		}
		else
		{
			echo "error";
		}
	}

	public function sendMail()
	{
		$this->load->helper('date');
		$datestring = 'Year: %Y Month: %m Day: %d -time: %h:%i %a';
		$time = time();
		echo mdate($datestring, $time);
	        // die();
			// $ip = $this->input->ip_address();

		$utm_source = $this->input->post('utm_source');
		$utm_medium = $this->input->post('utm_medium');
		$utm_term = $this->input->post('utm_term');
		$utm_campaign = $this->input->post('utm_campaign');
		$utm_content = $this->input->post('utm_content');
		$utm_site = $this->input->post('utm_site');
		$utm_url = $this->input->post('utm_url');
		$utm_title = $this->input->post('utm_title');
		$utm_timestamp = $this->input->post('utm_timestamp');
		$utm_itemID= $this->input->post('utm_itemID');

		$this->load->helper('url');
		$currentURL = current_url();
		$params = $_SERVER['REQUEST_URI'];
		$fullURL = $currentURL . '?' . $params .'?' .$utm_source.'?'.$utm_medium.'?'.$utm_campaign;
		$name = $this->input->post('name');

		$mobile = $this->input->post('mobile');
		$mobile_country_code = $this->input->post('mobile_country_code');
		$mobile = "+".$mobile_country_code.$mobile;

		$whatsapp_mobile = $this->input->post('whatsapp_mobile');
		$whatsapp_mobile_country_code = $this->input->post('whatsapp_mobile_country_code');
		$whatsapp_mobile = "+".$whatsapp_mobile_country_code.$whatsapp_mobile;

		$current_city = $this->input->post('current_city');
		$email = $this->input->post('email');
		$data = array(
			'name' => $name,
			'mobile' => $mobile,
			'whatsapp_mobile' => $whatsapp_mobile,
			'current_city' => $current_city,
			'email' => $email,
			'utm_source' => $utm_source,
			'utm_medium' => $utm_medium,
			'utm_campaign' => $utm_campaign,
			'utm_term' => $utm_term,
			'utm_content' => $utm_content,
			'utm_site' => $utm_site,
			'utm_url' => $utm_url,
			'utm_title' => $utm_title,
			'utm_timestamp' => $utm_timestamp,
			'utm_itemID' => $utm_itemID,
		);
		if($this->User_Model->insertData($data))
		{

			date_default_timezone_set('Asia/Kolkata');
			$current_date = date('Y/m/d', time());
			$current_date = (string)$current_date;
			$current_time = date('H:i:s', time());
			$current_time = (string)$current_time;

//				$resultData = $this->sendToPool($name,$email,$mobile,$utm_source,$utm_medium,$utm_campaign,$utm_term,$utm_content,$utm_site,$utm_url,$utm_title,$utm_timestamp,$utm_itemID);
//				$lead_id = $resultData["lead_id"] ? $resultData["lead_id"] : "";
//				$employee_name = $resultData["lead_owner_name"] ? $resultData["lead_owner_name"] : "";
//				echo $lead_id;
//				echo $employee_name;
				
				$centralData = $this->sendToCentral($name,$email,$mobile, $utm_source,$utm_medium,$utm_campaign,$utm_term,$utm_content,$utm_site,$utm_url,$utm_title,$utm_timestamp,$utm_itemID);

			$from = "vrao.dm@gmail.com";    
			$to = "vrao.dm@gmail.com";
			$this->email->cc('vishwanath.rao@sanatibuilders.com,manjunath.rao@sanatibuilders.com,surendra.reddy@sanatibuilders.com,surendra.reddy@sanatibuilders.com');
			$this->email->bcc('vrao.dm@gmail.com');
			$subject = 'Contact Us | Prestige Lakeside Habitat '; 
			$message = 'Leads For Prestige Lakeside Habitat :
			----------------------------------------------------------------------------------------------------
			Prestige Lakeside Habitat 

			
			Name='.$name.'
			Mobile='.$mobile.' (Not Verified)
			Email='.$email.'
			Date Time='.$current_date." ".$current_time.'

			
			----------------------------------------------------------------------------------------------------

			utm_source='.$utm_source.'
			utm_medium='.$utm_medium.'
			utm_campaign='.$utm_campaign.'
			utm_term='.$utm_term.'
			utm_content='.$utm_content.'
			utm_site='.$utm_site.'
			utm_url='.$utm_url.'
			utm_title='.$utm_title.'
			utm_timestamp='.$utm_timestamp.'
			utm_itemID='.$utm_itemID.'
			url='.$fullURL.'';

			$config['protocol'] = 'smtp';
			$config['smtp_host'] = 'mail.orangedigitalmedia.in';
			$config['smtp_port'] =  '993'; 
			$config['smtp_user'] = $from;
			$config['smtp_pass'] = 'Sanati@2021';
			$config['mailtype'] = 'html';
			$config['charset'] = 'iso-8859-1';
			$config['wordwrap'] = TRUE;
			$config['newline'] = "\r\n";

			$this->load->library('email', $config);
			$this->email->set_newline("\r\n");
			$this->email->from($from); 
			$this->email->to($to);
			$this->email->subject('Leads for Prestige Lakeside Habitat ');
			
	        // $this->email->message($link);
			$this->email->message($message);
			if($mobile == $whatsapp_mobile){
				$mobile = $mobile." WA Same";
			} else {
				$mobile = $mobile." WA".$whatsapp_mobile;
			}

			$name = substr($name, 0, 29);
			$email = substr($email, 0, 29);
			$mobile = substr($mobile, 0, 29);

			$project_name = "PrestigeLakesideHabitat";
			$sendData = $project_name."\n\nId=".$lead_id."\n\nName=".$name."\nMobile=".$mobile."\nEmail=".$email."\nDate=".$current_date."\nTime=".$current_time."\n\nAssigned=".$employee_name;

			$sendData = urlencode($sendData);

			$send_to1 = 8197967475;
			$send_to2 = 9632000888;
			$send_to3 = 9986136555;
			$send_to4 = 6360690190;


	// 		$sms_permission = $this->User_Model->get_sms_permission();
	// 		if($sms_permission == 1){
	        // $this->sendSMS($sendData, $send_to1);

	// 		}
			$this->sendSMS($sendData, $send_to1, $lead_id);
			$this->sendSMS($sendData, $send_to2, $lead_id);
			$this->sendSMS($sendData, $send_to3, $lead_id);
			$this->sendSMS($sendData, $send_to4, $lead_id);
			
			if($this->email->send())
			{
		//	echo 'Email sent.';
				redirect('thankyou');
			}
			else
			{
				show_error($this->email->print_debugger());
			}
		}
		else
		{
			echo "error";
		}
	}

	public function sendEnquiry()
	{
		$this->load->helper('date');
		$datestring = 'Year: %Y Month: %m Day: %d -time: %h:%i %a';
		$time = time();
		echo mdate($datestring, $time);
	        // die();
			// $ip = $this->input->ip_address();

		$utm_source = $this->input->post('utm_source');
		$utm_medium = $this->input->post('utm_medium');
		$utm_term = $this->input->post('utm_term');
		$utm_campaign = $this->input->post('utm_campaign');
		$utm_content = $this->input->post('utm_content');
		$utm_site = $this->input->post('utm_site');
		$utm_url = $this->input->post('utm_url');
		$utm_title = $this->input->post('utm_title');
		$utm_timestamp = $this->input->post('utm_timestamp');
		$utm_itemID= $this->input->post('utm_itemID');

		$this->load->helper('url');
		$currentURL = current_url();
		$params = $_SERVER['REQUEST_URI'];
		$fullURL = $currentURL . '?' . $params .'?' .$utm_source.'?'.$utm_medium.'?'.$utm_campaign;
		$name = $this->input->post('name');

		$mobile = $this->input->post('mobile');
		$mobile_country_code = $this->input->post('mobile_country_code');
		$mobile = "+".$mobile_country_code.$mobile;

		$whatsapp_mobile = $this->input->post('whatsapp_mobile');
		$whatsapp_mobile_country_code = $this->input->post('whatsapp_mobile_country_code');
		$whatsapp_mobile = "+".$whatsapp_mobile_country_code.$whatsapp_mobile;

		$current_city = $this->input->post('current_city');
		$email = $this->input->post('email');
		$data = array(
			'name' => $name,
			'mobile' => $mobile,
			'whatsapp_mobile' => $whatsapp_mobile,
			'current_city' => $current_city,
			'email' => $email,
			'utm_source' => $utm_source,
			'utm_medium' => $utm_medium,
			'utm_campaign' => $utm_campaign,
			'utm_term' => $utm_term,
			'utm_content' => $utm_content,
			'utm_site' => $utm_site,
			'utm_url' => $utm_url,
			'utm_title' => $utm_title,
			'utm_timestamp' => $utm_timestamp,
			'utm_itemID' => $utm_itemID,
		);
		if($this->User_Model->insertData($data))
		{

			date_default_timezone_set('Asia/Kolkata');
			$current_date = date('Y/m/d', time());
			$current_date = (string)$current_date;
			$current_time = date('H:i:s', time());
			$current_time = (string)$current_time;

//				$resultData = $this->sendToPool($name,$email,$mobile,$utm_source,$utm_medium,$utm_campaign,$utm_term,$utm_content,$utm_site,$utm_url,$utm_title,$utm_timestamp,$utm_itemID);
//				$lead_id = $resultData["lead_id"] ? $resultData["lead_id"] : "";
//				$employee_name = $resultData["lead_owner_name"] ? $resultData["lead_owner_name"] : "";
//				echo $lead_id;
//				echo $employee_name;
				
				$centralData = $this->sendToCentral($name,$email,$mobile, $utm_source,$utm_medium,$utm_campaign,$utm_term,$utm_content,$utm_site,$utm_url,$utm_title,$utm_timestamp,$utm_itemID);

			$from = "vrao.dm@gmail.com";    
			$to = "vrao.dm@gmail.com";
			$this->email->cc('vishwanath.rao@sanatibuilders.com,manjunath.rao@sanatibuilders.com,surendra.reddy@sanatibuilders.com,surendra.reddy@sanatibuilders.com');
			$this->email->bcc('vrao.dm@gmail.com');
			$subject = 'Contact Us | Prestige Lakeside Habitat '; 
			$message = 'Leads For Prestige Lakeside Habitat :
			----------------------------------------------------------------------------------------------------
			Prestige Lakeside Habitat 

			
			Name='.$name.'
			Mobile='.$mobile.' (Not Verified)
			Email='.$email.'
			Date Time='.$current_date." ".$current_time.'

			
			----------------------------------------------------------------------------------------------------

			utm_source='.$utm_source.'
			utm_medium='.$utm_medium.'
			utm_campaign='.$utm_campaign.'
			utm_term='.$utm_term.'
			utm_content='.$utm_content.'
			utm_site='.$utm_site.'
			utm_url='.$utm_url.'
			utm_title='.$utm_title.'
			utm_timestamp='.$utm_timestamp.'
			utm_itemID='.$utm_itemID.'
			url='.$fullURL.'';

			$config['protocol'] = 'smtp';
			$config['smtp_host'] = 'mail.orangedigitalmedia.in';
			$config['smtp_port'] =  '993'; 
			$config['smtp_user'] = $from;
			$config['smtp_pass'] = 'Sanati@2021';
			$config['mailtype'] = 'html';
			$config['charset'] = 'iso-8859-1';
			$config['wordwrap'] = TRUE;
			$config['newline'] = "\r\n";

			$this->load->library('email', $config);
			$this->email->set_newline("\r\n");
			$this->email->from($from); 
			$this->email->to($to);
			$this->email->subject('Leads for Prestige Lakeside Habitat ');
			

	        // $this->email->message($link);
			$this->email->message($message);

			if($mobile == $whatsapp_mobile){
				$mobile = $mobile." WA Same";
			} else {
				$mobile = $mobile." WA".$whatsapp_mobile;
			}

			$name = substr($name, 0, 29);
			$email = substr($email, 0, 29);
			$mobile = substr($mobile, 0, 29);

			$project_name = "PrestigeLakesideHabitat";
			$sendData = $project_name."\n\nId=".$lead_id."\n\nName=".$name."\nMobile=".$mobile."\nEmail=".$email."\nDate=".$current_date."\nTime=".$current_time."\n\nAssigned=".$employee_name;

			$sendData = urlencode($sendData);

			$send_to1 = 8197967475;
			$send_to2 = 9632000888;
			$send_to3 = 9986136555;
			$send_to4 = 6360690190;


	// 		$sms_permission = $this->User_Model->get_sms_permission();
	// 		if($sms_permission == 1){
	        // $this->sendSMS($sendData, $send_to1);

	// 		}
			$this->sendSMS($sendData, $send_to1, $lead_id);
			$this->sendSMS($sendData, $send_to2, $lead_id);
			$this->sendSMS($sendData, $send_to3, $lead_id);
			$this->sendSMS($sendData, $send_to4, $lead_id);
			
			if($this->email->send())
			{
		//	echo 'Email sent.';
				redirect('thankyou');
			}
			else
			{
				show_error($this->email->print_debugger());
			}
		}
		else
		{
			echo "error";
		}
	}
	public function brouchureGetQUoteInsert()
	{
		$this->load->helper('date');
		$datestring = 'Year: %Y Month: %m Day: %d -time: %h:%i %a';
		$time = time();
		echo mdate($datestring, $time);
	        // die();
			// $ip = $this->input->ip_address();

		$utm_source = $this->input->post('utm_source');
		$utm_medium = $this->input->post('utm_medium');
		$utm_term = $this->input->post('utm_term');
		$utm_campaign = $this->input->post('utm_campaign');
		$utm_content = $this->input->post('utm_content');
		$utm_site = $this->input->post('utm_site');
		$utm_url = $this->input->post('utm_url');
		$utm_title = $this->input->post('utm_title');
		$utm_timestamp = $this->input->post('utm_timestamp');
		$utm_itemID= $this->input->post('utm_itemID');

		$this->load->helper('url');
		$currentURL = current_url();
		$params = $_SERVER['REQUEST_URI'];
		$fullURL = $currentURL . '?' . $params .'?' .$utm_source.'?'.$utm_medium.'?'.$utm_campaign;
		$name = $this->input->post('name');

		$mobile = $this->input->post('mobile');
		$mobile_country_code = $this->input->post('mobile_country_code');
		$mobile = "+".$mobile_country_code.$mobile;

		$whatsapp_mobile = $this->input->post('whatsapp_mobile');
		$whatsapp_mobile_country_code = $this->input->post('whatsapp_mobile_country_code');
		$whatsapp_mobile = "+".$whatsapp_mobile_country_code.$whatsapp_mobile;

		$current_city = $this->input->post('current_city');
		$email = $this->input->post('email');
		$data = array(
			'name' => $name,
			'mobile' => $mobile,
			'whatsapp_mobile' => $whatsapp_mobile,
			'current_city' => $current_city,
			'email' => $email,
			'utm_source' => $utm_source,
			'utm_medium' => $utm_medium,
			'utm_campaign' => $utm_campaign,
			'utm_term' => $utm_term,
			'utm_content' => $utm_content,
			'utm_site' => $utm_site,
			'utm_url' => $utm_url,
			'utm_title' => $utm_title,
			'utm_timestamp' => $utm_timestamp,
			'utm_itemID' => $utm_itemID,
		);
		if($this->User_Model->insertData($data))
		{

			date_default_timezone_set('Asia/Kolkata');
			$current_date = date('Y/m/d', time());
			$current_date = (string)$current_date;
			$current_time = date('H:i:s', time());
			$current_time = (string)$current_time;

//				$resultData = $this->sendToPool($name,$email,$mobile,$utm_source,$utm_medium,$utm_campaign,$utm_term,$utm_content,$utm_site,$utm_url,$utm_title,$utm_timestamp,$utm_itemID);
//				$lead_id = $resultData["lead_id"] ? $resultData["lead_id"] : "";
//				$employee_name = $resultData["lead_owner_name"] ? $resultData["lead_owner_name"] : "";
//				echo $lead_id;
//				echo $employee_name;
				
				$centralData = $this->sendToCentral($name,$email,$mobile, $utm_source,$utm_medium,$utm_campaign,$utm_term,$utm_content,$utm_site,$utm_url,$utm_title,$utm_timestamp,$utm_itemID);

			$from = "vrao.dm@gmail.com";    
			$to = "vrao.dm@gmail.com";
			$this->email->cc('vishwanath.rao@sanatibuilders.com,manjunath.rao@sanatibuilders.com,surendra.reddy@sanatibuilders.com,surendra.reddy@sanatibuilders.com');
			$this->email->bcc('vrao.dm@gmail.com');
			$subject = 'Contact Us | Prestige Lakeside Habitat '; 
			$message = 'Leads For Prestige Lakeside Habitat :
			----------------------------------------------------------------------------------------------------
			Prestige Lakeside Habitat 

			
			Name='.$name.'
			Mobile='.$mobile.' (Not Verified)
			Email='.$email.'
			Date Time='.$current_date." ".$current_time.'

			
			----------------------------------------------------------------------------------------------------

			utm_source='.$utm_source.'
			utm_medium='.$utm_medium.'
			utm_campaign='.$utm_campaign.'
			utm_term='.$utm_term.'
			utm_content='.$utm_content.'
			utm_site='.$utm_site.'
			utm_url='.$utm_url.'
			utm_title='.$utm_title.'
			utm_timestamp='.$utm_timestamp.'
			utm_itemID='.$utm_itemID.'
			url='.$fullURL.'';

			$config['protocol'] = 'smtp';
			$config['smtp_host'] = 'mail.orangedigitalmedia.in';
			$config['smtp_port'] =  '993'; 
			$config['smtp_user'] = $from;
			$config['smtp_pass'] = 'Sanati@2021';
			$config['mailtype'] = 'html';
			$config['charset'] = 'iso-8859-1';
			$config['wordwrap'] = TRUE;
			$config['newline'] = "\r\n";

			$this->load->library('email', $config);
			$this->email->set_newline("\r\n");
			$this->email->from($from); 
			$this->email->to($to);
			$this->email->subject('Leads for Prestige Lakeside Habitat ');
			

	        // $this->email->message($link);
			$this->email->message($message);

			if($mobile == $whatsapp_mobile){
				$mobile = $mobile." WA Same";
			} else {
				$mobile = $mobile." WA".$whatsapp_mobile;
			}

			$name = substr($name, 0, 29);
			$email = substr($email, 0, 29);
			$mobile = substr($mobile, 0, 29);

			$project_name = "PrestigeLakesideHabitat";
			$sendData = $project_name."\n\nId=".$lead_id."\n\nName=".$name."\nMobile=".$mobile."\nEmail=".$email."\nDate=".$current_date."\nTime=".$current_time."\n\nAssigned=".$employee_name;

			$sendData = urlencode($sendData);

			$send_to1 = 8197967475;
			$send_to2 = 9632000888;
			$send_to3 = 9986136555;
			$send_to4 = 6360690190;


	// 		$sms_permission = $this->User_Model->get_sms_permission();
	// 		if($sms_permission == 1){
	        // $this->sendSMS($sendData, $send_to1);

	// 		}
			$this->sendSMS($sendData, $send_to1, $lead_id);
			$this->sendSMS($sendData, $send_to2, $lead_id);
			$this->sendSMS($sendData, $send_to3, $lead_id);
			$this->sendSMS($sendData, $send_to4, $lead_id);
			
			if($this->email->send())
			{
		//	echo 'Email sent.';
				redirect('thankyou');
			}
			else
			{
				show_error($this->email->print_debugger());
			}
		}
		else
		{
			echo "error";
		}

	}

	public function brouchureDownloadInsert()
	{
		$this->load->helper('date');
		$datestring = 'Year: %Y Month: %m Day: %d -time: %h:%i %a';
		$time = time();
		echo mdate($datestring, $time);
	        // die();
			// $ip = $this->input->ip_address();

		$utm_source = $this->input->post('utm_source');
		$utm_medium = $this->input->post('utm_medium');
		$utm_term = $this->input->post('utm_term');
		$utm_campaign = $this->input->post('utm_campaign');
		$utm_content = $this->input->post('utm_content');
		$utm_site = $this->input->post('utm_site');
		$utm_url = $this->input->post('utm_url');
		$utm_title = $this->input->post('utm_title');
		$utm_timestamp = $this->input->post('utm_timestamp');
		$utm_itemID= $this->input->post('utm_itemID');

		$this->load->helper('url');
		$currentURL = current_url();
		$params = $_SERVER['REQUEST_URI'];
		$fullURL = $currentURL . '?' . $params .'?' .$utm_source.'?'.$utm_medium.'?'.$utm_campaign;
		$name = $this->input->post('name');

		$mobile = $this->input->post('mobile');
		$mobile_country_code = $this->input->post('mobile_country_code');
		$mobile = "+".$mobile_country_code.$mobile;

		$whatsapp_mobile = $this->input->post('whatsapp_mobile');
		$whatsapp_mobile_country_code = $this->input->post('whatsapp_mobile_country_code');
		$whatsapp_mobile = "+".$whatsapp_mobile_country_code.$whatsapp_mobile;

		$current_city = $this->input->post('current_city');
		$email = $this->input->post('email');
		$data = array(
			'name' => $name,
			'mobile' => $mobile,
			'whatsapp_mobile' => $whatsapp_mobile,
			'current_city' => $current_city,
			'email' => $email,
			'utm_source' => $utm_source,
			'utm_medium' => $utm_medium,
			'utm_campaign' => $utm_campaign,
			'utm_term' => $utm_term,
			'utm_content' => $utm_content,
			'utm_site' => $utm_site,
			'utm_url' => $utm_url,
			'utm_title' => $utm_title,
			'utm_timestamp' => $utm_timestamp,
			'utm_itemID' => $utm_itemID,
		);
		if($this->User_Model->insertData($data))
		{

			date_default_timezone_set('Asia/Kolkata');
			$current_date = date('Y/m/d', time());
			$current_date = (string)$current_date;
			$current_time = date('H:i:s', time());
			$current_time = (string)$current_time;

//				$resultData = $this->sendToPool($name,$email,$mobile,$utm_source,$utm_medium,$utm_campaign,$utm_term,$utm_content,$utm_site,$utm_url,$utm_title,$utm_timestamp,$utm_itemID);
//				$lead_id = $resultData["lead_id"] ? $resultData["lead_id"] : "";
//				$employee_name = $resultData["lead_owner_name"] ? $resultData["lead_owner_name"] : "";
//				echo $lead_id;
//				echo $employee_name;

                $centralData = $this->sendToCentral($name,$email,$mobile, $utm_source,$utm_medium,$utm_campaign,$utm_term,$utm_content,$utm_site,$utm_url,$utm_title,$utm_timestamp,$utm_itemID);

			$from = "vrao.dm@gmail.com";    
			$to = "vrao.dm@gmail.com";
			$this->email->cc('vishwanath.rao@sanatibuilders.com,manjunath.rao@sanatibuilders.com,surendra.reddy@sanatibuilders.com,surendra.reddy@sanatibuilders.com');
			$this->email->bcc('vrao.dm@gmail.com');
			$subject = 'Contact Us | Prestige Lakeside Habitat '; 
			$message = 'Leads For Prestige Lakeside Habitat :
			----------------------------------------------------------------------------------------------------
			Prestige Lakeside Habitat 

			
			Name='.$name.'
			Mobile='.$mobile.' (Not Verified)
			Email='.$email.'
			Date Time='.$current_date." ".$current_time.'

			
			----------------------------------------------------------------------------------------------------

			utm_source='.$utm_source.'
			utm_medium='.$utm_medium.'
			utm_campaign='.$utm_campaign.'
			utm_term='.$utm_term.'
			utm_content='.$utm_content.'
			utm_site='.$utm_site.'
			utm_url='.$utm_url.'
			utm_title='.$utm_title.'
			utm_timestamp='.$utm_timestamp.'
			utm_itemID='.$utm_itemID.'
			url='.$fullURL.'';

			$config['protocol'] = 'smtp';
			$config['smtp_host'] = 'mail.orangedigitalmedia.in';
			$config['smtp_port'] =  '993'; 
			$config['smtp_user'] = $from;
			$config['smtp_pass'] = 'Sanati@2021';
			$config['mailtype'] = 'html';
			$config['charset'] = 'iso-8859-1';
			$config['wordwrap'] = TRUE;
			$config['newline'] = "\r\n";

			$this->load->library('email', $config);
			$this->email->set_newline("\r\n");
			$this->email->from($from); 
			$this->email->to($to);
			$this->email->subject('Leads for Prestige Lakeside Habitat ');
			

	        // $this->email->message($link);
			$this->email->message($message);

			if($mobile == $whatsapp_mobile){
				$mobile = $mobile." WA Same";
			} else {
				$mobile = $mobile." WA".$whatsapp_mobile;
			}

			$name = substr($name, 0, 29);
			$email = substr($email, 0, 29);
			$mobile = substr($mobile, 0, 29);

			$project_name = "PrestigeLakesideHabitat";
			$sendData = $project_name."\n\nId=".$lead_id."\n\nName=".$name."\nMobile=".$mobile."\nEmail=".$email."\nDate=".$current_date."\nTime=".$current_time."\n\nAssigned=".$employee_name;

			$sendData = urlencode($sendData);

			$send_to1 = 8197967475;
			$send_to2 = 9632000888;
			$send_to3 = 9986136555;
			$send_to4 = 6360690190;


	// 		$sms_permission = $this->User_Model->get_sms_permission();
	// 		if($sms_permission == 1){
	        // $this->sendSMS($sendData, $send_to1);

	// 		}
			$this->sendSMS($sendData, $send_to1, $lead_id);
			$this->sendSMS($sendData, $send_to2, $lead_id);
			$this->sendSMS($sendData, $send_to3, $lead_id);
			$this->sendSMS($sendData, $send_to4, $lead_id);
			
			if($this->email->send())
			{
		//	echo 'Email sent.';
				redirect('thankyou');
			}
			else
			{
				show_error($this->email->print_debugger());
			}
		}
		else
		{
			echo "error";
		}
	}
	public function video_play()
	{
		$this->load->helper('date');
		$datestring = 'Year: %Y Month: %m Day: %d -time: %h:%i %a';
		$time = time();
		echo mdate($datestring, $time);
	        // die();
			// $ip = $this->input->ip_address();

		$utm_source = $this->input->post('utm_source');
		$utm_medium = $this->input->post('utm_medium');
		$utm_term = $this->input->post('utm_term');
		$utm_campaign = $this->input->post('utm_campaign');
		$utm_content = $this->input->post('utm_content');
		$utm_site = $this->input->post('utm_site');
		$utm_url = $this->input->post('utm_url');
		$utm_title = $this->input->post('utm_title');
		$utm_timestamp = $this->input->post('utm_timestamp');
		$utm_itemID= $this->input->post('utm_itemID');

		$this->load->helper('url');
		$currentURL = current_url();
		$params = $_SERVER['REQUEST_URI'];
		$fullURL = $currentURL . '?' . $params .'?' .$utm_source.'?'.$utm_medium.'?'.$utm_campaign;
		$name = $this->input->post('name');

		$mobile = $this->input->post('mobile');
		$mobile_country_code = $this->input->post('mobile_country_code');
		$mobile = "+".$mobile_country_code.$mobile;

		$whatsapp_mobile = $this->input->post('whatsapp_mobile');
		$whatsapp_mobile_country_code = $this->input->post('whatsapp_mobile_country_code');
		$whatsapp_mobile = "+".$whatsapp_mobile_country_code.$whatsapp_mobile;

		$current_city = $this->input->post('current_city');
		$email = $this->input->post('email');
		$data = array(
			'name' => $name,
			'mobile' => $mobile,
			'whatsapp_mobile' => $whatsapp_mobile,
			'current_city' => $current_city,
			'email' => $email,
			'utm_source' => $utm_source,
			'utm_medium' => $utm_medium,
			'utm_campaign' => $utm_campaign,
			'utm_term' => $utm_term,
			'utm_content' => $utm_content,
			'utm_site' => $utm_site,
			'utm_url' => $utm_url,
			'utm_title' => $utm_title,
			'utm_timestamp' => $utm_timestamp,
			'utm_itemID' => $utm_itemID,
		);
		if($this->User_Model->insertData($data))
		{

			date_default_timezone_set('Asia/Kolkata');
			$current_date = date('Y/m/d', time());
			$current_date = (string)$current_date;
			$current_time = date('H:i:s', time());
			$current_time = (string)$current_time;

//				$resultData = $this->sendToPool($name,$email,$mobile,$utm_source,$utm_medium,$utm_campaign,$utm_term,$utm_content,$utm_site,$utm_url,$utm_title,$utm_timestamp,$utm_itemID);
//				$lead_id = $resultData["lead_id"] ? $resultData["lead_id"] : "";
//				$employee_name = $resultData["lead_owner_name"] ? $resultData["lead_owner_name"] : "";
//				echo $lead_id;
//				echo $employee_name;

                $centralData = $this->sendToCentral($name,$email,$mobile, $utm_source,$utm_medium,$utm_campaign,$utm_term,$utm_content,$utm_site,$utm_url,$utm_title,$utm_timestamp,$utm_itemID);

			$from = "vrao.dm@gmail.com";    
			$to = "vrao.dm@gmail.com";
			$this->email->cc('vishwanath.rao@sanatibuilders.com,manjunath.rao@sanatibuilders.com,surendra.reddy@sanatibuilders.com,surendra.reddy@sanatibuilders.com');
			$this->email->bcc('vrao.dm@gmail.com');
			$subject = 'Contact Us | Prestige Lakeside Habitat '; 
			$message = 'Leads For Prestige Lakeside Habitat :
			----------------------------------------------------------------------------------------------------
			Prestige Lakeside Habitat 

			
			Name='.$name.'
			Mobile='.$mobile.' (Not Verified)
			Email='.$email.'
			Date Time='.$current_date." ".$current_time.'

			
			----------------------------------------------------------------------------------------------------

			utm_source='.$utm_source.'
			utm_medium='.$utm_medium.'
			utm_campaign='.$utm_campaign.'
			utm_term='.$utm_term.'
			utm_content='.$utm_content.'
			utm_site='.$utm_site.'
			utm_url='.$utm_url.'
			utm_title='.$utm_title.'
			utm_timestamp='.$utm_timestamp.'
			utm_itemID='.$utm_itemID.'
			url='.$fullURL.'';

			$config['protocol'] = 'smtp';
			$config['smtp_host'] = 'mail.orangedigitalmedia.in';
			$config['smtp_port'] =  '993'; 
			$config['smtp_user'] = $from;
			$config['smtp_pass'] = 'Sanati@2021';
			$config['mailtype'] = 'html';
			$config['charset'] = 'iso-8859-1';
			$config['wordwrap'] = TRUE;
			$config['newline'] = "\r\n";

			$this->load->library('email', $config);
			$this->email->set_newline("\r\n");
			$this->email->from($from); 
			$this->email->to($to);
			$this->email->subject('Leads for Prestige Lakeside Habitat ');
			

	        // $this->email->message($link);
			$this->email->message($message);

			if($mobile == $whatsapp_mobile){
				$mobile = $mobile." WA Same";
			} else {
				$mobile = $mobile." WA".$whatsapp_mobile;
			}

			$name = substr($name, 0, 29);
			$email = substr($email, 0, 29);
			$mobile = substr($mobile, 0, 29);

			$project_name = "PrestigeLakesideHabitat";
			$sendData = $project_name."\n\nId=".$lead_id."\n\nName=".$name."\nMobile=".$mobile."\nEmail=".$email."\nDate=".$current_date."\nTime=".$current_time."\n\nAssigned=".$employee_name;

			$sendData = urlencode($sendData);

			$send_to1 = 8197967475;
			$send_to2 = 9632000888;
			$send_to3 = 9986136555;
			$send_to4 = 6360690190;


	// 		$sms_permission = $this->User_Model->get_sms_permission();
	// 		if($sms_permission == 1){
	        // $this->sendSMS($sendData, $send_to1);

	// 		}
			$this->sendSMS($sendData, $send_to1, $lead_id);
			$this->sendSMS($sendData, $send_to2, $lead_id);
			$this->sendSMS($sendData, $send_to3, $lead_id);
			$this->sendSMS($sendData, $send_to4, $lead_id);
			
			if($this->email->send())
			{
		//	echo 'Email sent.';
				redirect('thankyou');
			}
			else
			{
				show_error($this->email->print_debugger());
			}
		}
		else
		{
			echo "error";
		}
	}

	
}
