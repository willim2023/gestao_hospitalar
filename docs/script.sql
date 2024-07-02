CREATE DATABASE GestaoHospitalar;

USE GestaoHospitalar;

CREATE TABLE tbl_status (
    id_status INT AUTO_INCREMENT PRIMARY KEY,
    descricao VARCHAR(20)
);

CREATE TABLE tbl_prontuarios (
    id_prontuario INT AUTO_INCREMENT PRIMARY KEY,
    data_cadastro DATETIME
);

CREATE TABLE tbl_pacientes (
    id_paciente INT AUTO_INCREMENT PRIMARY KEY,
    id_prontuario INT,
    nome VARCHAR(30),
    sobrenome VARCHAR(30),
    email VARCHAR(150),
    cep INT,
    logradouro VARCHAR(150),
    numero INT,
    bairro VARCHAR(50),
    cidade VARCHAR(100),
    uf CHAR(2),
    id_status INT,
    FOREIGN KEY (id_prontuario) REFERENCES tbl_prontuarios(id_prontuario),
    FOREIGN KEY (id_status) REFERENCES tbl_status(id_status)
);

CREATE TABLE tbl_cargos (
    id_cargo INT AUTO_INCREMENT PRIMARY KEY,
    descricao_cargo VARCHAR(50)
);

CREATE TABLE tbl_funcionarios (
    id_funcionario INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(30),
    sobrenome VARCHAR(30),
    id_cargo INT,
    id_status INT,
    FOREIGN KEY (id_cargo) REFERENCES tbl_cargos(id_cargo),
    FOREIGN KEY (id_status) REFERENCES tbl_status(id_status)
);

CREATE TABLE tbl_tipos_procedimento (
    id_tipos_procedimento INT AUTO_INCREMENT PRIMARY KEY,
    descricao_procedimento VARCHAR(50)
);

CREATE TABLE tbl_procedimentos_exame (
    id_procedimentos_exame INT AUTO_INCREMENT PRIMARY KEY,
    id_tipo_procedimento INT,
    FOREIGN KEY (id_tipo_procedimento) REFERENCES tbl_tipos_procedimento(id_tipos_procedimento)
);

CREATE TABLE tbl_exames (
    id_exame INT AUTO_INCREMENT PRIMARY KEY,
    id_prontuario INT,
    id_funcionario_solicitante INT,
    id_procedimentos_exame INT,
    data_solicitacao DATETIME,
    FOREIGN KEY (id_prontuario) REFERENCES tbl_prontuarios(id_prontuario),
    FOREIGN KEY (id_funcionario_solicitante) REFERENCES tbl_funcionarios(id_funcionario),
    FOREIGN KEY (id_procedimentos_exame) REFERENCES tbl_procedimentos_exame(id_procedimentos_exame)
);

CREATE TABLE tbl_consultas (
    id_consulta INT AUTO_INCREMENT PRIMARY KEY,
    id_prontuario INT,
    id_funcionario_atendimento INT,
    detalhes VARCHAR(255),
    FOREIGN KEY (id_prontuario) REFERENCES tbl_prontuarios(id_prontuario),
    FOREIGN KEY (id_funcionario_atendimento) REFERENCES tbl_funcionarios(id_funcionario)
);