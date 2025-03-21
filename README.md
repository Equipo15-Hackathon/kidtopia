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
## API Documentation

Este documento describe los endpoints y modelos de datos de la API.  
La URL base para acceder a los endpoints es: `http://127.0.0.1:8000/api`.

---

## Endpoints

### Categorías

- **Listar categorías (GET):**  
  `/categories`  
  **Nombre de ruta:** `apiCategoriesIndex`

- **Crear categoría (POST):**  
  `/categories`  
  **Nombre de ruta:** `apiCategoriesStore`

- **Mostrar una categoría (GET):**  
  `/categories/{id}`  
  **Nombre de ruta:** `apiCategoriesShow`

- **Actualizar una categoría (PUT):**  
  `/categories/{id}`  
  **Nombre de ruta:** `apiCategoriesUpdate`

- **Eliminar una categoría (DELETE):**  
  `/categories/{id}`  
  **Nombre de ruta:** `apiCategoriesDestroy`

### Marcas

- **Listar marcas (GET):**  
  `/brands`  
  **Nombre de ruta:** `apiBrandsIndex`

- **Crear marca (POST):**  
  `/brands`  
  **Nombre de ruta:** `apiBrandsStore`

- **Mostrar una marca (GET):**  
  `/brands/{id}`  
  **Nombre de ruta:** `apiBrandsShow`

- **Actualizar una marca (PUT):**  
  `/brands/{id}`  
  **Nombre de ruta:** `apiBrandsUpdate`

- **Eliminar una marca (DELETE):**  
  `/brands/{id}`  
  **Nombre de ruta:** `apiBrandsDestroy`

### Rangos de Edad

- **Listar rangos de edad (GET):**  
  `/ageRanges`  
  **Nombre de ruta:** `apiAgeRangesIndex`

- **Crear rango de edad (POST):**  
  `/ageRanges`  
  **Nombre de ruta:** `apiAgeRangesStore`

- **Mostrar un rango de edad (GET):**  
  `/ageRanges/{id}`  
  **Nombre de ruta:** `apiAgeRangesShow`

- **Actualizar un rango de edad (PUT):**  
  `/ageRanges/{id}`  
  **Nombre de ruta:** `apiAgeRangesUpdate`

- **Eliminar un rango de edad (DELETE):**  
  `/ageRanges/{id}`  
  **Nombre de ruta:** `apiAgeRangesDestroy`

### Productos

- **Listar productos (GET):**  
  `/products`  
  **Nombre de ruta:** `apiProductsIndex`  
  _Ejemplo en Postman: `http://127.0.0.1:8000/api/products`_

- **Crear producto (POST):**  
  `/products`  
  **Nombre de ruta:** `apiProductsStore`

- **Mostrar un producto (GET):**  
  `/products/{id}`  
  **Nombre de ruta:** `apiProductsShow`

- **Actualizar un producto (PUT):**  
  `/products/{id}`  
  **Nombre de ruta:** `apiProductsUpdate`

- **Eliminar un producto (DELETE):**  
  `/products/{id}`  
  **Nombre de ruta:** `apiProductsDestroy`

---

## Modelo de Datos

### Categorías

| Campo | Tipo   | Descripción             |
|-------|--------|-------------------------|
| name  | string | Nombre de la categoría. |

### Marcas

| Campo | Tipo   | Descripción          |
|-------|--------|----------------------|
| name  | string | Nombre de la marca.  |

### Rangos de Edad

| Campo | Tipo   | Descripción                                     |
|-------|--------|-------------------------------------------------|
| range | string | Rango de edad (por ejemplo, "3-5 años").        |

### Productos

| Campo         | Tipo    | Descripción                                                  |
|---------------|---------|--------------------------------------------------------------|
| name          | string  | Nombre del producto.                                         |
| description   | string  | Descripción detallada del producto.                          |
| price         | numeric | Precio del producto (por ejemplo, "16.99").                  |
| stock         | integer | Cantidad disponible en stock.                                |
| image         | string  | URL de la imagen del producto.                               |
| category_id   | integer | Identificador de la categoría.                               |
| brand_id      | integer | Identificador de la marca.                                   |
| age_range_id  | integer | Identificador del rango de edad.                             |

---

## Diagrama de la Base de Datos

_Aquí puedes subir la foto del diagrama de la base de datos._  
**Instrucciones:**  
- Coloca la imagen en el directorio del proyecto (por ejemplo, en una carpeta `assets`).  
- Actualiza la ruta de la imagen a continuación.

![Diagrama de la Base de Datos](https://res.cloudinary.com/del1j3jge/image/upload/v1742543107/Captura_de_pantalla_2025-03-21_084005_epgiyt.png)

---

## 🧪 Pruebas
Para ejecutar las pruebas unitarias, usa:
```bash
php artisan test
```

Para ejecutar las pruebas de cobertura, usa:
```bash
php artisan test --coverage-html=coverage-report
```
![Diagrama](https://res.cloudinary.com/del1j3jge/image/upload/v1742543106/Captura_de_pantalla_2025-03-21_084040_h4rc0o.png)

## 🎨 Enlace al Frontend
Puedes acceder al repositorio del frontend en el siguiente enlace:
[Repositorio Frontend de Kidtopia](https://github.com/Equipo15-Hackathon/fronted-Kidtopia.git)

Podrás ver la documentación de esta API en el siguiente enlace 
[Documentación Postman](https://documenter.getpostman.com/view/40986713/2sAYkErfdU)


¡Esperamos que disfrutes de **Kidtopia** y que sea un espacio seguro y divertido para la comunidad de amantes de los juguetes! 🎉
