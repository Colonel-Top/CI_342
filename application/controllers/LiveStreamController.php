<?php
/**
 * Created by PhpStorm.
 * User: proms
 * Date: 12/22/2018
 * Time: 6:06 PM
 */

class LiveStreamController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        include 'construct.php';
    }

    public function showlink($param1)
    {
        $data['livestream'] = $this->livestream->get_live_streaming($param1);
        $this->load->view('showlive', $data);
    }

    public function showadd()
    {
        if (!$this->user->Auth())
        {
            $this->session->set_userdata('error', 'Cannot create new livestream please login');
            redirect('/', 'refresh');

        }
        else
            $this->load->view('create_livestream');
    }

    public function insert()
    {

        if (!$this->user->Auth())
        {
            $this->session->set_userdata('error', 'Cannot create new livestream please login');
            redirect('/', 'refresh');
        }
        $data = $this->input->post();

        if ($this->livestream->insert_data($data))
        {
            $this->session->set_userdata('successful', 'Create new livestream successful');
            redirect('/', 'refresh');
        }
        else
        {
            $this->session->set_userdata('error', 'Error while creating livestream Please try again');
            redirect('/livestream/create', 'refresh');
        }
    }

    public function edit($param1)
    {
        if (!$this->user->Auth())
        {
            $this->session->set_userdata('error', 'Cannot create new livestream please login');
            redirect('/', 'refresh');

        }
        else
        {

            $data['livestream'] = $this->livestream->get_live_streaming($param1);

            $this->load->view('edit_livestream', $data);
        }

    }

    public function update()
    {
        $data = $this->input->post();
        if (!$this->user->Auth())
        {
            $this->session->set_userdata('error', 'Cannot create update livestream please login');
            redirect('/', 'refresh');

        }
        else
        {


            if ($this->livestream->update_live_streaming($data['id'], $data))
            {
                $name = $data['name'];
                $this->session->set_userdata('successful', "Update livestream  $name successful");
                redirect('/', 'refresh');
            }
            else
            {
                $this->session->set_userdata('error', 'Error while creating livestream Please try again');
                redirect('/livestream/create', 'refresh');
            }
        }
    }

    public function delete($param1)
    {

        $live = $this->livestream->get_live_streaming($param1);

        $this->livestream->delete_live_streaming($param1);
        $livename = $live['name'];
        $this->session->set_userdata('successful', "Delete livestream $livename  successful");
        redirect('/', 'refresh');
    }


}