<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		$this->load->model("contact_model");

	}

	public function index()
	{


		$viewData = new stdClass();
		$viewData->rows = $this->contact_model->get_all();

		$this->load->view('contact', $viewData);
	}

	public function newPage(){

		$this->load->view("new_contact");
	}

	public function editPage($id){

		$viewData = new stdClass();

		$viewData->row = $this->contact_model->get(array("id" => $id));

		$this->load->view("edit_contact", $viewData);


	}

	public function add(){

		// if are there request post process
		if (isset($_POST)) {
			$img_id=str_replace(' ','',$_FILES["logofile"]["name"]);// or $img_id = basename($_FILES["img_id"]["name"]);

			$data = array(
				"logo" 			=> $img_id,
				"title" 				=> $this->input->post("title"),
				"mission" 				=> $this->input->post("mission"),
				"vision" 					=> $this->input->post("vision"),
				"about_us" 		         => $this->input->post("about_us"),
				"fax" 			=> $this->input->post("fax"),
				"email" 		=> $this->input->post("email"),
				"phone" 		=> $this->input->post("phone"),
				"web" 		=> $this->input->post("web"),
				"address" 		=> $this->input->post("address"),
				"facebook" 		=> $this->input->post("facebook"),
				"twitter" 		=> $this->input->post("twitter"),
				"youtube" 		=> $this->input->post("youtube"),
				"instagram" 		=> $this->input->post("instagram"),
				"google_plus" 		=> $this->input->post("google_plus"),
				"linkedin" 		=> $this->input->post("linkedin"),
				"google_analytics" 		=> $this->input->post("google_analytics"),
				"meta_description" 		=> $this->input->post("meta_description"),
				"meta_keyword" 		=> $this->input->post("meta_keyword"),
				"map_att" 		=> $this->input->post("map_att"),
				"map_lat" 		=> $this->input->post("map_lat"),
				"bank_account" 		=> $this->input->post("bank_account"),
				"mersis_id" 		=> $this->input->post("mersis_id"),
				"tax_id" 		=> $this->input->post("tax_id"),

				"isActive"				=> 0
			);
			 //print_r($_FILES);
			 //die();

			$insert = $this->contact_model->add($data);
			// for success result condition
			if ($insert) {

				// for  not exist file contidion
				if (!is_file("uploads/$img_id")) {

                    echo "file not exist...";
					$config['upload_path'] = "./uploads/";
					// $config['allowed_types']        = 'gif|jpg|png';
					$config['allowed_types'] = '*';
					$config['max_size'] = 600;
					$config['max_width'] = 1024;
					$config['max_height'] = 768;
					$config['file_name'] =$img_id;
					$config['overwrite'] =true;
					$config['encrypt_name'] =true;

					$this->load->library('upload', $config);

					$upload = $this->upload->do_upload('logofile');
					//echo $this->upload->display_errors('<p>', '</p>');;
					//die();
					// for upload processing
					if ($upload) {
						$data = array('Upload_BİGGDATA' => $this->upload->data());
						/*$data2= $this->upload->data();=> returns full data data array about File  or $this->upload->data('file_name');       // Returns only file name: mypic.jpg
                        print_r($data);
                        echo "<hr>";
                        print_r($data2);
                        die();
                        $this->load->view('upload_success', $data);
                        */
						$this->session->set_userdata(
							array(
								"alert" => "true",
								"message" => $data["Upload_BİGGDATA"]["file_name"],
								"alert-type" => "success"
							)

						);

					}
					// for not upload processing
					else {
						$error = "unsuccess processing of upload";
						$error = $error . $this->upload->display_errors(); // display_errors('<p>', '</p>');
						//print_r($error);
						//die();
						// $this->load->view('upload_form', $error);
						$this->session->set_userdata(
							array(
								"alert" => "true",
								"message" => $error,
								"alert-type" => "error"
							)
						);
					}

				} // for already exist file condition
				else {
					$error = "This File already exits  try upload anouther file";

					$this->session->set_userdata(
						array(
							"alert" => "true",
							"message" => $error,
							"alert-type" => "error"
						)
					);
				}

				redirect(base_url("contactpage"), "refresh", 2);
			} // for unsuccess result condition
			else{
				redirect(base_url("contactpage/newPage"));
			}

		}
	}

	public function edit($id){

		// if are there request post process
		if (isset($_POST)) {
			$img_id=str_replace(' ','',$_FILES["logofile"]["name"]);// or $img_id = basename($_FILES["img_id"]["name"]);

			$data = array(
				"logo" 			=> $img_id,
				"title" 				=> $this->input->post("title"),
				"mission" 				=> $this->input->post("mission"),
				"vision" 					=> $this->input->post("vision"),
				"about_us" 		         => $this->input->post("about_us"),
				"fax" 			=> $this->input->post("fax"),
				"email" 		=> $this->input->post("email"),
				"phone" 		=> $this->input->post("phone"),
				"web" 		=> $this->input->post("web"),
				"address" 		=> $this->input->post("address"),
				"facebook" 		=> $this->input->post("facebook"),
				"twitter" 		=> $this->input->post("twitter"),
				"youtube" 		=> $this->input->post("youtube"),
				"instagram" 		=> $this->input->post("instagram"),
				"google_plus" 		=> $this->input->post("google_plus"),
				"linkedin" 		=> $this->input->post("linkedin"),
				"google_analytics" 		=> $this->input->post("google_analytics"),
				"meta_description" 		=> $this->input->post("meta_description"),
				"meta_keyword" 		=> $this->input->post("meta_keyword"),
				"map_att" 		=> $this->input->post("map_att"),
				"map_lat" 		=> $this->input->post("map_lat"),
				"bank_account" 		=> $this->input->post("bank_account"),
				"mersis_id" 		=> $this->input->post("mersis_id"),
				"tax_id" 		=> $this->input->post("tax_id"),

				"isActive"				=> 0
			);
			//print_r($_FILES);
			//die();

			$update = $this->contact_model->update(
				array("id"	=> $id),
				$data
			);

			// for success result condition
			if ($update) {

				// for  not exist file contidion
				if (!is_file("uploads/$img_id")) {


					$config['upload_path'] = "./uploads/";
					// $config['allowed_types']        = 'gif|jpg|png';
					$config['allowed_types'] = '*';
					$config['max_size'] = 9000;
					$config['max_width'] = 2000;
					$config['max_height'] = 2000;
					$config['file_name'] =$img_id;
					$config['overwrite'] =true;
					$config['encrypt_name'] =true;

					$this->load->library('upload', $config);

					$upload = $this->upload->do_upload('logofile');

					// for upload processing
					if ($upload) {
						$data = array('Upload_BİGGDATA' => $this->upload->data());
						/*$data2= $this->upload->data();=> returns full data data array about File  or $this->upload->data('file_name');       // Returns only file name: mypic.jpg
                        print_r($data);
                        echo "<hr>";
                        print_r($data2);
                        die();
                        $this->load->view('upload_success', $data);
                        */
						$this->session->set_userdata(
							array(
								"alert" => "true",
								"message" => $data["Upload_BİGGDATA"]["file_name"],
								"alert-type" => "success"
							)

						);

					}
					// for not upload processing
					else {
						$error = "unsuccess processing of upload";
						$error = $error . $this->upload->display_errors(); // display_errors('<p>', '</p>');
						//print_r($error);
						//die();
						// $this->load->view('upload_form', $error);
						$this->session->set_userdata(
							array(
								"alert" => "true",
								"message" => $error,
								"alert-type" => "error"
							)
						);
					}

				} // for already exist file condition
				else {
					$error = "This File already exits  try upload anouther file";

					$this->session->set_userdata(
						array(
							"alert" => "true",
							"message" => $error,
							"alert-type" => "error"
						)
					);
				}




				redirect(base_url("contactpage"), "refresh", 1);
			} // for unsuccess result condition
			else{
				redirect(base_url("contactpage/editPage/$id"));
			}

		}



	}

	public function isActiveSetter(){

		$id 	  = $this->input->post("id");
		$isActive = ($this->input->post("isActive") == "true") ? 1 : 0;

		$update = $this->contact_model->update(
			array("id" => $id),
			array("isActive" => $isActive)
		);

	}

	public function isActiveSetterForImage(){

		$id 	  = $this->input->post("id");
		$isActive = ($this->input->post("isActive") == "true") ? 1 : 0;

		$update = $this->roomimage_model->update(
			array("id" => $id),
			array("isActive" => $isActive)
		);

	}

	public function delete($id){

		$delete = $this->contact_model->delete(array("id" => $id));

		redirect(base_url("contactpage"));

	}

	public function rankUpdate(){

		parse_str($this->input->post("data"), $data);

		$items = $data["sortId"];

		foreach($items as $rank => $id){

			$this->contact_model->update(
				array(
					"id"      => $id,
					"rank !=" => $rank
				),
				array("rank" => $rank)
			);

		}

	}
	public function roomImageRankUpdate(){

		parse_str($this->input->post("data"), $data);

		$items = $data["sortId"];

		foreach($items as $rank => $id){

			$this->roomimage_model->update(
				array(
					"id"      => $id,
					"rank !=" => $rank
				),
				array("rank" => $rank)
			);

		}

	}

	public function imageUploadPage($room_id){

		$this->session->set_userdata("room_id", $room_id);

		$viewData = new stdClass();
		$viewData->rows = $this->roomimage_model->get_all(
			array(
				"room_id"	=> $room_id,
			),
			"rank ASC"
		);

		$this->load->view("room_image", $viewData);

	}

	public function upload_image(){

		$config['upload_path']          = 'uploads/';
		$config['allowed_types']        = '*';
		$config['encrypt_name']			= true;

		$this->load->library('upload', $config);

//		if(!file_exists(FCPATH)){}

		if ( ! $this->upload->do_upload('file'))
		{
			$error = array('error' => $this->upload->display_errors());

			print_r($error);

		}
		else
		{

			// Upload Basarili ise DB ye aktar..
			$data = array('upload_data' => $this->upload->data());
			$img_id = $data["upload_data"]['file_name'];

			$this->roomimage_model->add(array(
					"img_id"	=> $img_id,
					"room_id"	=> $this->session->userdata("room_id"),
					"isActive"	=> 1,
					"rank"		=> 0
				)

			);


		}

	}

	public function deleteImage($id){

		$image = $this->roomimage_model->get(array("id" => $id));

		$file_name = FCPATH ."uploads/$image->img_id";

		if(unlink($file_name)){

			$delete = $this->roomimage_model->delete(array("id"	=> $id));

			if($delete){

				redirect("contactpage/imageUploadPage/$image->room_id");

			}
		}


	}


	/*
	 * Availability Metodlari
	 */

	public function next($limit)
	{
		$room_id = $_GET["room_id"];
		$lastdate = $_GET["lastdate"];

		$results=$this->roomavailability_model->get_all(array(
		"room_id "	=> $room_id,
		"daily_date >"	=> $lastdate
	), "daily_date ASC");
		if(empty($results)){
			$results=$this->roomavailability_model->get_all(array(
				"room_id "	=> $room_id,
			), "daily_date DESC","",$limit);

			$viewData = new stdClass();
			$viewData->room_id = $room_id;
			$viewData->availabilities = array_reverse($results);

			$this->load->view("new_roomavailability", $viewData);
		}
		else{

		}

		$viewData = new stdClass();
		$viewData->room_id = $room_id;
		$viewData->availabilities = $results;

		$this->load->view("new_roomavailability", $viewData);

	}
	public function prev($lastdate)
	{
		$limit=22;
		$room_id = $_GET["room_id"];
		$firstdate = $_GET["firstdate"];


		$results=$this->roomavailability_model->get_all(array(
			"room_id "	=> $room_id,
			"daily_date <"	=> $firstdate
		), "daily_date desc","",$limit);
		if (empty($results)) {
			redirect(base_url("contactpage/newAvailabilityPage/$room_id"));
		}
		else{
			$viewData = new stdClass();
			$viewData->room_id = $room_id;
			$viewData->availabilities = array_reverse($results);

			$this->load->view("new_roomavailability", $viewData);
		}



	}
	public function newAvailabilityPage($room_id){
		if ($_POST) {
			$limit=$this->input->post("maxlimit");
		}



		$results=$this->roomavailability_model->get_all(array(
			"room_id"	=> $room_id
		), "daily_date ASC"
		);
        // print_r($results[0]->daily_date);
		// die();
		if (isset($limit)) {
			$rootlimit=$limit;
		}
		else
			$rootlimit=sizeof($results);

		$viewData = new stdClass();
		$viewData->room_id = $room_id;
		$viewData->availabilities = $results;
		$viewData->rootcount = $rootlimit;

		$this->load->view("new_roomavailability", $viewData);

	}
	public function newAvailabilityPage1($room_id){
		if ($_POST) {
			$limit=$this->input->post("maxlimit");
		}



		$results=$this->roomavailability_model->get_all(array(
			"room_id"	=> $room_id
		), "daily_date ASC");
		// print_r($results[0]->daily_date);
		// die();
		if (isset($limit)) {
			$rootlimit=$limit;
		}
		else
			$rootlimit=sizeof($results);

		$viewData = new stdClass();
		$viewData->room_id = $room_id;
		$viewData->availabilities = $results;
		$viewData->rootcount = $rootlimit;

		$this->load->view("new_roomavailability", $viewData);

	}


	public function addNewAvailability($room_id){

		$availability_date = explode("-",$this->input->post("availability_date"));
		$statu = $this->input->post("select_statu");




		// 08/15/2016
		// Y-m-d
		// 2016-01-25

		$startDateArr 	= explode("/",$availability_date[0]);
		$finisDateArr 	= explode("/",$availability_date[1]);

		$startDateStr	= trim($startDateArr[2]) . "-" . trim($startDateArr[0]) . "-" . trim($startDateArr[1]);
		$finisDateStr	= trim($finisDateArr[2]) . "-" . trim($finisDateArr[0]) . "-" . trim($finisDateArr[1]);

		$startDate 		= new DateTime($startDateStr);
		$finisDate_ 	= date("Y-m-d",strtotime('1 day', strtotime($finisDateStr)));
		$finisDate 		= new DateTime($finisDate_);

		$interval 		= DateInterval::createFromDateString('1 day');
		$period 		= new DatePeriod($startDate, $interval, $finisDate);

		foreach($period as $date){

				$record_test = $this->roomavailability_model->get(
					array(
						"room_id" 			=> $room_id,
						"daily_date"	=> $date->format("Y-m-d")
					)
				);

			if(empty($record_test)) {


					$this->roomavailability_model->add(array(
							"daily_date" => $date->format("Y-m-d"),
							"room_id" => $room_id,
							"status" => $statu

						)
					);
			}
			else{
					$this->roomavailability_model->update(
						array(
							"daily_date" => $date->format("Y-m-d"),
							"room_id" => $room_id ),
						array(
							"status" => $statu
						)
					);
			}

		}

		redirect(base_url("contactpage/newAvailabilityPage/$room_id"));

	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */