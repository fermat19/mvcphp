MVC Template
===Plantilla de desarrollo mvc php poo
## Papar Information
- Title:  `MVC Template`
- Authors:  `Fernando Castillo`
- Perfil: [https://github.com/fermat19]()

## Instalación y dependencias
- Apache Server [httpd]
- Php +7.4
- MySql
- HTML5
- JavaScript
- CSS

## Uso
### Entorno de configuración
- /config/config.php\
  Configuraciones de la aplicaion
  ```
  define('APP_NAME', 'Nombre de la aplicación');
  define('APP_VERSION', 'Versión de la aplicación');
  define('CREATEOR', 'Usuario desarrollador');
  define('EMAIL', 'Correo desarrollador');
  ```
  Configuraciones de Base de datos\
  *Defie configuraciones en dos partes*\
  | Desarrollo  | Producción  |
  ```
  define('DB_DRIVER', DEBUG ? 'mysql' : 'mysql');
  define('DB_HOST', DEBUG ? 'localhost' : '192.168.0.1');
  define('DB_PORT', DEBUG ? '3306' : '3306');
  define('DB_NAME', DEBUG ? 'db_dev' : 'db_prod');
  define('DB_USER', DEBUG ? 'user_dev' : 'user_prod');
  define('DB_PASS', DEBUG ? 'pwd_dev'  : 'pwd_prod');
  define('DB_CHARSET', DEBUG ? 'utf8' : 'utf8');
  ```


## Directorio de archivos
```
|—— .gitignore
|—— .htaccess
|—— app
|    |—— layouts
|        |—— errors
|        |—— template
|    |—— libs
|    |—— models
|        |—— admin
|        |—— config
|        |—— crm
|    |—— modules
|        |—— auth
|        |—— home
|            |—— HomeModule.php
|            |—— views
|                |—— home.php
|—— bin
|    |—— bin
|—— config
|    |—— config.php
|—— index.php
|—— public
|    |—— assets
|    |—— pages
|    |—— uploads
|—— resources
|—— schedule
|—— src
|    |—— Autoload.php
|    |—— exceptions
|        |—— CoreExceptions.php
|        |—— HandlerException.php
|    |—— http
|        |—— Middlewares.php
|        |—— ModulesInterface.php
|        |—— Request.php
|        |—— Response.php
|    |—— models
|        |—— Model.php
|        |—— ModelInterface.php
|    |—— routing
|        |—— Router.php
|        |—— Routes.php
|    |—— views
|        |—— Engine.php
|—— storage
|    |—— cache
|    |—— logs
|    |—— sessions
```
## Detalles del código
### /src
- Autoload.php
  ```
  Carga todas las clases que se instancien y las ejecuta haciendo referencia a su namespace
  ```
- exceptions
  - CoreExceptions.php
  - HandlerExceptions.php
    ```
    Maneja los errores y genera un archivo de log
    ```
- http
  - Middlewares.php
    ```
    Define una interface modelo que indica como crear middlewares
    ```
  - ModulesInterface.php
    ```
    Define una interface modelo que indica como crear modulos, los modulos lo implementan
    ```
  - Request.php
    ```
    Crea un objeto que encapsula una peticion request como GET, POST, REQUEST
    ```
  - Response.php
    ```
    Crea un objeto que encapsula opciones de respouesta como headers, view, json, texto, redirecciones, 
    ```
- models
  - Model.php
    ```
    controla las conexiones a la base de datos, maneja las peticiones y sus respuestas 
    ```
  - ModelInterface.php
    ```
    define los metodos CRUD como estructura básica de un modelo
    ```
- routing
  - Routes.php
    ```
    capruta la variable url desde $_GET y lo deconstruye para definir el modulo, el metodo y los parametros 
    ```
  - Router.php
    ```
    Toma los elementos capturados en Routes, y ejecuta el modulo y el metodo, genera dos parametros, el primero, una instancia de Request y el segundo, una instancia de Response
    ```
- views
  - Engine.php
    ```
    renderiza los archivos de vista, y las variables que se le pasen
    ```

### /app
Carpeta de trabajo.
- layouts
  - error
    ```
    Almacena tempaltes de error.
    ```
  - template
    ```
    Define el archivo template de la aplicacion, se define las partes estaticas del template como los estilos, el header, el footer, containers, menu.
    se devine una variable @container que será reemplazado por el componente de vista de cada modulo.
    ```
- libs
    ```
    almacena librerias auxiliares propias y de terceros como servicios de correo, autenticacion, manejo de imagenes, creacion de PDF... etc...
    ```
- models
    ```
    implementa \Src\Models\ModelInterface, se recomenda definir cada metodo con la siguiente estructura.

    public static function acion($params=[]){
      $sql = "query a la tabla";
      try{
        $data = \Src\Models\Model::listar($params);
        if(count($resut) > 0){
          // datos obtenidos
          $result ={
            'title' => 'Consulta correcta',
            'type' => 'success',
            'message' => 'Los datos se han obtenido correctamente',
            'data' => $data
          }
          return $result;
        } else {
          // sin datos obtenidos
          $result ={
            'title' => 'Consulta correcta',
            'type' => 'info',
            'message' => 'no se han obtenido datos con los parametros enviados',
            'data' => ''
          }
        }
      } catch(\PDOException $e){
        $result ={
            'title' => 'Error en la consulta',
            'type' => 'warning',
            'message' => 'Error al intentar obtener los datos ' . $e->getMessage(),
            'data' => ''
          }
          return $result;
      }
    }
    ```
- modules
    ```
    Implementa \Src\Http\Modules\ModulesInterface.php, se recomienda definir cada metodo con la siguiente estructura.
    Cada modulo se estructura:
      - archivoModule.php : define la logica del controlador
      - views/ : almacena las vistas del modulo
      - js/ : almacena los archivos de 
      


    use \Src\Http\Request;
    use \Src\Http\Response;

    class EjemploModule implements \Src\Http\ModulesInterface {
      
      public function action(Request $req, Response $res){
        $data['title'] = 'Titulo de la página';
        $res->view('accion', $data);
      }
    }

    

    ```
