<?php

namespace BirdBundle\Controller;

use FOS\RestBundle\Controller\Annotations\Post;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller {
	/**
	 * @Route("/", name="bird")
	 * @Template("default/index.html.twig")
	 */
	public function indexAction() {
		$birds  = $this->get('search_bird')->FindBirdsEncodeJson();
		return [
			'birds'  => $birds
		];
	}

	/**
	 * @Route("/json", name="json_birds")
	 * @Method("GET")
	 */
	public function jsonDatas()
	{
		$birds  = $this->get( 'search_bird' )->FindBirdsEncodeJson();
		return new JsonResponse($birds);
	}

	/**
	 * @Route("/nouvelle_observation", name="add_observation")
	 * @Template("default/new_observation.html.twig")
	 */
	public function addObservationAction(Request $request)
	{
		$form = $this->get('add_bird')->ajaxFrom();
		return ['form' => $form];
	}
}
