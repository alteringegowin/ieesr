<?php

function xdebug($v)
{
    echo '<pre>' . print_r($v, 1) . '</pre>';
}

function the_breadcrumbs($breadcrumbs = array(), $divider='&raquo;')
{
    $total = count($breadcrumbs);
    $str = '<ul class="breadcrumb">';
    for ($i = 0; $i < $total; $i++) {
        if ( $i < $total - 1 ) {
            $str .= '<li>';
            $str .= $breadcrumbs[$i];
            $str .= '<span class="divider">' . $divider . '</span>';
            $str .= '</li>';
        } else {

            $str .= '<li class="active"><strong>';
            $str .= $breadcrumbs[$i];
            $str .= '</strong></li>';
        }
    }
    $str .= '</ul>';
    echo $str;
}

function create_unique_slug($string, $table, $field='slug', $key=NULL, $value=NULL)
{
    $t = & get_instance();

    $slug = url_title($string);
    $slug = strtolower($slug);
    $i = 0;
    $params = array();
    $params[$field] = $slug;

    if ( $key )
        $params["$key !="] = $value;

    while ($t->db->where($params)->get($table)->num_rows()) {
        if ( !preg_match('/-{1}[0-9]+$/', $slug) ) {
            $slug .= '-' . ++$i;
        } else {
            $slug = preg_replace('/[0-9]+$/', ++$i, $slug);
        }
        $params [$field] = $slug;
    }
    return $slug;
}

function create_pagination($segment, $total, $limit, $uri_segment)
{
    $CI = & get_instance();
    $CI->load->library('pagination');
    $config['full_tag_open'] = '<div class="pagination"><ul>';
    $config['full_tag_close'] = '</ul></div >';
    $config['first_link'] = 'First';
    $config['first_tag_open'] = '<li>';
    $config['first_tag_close'] = '</li>';
    $config['last_link'] = 'Last';
    $config['last_tag_open'] = '<li>';
    $config['last_tag_close'] = '</li>';
    $config['next_link'] = '&gt;';
    $config['next_tag_open'] = '<li>';
    $config['next_tag_close'] = '</li>';
    $config['prev_link'] = '&lt;';
    $config['prev_tag_open'] = '<li>';
    $config['prev_tag_close'] = '</li>';
    $config['cur_tag_open'] = '<li class="active"><a href="' . current_url() . '">';
    $config['cur_tag_close'] = '</a></li>';
    $config['num_tag_open'] = '<li>';
    $config['num_tag_close'] = '</li>';
    $config['base_url'] = site_url($segment);
    $config['total_rows'] = $total;
    $config['per_page'] = $limit;
    $config['uri_segment'] = $uri_segment;

    $CI->pagination->initialize($config);
    return $CI->pagination->create_links();
}

function the_checkbox_dapur($param, $match)
{
    $ci = get_instance();
    $s = $ci->session->userdata('dapur');

    if ( isset($s[$param]) && $s[$param] == $match ) {
        return 'checked="checked"';
    } else {
        return '';
    }
}

function is_login()
{
    $ci = get_instance();
    $ci->load->library('ion_auth');
    return $ci->ion_auth->logged_in();
}

function get_koef_propinsi($propinsi_id)
{
    $ci = get_instance();
    $ci->db->where('id', $propinsi_id);
    $row = $ci->db->get('master_propinsi')->row();
    return $row ? $row->propinsi_koefisien : 0;
}

function get_propinsi($propinsi_id)
{
    $ci = get_instance();
    $ci->db->where('id', $propinsi_id);
    $row = $ci->db->get('master_propinsi')->row();
    return $row ? $row->propinsi_name : '';
}

function check_baseline_exists()
{
    $ci = get_instance();
    $user_id = $ci->session->userdata('user_id');
}

function get_tipe_darat($param)
{
    if ( is_numeric($param) ) {
        $tipe = $param;
    } else {
        if ( $param['tipe'] == 'umum' ) {
            $tipe = $param['tipe_umum'];
        } else {
            $tipe = $param['tipe_pribadi'];
        }
    }

    $ci = get_instance();
    $ci->db->where('id', $tipe);
    $row = $ci->db->get('master_vehicles')->row();
    return isset($row->vehicle_name) ? $row->vehicle_name : false;
}

function get_keterangan_darat($param)
{
    if ( $param['pribaditipe'] == 'jarak' ) {
        $str = ' dengan jarak tempuh ' . $param['jarak_tempuh'] . ' KM ';
    } else {
        $str = ' dengan konsumsi bahan bakar Rp. ' . $param['konsumsi'];
    }
    return $str;
}

function get_tipe_pesawat($tipe)
{
    $ci = get_instance();
    $ci->db->where('id', $tipe);
    $row = $ci->db->get('master_pesawat')->row();
    return isset($row->jenis_pesawat) ? $row->jenis_pesawat : false;
}

function check_user_nav_current($check)
{
    $ci = get_instance();
    $s = $ci->uri->segment(2, 'index');
    return $check == $s ? 'active' : '';
}

function get_total_carbon($dbbaseline)
{

    $blistrik = element('listrik', $dbbaseline);
    $bsampah = element('sampah', $dbbaseline);
    $bdarat = element('darat', $dbbaseline);
    $budara = element('udara', $dbbaseline);

    $total = 0;
    foreach ($blistrik as $k => $r) {
        parse_str($r, $d);
        $t = element('total_' . $k, $d, 0);
        $total = $total + $t;
    }
    $total += element('total_sampah', $bsampah, 0);
    $total += element('total_darat', $bdarat, 0);
    $total += element('total_pesawat', $budara, 0);
    return $total;
}



function get_komitmen_dashboard($user_id)
{
    $user_id =
        $ci = get_instance();
    $ci->db->where('user_id', $user_id);
    $row = $ci->db->get('ac_commitments')->row();
    xdebug($row);
}