<?php
/**
 * Created by PhpStorm.
 * User: proms
 * Date: 12/22/2018
 * Time: 6:19 PM
 */

class HomeController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        include 'construct.php';
    }

    public function index()
    {
        $data['categories'] = $this->category->getall_category();
        $data['livestream'] = $this->livestream->get_all_liveStreaming();
        $data['livestreamer'] = $this->livestream->get_last_live_streaming();
        $this->load->view('index',$data);
    }

}