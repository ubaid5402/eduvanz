<?php
use chriskacerguis\RestServer\RestController;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/RestController.php';
require APPPATH . 'libraries/Format.php';
 
class Api extends RestController
{
    public function __construct() {
        parent::__construct();
        $this->load->model('participant_model');
        $this->load->library("pagination");
    }
     
    function participants_get()
    {
        $users = $this->participant_model->get_participant_all();
         
        if(!empty($users))
        {
            $data['data'] = $users;
            $data['code'] = 200;
            $data['errors'] = NULL;
        }else{
            $data['data'] = NULL;
            $data['code'] = 404;
            $data['errors'] = "Participants not registered yet.";
        }

        $this->response($data);
    }
     
    function participants_post()
    {
        if($this->post()){

            $this->form_validation->set_rules('p_fname', 'First Name', 'required');
            $this->form_validation->set_rules('p_lname', 'Last Name', 'required');
            $this->form_validation->set_rules('p_age', 'Age', 'required|numeric');
            $this->form_validation->set_rules('p_dob', 'Date of birth', 'required');
            $this->form_validation->set_rules('p_profession', 'Profession', 'required');
            $this->form_validation->set_rules('p_no_of_guest', 'Number of Guest', 'required|numeric');
            $this->form_validation->set_rules('p_address', 'Address', 'required');
            $this->form_validation->set_rules('p_locality', 'Locality', 'required');

            if ($this->form_validation->run() == FALSE){
            $errors = array(
                'p_fname' => form_error('p_fname'),
                'p_lname' => form_error('p_lname'),
                'p_age' => form_error('p_age'),
                'p_dob' => form_error('p_dob'),
                'p_profession' => form_error('p_profession'),
                'p_no_of_guest' => form_error('p_no_of_guest'),
                'p_locality' => form_error('p_locality'),
                'p_address' => form_error('p_address')
            );

            $data['errors'] = $errors;
            $data['participants'] = NULL;
            $data['code'] = 404;
            }else{

            $arr = array(
                'p_fname' => $this->post('p_fname'),
                'p_lname' => $this->post('p_lname'),
                'p_age' => $this->post('p_age'),
                'p_dob' => date('Y-m-d',strtotime($this->post('p_dob'))),
                'p_profession' => $this->post('p_profession'),
                'p_no_of_guest' => $this->post('p_no_of_guest'),
                'p_locality' => $this->post('p_locality'),
                'p_address' => $this->post('p_address')
            );  

            $this->db->insert('participants',$arr);

            $data['data'] = $this->db->insert_id();
            $data['code'] = 200;
            $data['errors'] = NULL;  

            } 
        }else{
            $data['data'] = NULL;
            $data['code'] = 500;
            $data['errors'] = "Post array required";
        }

        $this->response($data);
         
    }

    public function participants_put($id){
        if($id){
        $arr = array(
            'p_fname' => $this->put('p_fname'),
            'p_lname' => $this->put('p_lname'),
            'p_age' => $this->put('p_age'),
            'p_dob' => date('Y-m-d',strtotime($this->put('p_dob'))),
            'p_profession' => $this->put('p_profession'),
            'p_no_of_guest' => $this->put('p_no_of_guest'),
            'p_locality' => $this->put('p_locality'),
            'p_address' => $this->put('p_address')
        );

        $this->participant_model->update($id,$arr);
        
        $data['data'] = $this->participant_model->get_participant_id($id);
        $data['code'] = 200;
        $data['errors'] = NULL;

        }else{

        $data['data'] = NULL;
        $data['code'] = 404;
        $data['errors'] = "Id is required";

        }
        $this->response($data);
    }
}