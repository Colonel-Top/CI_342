<?php
/**
 * Created by PhpStorm.
 * User: proms
 * Date: 12/22/2018
 * Time: 6:06 PM
 */

class CommentController  extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        include 'construct.php';
    }

    public function insert()
    {
        $data = $this->input->post();

        if (!$this->user->Auth())
        {
            $this->session->set_userdata('error', 'Cannot reply please login');
            $referred_from = $this->session->userdata('referred_from');
            redirect($referred_from, 'refresh');
        }
        $query = "";
        foreach($data['type'] as $item)
        {
            $query.= $item.";";
        }
        $data['type']=$query;

        if ($this->comment->insert_data($data))
        {
            $this->session->set_userdata('successful', 'Reply successful');
            $postnum = $data['post_id'];
//            die(print_r($postnum));

            $referred_from = $this->session->userdata('referred_from');
            redirect($referred_from, 'refresh');
        }
        else
        {
            $this->session->set_userdata('error', 'Error while creating Reply Please try again');
            $referred_from = $this->session->userdata('referred_from');
            redirect($referred_from, 'refresh');
        }
    }
    public function edit($param1)
    {
        if (!$this->user->Auth())
        {
            $this->session->set_userdata('error', 'Cannot edit this comment please login');
            redirect('/', 'refresh');

        }
        else
        {
            $data['comment'] = $this->comment->get_comment($param1);
            $data['categories'] = $this->category->getall_category();

            $this->load->view('edit_comment', $data);
        }
    }

    public function delete($post_id)
    {
        $this->load->model('comment');
        if ($this->comment->delete($post_id))
        {
            $this->session->set_userdata('successful', 'Delete comment successful');
            $referred_from = $this->session->userdata('referred_from');
            redirect($referred_from, 'refresh');
        }
        else
        {
            $this->session->set_userdata('Error', 'Delete new comment Error!');
            $referred_from = $this->session->userdata('referred_from');
            redirect($referred_from, 'refresh');
        }

    }

    public function update()
    {
        $data = $this->input->post();
        if (!$this->user->Auth())
        {
            $this->session->set_userdata('error', 'Cannot update comment please login');
            redirect('/', 'refresh');
        }
        else
        {
            $query = "";
            foreach($data['type'] as $item)
            {
                $query.= $item.";";
            }
            $data['type']=$query;
            if ($this->comment->update_comment($data['id'], $data))
            {
                $name = $data['name'];
                $this->session->set_userdata('successful', "Update comment  $name successful");
                $referred_from = $this->session->userdata('referred_from');
                redirect($referred_from, 'refresh');
            }
            else
            {
                $this->session->set_userdata('error', 'Error while update comment Please try again');
                $referred_from = $this->session->userdata('referred_from');
                redirect($referred_from, 'refresh');
            }
        }
    }

}