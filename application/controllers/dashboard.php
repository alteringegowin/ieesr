<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    protected $tpl;
    protected $user;

    function __construct()
    {
        parent::__construct();
        $this->tpl['themes'] = base_url('resources') . '/';
        $this->load->library('ion_auth');
        if (!$this->ion_auth->logged_in()) {
            redirect('auth');
        } else {
            $this->user = $this->ion_auth->user()->row();
            $this->tpl['user'] = $this->user;
        }
    }

    public function index()
    {
        $this->tpl['content'] = $this->load->view('dashboard/index', $this->tpl, true);
        $this->load->view('body', $this->tpl);
    }

    public function profile($s='')
    {
        if ($s) {
            $this->tpl['content'] = $this->load->view('dashboard/profile_edit', $this->tpl, true);
            $this->load->view('body', $this->tpl);
        } else {
            $this->tpl['content'] = $this->load->view('dashboard/profile', $this->tpl, true);
            $this->load->view('body', $this->tpl);
        }
    }

    public function change_password()
    {

        $this->tpl['content'] = $this->load->view('dashboard/index', $this->tpl, true);
        $this->load->view('body', $this->tpl);
    }

}
