# Sistema de Registro de Usuarios con PDO

Una aplicación web completa construida con PHP que implementa un sistema CRUD (Create, Read, Update, Delete) para la gestión de usuarios utilizando PDO (PHP Data Objects) para interactuar con una base de datos MySQL en PHPMYADMIN de manera segura y eficiente.

## Dependencias

Este proyecto requiere las siguientes dependencias:

### 1. Instalación de XAMPP

**XAMPP** es requerido para ejecutar esta aplicación PHP localmente con Apache y MySQL.

#### Instalando XAMPP:
1. Descarga XAMPP desde el sitio web oficial: [https://www.apachefriends.org/](https://www.apachefriends.org/)
2. Ejecuta el instalador y sigue el asistente de instalación
3. Instala XAMPP en la ubicación predeterminada (generalmente `C:\xampp` en Windows)
4. Durante la instalación, asegúrate de seleccionar al menos los módulos:
   - **Apache** (servidor web)
   - **MySQL** (base de datos)
   - **PHP** (lenguaje de programación)
   - **phpMyAdmin** (administrador de base de datos)

#### Configuración del Proyecto en XAMPP:
1. Navega a tu directorio de instalación de XAMPP `C:\xampp\htdocs` (Windows) o `/opt/lampp/htdocs` (Linux)

2. **Opcional pero Recomendado**: Crea una carpeta `XamppOriginal` para introducir dentro todos los archivos de la web original de XAMPP:
   ```
   htdocs/
   └── XamppOriginal/ (Archivos originales de XAMPP)
   ```

3. Clona este repositorio en la ruta donde XAMPP muestra las webs:
    
    ```bash
    cd C:\xampp\htdocs
    ```

    Luego clona el repositorio:
    ```bash
    git clone https://github.com/Eriquito00/User-Registration-with-PDO.git user-registration
    ```

   La estructura resultante debería ser:
   ```
   htdocs/
   ├── user-registration/  (Este proyecto)
   └── XamppOriginal/      (Archivos originales de XAMPP - opcional)
   ```

## Cómo Ejecutar el Proyecto

### Paso 1: Configurar los Servicios de XAMPP

1. **Abrir el Panel de Control de XAMPP**
2. **Iniciar los servicios necesarios**
   - Haz clic en el botón **"Start"** junto a **Apache**
   - Haz clic en el botón **"Start"** junto a **MySQL**
   - Verifica que ambos servicios muestren el estado "Running"

3. **Verificar que los servicios funcionan correctamente**
   - Apache debería estar ejecutándose en el puerto 80 (o 8080 si el 80 está ocupado)
   - MySQL debería estar ejecutándose en el puerto 3306
   - Si algún puerto está ocupado, puedes cambiarlo desde la configuración del Panel de Control

### Paso 2: Verificar la Configuración de la Base de Datos

El proyecto está configurado para:
- **Host:** localhost
- **Usuario:** root
- **Contraseña:** (vacía por defecto en XAMPP)
- **Base de datos:** usersdb (se crea automáticamente)

Si necesitas cambiar estos valores, edita el archivo `/app/database/MySQLConnection.php`:

```php
$tempCon = new PDO("mysql:host=localhost;charset=utf8", "root", "");
// Cambiar "root" y "" si tu configuración es diferente
```

### Paso 3: Acceder a la Aplicación

1. Asegúrate de que los servicios **Apache** y **MySQL** estén iniciados en el Panel de Control de XAMPP

2. Abre tu navegador web favorito (Chrome, Firefox, Edge, etc.)

3. Navega a `http://localhost/user-registration/public/`

4. Deberías ver la página principal con cuatro botones: **Create**, **Read**, **Update**, y **Delete**

**Nota:** La primera vez que accedas a cualquier funcionalidad que requiera la base de datos, se creará automáticamente la base de datos `usersdb` y la tabla `users` gracias al script `schema.sql`.

## Uso de la Aplicación

La aplicación ofrece cuatro operaciones principales (CRUD) para gestionar usuarios:

### 1. 📝 **Create (Crear Usuario)**

Permite añadir nuevos usuarios al sistema.

**Pasos:**
1. Desde la página principal, haz clic en el botón **"Create"**
2. Rellena el formulario con la información del usuario:
   - **Name:** Nombre del usuario (máximo 25 caracteres)
   - **Surname:** Apellido del usuario (máximo 50 caracteres)
   - **Email:** Correo electrónico válido (debe ser único)
   - **Telephone:** Teléfono en formato `+123 123456789` (debe ser único)
3. Haz clic en **"Create"** para guardar el usuario
4. Si hay errores de validación, se mostrará un mensaje en rojo
5. Usa el botón **"Return"** para volver al menú principal

### 2. 👁️ **Read (Leer Usuarios)**

Permite consultar la información de usuarios existentes.

**Pasos:**
1. Desde la página principal, haz clic en el botón **"Read"**
2. Tienes dos opciones:
   - **Read one:** Introduce el ID del usuario y haz clic en el botón
   - **Read all:** Haz clic directamente para ver todos los usuarios
3. Los resultados se mostrarán en una tabla con todas las columnas
4. Usa el botón **"Return"** para volver al menú principal

### 3. ✏️ **Update (Actualizar Usuario)**

Permite modificar la información de usuarios existentes.

**Pasos:**
1. Desde la página principal, haz clic en el botón **"Update"**
2. Se mostrará una tabla con todos los usuarios para que puedas ver sus IDs
3. Rellena el formulario con:
   - **ID:** El identificador del usuario a modificar
   - **Name, Surname, Email, Telephone:** Los nuevos datos
4. Haz clic en **"Update"** para guardar los cambios
5. Usa el botón **"Return"** para volver al menú principal

### 4. 🗑️ **Delete (Eliminar Usuario)**

Permite eliminar usuarios del sistema.

**Pasos:**
1. Desde la página principal, haz clic en el botón **"Delete"**
2. Se mostrará una tabla con todos los usuarios para que puedas ver sus IDs
3. Introduce el **ID** del usuario que deseas eliminar
4. Haz clic en **"Delete"** para eliminar el usuario
5. La operación es permanente y no se puede deshacer
6. Usa el botón **"Return"** para volver al menú principal

**Advertencia:** La eliminación es inmediata y permanente. Verifica el ID antes de eliminar.

## Estructura del Proyecto

El proyecto sigue una arquitectura MVC (Model-View-Controller) con separación clara de responsabilidades:

```
User-Registration-with-PDO/
├── app/                          # Lógica de la aplicación
│   ├── controller/               # Controladores (lógica de negocio)
│   │   ├── controller.php        # Controlador principal y validaciones
│   │   ├── create.php            # Controlador para crear usuarios
│   │   ├── read.php              # Controlador para leer usuarios
│   │   ├── update.php            # Controlador para actualizar usuarios
│   │   └── delete.php            # Controlador para eliminar usuarios
│   │
│   ├── model/                    # Modelos (representación de datos)
│   │   ├── class/
│   │   │   └── User.php          # Clase User con propiedades y métodos
│   │   └── DAO/                  # Data Access Objects (acceso a datos)
│   │       ├── interface/
│   │       │   └── MySQLUserDAO.php  # Interfaz del DAO
│   │       └── MySQLDAO/
│   │           └── MySQLUser.php     # Implementación del DAO con PDO
│   │
│   ├── view/                     # Vistas (interfaz de usuario)
│   │   ├── create.php            # Vista para crear usuarios
│   │   ├── read.php              # Vista para leer usuarios
│   │   ├── update.php            # Vista para actualizar usuarios
│   │   └── delete.php            # Vista para eliminar usuarios
│   │
│   └── database/                 # Configuración de base de datos
│       ├── MySQLConnection.php   # Conexión PDO a MySQL
│       └── schema.sql            # Script de creación de base de datos
│
├── public/                       # Archivos públicos accesibles
│   ├── index.php                 # Punto de entrada principal
│   └── style/
│       └── style.css             # Estilos CSS de la aplicación
│
├── .htaccess                     # Configuración de Apache (reescritura de URLs)
├── LICENSE                       # Licencia MIT del proyecto
└── README.md                     # Esta documentación
```

## Esquema de Base de Datos

La aplicación utiliza una base de datos MySQL con el siguiente esquema:

### Base de Datos: `usersdb`

#### Tabla: `users`

| Campo       | Tipo            | Descripción                          | Restricciones           |
|-------------|-----------------|--------------------------------------|-------------------------|
| user_id     | INT UNSIGNED    | Identificador único del usuario      | PRIMARY KEY, AUTO_INCREMENT |
| name        | VARCHAR(25)     | Nombre del usuario                   | NOT NULL                |
| surname     | VARCHAR(50)     | Apellido del usuario                 | NOT NULL                |
| email       | VARCHAR(100)    | Correo electrónico                   | UNIQUE, NOT NULL        |
| telephone   | VARCHAR(14)     | Número de teléfono                   | UNIQUE, NOT NULL        |

**Nota:** La base de datos y la tabla se crean automáticamente la primera vez que se ejecuta la aplicación.

## Características de Seguridad

Este proyecto implementa varias medidas de seguridad:

1. **Prepared Statements**: Todas las consultas SQL utilizan prepared statements para prevenir inyecciones SQL
2. **Validación de Datos**: Los datos se validan tanto en el cliente como en el servidor
3. **Escapado de HTML**: Se utiliza `htmlspecialchars()` para prevenir XSS
4. **Restricciones de Base de Datos**: Campos UNIQUE y NOT NULL para mantener integridad de datos
5. **Manejo de Excepciones**: Captura y manejo apropiado de errores

## Notas de Seguridad

### Consideraciones Importantes:

1. **Contraseña de Base de Datos**:
   - Por defecto, XAMPP no tiene contraseña para el usuario root de MySQL
   - En un entorno de producción, **siempre configura una contraseña segura**
   - Para cambiar la contraseña de MySQL en XAMPP:
     1. Accede a phpMyAdmin: `http://localhost/phpmyadmin`
     2. Ve a la pestaña "Cuentas de usuario"
     3. Edita el usuario "root" y establece una contraseña

2. **No usar en Producción sin Modificaciones**:
   - Esta aplicación está diseñada para fines educativos y desarrollo local

## Licencia

Este proyecto está licenciado bajo la Licencia MIT - consulta el archivo [LICENSE](LICENSE) para más detalles.

La Licencia MIT es una licencia permisiva que permite:
- ✅ Uso comercial
- ✅ Modificación
- ✅ Distribución
- ✅ Uso privado

Con las siguientes condiciones:
- ℹ️ Incluir el aviso de copyright
- ℹ️ Incluir la licencia MIT

## Contribuciones

Siéntete libre de hacer fork de este proyecto y enviar pull requests para mejoras o corrección de errores.
