<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller
{
    public function __construct() {
        parent::__construct();
        $this->lang->load("message","polish");
    }

    public function index()
    {
        $data["naglowek"] = $this->lang->line("naglowek");
        $data['numery_dla'] = '';
        $data['kraje'] = array(
            '+43' => 'Austria',
            '+20' => 'Egipt',
            '+55' => 'Brazylia',
//            '+39' => 'Włochy',
//            '+66' => 'Tajlandia',
//            '+98' => 'Iran',
//            '+90' => 'Turcja',
//            '+52' => 'Meksyk',
//            '+84' => 'Wietnam',
//            '+81' => 'Japonia',
//            '+7' => 'Rosja',
//            '+63' => 'Filipiny',
//            '+351' => 'Portugalia',
//            '+91' => 'Indie',
//            '+86' => 'Chiny',
//            '+48' => 'Polska',
        );
        $kierunkowy = $this->input->post('kraj');
        $nazwa_panstwa = element($kierunkowy, $data['kraje']);
        $ilosc = $this->input->post('iloscWynikow');

        $data['numery_dla'] = $nazwa_panstwa;
        $this->load->view('welcome_message', $data);
        $this->load->model('generator_model');

        $data['gotowe_numery'] = $this->generator_model->Numery($nazwa_panstwa, $kierunkowy, $ilosc);
        $this->load->view('wygenerowane_numery', $data);
    }
}
