<?php

namespace RazorCreations\Tanda;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Client;
use RazorCreations\Tanda\Resources\User;

class APIClient {

	private $client;
	private $token;

	public function __construct(string $token = null, ClientInterface $client = null)
	{
		$config = [
			'base_uri' => 'https://my.tanda.co/api/',
			'timeout' => 10,
		];
		$this->client = $client ?? new Client($config);
		
		if($token) {
			$this->setToken($token);
		}
	}

	/**
	 * Sets the auth token used to access the API
	 * 
	 * @see https://my.tanda.co/api/v2/documentation#header-authentication-(authorization-code)
	 *
	 * @param string $token
	 * @return static
	 */
	public function setToken(string $token): self
	{
		$this->token = $token;

		return $this;
	}

	/**
	 * Returns the default headers merged with any custom headers passed in as args.
	 *
	 * @param array $headers
	 * @return array
	 */
	private function getHeaders(array $headers = []): array
	{
		if ($this->token) {
			$headers['Authorization'] = "bearer $this->token";
			$headers['Content-Type'] = 'application/json';
		}

		return $headers;
	}
	
	/**
	 * Makes a request to the API and returns the results as decoded JSON.
	 *
	 * @param string $method
	 * @param string $uri
	 * @param array $config
	 * @return array
	 */
	protected function request(string $method, string $uri, array $config = []): array
	{
		$config['headers'] = $this->getHeaders($config['headers'] ?? []);
		
		$response = $this->client->request($method, $uri, $config);
		
		return json_decode($response->getBody(), true);
	}

	/**
	 * Returns information about all visible users.
	 * 
	 * @see https://my.tanda.co/api/v2/documentation#staff-&#40;users&#41;-user-list-get
	 *
	 * @return void
	 */
	public function getAllUsers(): array
	{
		return array_map(function(array $user) {
			return User::fromArray($user);
		}, $this->request('GET', 'v2/users'));
	}

	public function getSchedules(string $from, string $to): array
	{
		return $this->request('GET', 'v2/schedules', [
			'query' => [
				'include_names' => true,
				'from' => $from,
				'to' => $to,
			]
		]);
	}
}