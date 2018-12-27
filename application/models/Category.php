<?php
/**
 * Created by PhpStorm.
 * User: proms
 * Date: 12/22/2018
 * Time: 6:03 PM
 */

class category extends CI_Model
{

    public function getall_category()
    {
        //$this->db->where('category',1);
        $query = $this->db->get('categories');
        if ($query->num_rows() > 0)
        {
            foreach ($query->result() as $row)
            {

                $data[] = array(
                    'id' => $row->id,
                    'name' => $row->name,
                    'timestamp' => $row->timestamp
                );
            }

        }

//        die(print_r($data));
        return $data;
    }
    public function insert_data($data)
    {

        return $this->db->insert('categories', $data);
    }


    public function delete($post_id)
    {

        $this->db->order_by('timestamp', 'DESC');
        $query = $this->db->get('post');
        if ($query->num_rows() > 0)
        {
            foreach ($query->result_array() as $item)
            {
                $data[] = $item['id'];
            }

        }

        $this->db->where_in('language', $post_id);
        $this->db->delete('post');

        $this->db->where('id', $post_id);
        return $this->db->delete('categories');
    }
    public function update_cat($post_id, $data)
    {
        $this->db->where('id', $post_id);
        return $this->db->update('categories', $data);
    }
}