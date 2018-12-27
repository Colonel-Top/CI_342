<?php
/**
 * Created by PhpStorm.
 * User: proms
 * Date: 12/22/2018
 * Time: 6:03 PM
 */

class Post extends CI_Model
{
    public function insert_data($data)
    {
        return $this->db->insert('post', $data);
    }

    public function get_all_posts()
    {
        $this->db->order_by('timestamp', 'DESC');
        $query = $this->db->get('post');
        if ($query->num_rows() > 0)
        {
            foreach ($query->result_array() as $item)
            {
                $data[] = $item;
            }
            return $data;
        }
        return FALSE;
    }

    public function get_post($post_id)
    {
        $this->db->where('id', $post_id);
        $query = $this->db->get('post');
        if ($query->num_rows() > 0)
        {
            $data = $query->row_array();
            return $data;
        }
        return FALSE;
    }
    public function countUserPost($users_id)
    {
        $this->db->where('users_id', $users_id);
        $query = $this->db->get('post');
        if ($query->num_rows() > 0)
        {
            return $this->db->count_all_results('post');
        }
        return FALSE;
    }
    public function countUserComment($users_id)
    {
        $this->db->where('users_id', $users_id);
        $query = $this->db->get('comment');
        if ($query->num_rows() > 0)
        {
            return $this->db->count_all_results('comment');
        }
        return FALSE;
    }

    public function countUserLive($users_id)
    {
        $this->db->where('users_id', $users_id);
        $query = $this->db->get('live_streaming');
        if ($query->num_rows() > 0)
        {
            return $this->db->count_all_results('live_streaming');
        }
        return FALSE;
    }

    public function update_post($post_id, $data)
    {
        $this->db->where('id', $post_id);
        return $this->db->update('post', $data);
    }

    public function delete_post($post_id)
    {
        $this->db->where('post_id', $post_id);
        $this->db->delete('comment');
        $this->db->where('id', $post_id);
        return $this->db->delete('post');
    }

    public function show_post_pagination($limit, $start)
    {
        if (empty($this->session->logged))
        {
            $this->db->where('status', 'public');
        }
        $this->db->limit($limit, $start);
        $this->db->order_by('timestamp', 'DESC');
        $query = $this->db->get('post');

        if ($query->num_rows() > 0)
        {
            foreach ($query->result_array() as $item)
            {
                $data[] = $item;
            }
            return $data;
        }
        return FALSE;
    }

    public function get_no_of_data()
    {
        if (empty($this->session->logged))
        {
            $this->db->where('status', 'public');
        }
        return $this->db->count_all_results('post');
    }

    public function getLanguagePost($language)
    {
        $this->db->where('language', $language);
        $query = $this->db->get('post');
        if ($query->num_rows() > 0)
        {
            foreach ($query->result_array() as $item)
            {
                $data[] = $item;
            }
            return $data;
        }
        return false;
    }
    public function countByLanguage($id)
    {


        $this->db->where('language', $id);

        return $this->db->count_all_results('post');
    }
    public function getLanguage($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('categories');
        if ($query->num_rows() > 0)
        {
            $data = $query->row_array();
            return $data;
        }
    }
    public function deletepost($post_id)
    {
        $this->db->where('post_id', $post_id);
        return $this->db->delete('post');
    }

}