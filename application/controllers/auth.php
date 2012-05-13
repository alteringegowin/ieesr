<?php
if ( !defined('BASEPATH') )
    exit('No direct script access allowed');

class Auth extends CI_Controller
{

    protected $tpl;

    function __construct()
    {
        parent::__construct();
        $this->tpl['themes'] = base_url('bootstrap') . '/';
    }

    public function index()
    {
        $this->tpl['is_login_page'] = true;
        $this->tpl['content'] = $this->load->view('auth/index', $this->tpl, true);
        $this->load->view('body', $this->tpl);
    }

    public function register()
    {
        $this->tpl['is_login_page'] = true;
        $this->tpl['content'] = $this->load->view('auth/register', $this->tpl, true);
        $this->load->view('body', $this->tpl);
    }

    function forgot_password()
    {

        $this->tpl['is_login_page'] = true;
        $this->tpl['content'] = $this->load->view('auth/forgot_password', $this->tpl, true);
        $this->load->view('body', $this->tpl);
    }

    function help()
    {

        $this->tpl['is_login_page'] = true;
        $this->tpl['content'] = $this->load->view('auth/help', $this->tpl, true);
        $this->load->view('body', $this->tpl);
    }

}
