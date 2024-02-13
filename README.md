# README del proyecto de lenguajes de programación

## Integrantes
- Kevin Carvajal
- Katiuska Marin
- Carlos Loja

## Ejecución de la Aplicación PHP con Node.js y SQL server

Este README describe los pasos necesarios para ejecutar una aplicación PHP utilizando Node.js como servidor.

### Requisitos Previos

Antes de comenzar, asegúrate de tener instalado lo siguiente en tu sistema:

- Node.js: [Descarga e instrucciones de instalación](https://nodejs.org/)
- PHP: [Descarga e instrucciones de instalación](https://www.php.net/)
- SQL Server: [Descarga e instala sql server](https://www.microsoft.com/es-es/sql-server/sql-server-downloads)

### Pasos para Ejecutar la Aplicación

1. **Clonar el Repositorio:**

   Clona este repositorio en tu máquina local usando el siguiente comando:

```sh
git clone https://github.com/kevincar22/Proyecto-Lenguajes-de-Programacion-KDC-.git
```

2. **Acceder a la carpeta 'Academico'**

   Debes ejecutar los siguientes sh para que el proyecto pueda compilarse

```sh
composer install
```

```sh
npm install
```

```sh
php artisan migrate
```

3. **Levantar el proyecto**
   Ejecuta los siguiente comandos en consolas distintas
```sh
npm run dev
```

```sh
php artisan serve
```