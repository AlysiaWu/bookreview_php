<?php
class Book_review extends CI_Model {

	
	public function register($post)
	{	
		// $en_password = md5($post['password']);
	
		$login_query = "INSERT INTO users (name, Alias, email, password) VALUES (?, ?, ?, ?)";
		$this->db->query($login_query, array($post['name'], $post['Alias'], $post['email'], $post['password']));

	}
	public function get_user_by_email($email)
	{	
		$query= "SELECT * FROM users WHERE email = ?";
		return $this->db->query($query, array($email))->row_array();		
	}
	public function show_review(){		
		$query = "SELECT users_id, books.id, books.title, review. review, users.Alias, review.rating, review. created_at FROM review LEFT JOIN users ON review.users_id = users.id
					left join books on review.books_id = books.id";
		return $this->db->query($query)->result_array();
	}

	public function get_authors()
	{
		$get_authors= "SELECT author from books";
		return $this->db->query($get_authors)->result_array();
	}

	public function add_review($post)
	{   
		$find_book = "SELECT books.Title FROM books WHERE books.Title = ?";
		$find_book= $this->db->query($find_book, array($post['title']))->row_array();
		if (empty($find_book)){
			$add_book = "INSERT INTO books (Title, author) VALUES(?, ?)";
			$this->db->query($add_book, array($post['title'], $post['author']));
		}
		$get_id = "SELECT id FROM books WHERE Title = ?";
		$book_id = $this->db->query($get_id, array($post['title']))->row_array();	
		$book_id=intval($book_id['id']);
		$add_review = "INSERT INTO review (users_id, books_id, review, rating) VALUES (?, ?, ?, ?)";
		$this->db->query($add_review, array($this->session->userdata('user_id'), $book_id, $post['review'], $post['rating']));
		return $book_id;	
	}
	public function get_reviews_by_id($book_id)
	{	
		$get_reviews_by_id = "SELECT review.id, author, review.created_at, title, rating, users.Alias, users_id, review FROM review LEFT JOIN books ON review.books_id = books.id 
							LEFT JOIN users ON users.id = review.users_id where books_id= ?";		
	 	return $this->db->query($get_reviews_by_id, array($book_id))->result_array();
	}


	public function delete($id)
	{  
		$book_id = "SELECT books_id FROM review WHERE id = ?";
		$book_id = $this->db->query($book_id, array($id))->row_array();
		$delete_query = "DELETE FROM review WHERE id = ?";
		$this->db->query($delete_query, array($id));
		return $book_id;
	
	}

	public function user_profile($user_id)
	{
		$query = "SELECT users.Alias, users.name, users.email, review, books.Title, books.id
			FROM users
			LEFT JOIN review ON review.users_id=users.id
			LEFT JOIN books ON review.books_id = books.id
			WHERE users_id = ?";
		return $this->db->query($query, array($user_id))->result_array();		
	}



















	}
	?>