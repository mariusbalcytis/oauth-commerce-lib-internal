<?php


namespace Maba\OAuthCommerceInternalClient\Normalizer;

use Maba\OAuthCommerceClient\MacSignature\AlgorithmManager;
use Maba\OAuthCommerceInternalClient\Entity\ClientCredentials;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class ClientCredentialsNormalizer implements NormalizerInterface, DenormalizerInterface
{
    /**
     * @var AlgorithmManager
     */
    protected $algorithmManager;


    public function __construct(AlgorithmManager $algorithmManager)
    {
        $this->algorithmManager = $algorithmManager;
    }


    /**
     * Denormalizes data back into an object of the given class
     *
     * @param mixed  $data    data to restore
     * @param string $class   the expected class to instantiate
     * @param string $format  format the given data was extracted from
     * @param array  $context options available to the denormalizer
     *
     * @return object
     */
    public function denormalize($data, $class, $format = null, array $context = array())
    {
        return ClientCredentials::create()
            ->setClientId($data['client_id'])
            ->setCredentialsId($data['id'])
            ->setPermissions(isset($data['permissions']) ? (array)$data['permissions'] : array())
            ->setSignatureCredentials(
                $this->algorithmManager->createSignatureCredentials($data['signature_credentials'])
            )
        ;
    }

    /**
     * Checks whether the given class is supported for denormalization by this normalizer
     *
     * @param mixed  $data   Data to denormalize from.
     * @param string $type   The class to which the data should be denormalized.
     * @param string $format The format being deserialized from.
     *
     * @return Boolean
     */
    public function supportsDenormalization($data, $type, $format = null)
    {
        return $data instanceof ClientCredentials;
    }

    /**
     * Normalizes an object into a set of arrays/scalars
     *
     * @param object $object  object to normalize
     * @param string $format  format the normalization result will be encoded as
     * @param array  $context Context options for the normalizer
     *
     * @return array|scalar
     */
    public function normalize($object, $format = null, array $context = array())
    {
        /** @var ClientCredentials $object */
        return array(
            'client_id' => $object->getClientId(),
        );
    }

    /**
     * Checks whether the given class is supported for normalization by this normalizer
     *
     * @param mixed  $data   Data to normalize.
     * @param string $format The format being (de-)serialized from or into.
     *
     * @return Boolean
     */
    public function supportsNormalization($data, $format = null)
    {
        return $data instanceof ClientCredentials;
    }

}