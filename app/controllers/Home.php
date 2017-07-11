<?php
namespace Controller;

use \Controller\Controller;
use \QFram\Template;
use \Model\Mapper;

/**
* Home Controller
*/
class Home extends Controller
{
	public function show()
	{
		$page = new Template('page');
		$page->language = "fr";
		$page->scripts = array(
			'#',
		);

		$page->title = "Billet simple pour l'Alaska";
		$page->stylesheets = array(
			'https://fonts.googleapis.com/css?family=Inconsolata:700|Lato:300,400|Merriweather:300',
			'/vendors/font-awesome-4.7.0/css/font-awesome.min.css',
			'/vendors/normalize/normalize.css',
			'/assets/css/main.css',
		);

		$db = new \PDO('mysql:host=localhost;dbname=project3', 'root', 'root');

		$episodes_manager = new Mapper\Episodes($db);

		$episodesView = new Template('episodes');
		$episodesView->episodes = $episodes_manager->getList();

		$page->view = $episodesView->render();

		echo $page->render();
	}
}
