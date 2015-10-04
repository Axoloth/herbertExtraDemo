<?php

namespace HerbertExtraDemo\Models\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Tools\Pagination\Paginator;

class AuthorRepository extends EntityRepository {
	
	public function findAllPaginate( $pageNum=1, $nbByPage=10, $order = "name", $orderSens = "ASC") {
		if ($pageNum<1) $pageNum=1;
		
		$offset = ($pageNum-1) * $nbByPage;
		
		$articles_count =  $this->getEntityManager()
			->createQuery( 'SELECT count(p) FROM HerbertExtraDemo\Models\Entity\Author p ' )
			->getSingleScalarResult();
		
		$pagination = array(
				'page' => $pageNum,
				'pages_count' => ceil($articles_count / $nbByPage),
		);
		
		$query = $this->getEntityManager()
			->createQuery( 'SELECT p FROM HerbertExtraDemo\Models\Entity\Author p ' )
			->setFirstResult( $offset )
			->setMaxResults($nbByPage);
			
		return array(
				'result' => new Paginator( $query, false ),
				'pagination' => $pagination
				);

	}
	
	/*
	public function ListAction($page)
	{
		$maxArticles = $this->container->getParameter('max_articles_per_page');
		
		$articles_count = $this->getDoctrine()
		->getRepository('SimaDemoBundle:Article')
		->countPublishedTotal();
		$pagination = array(
				'page' => $page,
				'route' => 'article_list',
				'pages_count' => ceil($articles_count / $maxArticles),
				'route_params' => array()
		);
		 
		$articles = $this->getDoctrine()->getRepository('SimaDemoBundle:Article')
		->getList($page, $maxArticles);
		 
		return $this->render('SimaDemoBundle:Article:list.html.twig', array(
				'articles' => $articles,
				'pagination' => $pagination
		));
	}
	
	*/
}