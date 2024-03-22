# Instrucciones para Configurar y Utilizar el Proyecto Laravel

Este repositorio contiene un proyecto Laravel para desarrollar un CRUD. Forma parte de un meetup organizado por alumnas de Factoria F5, donde se proporciona una introducción teórica y práctica sobre Laravel y la creación de un CRUD.

## Presentación

[Presentación en Canva](https://www.canva.com/design/DAF_UbgaaBc/aeyAzTXb4O7YrpT8qZK2iw/edit?utm_content=DAF_UbgaaBc&utm_campaign=designshare&utm_medium=link2&utm_source=sharebutton)

## Ponentes del MeetUp

- Jessica Zapata: [LinkedIn](https://www.linkedin.com/in/j%C3%A9ssica-zapata-sol%C3%B3rzano-07401b29b/)
- Hemileidis Castillo: [LinkedIn](https://www.linkedin.com/in/hemileidis/)
- Laura Gil: [LinkedIn](https://www.linkedin.com/in/laura-gil-solano/)

## Instrucciones

1. **Configuración Inicial:**
   - Dirígete a la carpeta `xampp/htdocs` para crear el proyecto.

2. **Creación del Proyecto Laravel:**
   - Utiliza Composer para crear un nuevo proyecto Laravel:
     
     ```bash
     composer create-project laravel/laravel:^10.0 example-app
     ```

3. **Configuración de la Base de Datos:**
   - Crea una base de datos en phpMyAdmin.
   - Cambia el nombre de la base de datos en el archivo `.env`:
     
     ```bash
     DB_DATABASE=nombre_base_de_datos
     DB_USERNAME=root
     DB_PASSWORD=
     ```

4. **Creación de Tablas:**
   - Crea las migraciones para las tablas necesarias:
     
     ```bash
     php artisan make:migration create_books_table
     ```
   - Modifica la tabla `user` según sea necesario.
   - Crea la migración para agregar una relación entre las tablas `User` y `Books`:
     
     ```bash
     php artisan make:migration add_user_id_to_books_table --table=books
     ```
   - Migra las tablas a la base de datos:
     
     ```bash
     php artisan migrate
     ```

5. **Creación de Modelos y Controladores:**
   - Crea los modelos de `User` y `Book`:
     
     ```bash
     php artisan make:model User
     php artisan make:model Book
     ```
   - Crea los controladores de `UserController` y `BookController`:
     
     ```bash
     php artisan make:controller UserController
     php artisan make:controller BookController
     ```

6. **Creación de Seeders y Población de la Base de Datos:**
   - Crea los seeders para `User` y `Book`:
     
     ```bash
     php artisan make:seeder UserSeeder
     php artisan make:seeder BookSeeder
     ```
   - Actualiza el archivo `DatabaseSeeder` para definir el orden de ejecución de los seeders. Puesto que Book tiene user_id y este campo depende de Users, por lo que primero deberemos intruducir el seeder de User y seguidamente el de Book.

   - Ejecuta el comando para migrar los datos a la base de datos:
     
     ```bash
     php artisan db:seed
     ```

7. **¡Listo para Crear el CRUD!:**
   - Ahora puedes trabajar en los controladores y crear las rutas para el CRUD.

¡Si tienes alguna pregunta, no dudes en contactarnos a través de LinkedIn!
