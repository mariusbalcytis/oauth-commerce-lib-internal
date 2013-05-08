<?php


namespace Maba\OAuthCommerceInternalClient\Entity;


class AccessTokenCode
{
    /**
     * @var string[]
     */
    protected $scopes = array();

    /**
     * @var int
     */
    protected $userId;

    /**
     * @var int
     */
    protected $credentialsId;

    /**
     * @var \DateTime
     */
    protected $expires;

    /**
     * @var string
     */
    protected $redirectUri;


    public static function create()
    {
        return new static();
    }

    /**
     * @param \DateTime $expires
     *
     * @return $this
     */
    public function setExpires($expires)
    {
        $this->expires = $expires;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getExpires()
    {
        return $this->expires;
    }

    /**
     * @param int $credentialsId
     *
     * @return $this
     */
    public function setCredentialsId($credentialsId)
    {
        $this->credentialsId = $credentialsId;

        return $this;
    }

    /**
     * @return int
     */
    public function getCredentialsId()
    {
        return $this->credentialsId;
    }

    /**
     * @param string $redirectUri
     *
     * @return $this
     */
    public function setRedirectUri($redirectUri)
    {
        $this->redirectUri = $redirectUri;

        return $this;
    }

    /**
     * @return string
     */
    public function getRedirectUri()
    {
        return $this->redirectUri;
    }

    /**
     * @param string[] $scopes
     *
     * @return $this
     */
    public function setScopes($scopes)
    {
        $this->scopes = $scopes;

        return $this;
    }

    /**
     * @return array|string[]
     */
    public function getScopes()
    {
        return $this->scopes;
    }

    /**
     * @param int $userId
     *
     * @return $this
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * @return int
     */
    public function getUserId()
    {
        return $this->userId;
    }


}
