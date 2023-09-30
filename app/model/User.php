<?php

class User {
  private $id;
  private $nome;
  private $sobrenome;
  private $idade;
  private $cep;
  private $bairro;
  private $rua;
  private $cidade;
  private $estado;
  private $numero;
  private $complemento;
  private $cpf;
  private $genero;

  // Getter and Setter methods for id

  // Getter and Setter methods for nome
  
  public function getId() {
    return $this->id;
}

public function setId($id) {
    $this->id = $id;
}

  public function getNome() {
      return $this->nome;
  }

  public function setNome($nome) {
      $this->nome = $nome;
  }

  // Getter and Setter methods for sobrenome
  public function getSobrenome() {
      return $this->sobrenome;
  }

  public function setSobrenome($sobrenome) {
      $this->sobrenome = $sobrenome;
  }

  // Getter and Setter methods for idade
  public function getIdade() {
      return $this->idade;
  }

  public function setIdade($idade) {
      $this->idade = $idade;
  }

  // Getter and Setter methods for cep
  public function getCep() {
      return $this->cep;
  }

  public function setCep($cep) {
      $this->cep = $cep;
  }
// 

public function getBairro() {
  return $this->bairro;
}

public function setBairro($bairro) {
  $this->bairro = $bairro;
}

//

  public function getRua() {
    return $this->rua;
}

public function setRua($rua) {
    $this->rua= $rua;
}

// 
public function getCidade() {
  return $this->cidade;
}

public function SetCidade($cidade) {
  $this->cidade= $cidade;
}
//
public function getEstado() {
  return $this->estado;
}

public function SetEstado($estado) {
  $this->estado= $estado;
}
//

public function getNumero() {
  return $this->numero;
}

public function SetNumero($numero) {
  $this->numero= $numero;
}
// 
public function getCpf() {
  return $this->cpf;
}

public function SetCpf($cpf) {
  $this->cpf= $cpf;
}
// 
  public function getGenero() {
      return $this->genero;
  }

  public function setGenero($genero) {
      $this->genero = $genero;
  }
}
