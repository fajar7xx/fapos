<?php

class Fungsi
{
    protected  $ci;

    public function __construct()
    {
        $this->ci = &get_instance();
    }

    function user_login()
    {
        $this->ci->load->model('Users_model');
        $user_id = $this->ci->session->userdata('user_id');
        $user_data = $this->ci->Users_model->getUser($user_id);

        return $user_data->row();
    }
}
