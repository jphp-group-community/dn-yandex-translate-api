<?php
	namespace bundle\yandextranslate;

	use php\framework\Logger;

	/**
	 * Class YandexTranslateException
	 */
	class YandexTranslateException extends \Exception {

		// FIXME: mb delete this constansts?
		const
			BAD_API_KEY 					= 401,
			BLOCK_API_KEY 					= 402,
			EXCEEDED_LIMIT_ON_DAY		 	= 404,
			EXCEEDED_TEXT_LENGTH 			= 413,
			TEXT_DONT_CAN_BE_TRANSLATE 		= 422,
			TRANLSATE_NOT_SUPPORTED 		= 501,
			UNDEFINED_ERROR 				= 0,
			EMPTY_API_KEY					= 1;

		private $_message = [
			'401' => "Неправильный API-ключ",
			'402' => "API-ключ заблокирован",
			'404' => "Превышено суточное ограничение на объем переведенного текста",
			'413' => "Превышен максимально допустимый размер текста",
			'422' => "Текст не может быть переведен",
			'501' => "Заданное направление перевода не поддерживается",
			'0'   => "Неизвестная ошибка",
			'1'   => "API ключ пустой",
		];




		final public function __construct($errorCode = 200) {

			if(array_key_exists($errorCode, $this->_message)) {
				parent::__construct($this->_message[$errorCode], $errorCode);
			} else {
				parent::__construct(self::UNDEFINED_ERROR, $errorCode);
			}

		}
	}