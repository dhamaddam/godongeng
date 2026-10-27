<?php
Class Page_art extends CI_Model{

  function __constuct(){
        parent::__constuct();  // Call the Model constructor
        loader::database();    // Connect to current database setting.

   }

   function get_all_article(){ 

      $q = "SELECT title , picture , id_art_user_category,  uri , created_on FROM article ";
      $data = $this->db->query($q)->result_array();
      return $data;
   }

   function get_global_mobile_article($id_art){

      $q = "SELECT * FROM global_article WHERE id_art_user_category LIKE '$id_art' ";
      $q = $this->db->query($q)->result_array();
      $arr = array();
      $data = array();
      $data1 = array();
      $data2 = array();
      $data3 = array();
      $data4 = array();

      $part1 = array('picture_description','description');
      $part2 = array('first_picture','paragraph1');
      $part3 = array('second_picture','paragraph2');

        foreach ($q as $art){

              if($art['attribute'] =='picture_description'){

                  $data1['picture'] = $art['value'];

               }
              else if($art['attribute'] =='description'){
                //{"\n"}
                  $page = str_replace("<br>",' ',$art['value']);
                  $data1['text'] = $page;

               }
              else if($art['attribute'] =='first_picture'){

                  $data2['picture'] = $art['value'];
               }
              else if($art['attribute'] =='paragraph1'){

                  $page = str_replace("<br>",' ',$art['value']);
                  $data2['text'] = $page ;

               }
              else if($art['attribute'] =='second_picture'){

                  $data3['picture'] = $art['value'];

               }
              else if($art['attribute'] =='paragraph2'){

                  $page = str_replace("<br>",' ',$art['value']);
                  $data3['text'] = $page;

               }

              else if($art['attribute'] =='third_picture'){

                  $data4['picture'] = $art['value'];

               }
              else if($art['attribute'] =='paragraph3'){

                  $page = str_replace("<br>",' ',$art['value']);
                  $data4['text'] = $page;

               }

              }

            $data = array($data1 ,$data2 , $data3 , $data4);

        return $data; 
    }

  function get_global_article($id_art){

               $arr = array('id_art' => $id_art);

               $q = " SELECT * FROM global_article WHERE id_art_user_category LIKE '$id_art' ";

               $q = $this->db->query($q)->result_array();

               foreach ($q as $art){
                   $data[$art['attribute']] = $art['value'];
                 }

                $data = array_merge($arr ,$data);

                $q = "SELECT * FROM article WHERE id_art_user_category LIKE '$id_art' ";

                $arr = $this->db->query($q)->result_array();
                $data = array_merge($arr ,$data);
                return $data;

              // }
    }
    function get_global_article_v1($uri_assoc){

                  $q = "SELECT id_art_user_category FROM article WHERE uri LIKE '$uri_assoc' ";

                  $q = $this->db->query($q)->result_array();

                  // var_dump($q); die();
                  if (empty($q)){
                    redirect(base_url('error_404'));
                  }
                  else{
                    $id_art = $q[0]['id_art_user_category'];

                    $arr = array('id_art' => $id_art);

                     $q = " SELECT * FROM global_article WHERE id_art_user_category LIKE '$id_art' ";

                     $q = $this->db->query($q)->result_array();

                   // if ($q){
                   //   return false;
                   // }
                   // else {

                     foreach ($q as $art){

                       $data[$art['attribute']] = $art['value'];

                     }

                    $data = array_merge($arr ,$data);

                    $q = "SELECT title, created_on ,uri, tag, updated_on FROM article WHERE id_art_user_category LIKE '$id_art' ";

                    $arr = $this->db->query($q)->result_array();
                    $data = array_merge($arr ,$data);
                    return $data;
                  }


                // }
      }

    function get_last_article(){

      $q = "SELECT title , picture , uri , created_on FROM article WHERE created_on < NOW() ORDER BY created_on  DESC LIMIT 0,8";

      $data = $this->db->query($q)->result_array();

      return $data;
    }

    function get_comments($id_art_user_category){

      $q = "SELECT comment , id_art_user_category , commentator , created_on ,website FROM comments WHERE created_on < NOW() AND status = 1 AND id_art_user_category = $id_art_user_category LIMIT 0,7";
      $data = $this->db->query($q)->result_array();

      return $data;
    }

  ////LIA's Project Presensi 
  function get_jadwal (){
    $q = "SELECT * FROM 1011dongeng.jadwal LEFT JOIN 1011dongeng.matakuliah  ON jadwal.id_matakuliah = matakuliah.id_matakuliah
    ORDER BY jadwal.tanggal_jadwal";

    $data = $this->db->query($q)->result_array();

    return $data;
  }
  function get_kelas (){

    $q = "SELECT * FROM kelas ";
    $data = $this->db->query($q)->result_array();
    return $data;

  }

  function get_user (){
    $q = "SELECT * FROM user_presensi ";

    $data = $this->db->query($q)->result_array();

    return $data;
  }
  function get_user_by_uid($id_user_uid){
    $q = "SELECT * FROM user_presensi WHERE uid = '".$id_user_uid."'";

    $data = $this->db->query($q)->result_array();

    return $data;
  }

  function get_user_by_kelas($id_kelas){
    $q = "SELECT * FROM user_presensi WHERE idkelas = $id_kelas  ";
    $data = $this->db->query($q)->result_array();
    return $data;
  }

  function set_record_user_presensi($id_user_uid,$jadwal){

    $data = array(
      'id_user' => $id_user_uid,
      'tanggal' => date("Y-m-d"),
      'jadwalid' => $jadwal
      );
    $q = $this->db->insert('absen', $data);
    return $q;
  }
  function insert_user_presensi ($data){
    $q = $this->db->insert('user_presensi', $data);
    return $q;
  }
  function insert_user_geospasial ($data){
    $q = $this->db->insert('geospasial_data', $data);
    return $q;
  }
  function get_data_by_geospasial(){
    $this->db->select("*");
    $this->db->from("geospasial_data");
    $q= $this->db->get()->result_array();
    return $q;
  }

  function get_absensi_by_jadwalid($jadwalid){
    $q = "SELECT * FROM absen  WHERE jadwalid = $jadwalid  GROUP BY tanggal";
    $data = $this->db->query($q)->result_array();
    return $data;
  }

  function get_user_presensi_by_uname_pass($useremail,$userpass){
    $q = "SELECT * FROM user_presensi  WHERE useremail = $useremail AND userpass = $userpass ";
    $data = $this->db->query($q)->result_array();
    return $data;
  }

  function get_jadwal_details ($id_jadwal){

    $q = "SELECT * FROM jadwal LEFT JOIN 1011dongeng.matakuliah  ON jadwal.id_matakuliah = matakuliah.id_matakuliah WHERE jadwalid = $id_jadwal  GROUP BY jadwal.jadwalid";
    $data = $this->db->query($q)->result_array();

    return $data;
  }
  function get_jadwal_details_by_class($kelas){
    $q = "SELECT * FROM jadwal LEFT JOIN 1011dongeng.matakuliah  ON jadwal.id_matakuliah = matakuliah.id_matakuliah WHERE idkelas = $kelas  GROUP BY jadwal.jadwalid";
    $data = $this->db->query($q)->result_array();
    return $data;
  }

  function edit_jadwal_details($data1 = "",$data2 = "", $id = ""){
    $this->db->select("*");
    $this->db->from("jadwal");
    $this->db->where(array("jadwalid" =>$id));
    $q= $this->db->get()->result_array();

    // $this->db->join('jadwal', 'jadwal.id_matakuliah = matakuliah.id_matakuliah');
    
    // $a =  $q->set($data1);
    $this->db->where('jadwalid', $q[0]['jadwalid']);
    $this->db->update('jadwal', $data1);
    

    

    // $b =   $q->set($data2);
    $this->db->where('id_matakuliah', $q[0]["id_matakuliah"]);
    $this->db->update('matakuliah',$data2);
    
    // $q =  $this->db->update('jadwal');
    return true;
  }

  function get_absensi_mahasiswa_by_tanggal($tanggal) {
    $q = "SELECT * FROM absen LEFT JOIN user_presensi ON absen.id_user = user_presensi.userid WHERE tanggal ='".$tanggal."'";
    $data = $this->db->query($q)->result_array();
    return $data;
  }
  
  // function get_id_matakuliah_by_id_jadwal ($id_jadwal) {
  //   // $this->db->join('jadwal', 'jadwal.id_matakuliah = matakuliah.id_matakuliah');
  //   // $q =  $this->db->where('jadwal.jadwalid', $id);

  //   $this->db->join('jadwal', 'jadwal.id_matakuliah = matakuliah.id_matakuliah');
  //   return $id_matakuliah;

  // }
  

}
?>
