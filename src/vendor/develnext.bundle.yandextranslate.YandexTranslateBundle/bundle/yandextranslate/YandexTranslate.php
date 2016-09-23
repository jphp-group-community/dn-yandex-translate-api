<?php
	namespace bundle\yandextranslate;

	use 
		bundle\http\HttpResponse,
		bundle\http\HttpClient;

	/**
	 * Class YandexTranslate
	 */
	class YandexTranslate extends Y_API {
		const HOST = "https://translate.yandex.net/";
		const BASE_URL = 'api/v1.5/tr.json/translate?key={API_KEY}&lang={LANG}&format=plain';

		public function __construct ($token) {
			$token = trim($token);

			if(isset($token) && !empty($token)) {
				$this->token = $token;
				$this->http = new HttpClient();
			} else {
				Throw new YandexTranslateException( YandexTranslateException::EMPTY_API_KEY );
			}
		}

		public function translate ($translateString, $lang = "en-ru") {
			$url = self::HOST . $this->urlReplacer([
						'{API_KEY}' => $this->token,
						'{LANG}' => $lang
					]);

			return $this->httpPost($url, $translateString);
		}
	}