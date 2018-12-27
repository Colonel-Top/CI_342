<?php
/**
 * Created by PhpStorm.
 * User: proms
 * Date: 12/22/2018
 * Time: 6:03 PM
 */

class LiveStream extends CI_Model
{
    public function insert_data($data)
    {
        return $this->db->insert('live_streaming', $data);
    }

    public function get_all_liveStreaming()
    {
        $this->db->order_by('timestamp', 'DESC');
        $query = $this->db->get('live_streaming');
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $item) {
                $data[] = $item;
            }
            return $data;
        }
        return FALSE;
    }

    public function get_last_live_streaming()
    {
        $this->db->order_by('id', 'desc');
        $query = $this->db->get('live_streaming');
        if ($query->num_rows() > 0) {
            $data = $query->row_array();
            return $data;
        }
        return FALSE;
    }

    public function get_live_streaming($post_id)
    {
        $this->db->where('id', $post_id);
        $query = $this->db->get('live_streaming');
        if ($query->num_rows() > 0) {
            $data = $query->row_array();
            return $data;
        }
        return FALSE;
    }

    public function update_live_streaming($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('live_streaming', $data);
    }

    public function delete_live_streaming($id)
    {
//        echo($id);
        $this->db->where('id', $id);
        return $this->db->delete('live_streaming');
    }

    public function show_post_pagination($limit, $start)
    {
        if (empty($this->session->logged)) {
            $this->db->where('status', 'public');
        }
        $this->db->limit($limit, $start);
        $this->db->order_by('timestamp', 'DESC');
        $query = $this->db->get('live_streaming');

        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $item) {
                $data[] = $item;
            }
            return $data;
        }
        return FALSE;
    }

    public function get_no_of_data()
    {
        if (empty($this->session->logged)) {
            $this->db->where('status', 'public');
        }
        return $this->db->count_all_results('post');
    }

    public function getLanguagePost($language)
    {
        $this->db->where('language', $language);
        $query = $this->db->get('post');
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $item) {
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
        if ($query->num_rows() > 0) {
            $data = $query->row_array();
            return $data;
        }
    }

    public function update_livestream($post_id, $data)
    {
        $this->db->where('livestream', $post_id);
        return $this->db->update('livestream', $data);
    }
}