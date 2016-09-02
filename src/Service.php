<?php
namespace Dsc\MercadoLivre;

use Psr\Http\Message\StreamInterface;

/**
 * @author Diego Wagner <diegowagner4@gmail.com>
 */
class Service implements ServiceInterface
{
    /**
     * @var Credentials
     */
    private $credentials;

    /**
     * @var Client
     */
    private $client;

    /**
     * @param Credentials $credentials
     * @param Client $client
     */
    public function __construct(Credentials $credentials, Client $client = null)
    {
        $this->credentials = $credentials;
        $this->client      = $client ?: new Client();
    }

    /**
     * @return MeliInterface|string
     */
    public function getCredential()
    {
        return $this->credentials->getCredential();
    }

    /**
     * @return Environment
     */
    public function getEnvironment()
    {
        return $this->credentials->getEnvironment();
    }

    /**
     * @param $url
     * @param array $params
     */
    public function get($url, array $params)
    {
        $response = $this->client->get($url, $params);
        if($response->getStatusCode() == 200) {
            return $response->getBody();
        }
    }

    /**
     * @param string $url
     * @param array $params
     * @return StreamInterface
     */
    public function post($url, array $params)
    {
        $response = $this->client->post($url, $params);
        if($response->getStatusCode() == 200) {
            return $response->getBody();
        }
    }

    /**
     * @param $url
     * @param array $params
     */
    public function put($url, array $params)
    {
        // TODO: Implement put() method.
    }

    /**
     * @param $url
     * @param array $params
     */
    public function delete($url, array $params)
    {
        // TODO: Implement delete() method.
    }
}