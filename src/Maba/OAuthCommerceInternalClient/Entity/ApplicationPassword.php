<?php


namespace Maba\OAuthCommerceInternalClient\Entity;


class ApplicationPassword
{
    /**
     * @var integer
     */
    protected $id;

    /**
     * @var integer
     */
    protected $applicationId;

    /**
     * @var string
     */
    protected $secret;


    public static function create()
    {
        return new static();
    }

    /**
     * @param int $applicationId
     *
     * @return $this
     */
    public function setApplicationId($applicationId)
    {
        $this->applicationId = $applicationId;

        return $this;
    }

    /**
     * @return int
     */
    public function getApplicationId()
    {
        return $this->applicationId;
    }

    /**
     * @param int $id
     *
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $secret
     *
     * @return $this
     */
    public function setSecret($secret)
    {
        $this->secret = $secret;

        return $this;
    }

    /**
     * @return string
     */
    public function getSecret()
    {
        return $this->secret;
    }


}