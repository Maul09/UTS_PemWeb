➜  ~ ls
docker-compose.yml  latihan_file    pemweb          praktikum_linux    srukdat
file.txt            latihan_pemweb  pemweb-anraa    salinan_file1.txt  strukdat
file2.txt           mywebapp        pemweb-gen2024  snap
➜  ~ cd pemweb
➜  pemweb git:(main) ✗ mkdir pert5
➜  pemweb git:(main) ✗ ls
pert1  pert2  pert3  pert4  pert5  pertem4  pertemuan4  portofolio1  week-4
➜  pemweb git:(main) ✗ code .
➜  pemweb git:(main) ✗ cd pert5
➜  pert5 git:(main) ✗ docker compose up -d --build
➜  pert5 git:(main) ✗ docker exec -it pemweb bash
root@pemweb:/var/www/html# composer create-project --prefer-dist raugadh/fila-starter .
root@pemweb:/var/www/html# php artisan migrate

   INFO  Nothing to migrate.

root@pemweb:/var/www/html# php artisan migrate:status

  Migration name .......................................................................... Batch / Status
  0001_01_01_000000_create_users_table ........................................................... [1] Ran
  0001_01_01_000001_create_cache_table ........................................................... [1] Ran
  0001_01_01_000002_create_jobs_table ............................................................ [1] Ran
  2025_04_12_082932_create_permission_tables ..................................................... [1] Ran
  2025_04_12_083218_create_activity_log_table .................................................... [1] Ran
  2025_04_12_083219_add_event_column_to_activity_log_table ....................................... [1] Ran
  2025_04_12_083220_add_batch_uuid_column_to_activity_log_table .................................. [1] Ran
  2025_04_12_083341_add_themes_settings_to_users_table ........................................... [1] Ran
root@pemweb:/var/www/html# php artisan project:init
root@pemweb:/var/www/html# chown -R www-data:www-data storage/*
root@pemweb:/var/www/html# chown -R www-data:www-data bootstrap/*
root@pemweb:/var/www/html# php artisan make:model Client -ms
root@pemweb:/var/www/html# php artisan make:model Product -ms
root@pemweb:/var/www/html# php artisan make:controller Api/ProductApiController
root@pemweb:/var/www/html# php artisan make:middleware ClientAuth
root@pemweb:/var/www/html# php artisan migrate:status

  Migration name .......................................................................... Batch / Status
  0001_01_01_000000_create_users_table ........................................................... [1] Ran
  0001_01_01_000001_create_cache_table ........................................................... [1] Ran
  0001_01_01_000002_create_jobs_table ............................................................ [1] Ran
  2025_04_12_082932_create_permission_tables ..................................................... [1] Ran
  2025_04_12_083218_create_activity_log_table .................................................... [1] Ran
  2025_04_12_083219_add_event_column_to_activity_log_table ....................................... [1] Ran
  2025_04_12_083220_add_batch_uuid_column_to_activity_log_table .................................. [1] Ran
  2025_04_12_083341_add_themes_settings_to_users_table ........................................... [1] Ran
  2025_04_28_110747_create_clients_table ......................................................... Pending
  2025_04_28_110804_create_products_table ........................................................ Pending

root@pemweb:/var/www/html# php artisan migrate

   INFO  Running migrations.

  2025_04_28_110747_create_clients_table .................................................... 88.16ms DONE
  2025_04_28_110804_create_products_table ................................................... 83.53ms DONE

root@pemweb:/var/www/html# php artisan route:list
HARUS ADA api
GET|HEAD   api/products ................................................. Api\ProductApiController@index

/var/www/html/app/Providers/AppServiceProvider.php:53