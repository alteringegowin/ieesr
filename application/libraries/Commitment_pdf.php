<?php
require_once APPPATH . 'third_party/fpdf/mc_table.php';

class Commitment_pdf extends PDF_MC_Table
{

    protected $width;
    protected $height;
    protected $dbdata;

    function __construct()
    {
        $this->FPDF('P', 'mm', 'A4');

        $this->width = 2;
        $this->height = 5;
    }

    function loadData($data)
    {
        $this->dbdata = $data;
    }

    function guide()
    {

        for ($i = 0; $i < 12; $i++) {
            $this->cell($this->width, $this->height, $i + 1, 1, 0);
        }
        //$this->ln();
    }

    function cetak_nama()
    {
        $this->SetFont('Times', 'B', 12);
        $this->cell(0, $this->height * 3, 'NAMA', 1, 1);
    }

    function cetak_data($s)
    {
        $this->SetFont('Times', '', 10);
        $no = 1;

        $this->SetWidths(array(15, 175));

        foreach ($s as $r) {
            if ( is_array($r) ) {
                
            } elseif ( $r ) {
                $this->Row(array($no++, $r));
            } else {
                
            }
        }
    }

    function cetak_detail_lampu($baseline, $lampu)
    {
        $this->SetFont('Times', 'B', 10);
        $this->cell(0, $this->height, 'Emisi Lampu', 0, 1);
        $this->SetFont('Times', '', 10);

        $this->SetWidths(array(61.5, 101));
        $this->Row(array('Baseline', 'Komitmen'));

        $this->SetWidths(array(25, 15, 21.5, 45, 15, 21, 20));
        $this->Row(array('Jenis Lampu', 'Daya ', 'Pemakaian ', 'Jenis Lampu', 'Daya', 'Pemakaian ', 'Mengurangi'));

        //$this->cell(0, $this->height, 'AV');
        //$this->SetFont('Times', '', 10);


        if ( isset($baseline['penerangan']['item']) && $baseline['penerangan']['item'] ) {
            foreach ($baseline['penerangan']['item'] as $k => $v) {

                $klampu = element('tipelampu-' . $k, $lampu);
                $kdaya = element('daya-' . $k, $lampu);
                $kwaktu = element('waktu-' . $k, $lampu);
                $ktotal = element('total-lampu-' . $k, $lampu, 0);
                $elampu = $v['tipe'];
                $edaya = $v['daya'];
                $ewaktu = $v['waktu'];
                $etotal = $v['total'];

                if ( $klampu ) {
                    $this->SetWidths(array(25, 15, 21.5, 45, 15, 21, 20));
                    $this->Row(array($elampu, $edaya . ' w', $ewaktu . ' jam', $klampu, $kdaya . ' w', $kwaktu . ' ', number_format(abs($etotal - $ktotal), 2)));
                } else {
                    $this->SetWidths(array(25, 15, 21.5, 45, 15, 21, 20));
                    $this->Row(array($elampu, $edaya, $ewaktu, '-', '-', '-', 0));
                }
            }
        }
        $this->ln();
    }

    function cetak_detail_dapur($fgroup, $id, $baseline, $dapur)
    {
        //dapur
        $this->SetFont('Times', 'B', 10);
        $this->cell(0, $this->height, 'Emisi Dapur', 0, 1);
        $this->SetFont('Times', '', 10);

        $this->SetWidths(array(100, 21.5, 20, 21));
        $this->Row(array('Nama Barang', 'Baseline', 'Komitmen', 'Mengurangi'));
        foreach ($fgroup[2] as $r):
            if ( isset($baseline['dapur']['item-' . $r->id]) ):
                if ( $r->id < 6 ):
                    if ( isset($baseline['dapur']['t-item-' . $r->id]) && $baseline['dapur']['t-item-' . $r->id] ) :
                        $this->SetWidths(array(100, 21.5, 20, 21));
                        if ( isset($dapur['jam-' . $r->id]) ):
                            $this->Row(array($r->item_name, 'Ya', 'Tidak', $baseline['dapur']['t-item-' . $r->id]));
                        else:
                            $this->Row(array($r->item_name, 'Ya', 'Ya', 0));
                        endif;
                    endif;
                else:

                    $dari = element('item-' . $r->id, $baseline['dapur']);
                    $jadi = element('jam-' . $r->id, $dapur);
                    $this->SetWidths(array(100, 21.5, 20, 21));
                    $this->Row(array($r->item_name, $dari . ' jam', $jadi . ' jam', 'Mengurangi'));
                endif;
            endif;
        endforeach;
        $this->ln();
    }

    function cetak_detail_item($fgroup, $id, $baseline, $komit, $le='rumah_tangga')
    {
        //dapur
        $this->SetFont('Times', 'B', 10);
        $this->cell(0, $this->height, 'Emisi ' . $le, 0, 1);
        $this->SetFont('Times', '', 10);

        foreach ($fgroup[$id] as $r):
            if ( isset($baseline[$le]['item-' . $r->id]) ):
                $dari = element('item-' . $r->id, $baseline[$le]);
                $jadi = element('jam-' . $r->id, $komit, $dari);
                $this->SetWidths(array(100, 21.5, 20, 21));
                if ( $dari ) {
                    $x = $komit['total_' . $le . '_asli'] - $komit['total_' . $le . '_asli'];
                    $this->Row(array($r->item_name, $dari . ' jam', $jadi . ' jam', abs($x)));
                }
            endif;
        endforeach;
        $this->ln();
    }

    function cetak_detail_sampah($baseline_sampah, $sampah)
    {
        //dapur
        $this->SetFont('Times', 'B', 10);
        $this->cell(0, $this->height, 'Emisi Sampah', 0, 1);
        $this->SetFont('Times', '', 10);

        $this->SetWidths(array(100, 21.5, 20, 21));
        $this->Row(array('Sampah Organik', element('item-25', $baseline_sampah, 0) . ' gr', element('item-25', $sampah, 0) . ' gr', abs($sampah['total_organik_asli'] - $sampah['total_organik'])));
        $this->Row(array('Sampah Kertas', element('item-26', $baseline_sampah, 0) . ' lembar', element('item-25', $sampah, 0) . ' lembar', abs($sampah['total_kertas_asli'] - $sampah['total_kertas'])));
        $this->Row(array('Sampah Plastik', element('item-27', $baseline_sampah, 0) . ' botol', element('item-25', $sampah, 0) . ' botol', abs($sampah['total_plastik_asli'] - $sampah['total_plastik'])));
        $this->ln();
    }

    function cetak_detail_darat($s)
    {
        //dapur
        $this->SetFont('Times', 'B', 10);
        $this->cell(0, $this->height, 'Emisi Perjalanan Udara', 0, 1);
        $this->SetFont('Times', '', 10);
        $this->SetWidths(array(161.5));
        $this->Row(array($s));
        $this->ln();
    }

}

