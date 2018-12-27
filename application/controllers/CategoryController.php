<?php
/**
 * Created by PhpStorm.
 * User: proms
 * Date: 12/23/2018
 * Time: 7:25 PM
 */

class CategoryController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        include 'construct.php';
    }

    public function add()
    {

        if (!$this->user->Auth())
        {
            $this->session->set_userdata('error', 'Cannot create new post please login');
            redirect('/', 'refresh');

        }
        else
        {
            $data = $this->input->post();
            if ($this->category->insert_data($data))
            {
                $this->session->set_userdata('successful', 'Added new category: ' . $data['name']);
                redirect('/', 'refresh');
            }
            else
            {
                $this->session->set_userdata('error', 'Cannot create new categories please try again');
                redirect('/', 'refresh');
            }
        }


    }

    public function update()
    {
        $data = $this->input->post();

        if (!$this->user->Auth())
        {
            $this->session->set_userdata('error', 'Cannot update Category please login');
            redirect('/', 'refresh');
        }
        else
            if ($this->category->update_cat($data['id'], $data))
            {
                $name = $data['name'];
                $this->session->set_userdata('successful', "Update Category  $name successful");
                redirect('/', 'refresh');
            }
            else
            {
                $this->session->set_userdata('error', 'Error while update post Please try again');
                redirect('/', 'refresh');
            }
    }


    public function delete($post_id)
    {
        $this->load->model('category');
        if ($this->category->delete($post_id))
        {
            $this->session->set_userdata('successful', 'Delete category successful');
            $referred_from = $this->session->userdata('referred_from');
            redirect('/', 'refresh');
        }
        else
        {
            $this->session->set_userdata('Error', 'Delete category Error!');
            $referred_from = $this->session->userdata('referred_from');
            redirect($referred_from, 'refresh');
        }

    }

}