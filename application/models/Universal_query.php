<?php
Class Universal_query extends CI_Model{

    function __constuct()
    {
        parent::__construct();  // Call the Model constructor
        $this->load->library('session');

        loader::database();    // Connect to current database setting.

    }

    public function check_login()
    {
        $user = $this->session->userdata('id_user');
        $pass = $this->session->userdata('name');
        // var_dump($user);
        //var_dump($user); die();
        // $q = "SELECT * FROM `user` WHERE `username` = '$user' and `password` = '$pass'";
        // $res = $this->db->query($q)->result_array();
        // if(count($res) == 0) {redirect(base_url("admin"));}
        if(is_null($user) && is_null($pass)) { return FALSE; }
        else{
            return TRUE;
        }
    }

   public function do_login ($username,$password){

        $this->db->select('*');
        $q     =  $this->db->get_where('user', array('username' => $username,'password'=>$password));
        $query =  $q->result_array();
        return $query;
   }

   public function update_art($id_art_user_category, $data)
    {
        foreach ($data as $key => $value) {
            $dat = array(
                'value' => $value
            );
            $this->db->where(array('id_art_user_category' => $id_art_user_category, 'attribute' => $key));
            $q = $this->db->update('global_article', $dat);
        }
        return $q;

    }

    public function update_pctr($id_art_user_category, $key, $value){
        $this->db->where(array('id_art_user_category' => $id_art_user_category, 'attribute' => $key));
        $q = $this->db->update('global_article',array('value' => $value));
        return $q;
    }

    public function insert_comments($id_art_user_category, $data)
    {
        $dat = array(
                'id_art_user_category' => $id_art_user_category,
                'created_on' => date("Y-m-d")

            );

        $data = array_merge($dat,$data);

        $q = $this->db->insert('comments', $data);
        return $q;

    }

    public function get_globaldetails($id_user_details)
    {
        $this->db->select(array('attribute','value'));
        $q = $this->db->get_where('user_global_profiles', array('id_user_details' => $id_user_details));
        $query = $q->result_array();
        return $query;
    }

    public function update_pctr_ads($files){
        $this->db->where(array('id' => 2));
        $q = $this->db->update('advertisement', $files);
        return $q;
    }

}
?>
