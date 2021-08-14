
CREATE TABLE PROJETO (
                id INT IDENTITY NOT NULL,
                nome VARCHAR(50) NOT NULL,
                data_inicio DATETIME NOT NULL,
                data_fim DATETIME NOT NULL,
                data_concluido DATETIME,
                CONSTRAINT PROJETO_pk PRIMARY KEY (id)
)

CREATE TABLE ATIVIDADE (
                id BIGINT IDENTITY NOT NULL,
                PROJETO_id INT NOT NULL,
                nome VARCHAR(50) NOT NULL,
                data_inicio DATETIME NOT NULL,
                data_fim DATETIME NOT NULL,
                data_concluido DATETIME,
                CONSTRAINT ATIVIDADE_pk PRIMARY KEY (id)
)

ALTER TABLE ATIVIDADE ADD CONSTRAINT PROJETO_ATIVIDADE_fk
FOREIGN KEY (PROJETO_id)
REFERENCES PROJETO (id)
ON DELETE NO ACTION
ON UPDATE NO ACTION