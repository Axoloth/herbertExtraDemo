<?php
/**
 * 
 */
namespace HerbertExtraDemo\Models\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Mapping\ClassMetadata;



/**
 * @ORM\Entity(repositoryClass="HerbertExtraDemo\Models\Repository\AuthorRepository")
 * @ORM\Table(name="author")
 */
class Author{
	
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	public $id;
	
	/**
	 * @ORM\Column(type="string", length=100)
	 */
	protected $name;
	
	/**
	 * @ORM\Column(type="string", length=100)
     * Assert\Email()
	 */
	protected $firstName;
	
	/**
	 * @ORM\Column(type="date", length=100)
	 * 
	 */
	protected $dateNaissance;
	
	/**
	 * @ORM\Column(type="integer")
     */
	protected $nbBook;
	
	
	
	public static function loadValidatorMetadata(ClassMetadata $metadata){
		$metadata->addPropertyConstraint('name', new Assert\NotBlank());
		// And a valid name is 5-50 characters long
		$metadata->addPropertyConstraint('name', new Assert\Length(
				array('min' => 5, 'max' => 50)
				));
		// Add more rules here as needed.
	}
	
	
	public function getId() {
		return $this->id;
	}
	
	public function getName() {
		return $this->name;
	}
	public function setName($name) {
		$this->name = $name;
		return $this;
	}
	public function getFirstName() {
		return $this->firstName;
	}
	public function setFirstName($firstName) {
		$this->firstName = $firstName;
		return $this;
	}
	public function getDateNaissance() {
		return $this->dateNaissance;
	}
	public function setDateNaissance($dateNaissance) {
		$this->dateNaissance = $dateNaissance;
		return $this;
	}
	public function getNbBook() {
		return $this->nbBook;
	}
	public function setNbBook($nbBook) {
		$this->nbBook = $nbBook;
		return $this;
	}
	
	
	
}
	