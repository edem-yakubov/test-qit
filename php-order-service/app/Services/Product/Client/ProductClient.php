<?php

namespace App\Services\Product\Client;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\GuzzleException;

readonly class ProductClient
{

    private string $baseUri;
    private ClientInterface $client;

    public function __construct(
        string  $baseUri,
        ?string $client = null
    )
    {
        $this->baseUri = $baseUri;

        if (!$client) {
            $this->client = new Client();
        }
    }

    /**
     * Retrieves a product by its ID from the product service.
     * @throws GuzzleException
     */
    public function getProduct(int $productId): array
    {
        $json = $this->client->get("$this->baseUri/product/$productId")->getBody()->getContents();
        return json_decode($json, true);
    }
}
