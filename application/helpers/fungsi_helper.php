<?php
function check_already_login()
{

    // buat instance variabel
    $ci = &get_instance();

    $user_session = $ci->session->userdata('user_id');
    if ($user_session) {
        redirect('dashboard');
    }
}

function check_not_login()
{

    $ci = &get_instance();

    $user_session = $ci->session->userdata('user_id');
    if (!$user_session) {
        redirect('auth/login');
    }
}

function check_admin()
{
    $ci = &get_instance();

    $ci->load->library('fungsi');
    if ($ci->fungsi->user_login()->level != 1) {
        redirect('dashboard');
    }
}

function rupiah($angka)
{
    $hasil_rupiah = "Rp " . number_format($angka, 2, ',', '.');
    return $hasil_rupiah;
}

function indo_date($date){
    $day = substr($date,8,2);
    $month = substr($date,5,2);
    $year = substr($date,0,4);

    switch($month){
        case '1':
            $month = 'January';
            break;
        case '2':
            $month = 'February';
        break;
        case '3':
            $month = 'March';
        break;
        case '4':
            $month = 'April';
        break;
        case '5':
            $month = 'May';
        break;
        case '6':
            $month = 'June';
        break;
        case '7':
            $month = 'July';
        break;
        case '8':
            $month = 'August';
        break;
        case '9':
            $month = 'September';
        break;
        case '10':
            $month = 'October';
        break;
        case '11':
            $month = 'November';
        break;
        case '12':
            $month = 'December';
        break;
        
    }

    return $day.' '.$month.' '.$year;
}
