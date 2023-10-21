<?php


class User extends CI_Controller
{

    public function index()
    {
        $this->load->model('User_model');
        $users = $this->User_model->all();
        $data = array();
        $data['users'] = $users;
        $this->load->view('list', $data);
    }

    public function create()
    {
        //$this->load->helper('html');
        
        $this->load->library('form_validation');
        $this->load->model('User_model');

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'password', 'required|min_length[8]');
        $this->form_validation->set_rules('cpassword', 'Confirm Password', 'required|matches[password]');
        $this->form_validation->set_rules('city', 'City', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('create');
        } else {

            // Save record to database

            $formArray = array();
            $formArray['Name'] = $this->input->post('name');
            $formArray['Email'] = $this->input->post('email');
            $formArray['password'] = md5($this->input->post('password'));
            $formArray['user_type'] = $this->input->post('usertype');
            $formArray['City'] = $this->input->post('city');
            $this->User_model->create($formArray);
            $this->session->set_flashdata('success', 'Record added successfully');
            redirect(base_url() . 'user/index');
        }
    }
    public function edit($userid)
    {
        // $current_datetime = now();
        // $data['current_datetime'] = $current_datetime;
        // // $this->load->view('create', $data);
        // $this->load->helper('date');

        $this->load->model('User_model');
        $user = $this->User_model->getUser($userid);
        $data = array();
        $data['user'] = $user;

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('city', 'City', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('edit', $data);
        } else {

            $formArray['Name'] = $this->input->post('name');
            $formArray['Email'] = $this->input->post('email');
            $formArray['City'] = $this->input->post('city');
            $this->User_model->updateuser($userid, $formArray);
            $this->session->set_flashdata('success', 'Record update successfully');
            redirect(base_url() . 'user/index');
        }
    }

    public function delete($userid)
    {
        $this->load->model('User_model');
        $user = $this->User_model->getUser($userid);

        if (empty($user)) {
            $this->session->set_flashdata('failure', 'Record not found in the database');
        } else {
            $this->User_model->deleteUser($userid);
            $this->session->set_flashdata('success', 'Record deleted successfully');
        }

        redirect(base_url() . 'user/index');
    }

   
}
