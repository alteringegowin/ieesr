<?php

class Popup extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->tpl['themes'] = base_url('resources') . '/';
    }

    function _remap($s)
    {
        $this->load->view('popup/' . $s, $this->tpl);
    }

}