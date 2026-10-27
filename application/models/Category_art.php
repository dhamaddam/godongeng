<?php
Class Category_art extends CI_Model{

  function __constuct(){
        parent::__constuct();  // Call the Model constructor
        loader::database();    // Connect to current database setting.

    }

  function get_categories($kd_level,$kd_parent){
      $this->db->select('*');
      $this->db->from('category');
      $this->db->where('level',$kd_level);
      if($kd_parent != 'nan'){
        $this->db->where('parent',$kd_parent);
      }
      $q = $this->db->get();
      return $q;
    }
  function get_id($kd_parent,$dtb){
      $this->db->select('*');
      $this->db->from($dtb);
      $this->db->where('parent',$kd_parent);
      $q = $this->db->get();
      return $q;
    }

    function get_sub_categories($alias,$dtb){

       $q = "SELECT id  FROM $dtb WHERE `alias` = '$alias'";
       $q = $this->db->query($q)->result();


        foreach ($q as $sub_query) {

                $this->db->select('*');
                $this->db->from($dtb);
                $this->db->where('parent',$sub_query->id);
                $q = $this->db->get();
          }
      return $q;
    }

    function get_alias_categories($id){

      $cat_article = array();

       $q = "SELECT parent,alias  FROM category WHERE `id` = '$id'";
       $q = $this->db->query($q)->result();

        foreach ($q as $sub_query) {

                $this->db->select('alias');
                $this->db->from('category');
                $this->db->where('id',$sub_query->parent);
                $q = $this->db->get();
                $cat_article['alias_child'] = $sub_query->alias ;
          }

        $q = $q->result();

        foreach ($q as $sub_query) {
                $cat_article['alias'] = $sub_query->alias ;
          }
      return $cat_article;
    }

    function get_article($alias,$limit,$offset){

      $q = "SELECT id  FROM category WHERE `alias` = '$alias'";
      $q = $this->db->query($q)->result();

      $data=array();
      $id =0;

              foreach ($q as $sub_query) {
                    $id = $sub_query->id;
                    $this->db->select('*');
                    $this->db->from("article");
                    $this->db->where('mid(id_art_user_category,4,2)',$id);
                    $this->db->limit($limit, $offset);
                    $this->db->order_by('created_on','desc');
                    $data = $this->db->get();
                    // var_dump($data); die();
                }



       return $data;
    }
    function get_article_all($limit,$offset){
          $data=array();
          $this->db->select('*');
          $this->db->from("article");
          $this->db->limit($limit, $offset);
          $data = $this->db->get();
        return $data;
    }

    function get_article_by_tag($alias,$limit,$offset){


                    $this->db->select('*');
                    $this->db->from("article");
                    $this->db->where('tag =',$alias);
                    $this->db->limit($limit, $offset);
                    $data = $this->db->get();
                  // var_dump($data); die();
       return $data;
    }


     function get_article_global($alias,$limit,$offset){

      $q = "SELECT id  FROM category WHERE `alias` = '$alias'";
      $q = $this->db->query($q)->result();

      $ret  =$q;
      $data=array();

        foreach ($q as $sub_query) {

               $q = "select * from article_table where right(id_art_user_category,2) like "."'".$sub_query->id."' LIMIT ".$limit." OFFSET ".$offset;
               $ret = $q = $this->db->query($q)->result_array();

                foreach ($q as $art){

                    $data[$art['attribute']] = $art['value'];

                }
          }
        $data = array_merge($data,$data);
       return $data;
    }

    function get_advertisement (){
      
        $this->db->select('*');
        $this->db->from("advertisement");
        $data = $this->db->get()->result_array();
      // var_dump($data[0]); die();
      return $data;

    }
}
