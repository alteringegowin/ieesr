<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Create extends CI_Controller
{

    protected $tpl;

    function __construct()
    {
        parent::__construct();
        $this->tpl['themes'] = base_url('resources') . '/';
    }

    public function index()
    {
        $this->tpl['content'] = $this->load->view('create/index', $this->tpl, true);
        $this->load->view('body', $this->tpl);
    }

    public function sampah()
    {
        $this->tpl['content'] = $this->load->view('create/sampah', $this->tpl, true);
        $this->load->view('body', $this->tpl);
    }

    public function step()
    {
        $step_number = $this->input->post('step_number', true);
        $this->load->view('create/step-' . $step_number, $this->tpl);
    }

    function submit($step)
    {
        switch ($step) {
            case 1:
                $post = $this->input->post(NULL, true);
                $all = array();
                for ($i = 0; $i < 10; $i++) {
                    if ($post['items-' . $i . '-daya'] && $post['items-' . $i . '-waktu']) {
                        $d = array();
                        $d['tipe'] = $post['items-' . $i . '-tipe'];
                        $d['daya'] = $post['items-' . $i . '-daya'];
                        $d['waktu'] = $post['items-' . $i . '-waktu'];
                        $all[] = $d;
                    }
                }
                $session['item'] = $all;
                $session['total'] = $post['total'];
                $this->session->set_userdata('penerangan', $session);
                break;

            case 2:
                $post = $this->input->post(NULL, true);
                $this->session->set_userdata('dapur', $post);
                xdebug($post);
                break;

            case 3:
                $post = $this->input->post(NULL, true);
                $this->session->set_userdata('rumah_tangga', $post);
                xdebug($post);
                break;

            case 4:
                $post = $this->input->post(NULL, true);
                $this->session->set_userdata('pribadi', $post);
                xdebug($post);
                break;

            case 5:
                $post = $this->input->post(NULL, true);
                $this->session->set_userdata('elektronik', $post);
                xdebug($post);
                break;

            case 6:
                $post = $this->input->post(NULL, true);
                $this->session->set_userdata('komunikasi', $post);
                xdebug($post);
                break;
            
            
            case 'sampah':
                $post = $this->input->post(NULL, true);
                $this->session->set_userdata('sampah', $post);
                xdebug($post);
                break;

            default:
                break;
        }
    }

    function check_session()
    {
        $s = $this->session->userdata;
        xdebug($s);
    }

    function reset_session()
    {
        $s = $this->session->unset_userdata('komunikasi');
        $s = $this->session->unset_userdata('elektronik');
        xdebug($s);
    }

}