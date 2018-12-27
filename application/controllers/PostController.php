<?php
/**
 * Created by PhpStorm.
 * User: proms
 * Date: 12/22/2018
 * Time: 6:06 PM
 */

class PostController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        include 'construct.php';
    }

    public function showcreate()
    {
        if (!$this->user->Auth())
        {
            $this->session->set_userdata('error', 'Cannot create new post please login');
            redirect('/', 'refresh');

        }
        else
        {
            $data['categories'] = $this->category->getall_category();
            $this->load->view('create_post', $data);
        }
    }

    public function showedit($param1)
    {
        if (!$this->user->Auth())
        {
            $this->session->set_userdata('error', 'Cannot edit this post please login');
            redirect('/', 'refresh');

        }
        else
        {
            $data['post'] = $this->post->get_post($param1);
            $data['categories'] = $this->category->getall_category();

            $this->load->view('edit_post', $data);
        }
    }

    public function update()
    {
        $data = $this->input->post();
        if (!$this->user->Auth())
        {
            $this->session->set_userdata('error', 'Cannot update post please login');
            redirect('/', 'refresh');
        }
        else
        {
            $query = "";
            foreach($data['url'] as $item)
            {
                $query.= $item.";";
            }
            $data['url']=$query;
            if ($this->post->update_post($data['id'], $data))
            {
                $name = $data['name'];
                $this->session->set_userdata('successful', "Update post  $name successful");
                redirect('/', 'refresh');
            }
            else
            {
                $this->session->set_userdata('error', 'Error while update post Please try again');
                $data['post'] = $this->post->get_post($data['id']);
                $data['categories'] = $this->category->getall_category();
                $this->load->view('edit_post', $data);
            }
        }

    }

    public function insert()
    {
        if (!$this->user->Auth())
        {
            $this->session->set_userdata('error', 'Cannot create new post please login');
            redirect('/', 'refresh');
        }
        $data = $this->input->post();
        $query = "";
        foreach ($data['url'] as $item)
        {
            $query .= $item . ";";
        }
        $data['url'] = $query;
//        $tmp = "";

//        foreach($data['language'] as $item)
//        {
//            $tmp .= $item.";";
//        }

//        $data['language'] = $tmp;

        if ($this->post->insert_data($data))
        {
            $this->session->set_userdata('successful', 'Create new post successful');
            redirect('/', 'refresh');
        }
        else
        {
            $this->session->set_userdata('error', 'Error while creating post Please try again');
            redirect('/post/addpost', 'refresh');
        }
    }

    public function view($id)
    {
        $data['post'] = $this->post->get_post($id);
        $data['results'] = $this->comment->getCommentFromPostID($id);
        $config = array();
        $config["base_url"] = base_url() . "/post/$id/";
        $config["total_rows"] = $this->comment->countCommentFromPostID($id);


        $config["per_page"] = 5;
        $config["uri_segment"] = 3;
//        $config['num_links'] = 5;
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;


        $config['use_page_numbers'] = TRUE;

        $this->pagination->initialize($config);
        $data["results"] = $this->comment->
        fetch_product($config["per_page"], $page, $id);

        $data["links"] = $this->pagination->create_links();
//    die(print_r($data["results"]));

        $this->load->view('showpost', $data);
    }

    public function viewpagin($id, $pagin)
    {
        $data['post'] = $this->post->get_post($id);
        $data['results'] = $this->comment->getCommentFromPostID($id);
        $config = array();
        $config["base_url"] = base_url() . "/post/$id/";
        $config["total_rows"] = $this->comment->countCommentFromPostID($id);


        $config["per_page"] = 5;
        $config["uri_segment"] = 3;
//        $config['num_links'] = 5;
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;


        $config['use_page_numbers'] = TRUE;

        $this->pagination->initialize($config);
        $data["results"] = $this->comment->
        fetch_product($config["per_page"], 5 * ($pagin - 1), $id);

        $data["links"] = $this->pagination->create_links();
//    die(print_r($data["results"]));

        $this->load->view('showcomment', $data);
    }


    public function delete($post_id)
    {
        $this->load->model('post');
        if ($this->post->delete_post($post_id))
        {
            $this->session->set_userdata('successful', 'Delete post successful');
            redirect('/', 'refresh');
        }
        else
        {
            $this->session->set_userdata('Error', 'Delete new post Error!');
            redirect('/', 'refresh');
        }
        $this->load->view('index');
    }
}