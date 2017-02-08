<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Treeview_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    function get_userlist()
    {
        $this->db->select('userID, userName');
        $this->db->order_by('userID', 'asc');
        $this->db->from('user');
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return $query->result();
        } else {
            return false;
        }
    }

    function get_downline($id)
    {
        $this->db->select('upline.username as headname,downline_level1.username as level1_name,downline_level2.username as level2_name,downline_level3.username as level3_name');
        $this->db->where('upline.userID', $id);
        $this->db->from('user upline');
        $this->db->join('user downline_level1',
            'downline_level1.parentID = upline.userID', 'left');
        $this->db->join('user downline_level2',
            'downline_level2.parentID = downline_level1.userID', 'left');
        $this->db->join('user downline_level3',
            'downline_level3.parentID = downline_level2.userID', 'left');
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return $query->result();
        } else {
            return false;
        }
    }
}
/* End of file Treeview_model.php */
/* Location: ./application/models/Treeview_model.php */