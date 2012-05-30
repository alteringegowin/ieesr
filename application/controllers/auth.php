<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Auth extends CI_Controller
{

    protected $tpl;

    function __construct()
    {
        parent::__construct();
        $this->load->library('ion_auth');
        $this->tpl['themes'] = base_url('resources') . '/';
    }

    public function index()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|callback__check_login');
        if ($this->form_validation->run()) {
            //redirect;
            redirect('dashboard');
        }

        $this->tpl['is_login_page'] = true;
        $this->tpl['content'] = $this->load->view('auth/index', $this->tpl, true);
        $this->load->view('body', $this->tpl);
    }

    public function register()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required');
        $this->form_validation->set_rules('password', 'password', 'trim|required|matches[password_confirm]');

        if ($this->form_validation->run()) {
            $username = $this->input->post('name', true);
            $password = $this->input->post('password', true);
            $propinsi_id = $this->input->post('propinsi_id', true);
            $email = $this->input->post('email', true);
            $additional_data = array('fullname' => $this->input->post('name', true), 'propinsi_id' => $propinsi_id);
            $user_id = $this->ion_auth->register($username, $password, $email, $additional_data);

            if (!$user_id) {
                $this->tpl['error'] = $this->ion_auth->errors();
            } else {
                redirect();
            }
        }

        $this->db->order_by('id');
        $propinsi = $this->db->get('master_propinsi')->result();
        $ddPropinsi = array();
        foreach ($propinsi as $r) {
            $ddPropinsi[$r->id] = $r->propinsi_name;
        }



        $this->tpl['is_login_page'] = true;
        $this->tpl['ddPropinsi'] = $ddPropinsi;
        $this->tpl['content'] = $this->load->view('auth/register', $this->tpl, true);
        $this->load->view('body', $this->tpl);
    }

    function logout()
    {
        $this->ion_auth->logout();
        redirect('');
    }

    function help()
    {

        $this->tpl['is_login_page'] = true;
        $this->tpl['content'] = $this->load->view('auth/help', $this->tpl, true);
        $this->load->view('body', $this->tpl);
    }

    //forgot password
    function forgot_password()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'Email Address', 'required');
        if ($this->form_validation->run() == false) {
            //setup the input
            $this->tpl['email'] = array('name' => 'email',
                'id' => 'email',
            );
            //set any errors and display the form
            $this->tpl['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
            $this->tpl['content'] = $this->load->view('auth/forgot_password', $this->tpl, true);
            $this->load->view('body', $this->tpl);
        } else {
            //run the forgotten password method to email an activation code to the user
            $forgotten = $this->ion_auth->forgotten_password($this->input->post('email'));

            if ($forgotten) { //if there were no errors
                $this->tpl['success'] = $this->ion_auth->messages();
                $this->tpl['content'] = $this->load->view('auth/forgot_password', $this->tpl, true);
                $this->load->view('body', $this->tpl);
            } else {
                $this->session->set_flashdata('message', $this->ion_auth->errors());
                redirect("auth/forgot_password", 'refresh');
            }
        }
    }

    //reset password - final step for forgotten password
    public function reset_password($code)
    {
        $this->load->library('form_validation');
        $user = $this->ion_auth->forgotten_password_check($code);

        if ($user) {  //if the code is valid then display the password reset form
            $this->form_validation->set_rules('new', 'New Password', 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[new_confirm]');
            $this->form_validation->set_rules('new_confirm', 'Confirm New Password', 'required');

            if ($this->form_validation->run() == false) {//display the form
                //set the flash data error message if there is one
                $this->tpl['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

                $this->tpl['min_password_length'] = $this->config->item('min_password_length', 'ion_auth');
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
                $this->tpl['csrf'] = $this->_get_csrf_nonce();
                $this->tpl['code'] = $code;

                //render
                $this->tpl['content'] = $this->load->view('auth/reset_password', $this->tpl,true);
                $this->load->view('body', $this->tpl);
            } else {
                // do we have a valid request?
                if ($this->_valid_csrf_nonce() === FALSE || $user->id != $this->input->post('user_id')) {

                    //something fishy might be up
                    $this->ion_auth->clear_forgotten_password_code($code);

                    show_404();
                } else {
                    // finally change the password
                    $identity = $user->{$this->config->item('identity', 'ion_auth')};

                    $change = $this->ion_auth->reset_password($identity, $this->input->post('new'));

                    if ($change) { //if the password was successfully changed
                        $this->session->set_flashdata('message', $this->ion_auth->messages());
                        $this->logout();
                    } else {
                        $this->session->set_flashdata('message', $this->ion_auth->errors());
                        redirect('auth/reset_password/' . $code, 'refresh');
                    }
                }
            }
        } else { //if the code is invalid then send them back to the forgot password page
            $this->session->set_flashdata('message', $this->ion_auth->errors());
            redirect("auth/forgot_password", 'refresh');
        }
    }

    //activate the user
    function activate($id, $code=false)
    {
        if ($code !== false)
            $activation = $this->ion_auth->activate($id, $code);
        else if ($this->ion_auth->is_admin())
            $activation = $this->ion_auth->activate($id);

        if ($activation) {
            //redirect them to the auth page
            $this->session->set_flashdata('message', $this->ion_auth->messages());
            redirect("auth", 'refresh');
        } else {
            //redirect them to the forgot password page
            $this->session->set_flashdata('message', $this->ion_auth->errors());
            redirect("auth/forgot_password", 'refresh');
        }
    }

    //deactivate the user
    function deactivate($id = NULL)
    {
        // no funny business, force to integer
        $id = (int) $id;

        $this->load->library('form_validation');
        $this->form_validation->set_rules('confirm', 'confirmation', 'required');
        $this->form_validation->set_rules('id', 'user ID', 'required|is_natural');

        if ($this->form_validation->run() == FALSE) {
            // insert csrf check
            $this->tpl['csrf'] = $this->_get_csrf_nonce();
            $this->tpl['user'] = $this->ion_auth->user($id)->row();

            $this->load->view('auth/deactivate_user', $this->tpl);
        } else {
            // do we really want to deactivate?
            if ($this->input->post('confirm') == 'yes') {
                // do we have a valid request?
                if ($this->_valid_csrf_nonce() === FALSE || $id != $this->input->post('id')) {
                    show_404();
                }

                // do we have the right userlevel?
                if ($this->ion_auth->logged_in() && $this->ion_auth->is_admin()) {
                    $this->ion_auth->deactivate($id);
                }
            }

            //redirect them back to the auth page
            redirect('auth', 'refresh');
        }
    }

    function _get_csrf_nonce()
    {
        $this->load->helper('string');
        $key = random_string('alnum', 8);
        $value = random_string('alnum', 20);
        $this->session->set_flashdata('csrfkey', $key);
        $this->session->set_flashdata('csrfvalue', $value);

        return array($key => $value);
    }

    function _valid_csrf_nonce()
    {
        if ($this->input->post($this->session->flashdata('csrfkey')) !== FALSE &&
            $this->input->post($this->session->flashdata('csrfkey')) == $this->session->flashdata('csrfvalue')) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function _check_login()
    {
        $identity = $this->input->post('username', true);
        $password = $this->input->post('password', true);
        $remember = FALSE; // remember the user
        $is_login = $this->ion_auth->login($identity, $password, $remember);
        if ($is_login) {
            return true;
        } else {
            $this->form_validation->set_message('_check_login', $this->ion_auth->errors());
            return FALSE;
        }
    }

}
