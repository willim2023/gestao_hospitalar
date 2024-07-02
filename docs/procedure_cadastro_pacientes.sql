DELIMITER //

CREATE PROCEDURE cadastrarPaciente(
    IN nome VARCHAR(30), 
    IN sobrenome VARCHAR(30), 
    IN email VARCHAR(150),
	IN cep INT,
    IN logradouro VARCHAR(150),
    IN numero INT,
    IN bairro VARCHAR(50),
    IN cidade VARCHAR(100),
    IN uf CHAR(2)
)
BEGIN
    #Criando variavel para armazenar o ID do prontuario criado
	DECLARE id INT DEFAULT 0;
    #Crio o prontuário
    INSERT INTO tbl_prontuario (data_cadastro) VALUES (now());
    #Busco e armazeno o ID desta criação
    SET id = (SELECT LAST_INSERT_ID());
    
    INSERT INTO tbl_pacientes (id_prontuario, id_status, nome, sobrenome, email, cep, logradouro, numero, bairro, cidade, uf) VALUES (id, 1, nome, sobrenome, email, cep, logradouro, numero, bairro, cidade, uf);
END 
//

DELIMITER ;