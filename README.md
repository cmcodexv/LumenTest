# Lumen PHP Framework

[![Build Status](https://travis-ci.org/laravel/lumen-framework.svg)](https://travis-ci.org/laravel/lumen-framework)
[![Total Downloads](https://img.shields.io/packagist/dt/laravel/lumen-framework)](https://packagist.org/packages/laravel/lumen-framework)
[![Latest Stable Version](https://img.shields.io/packagist/v/laravel/lumen-framework)](https://packagist.org/packages/laravel/lumen-framework)
[![License](https://img.shields.io/packagist/l/laravel/lumen)](https://packagist.org/packages/laravel/lumen-framework)

Laravel Lumen is a stunningly fast PHP micro-framework for building web applications with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Lumen attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as routing, database abstraction, queueing, and caching.

## Official Documentation

Documentation for the framework can be found on the [Lumen website](https://lumen.laravel.com/docs).

### Autor

- Carlos Maradiaga (cmaradiaga715@gmail.com)

### Pasos

- Ejecutar archivo "config.yml" con Docker Compose:
```sh
$ config.yml up -d
```
- Restaurar archivo "database/pruebaDB_Backup" con [Adminer](https://hub.docker.com/_/adminer/) o [PgAdmin](https://www.pgadmin.org/)
- Crear el archivo .env tomando de referencia el archivo .env.example (no hay necesidad de cambiar las variables)
- Instalar dependencias del proyecto:
```sh
$ composer install
```
- Ejecutar Servidor:
```sh
$ php -S localhost:8000 -t public
```
### Postman:
- Importar collección "postman/PruebaBackend.postman_collection.json"


### Run tests

- Ejecutar pruebas (Windows):
```sh
$ vendor\bin\phpunit
```
### Pregunta 5

La propuesta que me parece ideal para lograr ver el cambio de la entidad "servicio" es definir una tabla extra que puede
funcionar como una bitácora, es decir, esta tabla guardará el historial de cambios.







