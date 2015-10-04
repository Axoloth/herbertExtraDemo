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
	 * @ORM\Column 
	 * @Assert\Length(
     *      min = 2,
     *      max = 100
     * )
	 */
	protected $name;
	
	/**
	 * @ORM\Column 
	 * @Assert\Length(
     *      min = 2,
     *      max = 100
     * )
	 */
	protected $firstName;
	
	/**
	 * @ORM\Column(type="date", length=100)
	 * @Assert\Date()
	 */
	protected $dateNaissance;
	
	/**
	 * @ORM\Column(type="integer")
	 * @Assert\Type(type="digit")
     */
	protected $nbBook;
	
	
	
	
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
	