## Laravel short link api
Сервис для сокращения url-адресов.

----

### Language & Framework Used:
1. PHP >= 8.2
1. Laravel 12.x

### Список API:
##### Authentication Module
1. [x] Регистрация пользователя
1. [x] Генерация токена пользователя
1. [x] Вход в api с токеном

##### Short link Module
1. [x] Генерация короткой ссылки

##### History short link Module
1. [x] Получение стастики переходов по коротной ссылке

### Запуск проекта:
1. Клонирование проекта -

```bash
git clone https://github.com/kovalevrabota/short-links.git
```
2. Создайте файлы `.env`, `.env.testing` и скопируйте в них содержимое файлов `.env.example`, `.env.testing.example`
3. Выполните команду
``` bash
composer install
```
4. Выполните команду
``` bash
php artisan migrate
```
5. Сгенерируйте ключ
``` bash
php artisan key:generate
```
6. Запустите проект
``` bash
php artisan serve
```
7. Откройте браузер -
   http://127.0.0.1:8000

### Демонстрация:
[Postman](https://grey-crescent-986327.postman.co/workspace/Team-Workspace~085bb21e-4da9-4b05-814c-7e4b9e6c3eca/request/17808623-35e3da03-8939-4d79-862d-07d54edac42e?action=share&creator=17808623&ctx=documentation)

### Примеры запросов:
###### Генерация короткой ссылки:
<a href="https://ibb.co/CK1gbg88"><img src="https://i.ibb.co/DfVh9hWW/Screenshot-1.png" alt="Screenshot-1" border="0"></a>

###### Регистрация пользователя:
<a href="https://ibb.co/SXgHX8v8"><img src="https://i.ibb.co/990B9LYL/Screenshot-2.png" alt="Screenshot-2" border="0"></a>

###### Получение токена:
<a href="https://ibb.co/LzwN69P1"><img src="https://i.ibb.co/hR5YH2MV/Screenshot-3.png" alt="Screenshot-3" border="0"></a>

###### Просмотр статистики:
<a href="https://ibb.co/7dbxnLSM"><img src="https://i.ibb.co/hJCxBwgQ/Screenshot-4.png" alt="Screenshot-4" border="0"></a>
