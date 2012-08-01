<?php

class Komitmen extends CI_Controller
{

    protected $tpl;
    protected $user;

    function __construct()
    {
        parent::__construct();

        $this->load->library('ion_auth');
        $this->load->helper('komitmen');
        if (!$this->ion_auth->logged_in()) {
            redirect('auth');
        }
        $this->user = $this->ion_auth->user()->row();
    }

    function index()
    {

        $this->db->where('user_id', $this->user->user_id);
        $dbbaseline = $this->db->get('ac_commitments')->row();

        $baseline = json_decode($dbbaseline->commitment_values, true);
        $komitmen = json_decode($dbbaseline->commitment_shift, true);

        parse_str($komitmen['rumah'][0], $lampu);
        parse_str($komitmen['rumah'][1], $dapur);
        parse_str($komitmen['rumah'][2], $rumah_tangga);
        parse_str($komitmen['rumah'][3], $pribadi);
        parse_str($komitmen['rumah'][4], $elektronik);
        parse_str($komitmen['rumah'][5], $komunikasi);
        parse_str($komitmen['sampah'], $sampah);
        $darat = element('darat', $komitmen, FALSE);
        $udara = element('udara', $komitmen, FALSE);





        $res = $this->db->get('ac_items')->result();
        foreach ($res as $r) {
            $f[$r->id] = $r;
        }
        foreach ($res as $r) {
            $fgroup[$r->group_item_id][] = $r;
        }


        if (isset($baseline['penerangan']['item']) && $baseline['penerangan']['item']) {
            foreach ($baseline['penerangan']['item'] as $k => $v) {
                $s[] = cetak_komitmen_lampu($v, $lampu, $k);
            }
        }

        //dapur
        foreach ($fgroup[2] as $r):
            if (isset($baseline['dapur']['item-' . $r->id])):
                if ($r->id < 6):
                    $s[] = cetak_komitmen_dapur($r, $dapur);
                else:
                    $s[] = cetak_komitmen_other($r, $baseline['dapur'], $dapur);
                endif;
            endif;
        endforeach;


        foreach ($fgroup[3] as $r):
            if (isset($baseline['rumah_tangga']['item-' . $r->id])):
                $s[] = cetak_komitmen_other($r, $baseline['rumah_tangga'], $rumah_tangga);
            endif;
        endforeach;

        foreach ($fgroup[4] as $r):
            if (isset($baseline['pribadi']['item-' . $r->id])):
                $s[] = cetak_komitmen_other($r, $baseline['pribadi'], $pribadi);
            endif;
        endforeach;

        foreach ($fgroup[5] as $r):
            if (isset($baseline['elektronik']['item-' . $r->id])):
                $s[] = cetak_komitmen_other($r, $baseline['elektronik'], $elektronik);
            endif;
        endforeach;

        foreach ($fgroup[6] as $r):
            if (isset($baseline['komunikasi']['item-' . $r->id])):
                $s[] = cetak_komitmen_other($r, $baseline['komunikasi'], $komunikasi);
            endif;
        endforeach;


        $s['sampah'] = cetak_sampah($baseline['sampah'], $sampah);
        if (element('total_darat',$baseline['darat'],false)) {
            $s['darat'] = cetak_komitmen_darat($baseline['darat'], $darat);
        }
        if (element('total_udara',$baseline['udara'],false)) {
            $s['udara'] = cetak_komitmen_udara($baseline['udara'], $udara);
        }


        $this->load->library('Commitment_pdf');
        $this->commitment_pdf->AliasNbPages();

        $this->commitment_pdf->addPage();
        $this->commitment_pdf->cetak_nama();
        $this->commitment_pdf->cetak_data($s);
        $this->commitment_pdf->ln();

        $this->commitment_pdf->cetak_detail_lampu($baseline, $lampu);
        $this->commitment_pdf->cetak_detail_dapur($fgroup, 2, $baseline, $dapur);
        $this->commitment_pdf->cetak_detail_item($fgroup, 3, $baseline, $rumah_tangga);
        $this->commitment_pdf->cetak_detail_item($fgroup, 4, $baseline, $pribadi, 'pribadi');
        $this->commitment_pdf->cetak_detail_item($fgroup, 5, $baseline, $elektronik, 'elektronik');
        $this->commitment_pdf->cetak_detail_item($fgroup, 6, $baseline, $komunikasi, 'komunikasi');
        
        if(element('total_organik', $baseline['sampah'])){
            $this->commitment_pdf->cetak_detail_sampah($baseline['sampah'], $sampah);
        }
        
        if (element('darat',$s)) {
            $this->commitment_pdf->cetak_detail_darat($s['darat']);
        }
        if (element('udara',$s)) {
            $this->commitment_pdf->cetak_detail_udara($s['udara']);
        }


        $this->commitment_pdf->Output('commitment.pdf', 'I');
    }

}