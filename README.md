# ProyectoLegajos

Sistema web de gestión de legajos escolares desarrollado con Laravel. Permite administrar alumnos, familiares, documentación, cursos, divisiones y trayectoria académica, mediante distintos roles de usuario.

---

## Tabla de contenidos

- [1. Descripción general](#1-descripción-general)
- [2. Tecnologías utilizadas](#2-tecnologías-utilizadas)
- [3. Requisitos previos](#3-requisitos-previos)
- [4. Instalación y configuración](#4-instalación-y-configuración)
- [5. Estructura del proyecto](#5-estructura-del-proyecto)
- [6. Modelo de datos](#6-modelo-de-datos)
- [7. Usuarios y roles](#7-usuarios-y-roles)
- [8. Funcionalidades](#8-funcionalidades)
- [9. Consideraciones para el desarrollo](#9-consideraciones-para-el-desarrollo)
- [10. Comandos útiles](#10-comandos-útiles)
- [11. Mantenimiento](#11-mantenimiento)
- [12. Alcance del proyecto](#12-alcance-del-proyecto)

---

## 1. Descripción general

**ProyectoLegajos** es una aplicación web destinada a la administración de legajos escolares de la EPET 20.

Su objetivo es centralizar la información de los alumnos, sus datos personales, familiares, documentación y situación académica.

El sistema permite:

- Registrar y administrar alumnos.
- Consultar y modificar legajos.
- Asociar familiares y responsables.
- Gestionar documentos adjuntos.
- Organizar alumnos por curso y división.
- Realizar el pase de año.
- Consultar alumnos egresados.
- Archivar y desarchivar legajos.
- Generar documentos PDF con información de los alumnos.

La aplicación cuenta con diferentes roles de usuario que determinan las operaciones disponibles.

## 2. Tecnologías utilizadas

| Tecnología | Utilización |
|---|---|
| PHP 8.5.6 | Lenguaje del backend. |
| Laravel 13.23.0 | Framework principal. |
| MariaDB | Sistema de gestión de base de datos. |
| HTML5 | Estructura de las vistas. |
| CSS3 | Estilos de la interfaz. |
| JavaScript | Interactividad del frontend. |
| Blade | Motor de plantillas de Laravel. |
| Bootstrap 5 | Framework CSS para la interfaz. |
| Composer | Gestión de dependencias PHP. |
| DomPDF | Generación de documentos PDF. |

## 2. Tecnologías utilizadas

| Tecnología | Utilización |
|---|---|
| PHP 8.5.6 | Lenguaje del backend. |
| Laravel 13.23.0 | Framework principal. |
| SQLite | Sistema de gestión de base de datos. |
| HTML5 | Estructura de las vistas. |
| CSS3 | Estilos de la interfaz. |
| JavaScript | Interactividad del frontend. |
| Blade | Motor de plantillas de Laravel. |
| Bootstrap 5 | Framework CSS para la interfaz. |
| Composer | Gestión de dependencias PHP. |
| DomPDF | Generación de documentos PDF. |

## 3. Requisitos previos

Para instalar y ejecutar el proyecto se necesita:

- PHP 8.5.6 o una versión compatible con las dependencias.
- Composer.
- Extensión PDO SQLite habilitada en PHP.
- Extensión SQLite3 habilitada en PHP.

La base de datos utiliza SQLite, por lo que no es necesario instalar ni configurar un servidor de base de datos independiente.

## 4. Instalación y configuración

### 4.1. Obtener el proyecto

Clonar el repositorio:

```bash
git clone URL_DEL_REPOSITORIO
```

Ingresar a la carpeta:

```bash
cd ProyectoLegajos
```

### 4.2. Instalar dependencias

```bash
composer install
```

### 4.3. Configurar el entorno

Crear el archivo `.env` a partir de `.env.example`.

En Windows:

```cmd
copy .env.example .env
```

En Linux:

```bash
cp .env.example .env
```

Configurar la conexión a SQLite en el archivo `.env`:

```env
DB_CONNECTION=sqlite
DB_DATABASE=database/database.sqlite
```

Crear el archivo de base de datos si todavía no existe:

```bash
```

En Windows, se puede crear manualmente desde el explorador o ejecutar:

```cmd
type nul > database\database.sqlite
```

En Linux:

```bash
touch database/database.sqlite
```

### 4.4. Generar la clave de aplicación

```bash
php artisan key:generate
```

### 4.5. Ejecutar migraciones y seeders

Para crear las tablas e insertar los datos iniciales:

```bash
php artisan migrate:fresh --seed
```

Este comando:

1. Elimina las tablas existentes.
2. Ejecuta nuevamente todas las migraciones.
3. Ejecuta los seeders.
4. Incorpora los datos iniciales necesarios para el funcionamiento del sistema.

> [!WARNING]
> `migrate:fresh` elimina los datos existentes. Debe utilizarse durante una instalación inicial o cuando se desea reconstruir la base de datos desde cero. No ejecutarlo si se necesita conservar información.

Los seeders incluyen usuarios para el inicio de sesión y datos académicos iniciales.

### 4.6. Iniciar el servidor

```bash
php artisan serve
```

Acceder desde el navegador:

```text
http://127.0.0.1:8000
```

5. Estructura del proyecto
El proyecto sigue la arquitectura habitual de Laravel, separando las responsabilidades entre modelos, controladores, vistas, rutas y archivos de configuración.
Directorio	Responsabilidad
app/Models	Modelos y relaciones con la base de datos.
app/Http/Controllers	Lógica y operaciones del sistema.
resources/views	Interfaces y plantillas Blade.
routes/web.php	Definición de rutas.
database/migrations	Estructura y modificaciones de la base de datos.
database/seeders	Datos iniciales de la aplicación.
public	Archivos públicos y recursos accesibles desde el navegador.
public/documentosbd	Archivos adjuntos de los legajos.5.1. Organización de la lógica
- Modelos: representan las entidades y sus relaciones.
- Controladores: reciben solicitudes, procesan información y determinan las respuestas.
- Vistas: muestran la información y permiten interactuar con el sistema.
- Rutas: conectan las solicitudes con los métodos de los controladores.
- Migraciones: definen la estructura de la base de datos.
- Seeders: permiten cargar datos iniciales.
Al incorporar funcionalidades nuevas, se recomienda mantener esta separación para facilitar el mantenimiento.

## 6. Modelo de datos

El sistema utiliza **SQLite** como motor de base de datos. La información se almacena en un archivo local dentro del proyecto:

```text
database/database.sqlite
```

Las migraciones de Laravel definen la estructura de las tablas y los seeders permiten incorporar los datos iniciales.

Las entidades principales son:

- **Alumno:** representa a cada estudiante y contiene su información personal y académica.
- **Curso:** representa el año académico al que pertenece un alumno.
- **Division:** representa la división correspondiente dentro de un curso.
- **Familiar:** almacena información de familiares o responsables asociados a los alumnos.
- **Documento:** representa la documentación vinculada a los legajos.

### 6.1. Relación entre cursos y divisiones

La organización académica contempla la relación entre cursos y divisiones mediante la tabla intermedia:

```text
cursosXdivisions
```

Esta relación permite validar qué divisiones corresponden a cada curso.

> [!IMPORTANT]
> Antes de modificar las relaciones académicas, revisar las migraciones y los modelos actuales para comprobar cómo se almacenan los identificadores de curso y división en `alumnos` y cómo se utiliza la tabla intermedia.
## 7. Usuarios y roles

El sistema cuenta con tres roles principales:

- Secretaria.
- Jefe.
- Preceptor.

El inicio de sesión utiliza usuarios incorporados mediante los seeders, aunque también se permite la creación de usuarios.

El rol se utiliza para determinar qué funcionalidades y operaciones puede realizar cada usuario.

En la implementación actual se consulta mediante:

```php
session('rol')
```

### 7.1. Secretaria

Cuenta con permisos administrativos para gestionar la información del sistema.

Entre sus operaciones se encuentran:

- Registrar alumnos.
- Consultar y modificar legajos.
- Eliminar alumnos.
- Gestionar familiares y documentos.
- Administrar información académica.
- Ejecutar el pase de año.
- Consultar egresados.
- Realizar operaciones administrativas sobre los legajos.

### 7.2. Jefe

Dispone de permisos administrativos similares a los de Secretaria.

Puede acceder a funcionalidades de administración y gestión de información, de acuerdo con las restricciones establecidas en los controladores y las vistas.

### 7.3. Preceptor

Tiene acceso orientado a la consulta de alumnos pertenecientes a un curso y división determinados.

Su funcionamiento contempla:

1. Seleccionar un curso.
2. Seleccionar una división.
3. Conservar los identificadores seleccionados en sesión.
4. Consultar los alumnos correspondientes.

Los identificadores utilizados en sesión son:

```php
session('prece_curso');
session('prece_division');
```

## 8. Funcionalidades

### 8.1. Gestión de legajos

Permite administrar los legajos de los alumnos.

Incluye:

- Registro de nuevos alumnos.
- Consulta de información individual.
- Modificación de datos personales.
- Modificación de curso y división.
- Eliminación de legajos.
- Asociación de familiares.
- Asociación y consulta de documentos adjuntos.

### 8.2. Gestión de familiares

Permite registrar familiares y asociarlos a los alumnos.

Al incorporar un familiar, se contempla la búsqueda por DNI para reutilizar registros existentes cuando corresponda.

Esto permite que un mismo familiar pueda estar relacionado con más de un alumno sin duplicar sus datos.

### 8.3. Gestión de documentos

Permite