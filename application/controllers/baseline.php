<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Baseline extends CI_Controller
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
        $this->tpl['create_page'] = 1;

        $this->db->where('id', $this->user->propinsi_id);
        $mprop = $this->db->get('master_propinsi')->row();
        $this->tpl['koef_propinsi'] = $mprop->propinsi_koefisien;

        $this->db->where('user_id', $this->user->user_id);
        $ada = $this->db->get('ac_commitments')->row();
        if ($ada) {
            if ($ada->commitment_baseline_created) {
                $str = ' Penghitungan baseline emisi pernah anda lakukan pada tanggal ' . date('d F Y H:i', strtotime($ada->commitment_baseline_created));
                $str .= ' <br> Apakah Anda ingin menghapus data ini dan mengisikan ulang perhitungan emisi anda? ' . anchor('dashboard/delete/baseline', 'Hapus data ini');
                $this->session->set_flashdata('msg_danger', $str);
                redirect('dashboard');
            }
        }
    }

    public function index()
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
        $this->tpl['content'] = $this->load->view('baseline/index', $this->tpl, true);
        $this->load->view('body', $this->tpl);
    }

    public function sampah()
    {
        $this->tpl['content'] = $this->load->view('baseline/sampah', $this->tpl, true);
        $this->load->view('body', $this->tpl);
    }

    public function transportasi()
    {
        $this->tpl['content'] = $this->load->view('baseline/transportasi', $this->tpl, true);
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
        $this->load->view('baseline/step-' . $step_number, $this->tpl);
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
                        $d['total'] = $post['total-lampu-' . $i];
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
        $s['listrik'] = $this->session->userdata('listrik');
        $s['sampah'] = $this->session->userdata('sampah');
        $s['darat'] = $this->session->userdata('darat');
        $s['udara'] = $this->session->userdata('udara');

        $this->db->set('user_id', $this->session->userdata('user_id'));
        $this->db->set('commitment_values', json_encode($s));
        $this->db->set('commitment_baseline_created', date('Y-m-d H:i:s'));
        $this->db->insert('ac_commitments');


        $this->session->unset_userdata('listrik');
        $this->session->unset_userdata('sampah');
        $this->session->unset_userdata('darat');
        $this->session->unset_userdata('udara');
        $s = $this->session->userdata;
        redirect('pengurangan');
    }

    function confirm()
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

        foreach ($s as $k => $v) {
            $this->tpl[$k] = $v;
        }
        $this->tpl['content'] = $this->load->view('baseline/confirm', $this->tpl, true);
        $this->load->view('body', $this->tpl);
    }

    function check_session()
    {
        $s = $this->session->userdata;
        xdebug($s);
    }

    function reset_session()
    {
        $this->session->unset_userdata('listrik');
        $this->session->unset_userdata('sampah');
        $this->session->unset_userdata('darat');
        $this->session->unset_userdata('udara');
        $s = $this->session->userdata;
    }

    function pop($m)
    {
        $this->load->view('baseline/pop/' . $m, $this->tpl);
    }

    function already_submit()
    {

        $this->tpl['create_page'] = 0;
        $this->tpl['already_submit'] = 1;
        $this->tpl['content'] = $this->load->view('baseline/already_submit', $this->tpl, true);
        $this->load->view('body', $this->tpl);
    }

    function total($m)
    {
        switch ($m) {
            case 'lampu':
                $post = $this->input->post(NULL, true);
                $total_all = 0;
                foreach (element('tipe', $post) as $k => $v) {
                    if ($post['daya'][$k] && $post['waktu'][$k]) {
                        $total = $post['daya'][$k] * $post['waktu'][$k] * $post['koef_propinsi'];
                        $total_all += $total;
                    }
                }
                $total_penghuni = (int) $this->user->total_penghuni ? (int) $this->user->total_penghuni : 1;
                echo $total_all / $total_penghuni;
                break;

            default:
                break;
        }
    }

    function finish($s)
    {
        switch ($s) {
            case 'listrik':
                $post = $this->input->post(NULL, true);
                $post['lampu'] = str_replace(';', '', $post['lampu']);
                parse_str($post['lampu'], $lampu);
                $this->session->set_userdata('listrik', $post);
                break;
            case 'sampah':
            case 'darat':
            case 'udara':
            default:
                $post = $this->input->post(NULL, true);
                $this->session->set_userdata($s, $post);
                break;
        }
    }

    function hitung_konsumsi_darat()
    {
        $post = $this->input->post(NULL, true);
        $kendaraan_id = $post['jenis_kendaraan'] == 'pribadi' ? $post['darat-tipe-pribadi'] : $post['darat-tipe-umum'];
        $this->db->where('id', $kendaraan_id);
        $row = $this->db->get('master_vehicles')->row();
        if ($row) {
            $H3 = $post['konsumsi'];
            $D = $row->n2o_cold;
            $E = $row->n2o_hot;
            $H = $row->ch4_cold;
            $I = $row->ch4_hot;
            $L = $row->fuel_economy;
            $penumpang = (int) element('xpenumpang', $post, 1);
            $penumpang = $penumpang ? $penumpang : 1;


            $M = 4500;
            $N = $H3 / $M;

            $O = $N / $L;
            $Q = ($O * ($H + $I));
            $P = ($O * ($D + $E));
            $R = $P * 289;
            $S = $Q * 72;
            $T = $R + $S;
            $TOTAL = ( $T / 1000) / $penumpang;
            echo $TOTAL;
        } else {
            echo 0;
        }
    }

    function hitung_jarak_darat()
    {
        $post = $this->input->post(NULL, true);
        $kendaraan_id = $post['jenis_kendaraan'] == 'pribadi' ? $post['darat-tipe-pribadi'] : $post['darat-tipe-umum'];

        if ($kendaraan_id == 'sepeda') {
            echo 0;
        } else {
            $this->db->where('id', $kendaraan_id);
            $row = $this->db->get('master_vehicles')->row();
            $input = $post['jarak_tempuh'];
            if ($row) {
                $H = $row->ch4_cold;
                $I = $row->ch4_hot;
                $D = $row->n2o_cold;
                $E = $row->n2o_hot;
                $N = $input * ($D + $E);
                $O = $input * ($H + $I);
                $penumpang = (int) element('xpenumpang', $post, 1);
                $penumpang = $penumpang ? $penumpang : 1;
                $TOTAL = ( ( ($N * 289) + ($O * 72) ) / 1000) / $penumpang;


                echo $TOTAL;
            } else {
                echo 0;
            }
        }
    }

    function hitung_pesawat()
    {
        $transit = $this->input->post('penumpang', 0);
        $jenis = $this->input->post('jenis', 1);
        $this->db->where('id', $jenis);
        $row = $this->db->get('master_pesawat')->row();
        if ($row) {
            $A = $row->co2; //db
            $B = $row->ch4; //db
            $C = $row->n2o; //db
            $D = $row->lto; //db
            $E = $row->passanger; //db

            $I = 69300;
            $F = $A + ($B * 72) + ($C * 289);
            $G = ($transit + 1) * $F;

            $H = 10 * $D;
            $J = ($H - $D) * $transit * $I * 0.000043;
            $K = $G + $J;
            $L = ($K / $E) * 1000;
            echo $L;
        } else {
            echo 0;
        }
    }

    function hitung_pesawat_old()
    {
        $INPUT = $this->input->post('penumpang', 1);
        $jenis = $this->input->post('jenis', 1);
        $this->db->where('id', $jenis);
        $row = $this->db->get('master_pesawat')->row();
        if ($row) {
            $S = $row->passanger; //db
            $H = $row->lto; //db
            $E = $row->co2; //db
            $F = $row->ch4; //db
            $G = $row->n2o; //db

            $P = 70000;
            $D = $INPUT;
            $I = $E / ($D + 1);
            $J = $F / ($D + 1); //
            $K = $G / ($D + 1);
            $L = $I + ($J * 72) + ($K * 289);
            $M = ($D + 1) * $L;
            $N = 100 / 10 * $H;
            $Q = $D * (($N - $H) * 0.000043 * $P);
            $R = $Q + $M;
            $T = $R / $S;
            $total = $T * 1000;
            echo $total;
        } else {
            
        }
    }

}