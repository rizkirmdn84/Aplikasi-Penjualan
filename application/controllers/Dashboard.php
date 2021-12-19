<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        checklogin();
    }
    public function index()
    {
        $this->template->load('template/template', 'dashboard/dashboard');
    }
}
