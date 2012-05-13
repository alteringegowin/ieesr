<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Account extends CI_Controller
{

    protected $tpl;

    function __construct()
    {
        parent::__construct();
        $this->tpl['themes'] = base_url('bootstrap') . '/';
    }

    public function index()
    {
        $this->tpl['content'] = $this->load->view('account/index', $this->tpl, true);
        $this->load->view('body', $this->tpl);
    }

    function change_password()
    {

        $this->tpl['content'] = $this->load->view('account/change_password', $this->tpl, true);
        $this->load->view('body', $this->tpl);
    }

}
