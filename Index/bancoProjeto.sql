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
  PRIMARY KEY (idProfessor)
);

CREATE TABLE  aluno (
  idAluno SERIAL,
  nomeAluno varchar(15) NOT NULL,
  matriculaAluno varchar(50) NOT NULL,
  senhaAluno varchar(30) NOT NULL,
  PRIMARY KEY (idAluno)
);

CREATE TABLE  monografia (
  idMonografia SERIAL,
  tituloMonografia varchar(15) NOT NULL,
  temaMonografia varchar(50) NOT NULL,
  anoMonografia varchar(30) NOT NULL,
  PRIMARY KEY (idMonografia),
  idAluno integer references aluno (idAluno),
  idProfessor integer references professor (idProfessor)
);
