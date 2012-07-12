<?php
if ( !defined('BASEPATH') )
    exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    protected $tpl;
    protected $user;

    function __construct()
    {
        parent::__construct();
        $this->load->helper('array');
        $this->tpl['themes'] = base_url('resources') . '/';
        $this->load->library('ion_auth');
        if ( !$this->ion_auth->logged_in() ) {
            redirect('auth');
        } else {
            $this->user = $this->ion_auth->user()->row();
            $this->tpl['user'] = $this->user;
        }
        $this->tpl['msg_danger'] = $this->session->flashdata('msg_danger');
    }

    public function index()
    {
        $this->tpl['content'] = $this->load->view('dashboard/index', $this->tpl, true);
        $this->load->view('body', $this->tpl);
    }

    public function profile($s='')
    {
        $this->tpl['content'] = $this->load->view('dashboard/profile', $this->tpl, true);
        $this->load->view('body', $this->tpl);
    }

    public function change_password()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('old', 'Old password', 'required');
        $this->form_validation->set_rules('new', 'New Password', 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[new_confirm]');
        $this->form_validation->set_rules('new_confirm', 'Confirm New Password', 'required');

        if ( !$this->ion_auth->logged_in() ) {
            redirect('auth/login', 'refresh');
        }
        $user = $this->ion_auth->user()->row();
        if ( $this->form_validation->run() == false ) { //display the form
            //set the flash data error message if there is one
            $this->tpl['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

            $this->tpl['min_password_length'] = $this->config->item('min_password_length', 'ion_auth');
            $this->tpl['old_password'] = array(
                'name' => 'old',
                'id' => 'old',
                'type' => 'password',
            );
            $this->tpl['new_password'] = array(
                'name' => 'new',
                'id' => 'new',
                'type' => 'password',
                'pattern' => '^.{' . $this->tpl['min_password_length'] . '}.*$',
            );
            $this->tpl['new_password_confirm'] = array(
                'name' => 'new_confirm',
                'id' => 'new_confirm',
                'type' => 'password',
                'pattern' => '^.{' . $this->tpl['min_password_length'] . '}.*$',
            );
            $this->tpl['user_id'] = array(
                'name' => 'user_id',
                'id' => 'user_id',
                'type' => 'hidden',
                'value' => $user->id,
            );

            //render
            $this->tpl['content'] = $this->load->view('dashboard/change_password', $this->tpl, true);
            $this->load->view('body', $this->tpl);
        } else {
            $identity = $this->session->userdata($this->config->item('identity', 'ion_auth'));

            $change = $this->ion_auth->change_password($identity, $this->input->post('old'), $this->input->post('new'));

            if ( $change ) { //if the password was successfully changed
                $this->session->set_flashdata('message', $this->ion_auth->messages());
            } else {
                $this->session->set_flashdata('message', $this->ion_auth->errors());
            }
            redirect('dashboard/change_password', 'refresh');
        }
    }

    function komitmen()
    {
        $this->db->where('user_id', $this->user->user_id);
        $komitmen = $this->db->get('ac_commitments')->row();
        if ( $komitmen->commitment_shift ) {
            $this->db->select('auth_users.*,master_propinsi.propinsi_name', 'LEFT');
            $this->db->where('auth_users.id', $this->user->user_id);
            $this->db->join('master_propinsi', 'master_propinsi.id=auth_users.propinsi_id');
            $dbuser = $this->db->get('auth_users')->row();

            $dbbaseline = json_decode($komitmen->commitment_values, true);
            $dbpengurangan = json_decode($komitmen->commitment_shift, true);
            $total_baseline = get_total_carbon($dbbaseline);
            $total_pengurangan = get_total_carbon($dbpengurangan);

//            xdebug($dbbaseline['udara']);
//            xdebug($dbpengurangan['udara']);
//            die;



            $this->load->library('Commitment_pdf');
            $this->commitment_pdf->set_dbuser($dbuser);
            $this->commitment_pdf->set_param('total_baseline', $total_baseline);
            $this->commitment_pdf->set_param('total_pengurangan', $total_pengurangan);
            $this->commitment_pdf->set_param('baseline', $dbbaseline);
            $this->commitment_pdf->set_param('pengurangan', $dbpengurangan);
            $this->commitment_pdf->AliasNbPages();
            $this->commitment_pdf->addPage();
            $this->commitment_pdf->ln();
            $this->commitment_pdf->SetFont('Arial', '', 10);
            $this->commitment_pdf->surat();

            $this->commitment_pdf->addPage();
            $this->commitment_pdf->SetFont('Arial', '', 8);
            $this->commitment_pdf->cetak_listrik();
            $this->commitment_pdf->cetak_other('dapur', 2);
            $this->commitment_pdf->cetak_other('rumah_tangga', 3, 'Rumah Tangga');
            $this->commitment_pdf->cetak_other('pribadi', 4, 'Pribadi');
            $this->commitment_pdf->cetak_other('elektronik', 5, 'Elektronik');
            $this->commitment_pdf->cetak_other('komunikasi', 6, 'Komunikasi');
            $this->commitment_pdf->cetak_sampah();
            $this->commitment_pdf->cetak_darat();
            $this->commitment_pdf->cetak_udara();



            $this->commitment_pdf->Output('commitment.pdf', 'I');
        } else {
            $str = 'Perhitungan Emisi Anda Belum Lengkap!';
            $this->session->set_flashdata('msg_danger', $str);
            redirect('dashboard');
        }
    }

    function delete($mode)
    {
        switch ($mode) {
            case 'pengurangan':
                //reset data saja
                $this->db->set('commitment_shift', '');
                $this->db->set('commitment_created', NULL);
                $this->db->where('user_id', $this->user->user_id);
                $this->db->update('ac_commitments');
                break;

            default:
                //hapus data
                $this->db->where('user_id', $this->user->user_id);
                echo $this->db->delete('ac_commitments');
                break;
        }
    }

}
