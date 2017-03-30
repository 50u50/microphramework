<?php

namespace Album\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="photos")
 */
class Photo
{

    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     *
     * @var int 
     */
    protected $id;

    /**
     * @ORM\Column(name="title", type="string", length=128)
     *
     * @var string 
     */
    protected $title;

    /**
     * @ORM\Column(name="original_name", type="string", length=128)
     *
     * @var string 
     */
    protected $originalName;

    /**
     * @ORM\Column(name="filename", type="string", length=32)
     *
     * @var string 
     */
    protected $filename;

    /**
     * Get array copy of object
     *
     * @return array
     */
    public function getArrayCopy()
    {
        return get_object_vars($this);
    }

    /**
     * Get photo id
     *
     * @ORM\return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get photo title
     *
     * @ORM\return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set photo title
     * 
     * @param string $title
     * @return $this
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get photo filename
     *
     * @ORM\return string
     */
    public function getFilename()
    {
        return $this->filename;
    }

    /**
     *  Set photo file's name
     * 
     * @param string $filename
     * @return $this
     */
    public function setFilename($filename)
    {
        $this->filename = $filename;

        return $this;
    }

    /**
     * Get photo original name
     *
     * @ORM\return string
     */
    public function getOriginalName()
    {
        return $this->originalName;
    }

    /**
     * Set photo original name
     * 
     * @param string $originalName
     * @return $this
     */
    public function setOriginalname($originalName)
    {
        $this->originalName = $originalName;

        return $this;
    }

}
