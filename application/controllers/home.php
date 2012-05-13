<?php
if ( !defined('BASEPATH') )
    exit('No direct script access allowed');

class Home extends CI_Controller
{

    protected $tpl;

    function __construct()
    {
        parent::__construct();
        $this->tpl['themes'] = base_url('resources') . '/';
    }

    public function index()
    {
        $this->tpl['content'] = $this->load->view('home/index', $this->tpl, true);
        $this->load->view('body', $this->tpl);
    }

    public function ori()
    {
        
        $str = '<div class="input-append"><select name="tipe[]" class="span1"><option>LED</option>
                        <option>Neon - CFL</option>
                        <option>Bohlam - Lampu Pijar</option>
                    </select>
                </div>
                <div class="input-append">
                    <input class="span1" name="daya[]" id="" size="16" type="text"><span class="add-on">watt</span>
                </div>
                <div class="input-append">
                    <input class="span1" name="jam[]" id="" size="16" type="text"><span class="add-on">Jam</span>
                </div>
            ';
        $str = str_replace("\n", ' ', $str);
        $str = str_replace("         ", ' ', $str);
        $str = str_replace("     ", ' ', $str);
        echo $str;
        //$this->load->view('ori', $this->tpl);
    }

}
