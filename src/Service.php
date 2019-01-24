<?php
namespace Acme;

class Service
{
	private $token;

	public function __construct( $token )
	{
		$this->token = $token;
	}

	public function getAll()
	{
		$api = new Api();
		return json_decode( $api->call( 'GET', 'https://demo.infiny.cloud/api/services', null, $this->token ), true );
	}
	
	function get( $id )
	{
		$id = (int) $id;
		$api = new Api();

		return json_decode( $api->call( 'GET', 'https://demo.infiny.cloud/api/services/'.$id.'/service', null, $this->token ), true );
	}
}
