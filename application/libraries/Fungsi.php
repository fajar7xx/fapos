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

    function PdfGenerator($html, $filename, $paper, $orientation)
    {
        // reference the Dompdf namespace
        // use Dompdf\Dompdf;
        // instantiate and use the dompdf class
        $dompdf = new Dompdf\Dompdf();
        $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper($paper, $orientation);

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream($filename, ['Attachment' => 0]);
    }
}
