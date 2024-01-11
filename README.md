Aplikacja do zarządzania fakturami.

## Uruchomienie:
1. Pobierz repozytorium
2. Skopiuj zawartość pliku .env.example do .env
2. W katalogu głównym uruchom polecenie `docker compose up -d`
3. Kolejno w kontenerze formsoft-php-1 wykonaj polecenia:
    - `composer install`
    - `php artisan migrate`
    - `php artisan db:seed --class=InvoiceTableSeeder`
4. Aplikacja jest gotowa do użycia pod adresem http://localhost:8080

## Uwaga:
W razie potrzeby zmiany uprawnień w katalogach, należy nadać uprawnienia zapisu do odpowiedniego katalogu, bądź z uwagi na fakt, że jest to środowisko lokalne można zmienić uprawnienia rekurencyjnie dla calej zawartości katalogu html poleceniem 
chmod 775 -R html w kontenerze formsoft-php-1.
