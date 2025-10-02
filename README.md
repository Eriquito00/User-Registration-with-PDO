# Sistema de Registro de Usuarios con PDO

Una aplicación web completa construida con PHP que implementa un sistema CRUD (Create, Read, Update, Delete) para la gestión de usuarios utilizando PDO (PHP Data Objects) para interactuar con una base de datos MySQL de manera segura y eficiente.

## Descripción

Este proyecto es una aplicación web que permite administrar usuarios a través de una interfaz intuitiva. La aplicación utiliza PDO para realizar operaciones CRUD sobre una base de datos MySQL, siguiendo el patrón de diseño MVC (Model-View-Controller) y aplicando buenas prácticas de programación como la separación de responsabilidades y el uso de prepared statements para prevenir inyecciones SQL.

**Características principales:**
- ✨ Interfaz web moderna y responsiva
- 🔒 Operaciones seguras con la base de datos usando PDO
- 📝 Sistema CRUD completo para usuarios
- ✅ Validación de datos de entrada
- 🎨 Diseño oscuro y minimalista
- 📱 Diseño responsivo adaptado a diferentes tamaños de pantalla

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
    
    **En Windows:**
    ```bash
    cd C:\xampp\htdocs
    ```

    **En Linux/Mac:**
    ```bash
    cd /opt/lampp/htdocs
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
   - En Windows: Busca "XAMPP Control Panel" en el menú de inicio
   - En Linux: Ejecuta `sudo /opt/lampp/manager-linux-x64.run`

2. **Iniciar los servicios necesarios**
   - Haz clic en el botón **"Start"** junto a **Apache**
   - Haz clic en el botón **"Start"** junto a **MySQL**
   - Verifica que ambos servicios muestren el estado "Running" con fondo verde

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

3. Navega a una de las siguientes URLs:
   - `http://localhost/user-registration/` (acceso directo)
   - `http://localhost/user-registration/public/` (acceso explícito a la carpeta public)

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

**Validaciones:**
- Todos los campos son obligatorios
- El email debe tener un formato válido
- El teléfono debe seguir el formato: código de país + espacio + 9 dígitos
- El email y teléfono deben ser únicos en el sistema

### 2. 👁️ **Read (Leer Usuarios)**

Permite consultar la información de usuarios existentes.

**Pasos:**
1. Desde la página principal, haz clic en el botón **"Read"**
2. Tienes dos opciones:
   - **Read one:** Introduce el ID del usuario y haz clic en el botón
   - **Read all:** Haz clic directamente para ver todos los usuarios
3. Los resultados se mostrarán en una tabla con todas las columnas
4. Usa el botón **"Return"** para volver al menú principal

**Columnas mostradas:**
- ID del usuario
- Nombre
- Apellido
- Email
- Teléfono

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

**Validaciones:**
- El ID debe existir en la base de datos
- Se aplican las mismas validaciones que en Create
- El nuevo email y teléfono deben ser únicos (excepto si no cambian)

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

### Mensajes de Error Comunes:

- **"Email already exists"**: El correo electrónico ya está registrado
- **"Telephone already exists"**: El número de teléfono ya está registrado
- **"Use the +123 123456789 format"**: El formato del teléfono es incorrecto
- **"User with ID X not found"**: No existe un usuario con ese ID

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

### Descripción de Componentes Principales:

#### **Controllers (Controladores)**
- Reciben las peticiones HTTP
- Validan los datos de entrada
- Coordinan entre el modelo y la vista
- Manejan excepciones y errores

#### **Models (Modelos)**
- **User.php**: Define la estructura de un usuario
- **MySQLUser.php**: Implementa las operaciones CRUD usando PDO con prepared statements

#### **Views (Vistas)**
- Archivos HTML/PHP que muestran la interfaz al usuario
- Reciben datos del controlador para mostrarlos
- Envían formularios al controlador correspondiente

#### **Database (Base de Datos)**
- **MySQLConnection.php**: Gestiona la conexión PDO
- **schema.sql**: Define la estructura de la base de datos

#### **Public**
- Contiene los archivos accesibles directamente desde el navegador
- **index.php**: Menú principal con las 4 opciones CRUD

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

## Tecnologías Utilizadas

- **PHP 7.4+**: Lenguaje de programación del lado del servidor
- **PDO (PHP Data Objects)**: Capa de abstracción para acceso a bases de datos
- **MySQL**: Sistema de gestión de bases de datos
- **HTML5**: Estructura de las páginas web
- **CSS3**: Estilos y diseño visual
- **Apache**: Servidor web (incluido en XAMPP)

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
   - Para un entorno de producción, considera:
     - Agregar autenticación de usuarios
     - Implementar HTTPS
     - Configurar variables de entorno para credenciales
     - Agregar límites de tasa (rate limiting)
     - Implementar logging de actividades

3. **Archivos Sensibles**:
   - Nunca compartas tu configuración de base de datos en repositorios públicos
   - El archivo `.htaccess` controla la reescritura de URLs

## Solución de Problemas Comunes

### Error: "Call to undefined function mysql_connect()"
- **Causa**: Extensión MySQL no habilitada en PHP
- **Solución**: Edita `php.ini` y descomenta `extension=mysqli` y `extension=pdo_mysql`

### Error: "Access denied for user 'root'@'localhost'"
- **Causa**: Contraseña de MySQL incorrecta
- **Solución**: Verifica las credenciales en `MySQLConnection.php`

### Error: "Port 80 in use by another application"
- **Causa**: Otro servicio está usando el puerto 80
- **Solución**: 
  1. Cierra Skype, IIS o cualquier otro servicio que use el puerto 80
  2. O cambia el puerto de Apache en `httpd.conf`

### La página muestra el código PHP en lugar de ejecutarlo
- **Causa**: Apache no está procesando archivos PHP
- **Solución**: Reinicia Apache desde el Panel de Control de XAMPP

### No se puede conectar a la base de datos
- **Causa**: MySQL no está iniciado
- **Solución**: Inicia MySQL desde el Panel de Control de XAMPP

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

¡Las contribuciones son bienvenidas! Siéntete libre de:

- 🐛 Reportar bugs o problemas abriendo un **Issue**
- 💡 Sugerir nuevas características o mejoras
- 🔧 Hacer fork del proyecto y enviar **Pull Requests**
- 📖 Mejorar la documentación
- ⭐ Dar una estrella al proyecto si te ha sido útil

### Cómo Contribuir:

1. Haz fork del repositorio
2. Crea una rama para tu característica (`git checkout -b feature/AmazingFeature`)
3. Realiza tus cambios y haz commit (`git commit -m 'Add some AmazingFeature'`)
4. Sube tus cambios (`git push origin feature/AmazingFeature`)
5. Abre un Pull Request

### Código de Conducta:

- Se respetuoso con otros contribuyentes
- Proporciona comentarios constructivos
- Sigue las convenciones de código existentes

## Mejoras Futuras

Algunas ideas para expandir este proyecto:

- 🔐 **Sistema de Autenticación**: Login y registro de administradores
- 🔍 **Búsqueda Avanzada**: Filtrar usuarios por múltiples criterios
- 📄 **Paginación**: Mostrar usuarios en páginas cuando hay muchos registros
- 📊 **Exportación de Datos**: Exportar lista de usuarios a CSV o PDF
- 🖼️ **Avatar de Usuario**: Permitir subir fotos de perfil
- 📧 **Verificación de Email**: Enviar email de confirmación al registrarse
- 🌐 **Internacionalización**: Soporte para múltiples idiomas
- 📱 **API REST**: Crear una API para acceder a los datos desde aplicaciones móviles
- ⚡ **AJAX**: Actualizar datos sin recargar la página
- 🎨 **Temas**: Permitir cambiar entre tema claro y oscuro

## Contacto y Soporte

Si tienes preguntas, sugerencias o necesitas ayuda:

- 📧 Abre un Issue en GitHub
- 👤 Contacta al autor: [Eric Mejias Gamonal](https://github.com/Eriquito00)

---

**Desarrollado con ❤️ para aprender y enseñar sobre PHP, PDO y arquitectura MVC**
