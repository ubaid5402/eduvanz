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

	public function update($id,$arr)
	{
    $this->db->where('p_id',$id);
    $this->db->update('participants',$arr);
    return true;
	}

	public function get_participant_id($id)
	{
	$this->db->select('*');
    $this->db->from('participants');
    $this->db->where('p_id',$id);
    $query = $this->db->get();
    return $query->row();
	}
}