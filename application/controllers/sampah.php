<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Sampah extends CI_Controller
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
        }
        $this->user = $this->ion_auth->user()->row();
        $this->tpl['user'] = $this->user;
    }

    public function index()
    {
        $this->tpl['content'] = $this->load->view('sampah/index', $this->tpl, true);
        $this->load->view('body', $this->tpl);
    }

}