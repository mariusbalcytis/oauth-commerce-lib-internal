<?php


namespace Maba\OAuthCommerceInternalClient;

use Guzzle\Service\Client;
use Maba\OAuthCommerceClient\BaseClientFactory;

class InternalClientFactory extends BaseClientFactory
{
    protected function constructClient(Client $guzzleClient)
    {
        return new InternalClient($guzzleClient, $this->serializer);
    }

}