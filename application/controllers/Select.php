<?php

Class Select extends CI_Controller

{


function __construct(){

parent::__construct();

$this->load->database();

$this->load->helper(array('url'));

$this->load->model('model_select');


}


function index(){


$data['provinsi']=$this->model_select->provinsi();

$this->load->view('auth/view_select',$data);


}

function ambil_data(){

$modul=$this->input->post('modul');
$id=$this->input->post('id');

if($modul=="kabupaten"){
echo $this->model_select->kabupaten($id);
}
else if($modul=="kecamatan"){
echo $this->model_select->kecamatan($id);

}
else if($modul=="kelurahan"){
echo $this->model_select->kelurahan($id);
}
}

}
