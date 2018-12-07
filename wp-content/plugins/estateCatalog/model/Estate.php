<?php

class Estate
{
    protected $id;
    protected $title;
    protected $description;
    protected $image;
    protected $url;
    protected $estateType;
    protected $dialType;
    protected $city;
    
    public function __construct($id, $title, $description, $image, $url, $estateType, $dialType, $city)
    {
        $this->$id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->image = $image;
        $this->url = $url;
        $this->estateType = $estateType;
        $this->dialType = $dialType;
        $this->city = $city;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @return mixed
     */
    public function getEstateType()
    {
        return $this->estateType;
    }

    /**
     * @return mixed
     */
    public function getDialType()
    {
        return $this->dialType;
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }
}