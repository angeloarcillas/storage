# Laravel
<details>
<summary>sqlite database</summary>

1. enable extension [ pdo_sqlite, sqlite3 ]
2. mkdir database/database.sqlite
3. change DB_CONNECTION=sqlite then remove DB_*
</details>
<details>
<summary>Optimize</summary>

- php artisan config:cache
- php artisan route:cache
- php artisan optimize --force
- composer dumpautoload -o

- Remove Unused Service
- Limit Included Libraries
- JIT Compiler
- Choose a Fast Cache and Session driver
- Cache Queries Results (Cache::remember())
- Use CDN for Delivering Static Assets
- Assets Bundling && Assets Minified
</details>