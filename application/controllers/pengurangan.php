<?php
if ( !defined('BASEPATH') )
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
        if ( !$this->ion_auth->logged_in() ) {
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

    function submit($s)
    {
        switch ($s) {
            case 'sampah':
                $this->session->set_userdata('pengurangan_sampah', $this->input->post('sampah', true));
                break;
            case 'udara':
                $this->session->set_userdata('pengurangan_udara', $this->input->post(NULL, true));
                break;
            case 'darat':
                $this->session->set_userdata('pengurangan_darat', $this->input->post(NULL, true));
                break;
            default:
                $c = array();
                for ($i = 1; $i < 7; $i++) {
                    $c[] = $this->input->post('f' . $i, true);
                }
                $this->session->set_userdata('pengurangan_rumah', $c);
                break;
        }
    }

    function confirm()
    {
        $res = $this->db->get('ac_items')->result();
        foreach ($res as $r) {
            $f[$r->id] = $r;
        }
        foreach ($res as $r) {
            $fgroup[$r->group_item_id][] = $r;
        }



        $commitment = json_decode($this->baseline->commitment_values, true);
        $pengurangan['rumah'] = $this->session->userdata('pengurangan_rumah');
        $pengurangan['sampah'] = $this->session->userdata('pengurangan_sampah');
        $pengurangan['darat'] = $this->session->userdata('pengurangan_darat');
        $pengurangan['udara'] = $this->session->userdata('pengurangan_udara');

        parse_str($pengurangan['rumah'][0], $lampu);
        parse_str($pengurangan['rumah'][1], $dapur);
        parse_str($pengurangan['rumah'][2], $rumah_tangga);
        parse_str($pengurangan['rumah'][3], $pribadi);
        parse_str($pengurangan['rumah'][4], $elektronik);
        parse_str($pengurangan['rumah'][5], $komunikasi);
        parse_str($pengurangan['sampah'], $sampah);

        Console::log($commitment);
        Console::log($rumah_tangga);




        $this->tpl['lampu'] = $lampu;
        $this->tpl['dapur'] = $dapur;
        $this->tpl['rumah_tangga'] = $rumah_tangga;
        $this->tpl['pribadi'] = $pribadi;
        $this->tpl['elektronik'] = $elektronik;
        $this->tpl['komunikasi'] = $komunikasi;
        $this->tpl['sampah'] = $sampah;
        $this->tpl['darat'] = element('darat', $pengurangan);
        $this->tpl['udara'] = element('udara', $pengurangan);

        $this->tpl['baseline_dapur'] = $commitment['dapur'];
        $this->tpl['baseline_rumah_tangga'] = $commitment['rumah_tangga'];
        $this->tpl['baseline_pribadi'] = $commitment['pribadi'];
        $this->tpl['baseline_elektronik'] = $commitment['elektronik'];
        $this->tpl['baseline_komunikasi'] = $commitment['komunikasi'];
        $this->tpl['baseline_sampah'] = $commitment['sampah'];
        $this->tpl['baseline_darat'] = element('darat', $commitment);
        $this->tpl['baseline_udara'] = element('udara', $commitment);
        $this->tpl['commitment'] = $commitment;

        $this->tpl['item'] = $f;
        $this->tpl['fgroup'] = $fgroup;
        $this->tpl['content'] = $this->load->view('pengurangan/confirm', $this->tpl, true);
        $this->load->view('body', $this->tpl);
    }

    function save_to_db()
    {

        $pengurangan['rumah'] = $this->session->userdata('pengurangan_rumah');
        $pengurangan['sampah'] = $this->session->userdata('pengurangan_sampah');
        $pengurangan['darat'] = $this->session->userdata('pengurangan_darat');
        $pengurangan['udara'] = $this->session->userdata('pengurangan_udara');

        $this->db->set('commitment_shift', json_encode($pengurangan));
        $this->db->where('id', $this->baseline->id);
        $this->db->update('ac_commitments');
        
        redirect('create');
    }

    function check_session()
    {
        $s = $this->session->userdata;
        xdebug($s);
    }

}