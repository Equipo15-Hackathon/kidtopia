# 🐱 Kidtopia - Toy Marketplace

Bienvenido a **Kidtopia**, el mercado en línea definitivo para la compra y venta de juguetes. 🎠🏪

## 🌟 Acerca de Kidtopia

**Kidtopia** es una plataforma fácil de usar que conecta a compradores y vendedores, permitiendo que la compra y venta de juguetes sea segura, entretenida y accesible tanto para niños como para coleccionistas.

## 🚀 Tecnologías Utilizadas

Este proyecto está desarrollado con **Laravel 12** y utiliza las siguientes tecnologías:

- **PHP** ^8.2
- **Laravel Framework** ^12.0
- **Laravel Sanctum** (Autenticación API)
- **Laravel Tinker** (Interacción con la aplicación desde la línea de comandos)
- **Laravel Sail** (Entorno de desarrollo con Docker)
- **Laravel Pint** (Formateo de código)
- **PHPUnit** (Pruebas unitarias)


## 🛠 Instalación y Configuración

Sigue estos pasos para configurar y ejecutar **Kidtopia** en tu entorno local:

### 1️⃣ Clonar el Repositorio
```bash
 git clone https://github.com/Equipo15-Hackathon/kidtopia.git
 cd kidtopia
```

### 2️⃣ Instalar Dependencias
```bash
composer install
```

```bash
npm install
```

###  3️⃣Configurar Base de Datos
Si estás usando MySQL, edita el archivo `.env` con tus credenciales y ejecuta:
```bash
php artisan migrate --seed
```

### 4️⃣ Levantar el Servidor
Ejecuta el siguiente comando para iniciar el servidor de desarrollo:
```bash
php artisan serve
```
Para iniciar el servidor junto con otros procesos clave (como la cola de trabajos y Vite):
```bash
composer run dev
```

## 🧪 Pruebas
Para ejecutar las pruebas unitarias, usa:
```bash
php artisan test
```

Para ejecutar las pruebas de cobertura, usa:
```bash
php artisan test --coverage-html=coverage-report
```

## 🎨 Enlace al Frontend
Puedes acceder al repositorio del frontend en el siguiente enlace:
[Repositorio Frontend de Kidtopia](https://github.com/Equipo15-Hackathon/fronted-Kidtopia.git)

Podrás ver la documentación de esta API en el siguiente enlace 
[Documentación Postman](https://documenter.getpostman.com/view/40986713/2sAYkErfdU)


¡Esperamos que disfrutes de **Kidtopia** y que sea un espacio seguro y divertido para la comunidad de amantes de los juguetes! 🎉
