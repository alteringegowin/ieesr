<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    protected $tpl;

    function __construct()
    {
        parent::__construct();
        $this->tpl['themes'] = base_url('bootstrap') . '/';
    }

    public function index()
    {
        $this->tpl['content'] = $this->load->view('dashboard/index', $this->tpl, true);
        $this->load->view('body', $this->tpl);
    }

}
