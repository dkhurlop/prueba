### Prueba PHP/ Laravel

## Instrucciones
Este es un proyecto de prueba desarrollado con Laravel que implementa un CRUD básico para gestionar coches y propietarios. El diseño se realizó utilizando Bootstrap para una interfaz más atractiva.

1. Clona el repositorio de Laravel desde GitHut
 `git@github.com:dkhurlop/prueba.git`
2. Abre el proyecto en tu editor de código y en la terminal ingresa al directorio del proyecto
 `cd php_laravel`
3. Instala las dependencias de Composer `composer install`
4. Crea un archivo .env a partir del archivo .env.example.
5. Genera la clave de la aplicacion `php artisan key:generate`
6. Crea tú base de datos en mysql con el nombre de tú preferencia.
7. Configura la base de datos en el archivo .env con la información adecuada, donde debes poner el nombre de tu base de datos previamente creada en mysql.
8. Ejecuta las migraciones para crear las tablas de la base de datos `php artisan migrate`
9. Ejecuta el seeder para generar los datos de prueba `php artisan db:seed`
10. Inicia el servidor de desarrollo`php artisan serve`

## Funcionalidades
+ CRUD de Coches y Propietarios: Permite realizar operaciones básicas.
+ Listado de Coches: Muestra una lista de coches con la opción de añadir nuevos coches.
+ Formulario de Añadir Coche: Presenta un formulario para agregar un nuevo coche, incluyendo un menú desplegable para seleccionar el propietario.
+ Visualización de Coches por Propietario: Al seleccionar un propietario en el formulario de añadir coche, se muestran todos los coches asociados a ese propietario sin recargar la página, utilizando AJAX/Axios.

## Tecnologías Utilizadas

+ Laravel: Framework PHP para el desarrollo web.
+ Bootstrap: Framework de front-end para el diseño de la interfaz de usuario.
+ JavaScript (Axios): Para la implementación de la funcionalidad AJAX para cargar dinámicamente los coches asociados a un propietario seleccionado.

<img src="https://img.shields.io/badge/PHP-777BB4.svg?style=for-the-badge&logo=PHP&logoColor=white" alt="php"/>
<img src="https://img.shields.io/badge/MySQL-4479A1.svg?style=for-the-badge&logo=MySQL&logoColor=white" alt="mysqlt" />
<img src="https://img.shields.io/badge/Laravel-FF2D20.svg?style=for-the-badge&logo=Laravel&logoColor=white" alt="Laravel"/>
<img  src="https://img.shields.io/badge/JavaScript-F7DF1E.svg?style=for-the-badge&logo=JavaScript&logoColor=black" alt="JavaScript" /> 
<img src="https://img.shields.io/badge/Visual%20Studio%20Code-007ACC.svg?style=for-the-badge&logo=Visual-Studio-Code&logoColor=white" alt="vscode"/>
<img src="https://img.shields.io/badge/XAMPP-FB7A24.svg?style=for-the-badge&logo=XAMPP&logoColor=white" alt="xampp"/>
<img src="https://img.shields.io/badge/Bootstrap-7952B3.svg?style=for-the-badge&logo=Bootstrap&logoColor=white" alt="Bootstrap"/>
<img src="https://img.shields.io/badge/Postman-FF6C37.svg?style=for-the-badge&logo=Postman&logoColor=white" alt="postman"/>
