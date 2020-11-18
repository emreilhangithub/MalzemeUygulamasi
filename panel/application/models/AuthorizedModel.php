<?php 


class AuthorizedModel extends CI_Model
{

	public function __construct()

	{

	parent::__construct(); // tumunde etli olması için 
 
 	$this->table = "authorized"; // thhis tanımaladık ve room_category yerine artık bunu basacaz ekrana 

	}
	
	 public function select($where = array(), $select = '*')
    {
        $this->db->select()
            ->from($this->table)
            ->where($where);        

        $results = $this->db->get()->result();

        return $results;
    }


    public function delete($where=array())

    {

    $delete = $this->db
    ->where($where)
    ->delete($this->table);

    return $delete;

    }

    public function insert($data=array())
    {
    $insert = $this->db->insert($this->table,$data);

    return $insert;
    
    }

	public function edit($where)
    {

        $geridon =  $this->db->where($where)->get($this->table)->row();

        return $geridon;        
    }

        public function update($where=array(),$data=array())
    {

        $geridon =  $this->db->where($where)->update($this->table,$data);

        return $geridon;        
    }
    
   	






}