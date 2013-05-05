<?php


namespace Maba\OAuthCommerceInternalClient\DependencyInjection;

use Maba\OAuthCommerceClient\MacSignature\RsaAlgorithm;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\DefinitionDecorator;
use Symfony\Component\DependencyInjection\Extension\ExtensionInterface;
use Symfony\Component\DependencyInjection\Reference;
use Symfony\Component\DependencyInjection\Exception\InvalidArgumentException;

class InternalClientExtension implements ExtensionInterface
{
    /**
     * Loads a specific configuration.
     *
     * @param array            $config    An array of configuration values
     * @param ContainerBuilder $container A ContainerBuilder instance
     *
     * @throws InvalidArgumentException When provided tag is not defined in this extension
     * @api
     */
    public function load(array $config, ContainerBuilder $container)
    {
        $container
            ->register(
                'maba_oauth_commerce.normalizer.client_credentials',
                'Maba\OAuthCommerceInternalClient\Normalizer\ClientCredentialsNormalizer'
            )
            ->setArguments(array(new Reference('maba_oauth_commerce.algorithm_manager')))
            ->addTag('maba_oauth_commerce.normalizer')
            ->setPublic(false)
        ;
        $container
            ->setDefinition(
                'maba_oauth_commerce.client.internal',
                new DefinitionDecorator('maba_oauth_commerce.base_client')
            )
            ->setClass('Maba\OAuthCommerceInternalClient\OAuthCommerceInternalClient')
        ;
    }

    /**
     * Returns the namespace to be used for this extension (XML namespace).
     * @return string The XML namespace
     * @api
     */
    public function getNamespace()
    {
        return $this->getAlias();
    }

    /**
     * Returns the base path for the XSD files.
     * @return string The XSD base path
     * @api
     */
    public function getXsdValidationBasePath()
    {
        return false;
    }

    /**
     * Returns the recommended alias to use in XML.
     * This alias is also the mandatory prefix to use when using YAML.
     * @return string The alias
     * @api
     */
    public function getAlias()
    {
        return 'maba_oauth_commerce_internal_client';
    }
}