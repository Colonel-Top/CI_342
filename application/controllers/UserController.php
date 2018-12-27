<?php
/**
 * Created by PhpStorm.
 * User: proms
 * Date: 12/22/2018
 * Time: 6:07 PM
 */

class UserController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        include 'construct.php';
    }

    public function index()
    {
        $this->load->view('login');
    }

    public function register()
    {
        $data = array();

        $this->load->view('register');
    }

    public function authorized()
    {
        $data = $this->input->post();
        if ($this->user->login($data['email'], $data['password']))
        {
            $id = $this->user->getIDbyEmail($data['email']);
            $data = $this->user->findOrFail($id);

            $data = $data[0];

            $userdata = array(
                "successful" => "Welcome back ," . $data['first_name'],
                'logged' => $id,
            );
            $this->session->set_userdata($userdata);
            redirect('/','refresh');
        }
        else
        {
            $this->session->set_userdata("error", "Your Credential was wrong please try again");
            redirect('login','refresh');
        }
    }

    public function registration()
    {
        $data = $this->input->post();
        if ($this->user->isUnique($data['email']))
        {
            $this->session->set_userdata("error", "Email already register please use another email!");
            $this->load->view('register');
        }
        else if ($this->user->register($data))
        {
            $id = $this->user->getIDbyEmail($data['email']);
            $userdata = array(
                "successful" => "Register Successful Welcome to Programming In your area, " . $data['first_name'],
                'logged' => $id,
            );
            $this->session->set_userdata($userdata);
            $this->load->view('index');
        }


    }

    public function logout()
    {
        unset($_SESSION['logged']);
        redirect('/','refresh');
    }
}