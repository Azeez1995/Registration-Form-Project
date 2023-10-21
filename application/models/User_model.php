<?php
class User_model extends CI_Model
{

  function create($formArray)
  {
    $this->db->insert('crud_table', $formArray); //INSERT INTO crud_table(name.email) VALUES (?,?);
  }

  function all()
  {
    return $users = $this->db->get('crud_table')->result_array();
  }

  function getUser($userid)
  {
    $this->db->where('id', $userid);
    return $user = $this->db->get('crud_table')->row_array();
  }

  function updateuser($userid, $formArray)
  {
    $this->db->where('id', $userid);
    $this->db->update('crud_table', $formArray);
  }

  function deleteUser($userid)
  {
    $this->db->where('id', $userid);
    $this->db->delete('crud_table');
  }

  
}
