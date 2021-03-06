<?php

namespace Maba\OAuthCommerceInternalClient;

use Maba\OAuthCommerceClient\BaseClient;
use Maba\OAuthCommerceClient\Command;
use Maba\OAuthCommerceInternalClient\Entity\ApplicationPassword;
use Maba\OAuthCommerceInternalClient\Entity\ClientCredentials;
use Maba\OAuthCommerceInternalClient\Entity\AccessTokenCode;
use Guzzle\Http\Url;

class InternalClient extends BaseClient
{
    /**
     * @param AccessTokenCode $code
     *
     * @return Command<string>
     */
    public function createCode(AccessTokenCode $code)
    {
        return $this->createCommand()
            ->setRequest($this->client->post('code'))
            ->setBodyEntity($code, 'json')
        ;
    }

    /**
     * @param ClientCredentials $client
     *
     * @return Command<ClientCredentials>
     */
    public function createCredentials(ClientCredentials $client)
    {
        return $this->createCommand()
            ->setRequest($this->client->post('credentials'))
            ->setBodyEntity($client, 'json')
            ->setResponseClass('Maba\OAuthCommerceInternalClient\Entity\ClientCredentials')
        ;
    }

    /**
     * @param integer $id
     *
     * @return Command<ClientCredentials>
     */
    public function getCredentials($id)
    {
        return $this->createCommand()
            ->setRequest($this->client->get('credentials/' . $id))
            ->setResponseClass('Maba\OAuthCommerceInternalClient\Entity\ClientCredentials')
        ;
    }

    /**
     * @param integer $clientId
     *
     * @return Command<ClientCredentials[]>
     */
    public function getCredentialsByClientId($clientId)
    {
        return $this->createCommand()
            ->setRequest($this->client->get(Url::factory('credentials')->setQuery(array('clientId' => $clientId))))
            ->setResponseClass('Maba\OAuthCommerceInternalClient\Entity\ClientCredentials[]')
        ;
    }

    /**
     * @param integer $clientId
     *
     * @return Command
     */
    public function removeCredentialsByClientId($clientId)
    {
        return $this->createCommand()
            ->setRequest($this->client->delete(Url::factory('credentials')->setQuery(array('clientId' => $clientId))))
        ;
    }

    /**
     * @param integer $id
     *
     * @return Command
     */
    public function removeCredentials($id)
    {
        return $this->createCommand()
            ->setRequest($this->client->delete('credentials/' . $id))
        ;
    }

    /**
     * @param ApplicationPassword $application
     *
     * @return Command<ApplicationPassword>
     */
    public function createApplicationPassword(ApplicationPassword $application)
    {
        return $this->createCommand()
            ->setRequest($this->client->post('application'))
            ->setBodyEntity($application, 'json')
            ->setResponseClass('Maba\OAuthCommerceInternalClient\Entity\ApplicationPassword')
        ;
    }

    /**
     * @param integer $id
     *
     * @return Command<ApplicationPassword>
     */
    public function getApplicationPassword($id)
    {
        return $this->createCommand()
            ->setRequest($this->client->get('application/' . $id))
            ->setResponseClass('Maba\OAuthCommerceInternalClient\Entity\ApplicationPassword')
        ;
    }

    /**
     * @param integer $applicationId
     *
     * @return Command<ApplicationPassword[]>
     */
    public function getCredentialsByApplicationId($applicationId)
    {
        return $this->createCommand()
            ->setRequest(
                $this->client->get(Url::factory('application')->setQuery(array('applicationId' => $applicationId)))
            )
            ->setResponseClass('Maba\OAuthCommerceInternalClient\Entity\ApplicationPassword[]')
        ;
    }

    /**
     * @param integer $applicationId
     *
     * @return Command
     */
    public function removeCredentialsByApplicationId($applicationId)
    {
        return $this->createCommand()
            ->setRequest(
                $this->client->delete(Url::factory('application')->setQuery(array('applicationId' => $applicationId)))
            )
        ;
    }

    /**
     * @param integer $id
     *
     * @return Command
     */
    public function removeApplicationPassword($id)
    {
        return $this->createCommand()
            ->setRequest($this->client->delete('application/' . $id))
        ;
    }
}