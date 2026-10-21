# Konfigurasi environment

Tambahkan nilai berikut ke file `.env` lokal (jangan commit file tersebut):

```dotenv
APP_NAME="Toko Setia"
APP_LOCALE=id
APP_FALLBACK_LOCALE=id
APP_TIMEZONE=Asia/Jakarta

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=toko_setia
DB_USERNAME=root
DB_PASSWORD=

AI_SETIA_BASE_URL=https://api.openai.com/v1
AI_SETIA_API_KEY=
AI_SETIA_MODEL=gpt-4o-mini
```

Tambahkan pada `config/services.php` di kerangka Laravel:

```php
'ai_setia' => [
    'base_url' => env('AI_SETIA_BASE_URL', 'https://api.openai.com/v1'),
    'key' => env('AI_SETIA_API_KEY'),
    'model' => env('AI_SETIA_MODEL', 'gpt-4o-mini'),
],
```

Kemudian jalankan `php artisan migrate --seed` setelah `ServiceSeeder::class` ditambahkan ke `DatabaseSeeder`.
