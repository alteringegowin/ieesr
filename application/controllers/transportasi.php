<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Transportasi extends CI_Controller
{

    protected $tpl;

    function __construct()
    {
        parent::__construct();
        $this->tpl['themes'] = base_url('resources') . '/';
    }

    public function index()
    {
        $this->tpl['content'] = $this->load->view('transportasi/index', $this->tpl, true);
        $this->load->view('body', $this->tpl);
    }

    public function step()
    {
        $step_number = $this->input->post('step_number', true);
        $this->load->view('transportasi/step-' . $step_number, $this->tpl);
    }

    function submit($c)
    {
        switch ($c) {
            default:
            case 'jarak-dekat':
                $post = $this->input->post(NULL, true);
                $this->session->set_userdata('jarak-dekat', $post);
                break;

            case 'jarak-jauh':
                $post = $this->input->post(NULL, true);
                $this->session->set_userdata('jarak-jauh', $post);
                break;
        }
    }

    function hitung_jarak_darat()
    {
        $id = $this->input->post('id', true);
        $input = $this->input->post('f', true);

        $this->db->where('id', $id);
        $row = $this->db->get('master_vehicles')->row();

        if ($row) {
            $H = $row->ch4_cold;
            $I = $row->ch4_hot;
            $D = $row->n2o_cold;
            $E = $row->n2o_hot;
            $N = $input * ($D + $E);
            $O = $input * ($H + $I);

            $TOTAL = ( ( ($N * 289) + ($O * 72) ) / 1000) / $row->vehicle_capacity;


            echo $TOTAL;
        } else {
            echo 0;
        }
    }

    function hitung_konsumsi_darat()
    {
        $id = $this->input->post('id', true);
        $input = $this->input->post('f', true);

        $this->db->where('id', $id);
        $row = $this->db->get('master_vehicles')->row();
        if ($row) {
            $H3 = $input;
            $D = $row->n2o_cold;
            $E = $row->n2o_hot;
            $H = $row->ch4_cold;
            $I = $row->ch4_hot;
            $L = $row->fuel_economy;

            $N = $H3 / $M;

            $M = 4500;
            $O = $N / $L;
            $Q = ($O * ($H + $I));
            $P = ($O * ($D + $E));
            $R = $P * 289;
            $S = $Q * 72;
            $T = $R + $S;
            $TOTAL = ( $T / 1000) / $row->vehicle_capacity;
            echo $TOTAL;
        } else {
            echo 0;
        }
    }

    function hitung_pesawat()
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

    /*
     * 
      $S = $row->passanger; //db
      $H = $row->lto; //db
      $E = $row->co2; //db
      $F = $row->ch4; //db
      $G = $row->n2o; //db

      $P = 70000;
      $D = $INPUT;
      $I = $E / ($D + 1);
      $J = $F / ($D + 1); //CH4
      $K = $G / ($D + 1);
      $L = $I + ($J * 72) + ($K * 289);
      $M = ($D + 1) * $L;
      $N = 100 / 10 * $H;
      $Q = $D*(($N - $H) * 0.0000443 * $P);
      $R = $Q + $M;
      $T = $R / $S;
      $total = $T * 1000;
     */
}