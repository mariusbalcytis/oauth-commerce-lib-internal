<?php


namespace Maba\OAuthCommerceInternalClient\Entity;

use Maba\OAuthCommerceClient\Entity\SignatureCredentials;

class ClientCredentials
{
    /**
     * @var int
     */
    protected $clientId;

    /**
     * @var string
     */
    protected $credentialsId;

    /**
     * @var \Maba\OAuthCommerceClient\Entity\SignatureCredentials
     */
    protected $signatureCredentials;

    /**
     * @var string[]
     */
    protected $permissions;

    public static function create()
    {
        return new static();
    }

    /**
     * @param $data
     *
     * @throws \RuntimeException
     * @return static
     */
    public static function fromArray($data)
    {
        if (!isset($data['id'])) {
            return $data;
        }
        /** @var $clientCredentials ClientCredentials */
        $clientCredentials = new static();
        $clientCredentials->clientId = $data['clientId'];
        $clientCredentials->credentialsId = $data['id'];
        $clientCredentials->permissions = isset($data['permissions']) ? (array)$data['permissions'] : array();

        $credentials = new SignatureCredentials();
        $credentials->setAlgorithm($data['signParams']['type']);
        $credentials->setMacKey($data['signParams']['secret']);
        $credentials->setMacId($data['id']);
        $clientCredentials->signatureCredentials = $credentials;

        return $clientCredentials;
    }

    public function toArray()
    {
        return array(
            'clientId' => $this->getClientId(),
        );
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
     * @param string $credentialsId
     *
     * @return $this
     */
    public function setCredentialsId($credentialsId)
    {
        $this->credentialsId = $credentialsId;

        return $this;
    }

    /**
     * @return string
     */
    public function getCredentialsId()
    {
        return $this->credentialsId;
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