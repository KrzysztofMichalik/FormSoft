Aplikacja typu CRUD do zarządzania fakturami.

## Uruchomienie:
1. Pobierz repozytorium
2. Skopiuj zawartość pliku .env.example do .env
2. W katalogu głównym uruchom polecenie `docker compose up -d`
3. Kolejno w kontenerze formsoft-php-1 wykonaj polecenia:
    - `composer install`
    - `php bin/console doctrine:migrations:migrate`
    - `php artisan db:seed --class=InvoiceTableSeeder`
4. Aplikacja jest gotowa do użycia pod adresem http://localhost:8080

