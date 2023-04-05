<?php

namespace App\Form\Model;

class PropertySearch
{

    private $site;
    public function getSite()
    {
        return $this->site;
    }

    /**
     * @param mixed $site
     */
    public function setSite($site): void
    {
        $this->site = $site;
    }


    private $search;
    /**
     * @return mixed
     */
    public function getSearch()
    {
        return $this->search;
    }

    /**
     * @param mixed $search
     */
    public function setSearch($search): void
    {
        $this->search = $search;
    }

    /**
     * @return mixed
     */

    private $dateMax;

    /**
     * @return mixed
     */
    public function getDateMax()
    {
        return $this->dateMax;
    }
    /**
     * @param mixed $dateMax
     */
    public function setDateMax($dateMax): void
    {
        $this->dateMax = $dateMax;
    }



    private $dateMin;

    /**
     * @return mixed
     */
    public function getDateMin()
    {
        return $this->dateMin;
    }

    /**
     * @param mixed $dateMin
     */
    public function setDateMin($dateMin): void
    {
        $this->dateMin = $dateMin;
    }





}