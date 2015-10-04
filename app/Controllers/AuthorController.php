<?php

namespace HerbertExtraDemo\Controllers;

use Axoloth\HerbertExtra\Controllers\ExtraController;
use Herbert\Framework\Http;
use HerbertExtraDemo\Models\Entity\Author;
use HerbertExtraDemo\Models\Form\AuthorForm;


class AuthorController extends ExtraController{
	
	public function __construct(){
		parent::__construct(null);
	}
	
	
	public function listAuthors(Http $http){
		// ajout de quelques CSS pour la pagination
		wp_enqueue_style( 'herbertExtraPaginationCSS', getRessourceDir(). 'css/pagination.css' );
		
		$repository = $this->entityManager->getRepository('HerbertExtraDemo\Models\Entity\Author');
		$result = $repository->findAllPaginate( $this->getPage($http), $this->nbByPage, "name", "asc");

		return view('@HerbertExtraDemo/authors/list.twig', [
            'authors' => $result['result'],
			'pagination' => $result['pagination']
        ]); 
	}
	
	
	public function askEditAuthor( $id, Http $http){
		$author = $this->entityManager->getRepository('HerbertExtraDemo\Models\Entity\Author')->find( $id );
		$form = $this->formFactory->create(new AuthorForm(), $author);

		return view('@HerbertExtraDemo/authors/form.twig', [
				'form' => $form->createView()
		]);
	}
	
	
	
	public function editAuthor(Http  $http){
		$author = new Author();
				
		$id=$http->get('formEditAuthors')['id'];

		$author = $this->entityManager->getRepository('HerbertExtraDemo\Models\Entity\Author')->find($id);
		
		$form = $this->formFactory->create(new AuthorForm(), $author);
		$form->handleRequest();
	
		if ( $form->isValid() ){
			$em = $this->entityManager;
			$em->persist($author);
			$em->flush();
			
			$msg="Mise &agrave; jour effectu&eacute;es";
		}
		else{
			$msg="Formulaire invalide ! ";
		}
	
		return view('@HerbertExtraDemo/authors/form.twig', [
				'author' => $author, 'form' => $form->createView(), 'msg'=>$msg
		]);
		
	}
}