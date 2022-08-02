<h3> Mailer - zadanie rekrutacyjne </h3>

1) Instalacja: 
```bash
    git clone https://github.com/pbenedyk/sempai-mailer.git
    composer install
    npm install && npm run prod
```
2) Konfiguracja .env:
```bash
QUEUE_CONNECTION=database

MAIL_DRIVER=smtp
MAIL_HOST=your.host.com
MAIL_PORT=587
MAIL_USERNAME=mail@example.com
MAIL_PASSWORD=YourImportantPassword
MAIL_FROM_ADDRESS=from@mail.com
MAIL_FROM_NAME=Your Real Name
```

3) Migracja i uruchomienie workera:
```bash
    php artisan migrate
    php artisan queue:work 
 ```


<h4> Materiały dodatkowe: </h4>

DEMO: https://sempai.piotrbenedyk.pl/
Swagger API: https://app.swaggerhub.com/apis/KONTAKT_2/Sempai/1.0.0



