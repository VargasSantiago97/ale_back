import os
import json

data = []

with open("init.json") as file:
    data = json.load(file)

try:
    os.mkdir('database')
    texto = """<?php
class DB{
    private $host;
    private $db;
    private $user;
    private $password;
    private $charset;
    public function __construct(){
        $this->host     = '127.0.0.1';
        $this->db       = 'sistema';
        $this->user     = 'root';
        $this->password = "";
        $this->charset  = 'utf8';
    }
    function connect(){
        try{
            $connection = "mysql:host=".$this->host.";dbname=" . $this->db . ";port=33065;charset=" . $this->charset;
            $options = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ];
            $pdo = new PDO($connection,$this->user,$this->password);
        
            return $pdo;
        }catch(PDOException $e){
            print_r('Error connection: ' . $e->getMessage());
        }   
    }
}
?>"""
    with open("database\db.php","w") as file:
        file.write(texto)


except:
    pass
try:
    os.mkdir('consultas')
except:
    pass


def crearIndex():
    
    #CREAMOS INDEX.PHP
    texto_init = """<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");
header('Content-Type: application/json; charset=utf-8');

if(!isset($_GET['tabla']) || !isset($_GET['op'])){
    echo 'verifique consulta';
    return 0;
}

$tabla = $_GET['tabla'];
$op = $_GET['op'];
"""


    for dato in data:
        texto_init += "\n\n//" + dato['tabla'] + "\nif($tabla == '" + dato['tabla'] + "'){\n\tinclude_once 'consultas/" + dato['tabla'] + ".php';\n\t$api = new Class_" + dato['tabla'] + ";\n\tif($op=='getAll') $api->getAll();\n\tif($op=='getAllAll') $api->getAllAll();\n\tif($op=='getAllForSync') $api->getAllForSync();\n\tif($op=='update') $api->update(json_decode(file_get_contents('php://input'), true));\n\tif($op=='create') $api->create(json_decode(file_get_contents('php://input'), true));\n}"

    texto_init += """

?>"""
    with open("index.php","w") as file:
        file.write(texto_init)



crearIndex()

for dato in data:
    with open("consultas/" + dato['tabla'] + ".php","w") as file:
        texto_archivo = "<?php\ninclude_once 'database/" + dato['tabla'] + ".php';\nclass Class_" + dato['tabla'] + "\n{\n\t function getAll()\n\t{\n\t\t$consulta = new " + dato['tabla'] + "DB();\n\t\t$res = $consulta->getAll();\n\t\tif($res->rowCount()) echo json_encode($res->fetchAll(PDO::FETCH_ASSOC));\n\t\telse echo json_encode([]);\n\t}\n\tfunction getAllAll()\n\t{\n\t\t$consulta = new " + dato['tabla'] + "DB();\n\t\t$res = $consulta->getAllAll();\n\t\tif($res->rowCount()) echo json_encode($res->fetchAll(PDO::FETCH_ASSOC));\n\t\telse echo json_encode(array('mensaje' => 'error conectando a db'));\n\t}\n\tfunction getAllForSync()\n\t{\n\t\t$consulta = new " + dato['tabla'] + "DB();\n\t\t$res = $consulta->getAllForSync();\n\t\tif($res->rowCount()) echo json_encode($res->fetchAll(PDO::FETCH_ASSOC));\n\t\telse echo json_encode(array('mensaje' => 'error conectando a db'));\n\t}\n\tfunction update($data)\n\t{\n\t\t$consulta = new " + dato['tabla'] + "DB();\n\t\t$res = $consulta->update($data);\n\t\tif ($res->rowCount()) {\n\t\t\techo json_encode(array('mensaje' => true));\n\t\t} else {\n\t\t\techo json_encode(array('mensaje' => false));\n\t\t}\n\t}\n\tfunction create($data)\n\t{\n\t\t$consulta = new " + dato['tabla'] + "DB();\n\t\t$res = $consulta->create($data);\n\t\tif ($res->rowCount()) {\n\t\t\techo json_encode(array('mensaje' => true));\n\t\t} else {\n\t\t\techo json_encode(array('mensaje' => false));\n\t\t}\n\t}\n}\n?>"""
        file.write(texto_archivo)
    
    with open("database/" + dato['tabla'] + ".php","w") as file:
        texto_for_update = ''
        texto_for_insert = '('
        texto_for_insertt = '('
        texto_for_execute = ''
        texto_for_execute_update = ''

        for columna in dato['columnas']:

            texto_for_update += columna + " = :" + columna + ", "
            texto_for_execute += "\t\t\t\t\t'" + columna + "' => isset($datos['" + columna + "']) ? $datos['" + columna + "'] : null,\n"


            texto_for_execute_update += "\t\t\t\t\t'" + columna + "' => isset($datos['" + columna + "']) ? $datos['" + columna + "'] : null,\n"
            texto_for_insert += columna + ", "
            texto_for_insertt += ":" + columna + ", "
            

        texto_for_update = texto_for_update[:-2]
        texto_for_insert = texto_for_insert[:-2] + ")"
        texto_for_insertt = texto_for_insertt[:-2] + ")"

        texto = "<?php\ninclude_once 'db.php';\nclass " + dato['tabla'] + "DB extends DB\n{\n\tfunction getAll()\n\t{\n\t\t$sql = 'SELECT * FROM " + dato['tabla'] + " WHERE estado != 0';\n\t\t$query = $this->connect()->query($sql);\n\t\treturn $query;\n\t}\n\tfunction getAllAll()\n\t{\n\t\t$sql = 'SELECT * FROM " + dato['tabla'] + "';\n\t\t$query = $this->connect()->query($sql);\n\t\treturn $query;\n\t}\n\tfunction getAllForSync()\n\t{\n\t\t$sql = 'SELECT id, editado_el FROM " + dato['tabla'] + "';\n\t\t$query = $this->connect()->query($sql);\n\t\treturn $query;\n\t}\n\tfunction update($datos)\n\t{\n\t\tif($datos['id'] != null){\n\t\t\t$query = $this->connect()->prepare('UPDATE " + dato['tabla'] + " SET " + texto_for_update + " WHERE id = :id');\n\t\t\t$query->execute(\n\t\t\t\t[\n" + texto_for_execute_update + "\t\t\t\t]\n\t\t\t);\n\t\t\treturn $query;\n\t\t}\n\t}\n\tfunction create($datos)\n\t{\n\t\tif($datos['id'] != null){\n\t\t\t$query = $this->connect()->prepare('INSERT INTO " + dato['tabla'] + " " + texto_for_insert + " VALUES " + texto_for_insertt + "');\n\t\t\t$query->execute(\n\t\t\t\t[\n" + texto_for_execute + "\t\t\t\t]\n\t\t\t);\n\t\t\treturn $query;\n\t\t}\n\t}\n}\n?>"

        file.write(texto)

