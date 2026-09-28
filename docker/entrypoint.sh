#!/bin/sh
set -e

echo "Waiting for PostgreSQL at ${DB_HOST}:${DB_PORT}..."
tries=0
until php -r 'new PDO(sprintf("pgsql:host=%s;port=%s;dbname=%s", getenv("DB_HOST"), getenv("DB_PORT"), getenv("DB_DATABASE")), getenv("DB_USERNAME"), getenv("DB_PASSWORD"));' > /dev/null 2>&1; do
    tries=$((tries + 1))
    if [ "$tries" -gt 30 ]; then
        echo "Database is not reachable, giving up." >&2
        exit 1
    fi
    sleep 2
done

echo "Running migrations and seeding..."
php artisan migrate --force --seed

php artisan config:cache
php artisan route:cache
php artisan view:cache

exec "$@"
