<?php

/*
 * TOTAL ORGANIK = ((INPUT/1000)*0.3*289) + ((INPUT/1000)*4*72)
 * TOTAL KERTAS = INPUT*70*3.24
 * TOTAL BOTOL = INPUT*0.9444*PROPINSI_CONS*1000
 * 
 */
$config['app_dropdown_lampu'] = array('LED' => 'LED', 'Neon - CFL' => 'Neon CFL', 'Bohlam - Lampu Pijar' => 'Bohlam - Lampu Pijar');
//k_item[2] = 1300;
//        k_item[3] = 150;
//        k_item[4] = 170;
//        k_item[5] = 195;
//        k_item[6] = 500;
//        k_item[7] = 850;
$config['app_dapur_constanta'][2] = array('c' => 1300, 'j' => 24);
$config['app_dapur_constanta'][3] = array('c' => 150, 'j' => 24);
$config['app_dapur_constanta'][4] = array('c' => 170, 'j' => 24);
$config['app_dapur_constanta'][5] = array('c' => 195, 'j' => 24);
$config['app_dapur_constanta'][6] = array('c' => 500, 'j' => 24);
$config['app_dapur_constanta'][7] = array('c' => 850, 'j' => 24);