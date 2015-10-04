<?php
namespace HerbertExtraDemo\Models\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;


class AuthorForm extends AbstractType {
	
	public function buildForm( FormBuilderInterface $builder, array $options) {
		$builder 
				->add('id', null, array('read_only' => true))
				->add('name', 'text', array('required' => true, 'trim' => true))
           		->add('firstName', 'text', array('required' => true,'trim' => true))
           		->add('dateNaissance', 'date')
           		->add('nbBook', 'text')
           		
				->add('save', 'submit')
				->setAction( getRouteUrl('HerbertExtraDemo::editAuthor', 'POST') )	
				;
	}
	
	
	public function getDefaultOptions(array $options) {
		return array(
			'data_class' => 'HerbertExtraDemo\Models\Entity\Author',
			'csrf_protection' => true,
            'csrf_field_name' => '_token',
		);
	}
	
	public function getName() {
		return 'formEditAuthors';
	}
}