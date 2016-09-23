<?php
	namespace bundle\yandextranslate;

	use bundle\yandextranslate\YandexTranslateException;
	
	/**
	 * Class Y_API
	 */
	abstract class Y_API {
		const SUCCESS = 200;

		protected $token = null;
		protected $http = null;

		final protected function urlReplacer ($replace) {

			$keys = array_map('strtoupper', array_keys($replace));
			return str_replace($keys, $replace, static::BASE_URL);

		}


		final protected function httpPost ($url, $translateString) {

			$httpResponse = $this->http->post($url, ["text" => $translateString]);

			$json = json_decode($httpResponse->body(), true);

			if($json['code'] == self::SUCCESS) {
				return $json[text][0];
			} else {
				Throw new YandexTranslateException( $json['code'] );
			}

		}
	}