<?php

require_once APPPATH . 'third_party/fpdf/mc_table.php';

class Commitment_pdf extends PDF_MC_Table
{

    protected $width;
    protected $height;
    protected $dbuser;

    function __construct()
    {
        $this->FPDF('P', 'mm', 'A4');

        $this->width = 15.2;
        $this->height = 5;
    }

    function set_dbuser($data)
    {
        $this->dbuser = $data;
    }

    function set_param($param, $val)
    {
        $this->$param = $val;
    }

    function guide()
    {

        for ($i = 0; $i < 12; $i++) {
            $this->cell($this->width, $this->height, $i + 1, 1, 0);
        }
        $this->ln();
    }

    function surat()
    {
        $str = "Menyatakan bahwa saya bersedia menurunkan emisi karbon yang saya hasilkan dari " . number_format($this->total_baseline, 2) . " gram CO2 menjadi " . number_format($this->total_pengurangan, 2) . " gram CO2 (total pengurangan emisi sebesar " . number_format($this->total_baseline - $this->total_pengurangan, 2) . " gram CO2) dalam satu tahun, sesuai dengan pilihan pengurangan emisi yang saya rencanakan untuk menahan laju perubahan iklim dan terciptanya bumi yang lestari.";
        $str2 = "Demikian pernyataan ini saya buat dengan sesungguhnya dan tanpa paksaan dari siapapun.";
        //Cell(w,h,txt, border, ln , align)

        $x = $this->GetX();
        $y = $this->GetY();
        $this->Image('resources/img/logo_iesr.jpg', $x, $y - 0.4, $this->width * 2);
        $this->Image('resources/img/logo_kalkulator.gif', $x + $this->width * 10, $y - 0.4, $this->width * 2);

        $this->ln();
        $this->ln();
        $this->ln();
        $this->ln();
        $this->SetFont('Arial', 'B', 12);
        $this->cell(0, $this->height, 'Lembar Komitmen', 0, 1, 'C');
        $this->cell(0, $this->height, 'Pengurangan Jejak Karbon', 0, 1, 'C');
        $this->SetFont('Arial', '', 10);

        $this->cell(0, $this->height, 'Dengan ini saya', 0, 1);
        $this->ln();
        $this->cell($this->width, $this->height, '');
        $this->cell($this->width * 2, $this->height, 'Nama', 0, 0);
        $this->cell($this->width, $this->height, ': ' . $this->dbuser->fullname, 0, 1);

        $this->cell($this->width, $this->height, '');
        $this->cell($this->width * 2, $this->height, 'Domisili', 0, 0);
        $this->cell($this->width, $this->height, ': ' . $this->dbuser->propinsi_name, 0, 1);

        $this->cell($this->width, $this->height, '');
        $this->cell($this->width * 2, $this->height, 'Email', 0, 0);
        $this->cell($this->width, $this->height, ': ' . $this->dbuser->email, 0, 1);

        $this->cell($this->width, $this->height, '');
        $this->cell($this->width * 2, $this->height, 'Pekerjaan', 0, 0);
        $this->cell($this->width, $this->height, ': ' . $this->dbuser->pekerjaan, 0, 1);
        $this->ln();

        $this->MultiCell(0, $this->height, $str);
        $this->ln();

        $this->cell(0, $this->height, $str2);
        $this->ln();
        $this->ln();


        $this->cell(0, $this->height, $this->dbuser->propinsi_name . ', ' . date('d F Y'), 0, 1, 'R');
        $this->cell(0, $this->height, $this->dbuser->fullname, 0, 1, 'R');
    }

    function cetak_listrik()
    {

        $bblistrik = element('lampu', element('listrik', $this->baseline, array()));
        $bbpengurangan = element('lampu', element('listrik', $this->pengurangan, array()));
        if ($bblistrik) {
            parse_str($bblistrik, $d);
            parse_str($bbpengurangan, $p);

            $jenis = element('tipe', $d);
            $daya = element('daya', $d);
            $waktu = element('waktu', $d);
            $total = element('total_lampu', $d);

            $pjenis = element('tipe', $p);
            $pdaya = element('daya', $p);
            $pwaktu = element('waktu', $p);
            $ptotalasli = element('total_lampu_asli', $p);
            $ptotal = element('total_lampu_all', $p);


            $this->SetFont('Arial', 'B', 8);
            $this->cell($this->width * 6, $this->height, 'Baseline Penggunaan Lampu', 1, 0);
            $this->cell($this->width * 6, $this->height, 'Pengurangan Penggunaan Lampu', 1, 1);
            $this->SetFont('Arial', '', 8);
            $this->cell($this->width * 3, $this->height, 'Jenis Lampu', 1, 0);
            $this->cell($this->width * 1.5, $this->height, 'Daya', 1, 0);
            $this->cell($this->width * 1.5, $this->height, 'Waktu', 1, 0);
            $this->cell($this->width * 3, $this->height, 'Jenis Lampu', 1, 0);
            $this->cell($this->width * 1.5, $this->height, 'Daya', 1, 0);
            $this->cell($this->width * 1.5, $this->height, 'Waktu', 1, 1);
            foreach ($jenis as $k => $v) {
                $this->cell($this->width * 3, $this->height, $v, 1, 0);
                $this->cell($this->width * 1.5, $this->height, element($k, $daya, 0) . ' Watt', 1, 0, 'R');
                $this->cell($this->width * 1.5, $this->height, element($k, $waktu) . ' Jam', 1, 0, 'R');

                //pengurangan
                $this->cell($this->width * 3, $this->height, element($k, $pjenis), 1, 0);
                $this->cell($this->width * 1.5, $this->height, element($k, $pdaya, 0) . ' Watt', 1, 0, 'R');
                $this->cell($this->width * 1.5, $this->height, element($k, $pwaktu) . ' Jam', 1, 0, 'R');
                $this->Ln();
            }

            $this->SetFont('Arial', 'B', 8);
            $this->SetFillColor(224, 235, 255);
            $this->SetTextColor(0);
            $this->Cell($this->width * 9, $this->height, "Total Pengurangan Emisi Lampu  ", 1, 0, 'R', TRUE);
            $this->Cell($this->width * 3, $this->height, number_format($ptotalasli - $ptotal, 2) . ' gram CO2', 1, 1, 'R', true);
        }
    }

    function cetak_other($key, $group_id, $string='dapur')
    {

        $dd = element($key, element('listrik', $this->baseline, array()));
        $pp = element($key, element('listrik', $this->pengurangan, array()));
        parse_str($dd, $d);
        parse_str($pp, $p);

//        $this->MultiCell(0, $this->height, print_r($d, 1));
//        $this->MultiCell(0, $this->height, print_r($p, 1));

        $this->SetFont('Arial', 'B', 8);
        $this->ln();
        $this->ln();
        $this->cell($this->width * 8, $this->height, 'Baseline Penggunaan ' . $string, 1, 0);
        $this->cell($this->width * 2, $this->height, 'Dari', 1, 0, 'C');
        $this->cell($this->width * 2, $this->height, 'Menjadi', 1, 1, 'C');
        $this->SetFont('Arial', '', 8);

        $ci = get_instance();
        $ci->db->where('group_item_id', $group_id);
        $res = $ci->db->get('ac_items')->result();
        foreach ($res as $r) {
            if (element('t-item-' . $r->id, $d, false)) {
                $this->cell($this->width * 8, $this->height, $r->item_name, 1, 0);
                if (in_array($r->id, array(2, 3, 4, 5))) {
                    $x = element('item-' . $r->id, $d, 0) ? 'Ya' : 'Tidak';
                    $this->cell($this->width * 2, $this->height, $x, 1, 0, 'C');
                } else {
                    $this->cell($this->width * 2, $this->height, element('item-' . $r->id, $d, 0) . ' Jam ', 1, 0, 'R');
                }
                if (in_array($r->id, array(2, 3, 4, 5))) {
                    $x2 = element('jam-' . $r->id, $p, 0);
                    $x2 = $x2 ? 'Ya' : 'Tidak';
                    $this->cell($this->width * 2, $this->height, $x2, 1, 0, 'C');
                } else {
                    $x2 = element('jam-' . $r->id, $p, 0);
                    $this->cell($this->width * 2, $this->height, $x2 . ' Jam ', 1, 0, 'R');
                }
                $this->ln();
            }
        }
        $total_bs = element('total_' . $key . '_asli', $p, 0);
        $total_p = element('total_' . $key, $p, 0);
        $this->SetFont('Arial', 'B', 8);
        $this->SetFillColor(224, 235, 255);
        $this->SetTextColor(0);
        $this->Cell($this->width * 8, $this->height, "Total Emisi " . $string, 1, 0, 'R', TRUE);
        $this->Cell($this->width * 2, $this->height, number_format($total_bs, 2), 1, 0, 'R', true);
        $this->Cell($this->width * 2, $this->height, number_format($total_p, 2), 1, 1, 'R', true);

        $this->Cell($this->width * 8, $this->height, "Total Pengurangan Emisi " . $string, 1, 0, 'R', TRUE);
        $this->Cell($this->width * 4, $this->height, number_format($total_bs - $total_p, 2) . ' gram CO2', 1, 1, 'R', true);
    }

    function cetak_sampah()
    {
        $b = element('sampah', $this->baseline, array());
        $dbpengurangan = element('sampah', $this->pengurangan, array());
        parse_str($dbpengurangan, $p);

        $organik = element('item-25', $b);
        $kertas = element('item-26', $b);
        $plastik = element('item-27', $b);

        if (element('total_sampah', $b)) {
            $this->SetFont('Arial', 'B', 8);
            $this->ln();
            $this->ln();
            $this->cell($this->width * 8, $this->height, 'Baseline Sampah', 1, 0);
            $this->cell($this->width * 2, $this->height, 'Dari', 1, 0, 'C');
            $this->cell($this->width * 2, $this->height, 'Menjadi', 1, 1, 'C');
            $this->SetFont('Arial', '', 8);

            if ($organik) {
                $this->cell($this->width * 8, $this->height, 'Sampah Organik', 1, 0);
                $this->cell($this->width * 2, $this->height, $organik, 1, 0, 'C');
                $this->cell($this->width * 2, $this->height, element('item-25', $p, 0), 1, 1, 'C');
            }
            if ($kertas) {
                $this->cell($this->width * 8, $this->height, 'Sampah Kertas', 1, 0);
                $this->cell($this->width * 2, $this->height, $organik, 1, 0, 'C');
                $this->cell($this->width * 2, $this->height, element('item-26', $p, 0), 1, 1, 'C');
            }
            if ($plastik) {
                $this->cell($this->width * 8, $this->height, 'Sampah Plastik', 1, 0);
                $this->cell($this->width * 2, $this->height, $organik, 1, 0, 'C');
                $this->cell($this->width * 2, $this->height, element('item-27', $p, 0), 1, 1, 'C');
            }

            $this->SetFont('Arial', 'B', 8);
            $this->SetFillColor(224, 235, 255);
            $this->SetTextColor(0);
            $this->Cell($this->width * 8, $this->height, "Total Emisi Sampah", 1, 0, 'R', TRUE);
            $this->Cell($this->width * 2, $this->height, number_format(element('total_sampah_asli', $p, 0), 2), 1, 0, 'R', true);
            $this->Cell($this->width * 2, $this->height, number_format(element('total_sampah', $p, 0), 2), 1, 1, 'R', true);

            $this->Cell($this->width * 8, $this->height, "Total Pengurangan Emisi Sampah", 1, 0, 'R', TRUE);
            $this->Cell($this->width * 4, $this->height, number_format(element('total_sampah_asli', $p, 0) - element('total_sampah', $p, 0), 2) . ' gram CO2', 1, 1, 'R', true);
        }
    }

    function cetak_darat()
    {
        $b = element('darat', $this->baseline, array());
        $p = element('darat', $this->pengurangan, array());
        if (element('total_darat', $b)) {

            $x = element('total_darat', $b) - element('total_darat', $p);
            $this->ln();

            $this->SetFont('Arial', 'B', 8);
            $this->cell($this->width * 6, $this->height, 'Jenis Kendaraan', 1, 0);
            $this->cell($this->width * 2, $this->height, 'Konsumsi/Jarak', 1, 0, 'C');
            $this->cell($this->width * 1.5, $this->height, 'Penumpang', 1, 0, 'C');
            $this->cell($this->width * 2.5, $this->height, 'Total Emisi', 1, 1, 'C');
            $this->SetFont('Arial', '', 8);
            $this->_cetak_darat($b);
            $this->_cetak_darat($p, 'komitmen');

            $this->SetFont('Arial', 'B', 8);
            $this->SetFillColor(224, 235, 255);
            $this->SetTextColor(0);
            $this->Cell($this->width * 9.5, $this->height, "Total Emisi Perjalanan Darat", 1, 0, 'R', TRUE);
            $this->Cell($this->width * 2.5, $this->height, number_format($x, 2) . ' gram CO2', 1, 1, 'R', true);
        }
    }

    function _cetak_darat($b, $g='baseline')
    {
        if (element('jenis_kendaraan', $b) == 'pribadi') {
            $tipe = element('darat-tipe-penghitungan-pribadi', $b);
            $vehicle_id = element('darat-tipe-pribadi', $b);
        } else {
            $tipe = element('darat-tipe-penghitungan-umum', $b);
            $vehicle_id = element('darat-tipe-umum', $b);
        }

        $jenis_mobil = get_tipe_darat($vehicle_id);
        if ($tipe == 'jarak') {
            $str = element('jarak_tempuh', $b, '') . ' KM';
        } else {
            $str = 'Rp.' . element('konsumsi', $b, '');
        }

        $this->cell($this->width, $this->height, $g, 1, 0);
        $this->cell($this->width, $this->height, element('jenis_kendaraan', $b), 1, 0);
        $this->cell($this->width * 4, $this->height, html_entity_decode($jenis_mobil), 1, 0);
        $this->cell($this->width * 2, $this->height, $str, 1, 0, 'C');
        $this->cell($this->width * 1.5, $this->height, element('xpenumpang', $b), 1, 0, 'C');
        $this->cell($this->width * 2.5, $this->height, number_format(element('total_darat', $b, 0), 2), 1, 1, 'C');
    }

    function cetak_udara()
    {
        $b = element('udara', $this->baseline, array());
        $p = element('udara', $this->pengurangan, array());
        if (element('total_pesawat', $b)) {
            $x = element('total_pesawat', $b) - element('total_pesawat', $p);
            $this->ln();

            $this->SetFont('Arial', 'B', 8);
            $this->cell($this->width * 2, $this->height, 'Penerbangan', 1, 0);
            $this->cell($this->width * 4, $this->height, 'Tipe Pesawat', 1, 0, 'C');
            $this->cell($this->width * 3, $this->height, 'Transit', 1, 0, 'C');
            $this->cell($this->width * 3, $this->height, 'Emisi', 1, 1, 'C');


            $this->SetFont('Arial', '', 8);
            $this->_cetak_udara($b);
            $this->_cetak_udara($p, 'komitmen');

            $this->SetFont('Arial', 'B', 8);
            $this->SetFillColor(224, 235, 255);
            $this->SetTextColor(0);
            $this->Cell($this->width * 9, $this->height, "Total Emisi Perjalanan Udara", 1, 0, 'R', TRUE);
            $this->Cell($this->width * 3, $this->height, number_format($x, 2) . ' gram CO2', 1, 1, 'R', true);
        }
    }

    function _cetak_udara($b, $g='baseline')
    {
        $this->cell($this->width * 2, $this->height, element('jenis_penerbangan', $b), 1, 0);
        $this->cell($this->width * 4, $this->height, get_tipe_pesawat(element('tipe_pesawat', $b)), 1, 0);
        $this->cell($this->width * 3, $this->height, element('jumlah_penumpang', $b), 1, 0, 'C');
        $this->cell($this->width * 3, $this->height, number_format(element('total_pesawat', $b, 0), 2), 1, 1, 'C');
    }

}

