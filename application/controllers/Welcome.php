
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
		// echo "<pre>";
		// print_r($finalData);

	public function __construct()
    {
        parent::__construct();
		$this->load->database();
        $this->load->helper('url');
		$this->load->model('GetQuery');  // Load the model	


    }
	public function index()	
	{
		$finalData['mainNav'] = $this->GetQuery->getNavData();
		$finalData['blogs'] = $this->GetQuery->getBlogs();
		$finalData['tabCard'] = $this->GetQuery->tabCard();

		// echo "<pre>";
		// print_r($finalData['tabCard']);
		$this->load->view('index', $finalData);
	}
		
	public function product($title){	
		$originalText = $title;
		$cleanedText = str_replace('-', ' ', $originalText);
		$finalData['mainNav'] = $this->GetQuery->getNavData(); 
		$finalData['softData'] = $this->GetQuery->getJoinedSoftwareData($cleanedText);
		// echo "<pre>";
		// print_r($finalData['softData']);

		$this->load->view('product', $finalData);
	}

	public function addSoftware() {
        $this->load->helper('form');
        $this->load->library('form_validation'); // Set rules for each field
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('relation', 'Relation', 'required');
        $this->form_validation->set_rules('logo', 'Logo', 'required');
        $this->form_validation->set_rules('download_url', 'Download URL', 'required');
        $this->form_validation->set_rules('company', 'Company', 'required');
        $this->form_validation->set_rules('free', 'Free', 'required');
        $this->form_validation->set_rules('specifications', 'Specifications', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('Assets/addsoftware');
        } else {
			$finalData = $this->GetQuery->AddSoftware(); 
			// echo "<pre>";
			// print_r($finalData);
            $this->load->view('Assets/addsoftware');


			
        }
    }
	
	

	

}