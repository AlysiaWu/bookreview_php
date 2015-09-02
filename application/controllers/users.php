<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// $this->output->enable_profiler();	
		$this->load->model('book_review');	
	}

	public function index()
	{
		$this->load->view('index');
	}
	
// ----------simple profile page of a user-------------------
 public function profile()
	{
 	if($this->session->userdata('user')['is_logged_in'])
		// if($user['is_logged_in'])
		{
			echo "You are now logged in! Click <a href = '/users/logout'>Here</a> to log out.";
		}else{
			redirect('/');
		}
	} 
// logout of the student
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('/');
	}

	
	public function registration()
	{		
		if($this->input->post()){

			$this->load->library('form_validation');
			$this->form_validation->set_rules("email", "Email", "required|valid_email");
			//----form_validation--------------------
			$this->form_validation->set_rules("password", "password", "required|min_length[8]");
		
			if($this->form_validation->run() === FALSE){

				$this->view_data['errors'] = validation_errors();
				$this->session->set_flashdata('errors2', $this->view_data['errors']);
				// var_dump($this->session->flashdata('errors2'));
				// die();
				redirect('/');
			} 
			else
			{
				$this->book_review->register($this->input->post());
				redirect('/');
				
			}
		}
	}
	public function login()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$user = $this->book_review->get_user_by_email($email);

		if($user['password'] == $password)
		{		
			$user = array(
				'id'=> $user['id'],
				'email' => $user['email'],
				'name' => $user['name'],
				'is_logged_in' => TRUE
				);
			$this->session->set_userdata('user', $user);	
			// $user = $this->session->userdata('user');
			$this->session->set_userdata('user_id', $user['id']);
			$this->session->userdata('user_id');
			// var_dump($this->session->userdata('user_id'));
			// die();		
			// redirect('users/books');
			$this->book_review->show_review();
			$reviews = $this->book_review->show_review();
			$this->load->view('books', array('reviews'=> $reviews));

		
		}else 
		{
			$this->session->set_flashdata("login_error", "Invalid email or password !");
			redirect('/');		
		}
	}

	public function add()
	{	
		$authors = $this->book_review->get_authors();	
		$this->load->view('add_bookreview', array('authors'=>$authors));
	}

	public function books()
	{		echo"hey";
			$this->book_review->show_review();
			$reviews = $this->book_review->show_review();
			$this->load->view('books', array('reviews'=> $reviews));
	}

	public function add_book_review()
	{	$post = $this->input->post();
		$book_id = $this->book_review->add_review($post);
		
		redirect('/users/get_reviews_by_id/'.$book_id);	
	}

	public function get_reviews_by_id($book_id){
	
		// var_dump($book_id);
		// die();
		// $this->book_review->get_reviews_by_id($id);
	
		$reviews=$this->book_review->get_reviews_by_id($book_id);
		// var_dump($reviews);
		// die();
		$this->load->view('show_one_book', array('reviews'=>$reviews));

	}
	public function delete($id){
	// {var_dump($id);

		$book_id = $this->book_review->delete($id);
		redirect('/users/get_reviews_by_id/'.$book_id['books_id']);

	}
	public function user_profile($user_id)
	{
		// var_dump($user_id);
		// die();
		$user_profile = $this->book_review->user_profile($user_id);
		// var_dump($user_profile);
		// die();
		$this->load->view('user_profile', array('user_profile'=>$user_profile));
	}




























}
//end of main controller