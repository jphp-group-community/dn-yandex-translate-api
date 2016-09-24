<?php
	namespace bundle\yandextranslate;
	
	/**
	 * Абстрактный класс помошник
	 */
	abstract class Y_API {
        /**
         * response code
         * @var int success
         */
		const SUCCESS = 200;

        /**
         * @var string
         */
		protected $token = null;

        /**
         * @var HttpClient
         */
		protected $http = null;





        /**
         * Заменяет значения в строке key(replace) value(replacement)
         * @param array $replace
         * @return string
         */
        final protected function urlReplacer ($replace) {

			$keys = array_map('strtoupper', array_keys($replace));
			return str_replace($keys, $replace, static::BASE_URL);

		}

        /**
         * Отправка POST запроса
         * @param $url
         * @param $translateString
         * @return string
         * @throws \bundle\yandextranslate\YandexTranslateException
         */
        final protected function httpPost ($url, $translateString) {

			$httpResponse = $this->http->post($url, ["text" => trim($translateString)]);

			$json = json_decode($httpResponse->body(), true);

			if(is_array($json) && $json['code'] == self::SUCCESS) {
				return $json['text'][0];
			}

            Throw new YandexTranslateException( $json['code'] );

		}




	}