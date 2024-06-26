<?php

class controllerPacientes {
    public function cadastrarPaciente($nome, $sobrenome, $email, $cep, $logradouro,
                                        $numero, $bairro, $cidade, $uf) {
        try {
            $modelPacientes = new modelPacientes();
            return $modelPacientes->cadastrarPaciente($nome, $sobrenome, $email, $cep, $logradouro,
                                                        $numero, $bairro, $cidade, $uf);
        } catch (PDOException $e) {
            return false;
        }
    }
}