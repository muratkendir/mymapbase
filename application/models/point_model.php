<?php
class Point_model extends CI_Model
{
	public function __construct() 
	{
		parent::__construct();
	}
	function insert_point()
	{
		$title = $this->input->post('title');
		$frame_to_add = $this->input->post('editable_frames');
		$public_private = $this->input->post('public_private');
		$point_point = $this->input->post('point_lonlat');
		$user_id = $this->input->post('user_id');
		echo $public_private;
		$sql = "INSERT INTO 0__point
			(title, frame_id, public_private, point_point, owner_id) 
			VALUES (
				'$title', 
				$frame_to_add, 
				$public_private, 
				GeomFromText('$point_point'), 
				$user_id
			)";
		
		$this->db->query($sql);
	}
	function update_point($point_id)
	{
		$title = $this->input->post('title');
		$frame_to_add = $this->input->post('editable_frames');
		$public_private = $this->input->post('public_private');
		$point_point = $this->input->post('point_long')." ".$this->input->post('point_lat');
		$user_id = $this->input->post('user_id');

		$sql = "UPDATE 0__point 
			SET
				title = '$title', 
				frame_id = $frame_to_add, 
				public_private = $public_private, 
				point_point = GeomFromText('POINT($point_point)'), 
				owner_id = $user_id 
			WHERE 
				id = $point_id 
			";
		
		$this->db->query($sql);
	}
	
	public function list_editable_frames() 
	{
		$user_id = $this->session->userdata('user_id');
		$result = $this->db->query
			('SELECT id, title FROM `0__frame` WHERE owner_id = '.$user_id)
			->result_array();
		$dropdown = array();
		foreach($result as $row)
		{
			$dropdown[$row['id']] = $row['title'];
		}
		return $dropdown;
	}
	public function view_points($per_page)
	{
		$this->db->select('id, title, frame_id, AsText(point_point)');
		$this->db->where('owner_id', $this->session->userdata('user_id'));
		$this->db->order_by('id', 'desc');
		$query = $this->db->get('0__point', $per_page, $this->uri->segment(3));
		if ($query->num_rows() > 0)
		{
			return $query->result_array();
		}
		else {return NULL;}
	}
	function show_point($point_id)
	{	
		$query = $this->db->query
			('SELECT id, title, frame_id, public_private, AsText(point_point) FROM 0__point WHERE id ='.$point_id);
		
		return $query->row_array();
	}
	function show_points($frame_id)
	{	
		$query = $this->db->query
			('SELECT id, title, frame_id, AsText(point_point) FROM 0__point WHERE frame_id ='.$frame_id);
		if ($query->num_rows() > 0)
		{
			foreach ($query->result_array() as $row)
			{
				$data[] = $row;
			}
			return $data;
		}
		else {return NULL;}
	}
	function list_all_points_of_user($user_id)
	{
		$this->db->select('id, title, frame_id');
		$this->db->where('owner_id', $user_id);
		$query = $this->db->get('0__point');
		return $query->result();
	}
	function delete_point($point_id)
	{
		$this->db->where('id', $point_id);
		$this->db->delete('0__point');
	}
}
