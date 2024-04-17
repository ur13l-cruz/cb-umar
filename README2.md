## Descripción de ciertos elementos usados del framework, estructura del mismo y librerias utilizadas.

### Carpeta app
Contiene los elementos necesarios para poder configurar el framework, por ejemplo:
- Agregar los parámetros necesarios para la conexión a base de datos
- Especificar el parámetro de url base del proyecto
- Agregar rutas para la navegación web
- Uso de email
- Sesiones
- Cookies
- Agregar controladores
- Agregar modelos
- Agregar vistas

#### Ruta /app/Config/App.php
En la linea 19, la variable **$baseURL**, permite especificar cual es la ruta raíz del proyecto, esta variable debe de cambiarse cuando se esta en producción y cuando se esta en desarrollo, ejemplo: al estar en desarrollo la variable será igual a http://localhost/practicas/cb_umar/ y cuando esté en producción a https://coleccionesbiologicas.umarinos.net/.
Cabe mencionar que está variable aparece con el nombre **app.baseURL** en el archivo .env si se tiene habilitado y hace la misma función.

#### Ruta /app/Config/Database.php
En la linea 27, el arreglo **$default**, permite especificar los parámetros necesarios para la conexión a la base de datos, los parámetros mas utilizados son:
- hostname: nombre del equipo al que se conectará
- username: nombre del usuario que se conectará
- password: contraseña del usuario
- database: base de datos a que se conectará
- port: puerto del equipo al que se conectará.

este arreglo debe modificarse cuando se está en producción y desarrollo, mismo caso que la variable **$baseURL**, de igual forma cuenta con parámetros de configuración en el archivo .env

#### Ruta /app/Config/Routes.php
En este archivo se especifican las rutas para la navegación del sitio, utiliza la clase Routes proporcionada por el framework, y realiza peticiones get para obtener las vistas de acuerdo a la ruta especifica.

#### Ruta /app/Controllers
Los controladores son responsables de recibir las solicitudes del usuario, procesar la lógica correspondiente y devolver una respuesta adecuada.

En esta carpeta se encuentran los controladores:
- AcercaDeController
- ColeccionBiologicaController
- Home

Todas extienden de BaseController.

#### Ruta /app/Views
En esta carpeta se encuentran todas las vistas

##### Layouts

##### errors

#### Ruta /app/Views

### Carpeta public



