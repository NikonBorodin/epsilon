<?php
namespace Acme;

class Auth
{
	public $access_token;

	private $sess;
	private $client_id;
	private $client_secret;

	public function __construct( &$sess, $client_id, $client_secret )
	{
		$this->sess = &$sess;
		$this->client_id = $client_id;
		$this->client_secret = $client_secret;
	}

	public function handle()
	{
		if ( empty( $this->sess['access_token'] ) ) {
			$this->getAccessToken();
		}

		if ( $this->sess['expires_in'] < time() ) {
			$this->refreshToken();
		}

		$this->access_token = $this->sess['access_token'];
	}

	private function getAccessToken()
	{
		$arr_data = array(
			"grant_type"    => 'client_credentials',
			"client_id"     => $this->client_id,
			"client_secret" => $this->client_secret,
		);
		
		$api = new Api();
		$make_call = $api->call( 'POST', 'https://demo.infiny.cloud/api/oauth2/access-token', json_encode( $arr_data ) );
		$response  = json_decode( $make_call, true );

		echo "<pre>".print_r( $response, true )."</pre>\n";
		
		if ( count($response) < 1 ) {
			die( 'no actionable response' );
		}
		
		$this->sess['access_token'] = $response['access_token'];
		$this->sess['expires_in'] = time() + $response['expires_in'];
		$this->sess['refresh_token'] = $response['refresh_token'];
		
		$this->access_token = $response['access_token'];
	}
	
	private function refreshToken()
	{
		$arr_data = array(
			"refresh_token"    => $_SESSION['refresh_token'],
			"grant_type"    => 'refresh_token',
			"client_id"     => $this->client_id,
			"client_secret" => $this->client_secret,
		);
		
		$api = new Api();
		$make_call = $api->call( 'POST', 'https://demo.infiny.cloud/api/oauth2/refresh-token', json_encode( $arr_data ) );
		$response  = json_decode( $make_call, true );
	
		$this->sess['access_token'] = $response['access_token'];
		$this->sess['expires_in'] = time() + $response['expires_in'];
		$this->sess['refresh_token'] = $response['refresh_token'];

		$this->access_token = $response['access_token'];
	}
}
