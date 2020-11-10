<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Participant_model extends CI_Model
{

	public function get_participant_all()
	{
	$this->db->select('*');
    $this->db->from('participants');
    $query = $this->db->get();
    return $query->result();
	}
}