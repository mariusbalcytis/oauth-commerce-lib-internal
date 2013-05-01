<?php

namespace Maba\OAuthCommerceInternalClient;

use Maba\OAuthCommerceClient\BaseClient;
use Maba\OAuthCommerceClient\Command;
use Maba\OAuthCommerceInternalClient\Entity\ClientCredentials;
use Guzzle\Http\Url;

class OAuthCommerceInternalClient extends BaseClient
{
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
}