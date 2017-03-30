<?php

namespace Album\Controller;

use Album\Resource\PhotoResource;

class PhotoController
{

    /**
     *
     * @var Album\Resource\PhotoResource 
     */
    protected $photoResource;

    public function __construct(PhotoResource $photoResource)
    {
        $this->photoResource = $photoResource;
    }
    
    public function indexAction()
    {
        
    }

}
