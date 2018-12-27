<?php
/**
 * Created by PhpStorm.
 * User: proms
 * Date: 12/22/2018
 * Time: 6:03 PM
 */

class Comment extends CI_Model
{
    public function insert_data($data)
    {
        return $this->db->insert('comment', $data);
    }

    public function getCommentFromPostID($id)
    {
        $this->db->where('post_id', $id);
        $query = $this->db->get('comment');
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
    public function update_comment($post_id, $data)
    {
        $this->db->where('id', $post_id);
        return $this->db->update('comment', $data);
    }

    public function get_comment($post_id)
    {
        $this->db->where('id', $post_id);
        $query = $this->db->get('comment');
        if ($query->num_rows() > 0)
        {
            $data = $query->row_array();
            return $data;
        }
        return FALSE;
    }
    public function delete($post_id)
    {
        $this->db->where('id', $post_id);
        return  $this->db->delete('comment');
    }
    public function getLastCommentFromPostID($id)
    {
        $this->db->where('post_id', $id);
        $this->db->order_by('id','desc');
        $this->db->limit(1);
        $query = $this->db->get('comment');
        if ($query->num_rows() > 0)
        {
            return $query->row_array();
        }
        return false;
    }
    public function countCommentFromPostID($id)
    {
        $this->db->where('post_id', $id);
        return $this->db->count_all_results('comment');

    }

    public function fetch_product($limit, $start,$id) {
//        echo($limit." *\n* ".$start." *\n *".$id."*\n*");
        $this->db->limit($limit, $start);
        $this->db->where('post_id', $id);
        $query = $this->db->get('comment');
//        die(print_r($query->result_array()));
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $data[] = $row;
            }

            return $data;
        }
        return false;
    }

}