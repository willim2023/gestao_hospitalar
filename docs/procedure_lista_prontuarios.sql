DELIMITER //

CREATE PROCEDURE listarProntuarios()
BEGIN
    SELECT 
        pacientes.id_paciente
        ,pacientes.id_prontuario
        ,pacientes.nome
        ,pacientes.sobrenome
        ,pacientes.email
        ,pacientes.cep
        ,pacientes.logradouro
        ,pacientes.numero
        ,pacientes.bairro
        ,pacientes.cidade
        ,pacientes.uf
        ,prontuario.data_cadastro
        ,status.descricao as status
    FROM tbl_pacientes AS pacientes
    INNER JOIN tbl_prontuario AS prontuario ON pacientes.id_prontuario = prontuario.id_prontuario
    INNER JOIN tbl_status AS status ON pacientes.id_status = status.id_status
    ;
END
//

DELIMITER ;