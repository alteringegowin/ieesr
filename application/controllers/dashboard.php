<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    protected $tpl;

    function __construct()
    {
        parent::__construct();
        $this->tpl['themes'] = base_url('resources') . '/';
        $this->load->library('ion_auth');
        if (!$this->ion_auth->logged_in()) {
            redirect('auth');
        }
    }

    public function index()
    {
        xdebug($this->session->userdata);
        $this->tpl['content'] = $this->load->view('dashboard/index', $this->tpl, true);
        $this->load->view('body', $this->tpl);
    }

}
