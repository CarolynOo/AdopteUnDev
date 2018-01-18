<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\JobRepository")
 */
class Job
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected $id;

  	
  	/**
  	*
  	*@ORM\Column(type="string", length=255)
  	*/
  	protected $title;


  	/**
  	*
  	*@ORM\Column(type="string", length=255)
  	*/



  	protected $description;

    /**
     * @ORM\Column(type="integer")
     */
  	protected $categories;

    /**
     * @return mixed
     */
    public function getCategories()
    {
        return $this->categories;
    }

    /**
     * @param mixed $categories
     */
    public function setCategories($categories): Job
    {
        $this->categories = $categories;
        return $this;
    }



    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title): void
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description): void
    {
        $this->description = $description;
    }





}
