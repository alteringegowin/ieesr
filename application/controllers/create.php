<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Create extends CI_Controller
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
        $this->tpl['content'] = $this->load->view('create/index', $this->tpl, true);
        $this->load->view('body', $this->tpl);
    }

    public function step()
    {
        $res = $this->db->get('ac_items')->result();
        foreach ($res as $r) {
            $f[$r->id] = $r;
        }
        foreach ($res as $r) {
            $fgroup[$r->group_item_id][] = $r;
        }
        $this->tpl['item'] = $f;
        $this->tpl['fgroup'] = $fgroup;
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
                xdebug($this->session->userdata('sampah'));
                break;
            case 'darat':
                $post = $this->input->post(NULL, true);
                $this->session->set_userdata('darat', $post);
                break;

            default:
            case 'udara':
                $post = $this->input->post(NULL, true);
                $this->session->set_userdata('udara', $post);
                xdebug($this->session->userdata('udara'));
                break;
        }
    }

    function save_to_db()
    {
        $s['penerangan'] = $this->session->userdata('penerangan');
        $s['dapur'] = $this->session->userdata('dapur');
        $s['rumah_tangga'] = $this->session->userdata('rumah_tangga');
        $s['pribadi'] = $this->session->userdata('pribadi');
        $s['elektronik'] = $this->session->userdata('elektronik');
        $s['komunikasi'] = $this->session->userdata('komunikasi');
        $s['sampah'] = $this->session->userdata('sampah');
        $s['darat'] = $this->session->userdata('darat');
        $s['udara'] = $this->session->userdata('udara');


        $this->db->set('user_id', $this->session->userdata('user_id'));
        $this->db->set('commitment_values', json_encode($s));
        $this->db->set('commitment_created', date('Y-m-d H:i:s'));
        $this->db->insert('ac_commitments');
    }

    function check_session()
    {
        $s = $this->session->userdata;
        xdebug($s);
    }

    function reset_session()
    {
        $this->session->unset_userdata('penerangan');
        $this->session->unset_userdata('dapur');
        $this->session->unset_userdata('rumah_tangga');
        $this->session->unset_userdata('pribadi');
        $this->session->unset_userdata('elektronik');
        $this->session->unset_userdata('komunikasi');
        $this->session->unset_userdata('sampah');
        $this->session->unset_userdata('darat');
        $this->session->unset_userdata('udara');
        $s = $this->session->userdata;
        xdebug($s);
    }

}