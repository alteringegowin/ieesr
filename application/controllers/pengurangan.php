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


        $this->user = $this->ion_auth->user()->row();
        $this->tpl['user'] = $this->user;

        $this->db->where('id', $this->user->propinsi_id);
        $mprop = $this->db->get('master_propinsi')->row();
        $this->tpl['koef_propinsi'] = $mprop->propinsi_koefisien;
        $this->tpl['pengurangan'] = true;

        $this->db->where('user_id', $this->user->user_id);
        $this->baseline = $this->db->get('ac_commitments')->row();

        $this->db->where('user_id', $this->user->user_id);
        $ada = $this->db->get('ac_commitments')->row();
        if ($ada) {
            if ($ada->commitment_created) {
                $str = ' Penghitungan Pengurangan emisi pernah anda lakukan pada tanggal ' . date('d F Y H:i', strtotime($ada->commitment_created));
                $str .= ' <br> Apakah Anda ingin menghapus data ini dan mengisikan ulang perhitungan emisi anda? ' . anchor('dashboard/delete/pengurangan', 'Hapus data ini');
                $this->session->set_flashdata('msg_danger', $str);
                redirect('dashboard');
            }
        } else {
            $str = ' Penghitungan Pengurangan baseline emisi  belum pernah anda lakukan';
            $str .= ' <br> Apakah Anda ingin mengisikan perhitungan baseline emisi anda terlebih dahulu? ' . anchor('baseline', 'Isi Baseline Emisi');
            $this->session->set_flashdata('msg_danger', $str);
            redirect('dashboard');
        }
    }

    function tex()
    {

        $res = $this->db->get('ac_items')->result();
        foreach ($res as $r) {
            $f[$r->id] = $r;
        }
        foreach ($res as $r) {
            $fgroup[$r->group_item_id][] = $r;
        }
        $commitment = json_decode($this->baseline->commitment_values, true);
        parse_str($commitment['listrik']['rumah_tangga'], $rumah_tangga);
        xdebug($commitment['darat']);
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

        parse_str($commitment['listrik']['lampu'], $lampu);
        parse_str($commitment['listrik']['dapur'], $dapur);
        parse_str($commitment['listrik']['rumah_tangga'], $rumah_tangga);
        parse_str($commitment['listrik']['pribadi'], $pribadi);
        parse_str($commitment['listrik']['elektronik'], $elektronik);
        parse_str($commitment['listrik']['komunikasi'], $komunikasi);
        $this->tpl['lampus'] = $lampu;
        $this->tpl['dapur'] = $dapur;
        $this->tpl['rumah_tangga'] = $rumah_tangga;
        $this->tpl['pribadi'] = $pribadi;
        $this->tpl['elektronik'] = $elektronik;
        $this->tpl['komunikasi'] = $komunikasi;

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

        $this->tpl['content'] = $this->load->view('pengurangan/sampah', $this->tpl, true);
        $this->load->view('body', $this->tpl);
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
        $s = $this->session->userdata;
        $pengurangan['listrik'] = $this->session->userdata('pengurangan_listrik');
        $pengurangan['sampah'] = $this->session->userdata('pengurangan_sampah');
        $pengurangan['darat'] = $this->session->userdata('pengurangan_darat');
        $pengurangan['udara'] = $this->session->userdata('pengurangan_udara');

        $this->session->unset_userdata('pengurangan_listrik');
        $this->session->unset_userdata('pengurangan_sampah');
        $this->session->unset_userdata('pengurangan_darat');
        $this->session->unset_userdata('pengurangan_udara');

        $this->db->set('commitment_shift', json_encode($pengurangan));
        $this->db->set('commitment_created', date('Y-m-d H:i:s'));
        $this->db->set('commitment_status', 1);
        $this->db->where('id', $this->baseline->id);
        $this->db->update('ac_commitments');
    }

    function check_session()
    {
        $s = $this->session->userdata;
        xdebug($s);
    }

    function total($m)
    {
        switch ($m) {
            case 'biaya':
                $post = $this->input->post(NULL, true);
                $total_all = 0;
                $ca = element('tipe', $post, array());
                foreach ($ca as $k => $v) {
                    if ($post['daya'][$k] && $post['waktu'][$k]) {
                        $total = $post['daya'][$k] * $post['waktu'][$k] * 0.65;
                        $total_all += $total;
                    }
                }
                $total_penghuni = (int) $this->user->total_penghuni ? (int) $this->user->total_penghuni : 1;

                //echo number_format($total_all / $total_penghuni, 2, '.', '');
                echo number_format($total_all, 2, '.', '');
                break;
            case 'lampu':
                $post = $this->input->post(NULL, true);
                $total_all = 0;
                $ca = element('tipe', $post, array());
                foreach ($ca as $k => $v) {
                    if ($post['daya'][$k] && $post['waktu'][$k]) {
                        $total = $post['daya'][$k] * $post['waktu'][$k] * $post['koef_propinsi'];
                        $total_all += $total;
                    }
                }
                $total_penghuni = (int) $this->user->total_penghuni ? (int) $this->user->total_penghuni : 1;

                echo number_format($total_all / $total_penghuni, 2, '.', '');
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
                $this->session->set_userdata('pengurangan_listrik', $post);
                break;
            case 'sampah':
            case 'darat':
            case 'udara':
            default:
                $post = $this->input->post(NULL, true);
                $this->session->set_userdata('pengurangan_' . $s, $post);
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

            $penumpang = $post['jenis_kendaraan'] == 'pribadi' ? (int) element('xpenumpang', $post, 1) : $row->vehicle_capacity;
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
            echo number_format($TOTAL, 2, '.', '');
        } else {
            echo 0;
        }
    }

    function hitung_jarak_darat()
    {
        $post = $this->input->post(NULL, true);
        $kendaraan_id = $post['jenis_kendaraan'] == 'pribadi' ? $post['darat-tipe-pribadi'] : $post['darat-tipe-umum'];

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

            $penumpang = $post['jenis_kendaraan'] == 'pribadi' ? (int) element('xpenumpang', $post, 1) : $row->vehicle_capacity;
            $penumpang = $penumpang ? $penumpang : 1;

            $TOTAL = ( ( ($N * 289) + ($O * 72) ) / 1000) / $penumpang;

            echo number_format($TOTAL, 2, '.', '');
        } else {
            echo 0;
        }
    }

}