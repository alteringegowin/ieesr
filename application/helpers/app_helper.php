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
        if ($i < $total - 1) {
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

    if ($key)
        $params["$key !="] = $value;

    while ($t->db->where($params)->get($table)->num_rows()) {
        if (!preg_match('/-{1}[0-9]+$/', $slug)) {
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

function timeAgo($timestamp, $granularity=2, $format='Y-m-d H:i:s')
{
    return date($format, $timestamp);
    $difference = time() - $timestamp;
    if ($difference < 0)
        return '0 seconds ago';
    elseif ($difference < 864000) {
        $periods = array('week' => 604800, 'day' => 86400, 'hr' => 3600, 'min' => 60, 'sec' => 1);
        $output = '';
        foreach ($periods as $key => $value) {
            if ($difference >= $value) {
                $time = round($difference / $value);
                $difference %= $value;
                $output .= ($output ? ' ' : '') . $time . ' ';
                $output .= (($time > 1 && $key == 'day') ? $key . 's' : $key);
                $granularity--;
            }
            if ($granularity == 0)
                break;
        }
        return ($output ? $output : '0 seconds') . ' ago';
    }
    else
        return date($format, $timestamp);
}

function sort_table_display($match)
{
    $uri = uri_string();
    $a_uri = explode('/', $uri);

    if (isset($a_uri[2])) {
        return $a_uri[2] == $match ? '<i class="icon-arrow-down"></i>' : '';
    } else {
        return $match == 'rate' ? '<i class="icon-arrow-down"></i>' : '';
    }
}

function sort_table_display_admin($match)
{
    $uri = uri_string();
    $a_uri = explode('/', $uri);
    Console::log($a_uri);

    if (isset($a_uri[4])) {
        return $a_uri[4] == $match ? '<i class="icon-arrow-down"></i>' : '';
    } else {
        return $match == 'rate' ? '<i class="icon-arrow-down"></i>' : '';
    }
}

function TagCloud($ctags, $nocount=false, $current_mode=false, $suffle_mode=true, $min_size=12, $max_size=40)
{
    $uri_string = uri_string();
    $tags = array();
    $links = array();
    $words = array();
    foreach ($ctags as $r) {
        $s = site_url('tag/' . $r->tag_url, $r->tag_title);
        $tags[$r->tag_url] = $r->total;
        $links[$r->tag_url] = $s;
        $words[$r->tag_url] = $r->tag_title;
    }
    // $tags is the array

    arsort($tags);

    // largest and smallest array values
    $max_qty = max(array_values($tags));
    $min_qty = min(array_values($tags));

    // find the range of values
    $spread = $max_qty - $min_qty;
    if ($spread == 0) { // we don't want to divide by zero
        $spread = 1;
    }

    // set the font-size increment
    $step = ($max_size - $min_size) / ($spread);
    $strtag = array();
    // loop through the tag array
    foreach ($tags as $key => $value) {
        if ($current_mode) {
            $size = $uri_string == 'tag/' . $key ? 30 : $min_size;
        } else {
            $size = round($min_size + (($value - $min_qty) * $step));
        }


        $adds = $nocount ? '' : '<small>(' . $value . ')</small>';
        $strtag[] = '<a href="' . $links[$key] . '" style="font-size: ' . $size . 'px" 
title="' . $words[$key] . ' things tagged with ' . $words[$key] . '">' . $words[$key] . $adds . '</a>&nbsp;';
    }
    if ($suffle_mode)
        shuffle($strtag);
    return $strtag;
}

function the_checkbox_dapur($param, $match)
{
    $ci = get_instance();
    $s = $ci->session->userdata('dapur');

    if (isset($s[$param]) && $s[$param] == $match) {
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

function check_baseline_exists()
{
    $ci = get_instance();
    $user_id = $ci->session->userdata('user_id');
}

function get_tipe_darat($param)
{
    if ($param['tipe'] == 'umum') {
        $tipe = $param['tipe_umum'];
    } else {
        $tipe = $param['tipe_pribadi'];
    }
    $ci = get_instance();
    $ci->db->where('id', $tipe);
    $row = $ci->db->get('master_vehicles')->row();
    return isset($row->vehicle_name) ? $row->vehicle_name : false;;
}

function get_keterangan_darat($param)
{
    if ($param['pribaditipe'] == 'jarak') {
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