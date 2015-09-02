<?php
class User extends CI_Model {


	public function register($post)
	{
		$en_password = md5($post['password']);

		$login_query = "INSERT INTO users (first_name, last_name, email, password, confirm_password) VALUES (?, ?, ?, ?, ?)";
		$this->db->query($login_query, array($post['first_name'], $post['last_name'], $post['email'], $en_password, $post['confirm_password']));

	}
	public function get_user_by_email($email)

	{
		$query= "SELECT * FROM users WHERE email = ?";

		return $this->db->query($query, array($email))->row_array();
	}
	}
	?>