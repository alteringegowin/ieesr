<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Account extends CI_Controller
{

    protected $tpl;

    function __construct()
    {
        parent::__construct();
        $this->load->library('ion_auth');
        $this->tpl['themes'] = base_url('resources') . '/';
        if (!$this->ion_auth->logged_in()) {
            redirect('auth');
        }
    }

    public function index()
    {

        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        if ($this->form_validation->run()) {
            $id = $this->session->userdata('user_id');
            $data = array(
                'username' => $this->input->post('name', true),
                'propinsi_id' => $this->input->post('propinsi_id', true)
            );
            $this->ion_auth->update($id, $data);
            $this->tpl['freeze'] = 'data telah terupdate';
        }


        $user = $this->ion_auth->user()->row();
        $this->db->order_by('id');
        $propinsi = $this->db->get('master_propinsi')->result();
        $ddPropinsi = array();
        foreach ($propinsi as $r) {
            $ddPropinsi[$r->id] = $r->propinsi_name;
        }

        $this->tpl['ddPropinsi'] = $ddPropinsi;
        $this->tpl['user'] = $user;
        $this->tpl['content'] = $this->load->view('account/index', $this->tpl, true);
        $this->load->view('body', $this->tpl);
    }

    function change_password()
    {

        $this->load->library('form_validation');
        $this->form_validation->set_rules('old', 'Old password', 'required');
        $this->form_validation->set_rules('new', 'New Password', 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[new_confirm]');
        $this->form_validation->set_rules('new_confirm', 'Confirm New Password', 'required');

        if ($this->form_validation->run()) {
            
        }

        if ($this->form_validation->run()) {

            $identity = $this->session->userdata($this->config->item('identity', 'ion_auth'));
            $change = $this->ion_auth->change_password($identity, $this->input->post('old'), $this->input->post('new'));
            if ($change) {
                $this->tpl['freeze'] = 'data telah terupdate';
            } else {
                $this->tpl['error'] = $this->ion_auth->errors();
            }
        }

        $this->tpl['content'] = $this->load->view('account/change_password', $this->tpl, true);
        $this->load->view('body', $this->tpl);
    }

}

