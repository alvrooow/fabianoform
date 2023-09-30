<?php


/*
    Criação da classe Usuario com o CRUD
*/
class UserDAO {

    public function insertUser(User $user) {
        try {
            $sql = "INSERT INTO cadastro (
                      nome, sobrenome, idade, cep, bairro, rua, cidade, estado, numero, cpf, genero)
                    VALUES (
                      :nome, :sobrenome, :idade, :cep, :bairro, :rua, :cidade, :estado, :numero, :cpf, :genero)";

            $p_sql = ConnectDB::getConexao()->prepare($sql);
            $p_sql->bindValue(":nome", $user->getNome());
            $p_sql->bindValue(":sobrenome", $user->getSobrenome());
            $p_sql->bindValue(":idade", $user->getIdade());
            $p_sql->bindValue(":cep", $user->getCep());
            $p_sql->bindValue(":bairro", $user->getBairro());
            $p_sql->bindValue(":rua", $user->getRua());
            $p_sql->bindValue(":cidade", $user->getCidade());
            $p_sql->bindValue(":estado", $user->getEstado());
            $p_sql->bindValue(":numero", $user->getNumero());
            $p_sql->bindValue(":cpf", $user->getCpf());
            $p_sql->bindValue(":genero", $user->getGenero());

            return $p_sql->execute();
        } catch (Exception $e) {
            print "Erro ao Inserir usuário <br>" . $e . '<br>';
        }
    }

    public function read() {
        try {
            $sql = "SELECT * FROM cadastro order by nome asc";
            $result = ConnectDB::getConexao()->query($sql);
            $lista = $result->fetchAll(PDO::FETCH_ASSOC);
            $f_lista = array();
            foreach ($lista as $l) {
                $f_lista[] = $this->listaUsuarios($l);
            }
            return $f_lista;
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar Buscar Todos." . $e;
        }
    }
     
    public function update(user $user) {
        try {
            $sql = "UPDATE cadastro set
                
                nome=:nome
                sobrenome=:sobrenome
                idade=:idade
                cep=:cep
                rua=:rua
                estado=:estado
                cidade=:cidade
                numero=:numero
                cpf=:cpf
                genero=:genero
                complemento=:complemento            
                                                                       
                  WHERE id = :id";
            $p_sql = ConnectDB::getConexao()->prepare($sql);
            $p_sql->bindValue(":nome", $user->getNome());
            $p_sql->bindValue(":sobrenome", $user->getSobrenome());
            $p_sql->bindValue(":idade", $user->getIdade());
            $p_sql->bindValue(":cep", $user->getCep());
            $p_sql->bindValue(":bairro", $user->getRua());
            $p_sql->bindValue(":rua", $user->getRua());
            $p_sql->bindValue(":estado", $user->getEstado());
            $p_sql->bindValue(":cidade", $user->getCidade());
            $p_sql->bindValue(":numero", $user->getNumero());
            $p_sql->bindValue(":cpf", $user->getCpf());
            $p_sql->bindValue(":genero", $user->getGenero());
            return $p_sql->execute();
        } catch (Exception $e) {
            echo "Ocorreu um erro ao tentar fazer Update<br> $e <br>";
        }
    }

    public function delete(User $user) {
        try {
            $sql = "DELETE FROM cadastro WHERE id = :id";
            $p_sql = ConnectDB::getConexao()->prepare($sql);
            $p_sql->bindValue(":id", $user->getId());
            return $p_sql->execute();
        } catch (Exception $e) {
            echo "Erro ao Excluir usuario<br> $e <br>";
        }
    }


    

    private function listaUsuarios($row) {
        $user = new User();
        $user->setId($row['id']);
        $user->setNome($row['nome']);
        $user->setSobrenome($row['sobrenome']);
        $user->setIdade($row['idade']);
        $user->setCep($row['cep']);
        $user->setBairro($row['bairro']);
        $user->setRua($row['rua']);
        $user->setEstado($row['estado']);
        $user->setCidade($row['cidade']);
        $user->setNumero($row['numero']);
        $user->setCpf($row['cpf']);
        $user->setGenero($row['genero']);
        return $user;
    }
 }



