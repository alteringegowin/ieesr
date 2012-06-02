<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pengurangan extends CI_Controller
{

    protected $tpl;
    protected $user;
    protected $baseline;

    function __construct()
    {
        parent::__construct();
        $this->tpl['themes'] = base_url('resources') . '/';
        $this->load->library('ion_auth');
        $this->load->helper('form');
        if (!$this->ion_auth->logged_in()) {
            redirect('auth');
        }

        $this->output->enable_profiler(TRUE);

        $this->user = $this->ion_auth->user()->row();
        $this->tpl['user'] = $this->user;

        $this->db->where('user_id', $this->user->user_id);
        $this->baseline = $this->db->get('ac_commitments')->row();
    }

    function index()
    {
        $res = $this->db->get('ac_items')->result();
        foreach ($res as $r) {
            $f[$r->id] = $r;
        }
        foreach ($res as $r) {
            $fgroup[$r->group_item_id][] = $r;
        }

        $commitment = json_decode($this->baseline->commitment_values, true);
        $this->tpl['lampu'] = $commitment['penerangan'];
        $this->tpl['dapur'] = $commitment['dapur'];
        $this->tpl['rumah_tangga'] = $commitment['rumah_tangga'];
        $this->tpl['pribadi'] = $commitment['pribadi'];
        $this->tpl['elektronik'] = $commitment['elektronik'];
        $this->tpl['komunikasi'] = $commitment['komunikasi'];


        //console::log($fgroup);
        console::log($commitment['rumah_tangga']);

        $this->tpl['item'] = $f;
        $this->tpl['fgroup'] = $fgroup;

        $this->tpl['content'] = $this->load->view('pengurangan/index', $this->tpl, true);
        $this->load->view('body', $this->tpl);
    }

    function sampah()
    {

        $commitment = json_decode($this->baseline->commitment_values, true);
        $this->tpl['sampah'] = $commitment['sampah'];
        $commitment = json_decode($this->baseline->commitment_values, true);
        console::log($commitment);

        $this->tpl['content'] = $this->load->view('pengurangan/sampah', $this->tpl, true);
        $this->load->view('body', $this->tpl);
    }

    function transportasi()
    {
        $c = $this->db->get('master_vehicles')->result();
        foreach ($c as $r) {
            $x[$r->id] = $r;
        }



        $commitment = json_decode($this->baseline->commitment_values, true);
        console::log($commitment['darat']);
        console::log($commitment['udara']);
        $this->tpl['udara'] = $commitment['udara'];
        $this->tpl['darat'] = $commitment['darat'];


        $this->tpl['content'] = $this->load->view('pengurangan/transportasi', $this->tpl, true);
        $this->load->view('body', $this->tpl);
    }

    function panduan()
    {
        $this->db->where('id', 1);
        $r = $this->db->get('ac_commitments')->row();
        xdebug(json_decode($r->commitment_values));
    }

}