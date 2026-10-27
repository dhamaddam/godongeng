<?php
class FeedModel_art extends CI_Model
{

    function __constuct()
    {
        parent::__constuct();  // Call the Model constructor
        loader::database();    // Connect to current database setting.

    }


    function getFeedArticles()
    {
        $this->db->select('*');
        $this->db->from("article");
        $data = $this->db->get()->result();
        return $data;
    }
}
