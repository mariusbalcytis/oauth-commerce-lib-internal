<?php


namespace Maba\OAuthCommerceInternalClient\Entity;

use Maba\OAuthCommerceClient\Entity\SignatureCredentials;

class ClientCredentials
{
    /**
     * @var string
     */
    protected $id;

    /**
     * @var int
     */
    protected $clientId;

    /**
     * @var string[]
     */
    protected $permissions = array();

    /**
     * @var \Maba\OAuthCommerceClient\Entity\SignatureCredentials
     */
    protected $signatureCredentials;


    public static function create()
    {
        return new static();
    }

    /**
     * @param int $clientId
     *
     * @return $this
     */
    public function setClientId($clientId)
    {
        $this->clientId = $clientId;

        return $this;
    }

    /**
     * @return int
     */
    public function getClientId()
    {
        return $this->clientId;
    }

    /**
     * @param string $id
     *
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    public function setPermissions($permissions)
    {
        $this->permissions = $permissions;

        return $this;
    }

    public function getPermissions()
    {
        return $this->permissions;
    }

    /**
     * @param \Maba\OAuthCommerceClient\Entity\SignatureCredentials $signatureCredentials
     *
     * @return $this
     */
    public function setSignatureCredentials($signatureCredentials)
    {
        $this->signatureCredentials = $signatureCredentials;

        return $this;
    }

    /**
     * @return \Maba\OAuthCommerceClient\Entity\SignatureCredentials
     */
    public function getSignatureCredentials()
    {
        return $this->signatureCredentials;
    }
}