<?php

class DenemeModel extends CI_Model {

 public function get_categories(){

        $this->db->select('*');
        $this->db->from('deneme');
        $this->db->where('parent_id', 0);

        $parent = $this->db->get();
        
        $deneme = $parent->result();
        $i=0;
        foreach($deneme as $p_cat){

            $deneme[$i]->abc = $this->sub_categories($p_cat->id);
            $i++;
        }
        return $deneme;
    }

    public function sub_categories($id){

        $this->db->select('*');
        $this->db->from('deneme');
        $this->db->where('parent_id', $id);

        $child = $this->db->get();
        $deneme = $child->result();
        $i=0;
        foreach($deneme as $p_cat){

            $deneme[$i]->def = $this->sub_categories($p_cat->id);
            $i++;
        }
        return $deneme;       
    }


}