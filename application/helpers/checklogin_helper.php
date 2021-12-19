<?php

function checklog()
{
    $ci = &get_instance();
    $level = $ci->session->userdata('level');
    if (!empty($level)) {
        redirect('dashboard');
    }
}

function checklogin()
{
    $ci = &get_instance();
    $level = $ci->session->userdata('level');
    if (empty($level)) {
        redirect('auth/login');
    }
}
