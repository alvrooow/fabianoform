<?php
class ConnectDB {
    private static $instance;
    private $conn;

    private function __construct() {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "fabiano33";

        try {
            $this->conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conn->exec("SET NAMES utf8");
        } catch(PDOException $e) {
            echo "Conexão falhou: " . $e->getMessage();
        }
    }

    public static function getConexao() {
        if (!isset(self::$instance)) {
            self::$instance = new ConnectDB();
        }

        return self::$instance->conn;
    }
}

// Conectar ao banco de dados
$conn = ConnectDB::getConexao();

// Query SQL para selecionar o campo "nome" da tabela "usuarios"
$sql = "SELECT nome FROM cadastro";
$result = $conn->query($sql);

if ($result->rowCount() > 0) {
    // Exibir os resultados
    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
        echo "Nome: " . $row["nome"]. "<br>";
    }
}
?>