<?php 


class AuthorizedModel extends CI_Model
{

	public function __construct()

	{

	parent::__construct(); // tumunde etli olması için 
 
 	$this->table = "authorized"; // thhis tanımaladık ve room_category yerine artık bunu basacaz ekrana 

	}
	
	 public function select($where)
    {
        $this->db->select("*");
        $this->db->from("authorized");
        $this->db->where($where);
        $this->db->join('supplier', 'supplierid  = authorized.supplier_id');
        return $this->db->get()->result(); 
    }

     public function tekselect($where=array()){

        $tekselect = $this->db->where($where)->get($this->table)->row();

        return $tekselect;
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

        $this->db->select("*");
        $this->db->from("authorized");
        $this->db->where($where);
        $this->db->join('supplier', 'supplierid  = authorized.supplier_id');
        return $this->db->get()->row();         
    }

        public function update($where=array(),$data=array())
    {

        $geridon =  $this->db->where($where)->update($this->table,$data);

        return $geridon;        
    }
    
   	






}