# Yandex-Translate-API-DevelNext-

Подключить пакет "Yandex Translate API" и "HTTP Client".

Пример использования:

```php
use bundle\yandextranslate\YandexTranslate;

$yandex = new YandexTranslate('youre token');
$yandex->translate("Hello yandex!", "en-ru"); // Вернет переведенный текст, или произойдет иключение
```

Токен получить [тут](https://tech.yandex.ru/keys/get/?service=trnsl)

Версия 0.2

	Добавлено
		- Исклюения.

	Изменено
		- Метод translate больше не возвращает статус запроса.
		- В случае ошибки произойдет исключение, которое вернет описание текущей ошибки.