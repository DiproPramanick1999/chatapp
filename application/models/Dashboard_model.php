<?php
/**
 *
 */
class Dashboard_model extends CI_Model
{
  function getTeachers()
  {
    $query = $this->db->query("SELECT * from users where type='teacher'");
    $teachers = array();
    if($query->num_rows()>0){
        foreach ($query->result() as $key => $value) {
          $x = array(
            "name" => $value->name,
            "email" => $value->email,
            "phone" => $value->phone,
            "dept" => $value->dept,
            "photo" => $value->photo,
          );
          array_push($teachers,$x);
        }
    }
    return $teachers;
  }

  function askQuestion($arr)
  {
    $this->db->insert("questions",$arr);
    $query = $this->db->query("SELECT * from questions order by id desc limit 1");
    if($query->num_rows()>0){
        $id = -1;
        foreach ($query->result() as $key => $value) {
          $id = $value->id;
        }
        return $id;
    }
  }
}

 ?>
