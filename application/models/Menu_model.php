<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu_model extends CI_model
{
	
	public function getSubMenu()
	{
		$query = "SELECT `user_sub_menu`.*, `user_menu`.`menu`
				  FROM `user_sub_menu` JOIN `user_menu`
				  ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
				  ORDER BY `user_menu`.`sequence`, `user_sub_menu`.`submenu_sequence`
				";
		return $this->db->query($query)->result_array();
	}

	public function getSubMenubyId($id)
	{
		$query = "SELECT `user_sub_menu`.*, `user_menu`.`menu`
				  FROM `user_sub_menu` JOIN `user_menu`
				  ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
				  AND `user_sub_menu`.`id` = '$id' ORDER BY `user_menu`.`sequence`
				";
		return $this->db->query($query)->row_array();
	}
}