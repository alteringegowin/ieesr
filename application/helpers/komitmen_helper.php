<?php

function cetak_komitmen_lampu($baseline_lampu, $komitmen_lampu, $k)
{

    $klampu = element('tipelampu-' . $k, $komitmen_lampu);
    $kdaya = element('daya-' . $k, $komitmen_lampu);
    $kwaktu = element('waktu-' . $k, $komitmen_lampu);

    if ($klampu) {
        $str = 'Mengurangi Lampu ' . element('tipe', $baseline_lampu) . ' ' . element('daya', $baseline_lampu) . ' Watt selama ' . element('waktu', $baseline_lampu) . ' jam';
        $str .= ' menjadi ';
        $str .= 'Lampu ' . $klampu . ' ' . $kdaya . ' watt selama ' . $kwaktu . ' jam';
    } else {
        $str = 'Berhenti Menggunakan Lampu ' . element('tipe', $baseline_lampu) . ' ' . element('daya', $baseline_lampu) . ' Watt selama ' . element('waktu', $baseline_lampu) . ' jam';
    }

    return $str;
}

function cetak_komitmen_dapur($r, $dapur)
{
    $status = isset($dapur['jam-' . $r->id]) ? 'Tetap' : 'Berhenti';
    if ($status != 'Tetap') {
        $str = $status . ' Menggunakan ' . $r->item_name . ' ';
        return $str;
    }
}

function cetak_komitmen_other($r, $baseline, $komitmen)
{
    $barang = $r->item_name;
    $dari = element('item-' . $r->id, $baseline);
    $jadi = element('jam-' . $r->id, $komitmen);
    if ($dari != $jadi) {
        $str = 'Mengurangi Penggunaan ' . $barang . ' dari ' . $dari . ' jam menjadi ' . $jadi . ' jam';
        return $str;
    } else {
        return false;
    }
}

function cetak_sampah($baseline, $komitmen)
{
    $organik_asli = element('item-25', $baseline, 0);
    $kertas_asli = element('item-26', $baseline, 0);
    $plastik_asli = element('item-27', $baseline, 0);

    $organik_komitmen = element('item-25', $komitmen, 0);
    $kertas_komitmen = element('item-26', $komitmen, 0);
    $plastik_komitmen = element('item-27', $komitmen, 0);

    $sampah = array();
    if ($organik_asli != $organik_komitmen) {
        $sampah[] = 'mengurangi sampah organik dari ' . $organik_asli . 'gr menjadi ' . $organik_komitmen . 'gr';
    }
    if ($kertas_asli != $kertas_komitmen) {
        $sampah[] = 'mengurangi sampah kertas dari ' . $kertas_asli . ' lembar menjadi ' . $kertas_komitmen . ' lembar';
    }
    if ($plastik_asli != $plastik_komitmen) {
        $sampah[] = 'mengurangi sampah organik dari ' . $plastik_asli . ' botol menjadi ' . $plastik_komitmen . ' botol';
    }
    return $sampah;
}

function cetak_komitmen_darat($baseline, $komitmen)
{
    $str = 'Penggunaan Kendaraan ' . element('tipe', $baseline) . ' ' . get_tipe_darat($baseline) . ' ' . get_keterangan_darat($baseline);
    $str.= ' Menjadi ';
    $str .= 'Kendaraan '.element('tipe', $komitmen) .' '. get_tipe_darat($komitmen) . ' ' . get_keterangan_darat($komitmen);
    return $str;
}

function cetak_komitmen_udara($baseline, $komitmen)
{
    $str = 'Penggunaan penerbangan ' . element('jenis_penerbangan', $baseline) . ' '
        . get_tipe_pesawat($baseline['tipe_pesawat']) . ' dgn jumlah Transit ' . element('jumlah_penumpang', $baseline);
    $str.= ' Menjadi ';
    $str .= element('jenis_penerbangan', $komitmen) . ' '
        . get_tipe_pesawat($komitmen['tipe_pesawat']) . ' dgn jumlah Transit ' . element('jumlah_penumpang', $komitmen);
    return $str;
}