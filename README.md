# OnNutrive - Plataforma de Nutrición

![Logo](public/img/logobanner.png)

OnNutrive es una aplicación web diseñada para la gestión de planes de nutrición. Permite a los usuarios registrarse, ver diferentes planes alimenticios y gestionar su perfil. La plataforma está construida con el framework Laravel y utiliza un stack de tecnologías modernas para el frontend.

---

## ✨ Características Principales

*   **Autenticación de Usuarios:** Sistema completo de registro e inicio de sesión.
*   **Gestión de Perfil:** Los usuarios pueden actualizar su información personal.
*   **Visualización de Planes:** Interfaz para mostrar diferentes planes de nutrición.
*   **Panel de Control de Usuario:** Dashboard personalizado para cada usuario.
*   **Diseño Responsivo:** Adaptable a dispositivos móviles y de escritorio.

---

## 💻 Stack Tecnológico

La plataforma utiliza las siguientes tecnologías:

*   **Backend:**
    *   [PHP](https://www.php.net/)
    *   [Laravel](https://laravel.com/) - Framework de PHP
    *   [Composer](https://getcomposer.org/) - Manejador de dependencias de PHP
*   **Frontend:**
    *   [Vite](https://vitejs.dev/) - Herramienta de compilación de frontend
    *   [Tailwind CSS](https://tailwindcss.com/) - Framework de CSS
    *   [Alpine.js](https://alpinejs.dev/) - Framework minimalista de JavaScript
    *   [Bootstrap](https://getbootstrap.com/) - Framework de CSS y JS
*   **Base de Datos:**
    *   [SQLite](https://www.sqlite.org/) (por defecto en desarrollo)
    *   Compatible con MySQL, PostgreSQL, etc.

---

## 🚀 Guía de Instalación y Puesta en Marcha

Para instalar y ejecutar el proyecto en un entorno de desarrollo local, sigue estos pasos:

### Prerrequisitos

Asegúrate de tener instalado el siguiente software en tu sistema:
*   PHP (versión recomendada por Laravel 11)
*   Composer
*   Node.js y npm

### Pasos de Instalación

1.  **Clonar el repositorio:**
    ```bash
    git clone <URL_DEL_REPOSITORIO>
    cd onnutrive-bl
    ```

2.  **Instalar dependencias de PHP:**
    ```bash
    composer install
    ```

3.  **Instalar dependencias de Node.js:**
    ```bash
    npm install
    ```

4.  **Configurar el archivo de entorno:**
    Copia el archivo de ejemplo `.env.example` y renómbralo a `.env`.
    ```bash
    copy .env.example .env
    ```
    *Puedes configurar tu base de datos y otras variables de entorno en este archivo si es necesario.*

5.  **Generar la clave de la aplicación:**
    Este comando es crucial para la seguridad de la aplicación Laravel.
    ```bash
    php artisan key:generate
    ```

6.  **Ejecutar las migraciones de la base de datos:**
    Esto creará la estructura de tablas en tu base de datos. El flag `--seed` poblará la base de datos con datos de prueba si existen seeders configurados.
    ```bash
    php artisan migrate --seed
    ```

7.  **Compilar los assets del frontend:**
    Este comando iniciará el servidor de desarrollo de Vite, que compilará los assets y se recargará automáticamente al detectar cambios.
    ```bash
    npm run dev
    ```

8.  **Iniciar el servidor de desarrollo de Laravel:**
    En una terminal separada, ejecuta el siguiente comando para iniciar la aplicación.
    ```bash
    php artisan serve
    ```

¡Listo! Ahora puedes acceder a la aplicación en tu navegador desde la URL que te proporcione el comando `serve` (generalmente `http://127.0.0.1:8000`).

---

## 📂 Estructura del Proyecto

A continuación, se describe la función de los directorios más importantes del proyecto:

*   `app/`: Contiene el núcleo de la aplicación (Modelos, Controladores, Lógica de negocio).
*   `bootstrap/`: Contiene los archivos de arranque de la aplicación.
*   `config/`: Almacena todos los archivos de configuración de la aplicación.
*   `database/`: Contiene las migraciones, factories y seeders de la base de datos.
*   `public/`: Es el punto de entrada de la aplicación y contiene los assets compilados y archivos públicos.
*   `resources/`: Contiene las vistas (`.blade.php`), archivos CSS y JavaScript sin compilar.
*   `routes/`: Aquí se definen todas las rutas de la aplicación (web.php, api.php).
*   `storage/`: Almacena logs, archivos de sesión, caché y otros archivos generados por el framework.
*   `tests/`: Contiene las pruebas automatizadas de la aplicación.
*   `vendor/`: Contiene las dependencias de Composer.

---

## 📄 Licencia

Este proyecto no tiene una licencia definida. Se recomienda añadir un archivo `LICENSE` si se va a distribuir.
