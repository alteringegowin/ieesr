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
            if (is_array($r)) {
                
            } elseif ($r) {
                $this->Row(array($no++, $r));
            } else {
                
            }
        }
    }

    function cetak_detail_lampu()
    {
        $this->SetFont('Times', 'B', 10);
        $this->cell(0,$this->height,'Emisi Lampu',0,1);
        $this->SetFont('Times', '', 10);

        $this->SetWidths(array( 45, 15, 21.5, 45, 15, 21));
        $this->Row(array('x','x','x','x','x','x'));
        $this->cell(0,$this->height,'AV');
        $this->SetFont('Times', '', 10);
    }

}
