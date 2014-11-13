<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends DF_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('homescreen/header');

		$this->load->model('get/All_items');

		$categories = $this->All_items->categories();

		$categoryCount = count($categories);

		//Validate that there are items in the database.
		if($categoryCount)
		{
			//Build category buttons
			for($i=0; $i<$categoryCount;$i++)
			{
				$data['categoryName'] = $categories[$i]->category;
				$this->load->view('homescreen/category',$data);
			}
			//Close the categories class
			$this->load->view('homescreen/items_header');

			//Build items by category
			for($i=0; $i<$categoryCount;$i++)
			{
				$categoryItems = $this->All_items->by_category_name($categories[$i]->category);

				$itemsCount = count($categoryItems);
				for($j=0; $j<$itemsCount; $j++)
				{
					$this->load->view('homescreen/item', $categoryItems[$j]);
				}
				
			}
		}
		else
		{
			//No items found, close the categories tags and open items tags. Items tags will be closed on homescreen_footer
			$this->load->view('homescreen/items_header');
		}

		$this->load->view('homescreen/footer');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */