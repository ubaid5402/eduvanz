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
            $data['participants'] = $users;
            $data['code'] = 200;
            $data['errors'] = NULL;
        }else{
            $data['participants'] = NULL;
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

            if ($this->form_validation->run() == FALSE){
            $errors = array(
                'p_fname' => form_error('p_fname'),
                'p_lname' => form_error('p_lname'),
                'p_age' => form_error('p_age'),
                'p_dob' => form_error('p_dob'),
                'p_profession' => form_error('p_profession'),
                'p_no_of_guest' => form_error('p_no_of_guest'),
                'p_address' => form_error('p_address')
            );

            $data['errors'] = $errors;
            $data['participants'] = NULL;
            $data['code'] = 404;
            }else{

            $data['participants'] = NULL;
            $data['code'] = 500;
            $data['errors'] = "Post array required";

            } 
        }else{
            $data['participants'] = NULL;
            $data['code'] = 500;
            $data['errors'] = "Post array required";
        }

        $this->response($data);
         
    }
}