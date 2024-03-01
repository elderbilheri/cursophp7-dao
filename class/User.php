<?php

class User
{
    private $id;
    private $nome;
    private $login;
    private $senha;
    private $email;
    private $data_nascimento;
    private $genero;
    private $documento;
    private $endereco;
    private $data_cadastro;

    public function getId()
    {
        return $this->id;
    }

    public function setId($value)
    {
        $this->id = $value;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($value)
    {
        $this->nome = $value;
    }

    public function getLogin()
    {
        return $this->login;
    }

    public function setLogin($value)
    {
        $this->login = $value;
    }

    public function getSenha()
    {
        return $this->senha;
    }

    public function setSenha($value)
    {
        $this->senha = $value;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($value)
    {
        $this->email = $value;
    }

    public function getDataNascimento()
    {
        return $this->data_nascimento;
    }

    public function setDataNascimento($value)
    {
        $this->data_nascimento = $value;
    }

    public function getGenero()
    {
        return $this->genero;
    }

    public function setGenero($value)
    {
        $this->genero = $value;
    }

    public function getDocumento()
    {
        return $this->documento;
    }

    public function setDocumento($value)
    {
        $this->documento = $value;
    }

    public function getEndereco()
    {
        return $this->endereco;
    }

    public function setEndereco($value)
    {
        $this->endereco = $value;
    }

    public function getDataCadastro()
    {
        return $this->data_cadastro;
    }

    public function setDataCadastro($value)
    {
        $this->data_cadastro = $value;
    }

    // Método que executa a "rawQuery" a query bruta/padrão trazendo o resultado da pesquisa(SELECT) e, executando os métodos setters, passando as informações que vieram do resultado da consulta.
    public function loadById($id)
    {
        $sql = new Sql();

        $results = $sql->select("SELECT * FROM tb_usuarios WHERE id = :ID", array(
            ":ID" => $id
        ));

        if (count($results) > 0) {
            $row = $results[0];

            $this->setId($row["id"]);
            $this->setNome($row["nome"]);
            $this->setLogin($row["login"]);
            $this->setSenha($row["senha"]);
            $this->setEmail($row["email"]);
            $this->setDataNascimento(new DateTime($row["data_nascimento"]));
            $this->setGenero($row["genero"]);
            $this->setDocumento($row["documento"]);
            $this->setEndereco($row["endereco"]);
            $this->setDataCadastro(new DateTime($row["data_cadastro"]));
        }
    }

    // Método para listar todos os usuários da tabela
    public static function getList()
    {
        $sql = new Sql();

        return $sql->select("SELECT * FROM tb_usuarios ORDER BY id ASC");
    }

    // Método para buscar por usuários que tenham parte do seu nome um determinado trecho
    public static function search($nome)
    {
        $sql = new Sql();

        return $sql->select("SELECT * FROM tb_usuarios WHERE nome LIKE :SEARCH ORDER BY nome ASC", array(
            ':SEARCH' => '%' . $nome . '%'
        ));
    }

    // Método para buscar por usuários autenticados com login e senha
    public function authentication($login, $password)
    {
        $sql = new Sql();

        $results = $sql->select("SELECT * FROM tb_usuarios WHERE login = :LOGIN AND senha = :PASSWORD", array(
            ":LOGIN" => $login,
            ":PASSWORD" => $password
        ));

        if (count($results) > 0) {
            $row = $results[0];

            $this->setId($row["id"]);
            $this->setNome($row["nome"]);
            $this->setLogin($row["login"]);
            $this->setSenha($row["senha"]);
            $this->setEmail($row["email"]);
            $this->setDataNascimento(new DateTime($row["data_nascimento"]));
            $this->setGenero($row["genero"]);
            $this->setDocumento($row["documento"]);
            $this->setEndereco($row["endereco"]);
            $this->setDataCadastro(new DateTime($row["data_cadastro"]));
        } else {
            throw new Exception("Login e/ou Senha invalidos! Tente novamente.");
        }
    }


    // Método mágico que, ao dar um "echo" no objeto, ao invés de mostar a estrutura do objeto, executa as instruções existentes dentro deste método.
    public function __toString()
    {
        return json_encode(array(
            "id" => $this->getId(),
            "nome" => $this->getNome(),
            "login" => $this->getLogin(),
            "senha" => $this->getSenha(),
            "email" => $this->getEmail(),
            "data_nascimento" => $this->getDataNascimento()->format('d/m/Y'),
            "genero" => $this->getGenero(),
            "documento" => $this->getDocumento(),
            "endereco" => $this->getEndereco(),
            "data_cadastro" => $this->getDataCadastro()->format('d/m/Y H:i:s')
        ));
    }
}
