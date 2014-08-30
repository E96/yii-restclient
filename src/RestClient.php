<?php
// vim: sw=4:ts=4:noet:sta:

/**
 * Клиент для REST
 *
 * @method mixed get($url, $data = null, $extraHeaders = [ ]) send GET
 * @method mixed put($url, $data = null, $extraHeaders = [ ]) send PUT
 * @method mixed post($url, $data = null, $extraHeaders = [ ]) send POST
 * @method mixed delete($url, $data = null, $extraHeaders = [ ]) send DELETE
 */
class RestClient extends CApplicationComponent {
	public $baseUrl;
	public $timeout = 5;

	/**
	 * @var array дополнительные заголовки к каждому запросу (header=>value)
	 */
	public $extraHeaders = [ ];

	public function __call($method, $args) {
		if (in_array(strtoupper($method), [ 'GET', 'PUT', 'POST', 'DELETE' ])) {
			$params = array_merge([ $method ], $args);
			return call_user_func_array([ $this, 'send' ], $params);
		}
	}

	private function send($requestType, $url, $data = null, $extraHeaders = [ ]) {

		$extraHeaders = array_merge($this->extraHeaders, $extraHeaders);

		$request = new \Curl\Request($this->baseUrl . $url);
		$request->timeout = $this->timeout;
		$request->headers = $extraHeaders;
		$request->requestType = strtoupper($requestType);

		if ($data) {
			$request->headers['Content-Type'] = 'application/json';
			$request->data = json_encode($data);
		}

		$response = $request->exec();
		if ($response->contentType == 'application/json') {
			return json_decode($response->data);
		} else {
			return $response->data;
		}
	}
}
