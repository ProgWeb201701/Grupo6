/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Author:  Bruno
 * Created: 14/06/2017
 */

CREATE TABLE  professor (
  idProfessor SERIAL,
  nomeProfessor varchar(15) NOT NULL,
  emailProfessor varchar(50) NOT NULL,
  senhaProfessor varchar(30) NOT NULL,
  areaInteresseProfessor varchar(50) NOT NULL,
  PRIMARY KEY (idProfessor)
);

CREATE TABLE  aluno (
  idAluno SERIAL,
  nomeAluno varchar(15) NOT NULL,
  matriculaAluno varchar(50) NOT NULL,
  senhaAluno varchar(30) NOT NULL,
  PRIMARY KEY (idAluno)
);

CREATE TABLE  tcc (
    idTcc SERIAL,
    tituloTcc varchar(15) NOT NULL,
    PRIMARY KEY (idTcc),
    idOrientado integer references aluno (idAluno),
    idOrientador integer references professor (idProfessor),
    idAvaliadorUm integer references professor (idProfessor),
    idAvaliadorDois integer references professor (idProfessor)
);

CREATE TABLE  coordenador (
  idCoordenador SERIAL,
  dataInicio varchar(15) NOT NULL,
  dataFim varchar (15) NOT NULL,
  idProfessor integer references professor (idProfessor),
  PRIMARY KEY (idCoordenador)
);