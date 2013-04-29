<?php

namespace Maba\OAuthCommerceInternalClient;

use Maba\OAuthCommerceClient\OAuthCommerceClient;
use Maba\OAuthCommerceInternalClient\Entity\ClientCredentials;
use Guzzle\Http\Url;

class OAuthCommerceInternalClient extends OAuthCommerceClient
{

    /**
     * @param ClientCredentials $client
     *
     * @return ClientCredentials
     */
    public function createCredentials(ClientCredentials $client)
    {
        $response = $this->client
            ->post('credentials')
            ->setBody(json_encode($client->toArray()), 'application/json')
            ->send()
            ->json()
        ;
        return ClientCredentials::fromArray($response);
    }

    /**
     * @param integer $id
     *
     * @return ClientCredentials
     */
    public function getCredentials($id)
    {
        $response = $this->client
            ->get('credentials/' . $id)
            ->send()
            ->json()
        ;
        return ClientCredentials::fromArray($response);
    }

    /**
     * @param integer $clientId
     *
     * @return ClientCredentials[]
     */
    public function getCredentialsByClientId($clientId)
    {
        $response = $this->client
            ->get(Url::factory('credentials')->setQuery(array('clientId' => $clientId)))
            ->send()
            ->json()
        ;
        $result = array();
        foreach ($response as $clientResponse) {
            $result[] = ClientCredentials::fromArray($clientResponse);
        }
        return $result;
    }

    /**
     * @param integer $clientId
     */
    public function removeCredentialsByClientId($clientId)
    {
        $this->client
            ->delete(Url::factory('credentials')->setQuery(array('clientId' => $clientId)))
            ->send()
        ;
    }

    /**
     * @param integer $id
     */
    public function removeCredentials($id)
    {
        $this->client
            ->delete('credentials/' . $id)
            ->send()
        ;
    }
}