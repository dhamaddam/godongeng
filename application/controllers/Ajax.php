<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Ajax extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('Universal_query', 'Uq');
		$this->load->model('Page_art', 'Pa');
		$this->load->model('Category_art', 'ct');
		$this->load->helper(array('html', 'url', 'form'));
	}

	public function do_login($para)
	{
		$para = explode("_", $para);

		$username = $para[0];
		$password = $para[1];

		$stat = $this->Uq->do_login($username, $password);
		// $password = $para[1];

		if ($stat != FALSE) {
			foreach ($stat as $user) {
				$data_user = array(
					'id_user' => $user['id_user'],
					'username'  => $user['username'],
					'level' => $user['status']
				);
			}
			$fre = $this->session->set_userdata($data_user);
		}
		$this->check_dorm($stat);
	}

	public function login_google($para)
	{
		$para = explode("_", $para);

		$ID_profile = $para[0];
		$stat = $this->Uq->check_user_id($ID_profile);


		if ($stat != FALSE) {
			echo json_encode(array("status" => TRUE));
		} else {

			$data_user = array(
				'id_user' => $para[0],
				'username'  => $para[1],
				'image_URL'  => $para[2],
				'email' => $para[3],
				'level' => '1'
			);
			$stat = $this->Uq->save_data_user($data_user);

			echo json_encode(array("status" => FALSE));
		}
		// $this->check_dorm($stat);
	}

	public function do_logout()
	{
		$stat = $this->session->sess_destroy();
		//var_dump($stat); die();
		$this->check_dorm($stat);
	}


	public function check_dorm($val)
	{
		switch ($val) {
			case TRUE:
				echo json_encode(array("status" => TRUE));
				break;
			default:
				echo json_encode(array("status" => FALSE));
				break;
		}
	}

	public function update_article()
	{

		$data = array(
			'description' => $this->input->post('description'),
			'paragraph1' => $this->input->post('paragraph1'),
			'paragraph2' => $this->input->post('paragraph2'),
			'paragraph3' => $this->input->post('paragraph3')
		);

		$q = $this->Uq->update_art($this->input->post('id'), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function add_comment($id_article = "")
	{

		$data = $this->input->post();
		$q = $this->Uq->insert_comments($id_article, $data);
		echo json_encode(array("status" => TRUE));
	}

	public function show_article($no)
	{

		$list = $this->Pa->get_global_article($no);

		$data = array(
			"description" => $list['description'],
			"paragraph1" => $list['paragraph1'],
			"paragraph2" => $list['paragraph2'],
			"paragraph3" => $list['paragraph3'],
			"tag" => $list['tag'],
			"status" => TRUE,
			"id" => $no,
		);
		//output to json format
		echo json_encode($data);
	}

	public function upload_picture()
	{

		global $template, $check_valid;
		$temp = $this->input->post('id');

		if (isset($_FILES['picture_description'])) {
			# code...
			$check_valid = 'picture_description';
		} elseif (isset($_FILES['first_picture'])) {
			# code...
			$check_valid = 'first_picture';
		} elseif (isset($_FILES['second_picture'])) {
			# code...
			$check_valid = 'second_picture';
		} elseif (isset($_FILES['third_picture'])) {
			# code...
			$check_valid = 'third_picture';
		} elseif (isset($_FILES['fourth_picture'])) {
			# code...
			$check_valid = 'fourth_picture';
		}


		if (isset($_FILES[$check_valid])) {

			$data  = $_FILES[$check_valid];
			$total = count($data['name']);
			$data2 = array();
			for ($i = 0; $i < $total; $i++) {

				$data2[] = array(
					'name' => $data['name'][$i],
					'type' => $data['type'][$i],
					'tmp_name' => $data['tmp_name'][$i],
					'error' => $data['error'][$i],
					'size' => $data['size'][$i],
				);
			}


			$no = 0;

			foreach ($data2 as $row) {
				$config['upload_path'] = './assets/' . $template->theme . 'images/content/';
				$config['allowed_types'] = 'gif|jpg|png|bmp';
				$this->load->library('multi_upload', $config);
				//$temp =  $this->multi_upload->do_upload($data2[$no]);
				if ($this->multi_upload->do_upload($data2[$no])) {
					$image_data = $this->multi_upload->data();
					$te = $this->Uq->update_pctr($this->input->post('id'), $check_valid, $image_data['file_name']);
					//var_dump($te);die();
					echo img(array(
						//assets/$template->theme"."images/content/
						'src' => base_url("assets/$template->theme" . "images/content/$image_data[file_name]")
						//	,
						//	'width'=>300,
						//	'style'=>'margin:10px; padding:10px; background:#bbb'
					));
				}
				$no++;
			}
		}
	}

	public function show_all_article()
	{

		$data = $this->Pa->get_all_article();
		//output to json format
		echo json_encode($data);
	}
	public function show_full_article($id_article)
	{

		$data = $this->Pa->get_global_article($id_article);
		echo json_encode($data);
	}
	public function show_full_mobile_article($id_article)
	{

		$data = $this->Pa->get_global_mobile_article($id_article);

		echo json_encode($data);
	}


	public function load()
	{
		$page = $this->input->post('page');
		$offset = ($page - 1) * 3;
		$limit =  3;
		$data = $this->ct->get_article_all($limit, $offset);
		echo json_encode($data->result_array());
	}

	////LIA's Project Presensi 

	public function get_json_jadwal($id_article)
	{

		$data = $this->Pa->get_jadwal();

		echo json_encode($data);
	}
	public function get_json_kelas($id_article)
	{

		$data = $this->Pa->get_kelas();

		echo json_encode($data);
	}

	public function get_json_user($id_article)
	{

		$data = $this->Pa->get_user();

		echo json_encode($data);
	}
	public function get_json_user_by_uid($id_article)
	{

		$data = $this->Pa->get_user_by_uid($id_article);

		echo json_encode($data);
	}
	public function get_json_user_by_kelas($id_kelas)
	{

		$data = $this->Pa->get_user_by_kelas($id_kelas);

		echo json_encode($data);
	}

	public function set_json_record_user_presensi($id_user_uid, $jadwal)
	{

		$data = $this->Pa->set_record_user_presensi($id_user_uid, $jadwal);
		echo json_encode($data);
	}

	public function get_json_jadwal_details($id_jadwal)
	{
		$data = $this->Pa->get_jadwal_details($id_jadwal);
		echo json_encode($data);
	}

	public function push_user_presensi()
	{
		$data = $this->input->get();
		$this->Pa->insert_user_presensi($data);
		echo json_encode($data);
	}
	// ?imei="+IMEI_Number_Holder+"&& Latlong"+ Longitude+ "," + Latitude
	public function push_user_geospasial()
	{
		$response = array();
		$data = array();
		$get = $this->input->get();
		$datas = array(
			'imei' => $get['imei'],
			'latitude' => $get['latitude'],
			'longitude' => $get['longitude'],
			'tanggal' => date("Y-m-d"),
		);
		//insert database 
		$this->Pa->insert_user_geospasial($datas);

		$data[] = array(
			'imei' => $get['imei'],
			// 'latlong' => $post['latlong'],
			'tanggal' => date("Y-m-d"),
			'type' => "Feature",
			'id' => 1,
			'properties' => array(
				'CASE_ENQUIRY_ID' => $get['imei'],
				'OPEN_DT' => '05\/03\/2013 11:12:12 AM',
				'CLOSED_DT' => 'null',
				'CASE_STATUS' => 'Open',
				'CLOSURE_REASON' => '',
				'CASE_TITLE' => 'Rodent Activity',
				'SUBJECT' => 'Inspectional Services',
				'REASON' => 'Environmental Services',
				'TYPE' => 'Rodent Activity',
				'QUEUE' => 'ISD_Environmental Services (INTERNAL)',
				'Department' => 'ISD',
				'Location' => '83-85 Cresthill Rd  Brighton  MA  02135',
				'fire_district' => 11,
				'pwd_district' => '04',
				'city_council_district' => 9,
				'police_district' => "D14",
				'neighborhood' => "Allston \/ Brighton",
				'neighborhood_services_district' => 15,
				'ward' => 'Ward 22',
				'precinct' => 2211,
				'land_usage' => 'R2',
				'LOCATION_STREET_NAME' => "83-85 Cresthill Rd",
				'LOCATION_ZIPCODE' => 2135,
				'LATITUDE' => 42.355988,
				'LONGITUDE' => -71.157609,
				'Source' => "Constituent Call"
			),
			'geometry' => array(
				'type' => 'Point',
				'coordinates' => [-71.157609, 42.355988]
			)
		);
		$response['type'] = "FeatureCollection";
		$response['features'] = $data;
		echo json_encode($response, TRUE);
	}

	public function get_json_data_geospasial()
	{
		$gets = $this->Pa->get_data_by_geospasial();
		// var_dump($get); die();
		foreach ($gets as $get) {
			$data[] = array(
				'imei' => $get['imei'],
				// 'latlong' => $post['latlong'],
				'tanggal' => date("Y-m-d"),
				'type' => "Feature",
				'id' => 1,
				'properties' => array(
					'CASE_ENQUIRY_ID' => $get['CASE_ENQUIRY_ID'],
					'OPEN_DT' => '05\/03\/2013 11:12:12 AM',
					'CLOSED_DT' => 'null',
					'CASE_STATUS' => 'Open',
					'CLOSURE_REASON' => '',
					'CASE_TITLE' => 'Rodent Activity',
					'SUBJECT' => 'Inspectional Services',
					'REASON' => 'Environmental Services',
					'TYPE' => 'Rodent Activity',
					'QUEUE' => 'ISD_Environmental Services (INTERNAL)',
					'Department' => 'ISD',
					'Location' => '83-85 Cresthill Rd  Brighton  MA  02135',
					'fire_district' => 11,
					'pwd_district' => '04',
					'city_council_district' => 9,
					'police_district' => "D14",
					'neighborhood' => "Allston \/ Brighton",
					'neighborhood_services_district' => 15,
					'ward' => 'Ward 22',
					'precinct' => 2211,
					'land_usage' => 'R2',
					'LOCATION_STREET_NAME' => "83-85 Cresthill Rd",
					'LOCATION_ZIPCODE' => 2135,
					'LATITUDE' => $get['latitude'],
					'LONGITUDE' => $get['longitude'],
					'Source' => "Constituent Call"
				),
				'geometry' => array(
					'type' => 'Point',
					'coordinates' => [$get['longitude'], $get['latitude']]
				)
			);
			$response['type'] = "FeatureCollection";
			$response['features'] = $data;
		}
		echo json_encode($response, TRUE);
	}

	public function get_json_user_presensi_by_uname_pass($uname, $pass)
	{
		$data = $this->Pa->get_user_presensi_by_uname_pass($uname, $pass);
		echo json_encode($data);
	}

	public function edit_json_jadwal_details($id_jadwal)
	{
		$jam_jadwal = $this->input->get("jam_jadwal");
		$hari_jadwal = $this->input->get("hari_jadwal");
		$tanggal_jadwal = $this->input->get("tanggal_jadwal");
		$nama_matakuliah = $this->input->get("nama_matakuliah");
		$jadwal = $this->input->get("jadwal");

		$array1  = array(
			"jam_jadwal" => $jam_jadwal,
			"hari_jadwal" => $jam_jadwal,
			"tanggal_jadwal" => $jam_jadwal
		);

		$array2 = array(
			"nama_matakuliah" => $nama_matakuliah
		);

		$this->Pa->edit_jadwal_details($array1, $array2, $id_jadwal);
		$data = array("status" => "aktif");
		echo json_encode($data);
	}

	public function get_json_jadwal_details_by_class($kelas)
	{
		$data = $this->Pa->get_jadwal_details_by_class($kelas);
		echo json_encode($data);
	}
	// get_absensi_by_jadwalid
	public function get_json_absensi_by_jadwalid($jadwalid)
	{
		$data = $this->Pa->get_absensi_by_jadwalid($jadwalid);
		echo json_encode($data);
	}

	public function get_json_absensi_mahasiswa_by_tanggal($tanggal)
	{
		$data = $this->Pa->get_absensi_mahasiswa_by_tanggal($tanggal);
		echo json_encode($data);
	}

	public function upload_picture_ads()
	{

		global $template, $check_valid;
		$temp = $this->input->post('id');


		if (isset($_FILES['image_ads_1'])) {
			# code...
			$check_valid = 'image_ads_1';
		} elseif (isset($_FILES['image_ads_2'])) {
			# code...
			$check_valid = 'image_ads_2';
		} elseif (isset($_FILES['image_ads_3'])) {
			# code...
			$check_valid = 'image_ads_3';
		} elseif (isset($_FILES['image_ads_4'])) {
			# code...
			$check_valid = 'image_ads_4';
		} elseif (isset($_FILES['image_ads_sidebar'])) {
			# code...
			$check_valid = 'image_ads_sidebar';
		}


		if (isset($_FILES[$check_valid])) {

		
			

			$data  = $_FILES[$check_valid];
			$total = count($data['name']);
			$data2 = array();
			for ($i = 0; $i < $total; $i++) {

				$data2[] = array(
					'name' => $data['name'][$i],
					'type' => $data['type'][$i],
					'tmp_name' => $data['tmp_name'][$i],
					'error' => $data['error'][$i],
					'size' => $data['size'][$i],
				);
			}
			
					
			$no = 0;

			foreach ($data2 as $row) {
				$config['upload_path'] = './assets/' . $template->theme . 'images/content/';
				$config['allowed_types'] = 'gif|jpg|png|bmp';
				$this->load->library('multi_upload', $config); 
				if ($this->multi_upload->do_upload($data2[$no])) {
					$image_data = $this->multi_upload->data();
					// $error = array('error' => $this->upload->display_errors());
					// echo json_encode($error);
					
				

					$te = $this->Uq->update_pctr_ads(array( $check_valid => $image_data['file_name']));
				
					echo img(array(
						//assets/$template->theme"."images/content/
						'src' => base_url("assets/$template->theme" . "images/content/". $image_data['file_name']),
						//	,
						'width' => 300
					));
				} else {
					echo img(array(
						//assets/$template->theme"."images/content/
						'src' => base_url("assets/$template->theme" . "images/content/about-thumbnail.jpg"),
						//	,
						'width' => 300,
						'style' => "error"
					));
				}
				$no++;
			}
		}
	}
}
