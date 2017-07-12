CREATE TABLE  professor (
  idProfessor SERIAL,
  nomeProfessor varchar(50) NOT NULL,
  emailProfessor varchar(50) NOT NULL,
  senhaProfessor varchar(30) NOT NULL,
titulacaoProfessor varchar (50) NOT NULL,
  areaInteresseProfessor varchar(50) NOT NULL,
  PRIMARY KEY (idProfessor)
);

CREATE TABLE  aluno (
  idAluno SERIAL,
  nomeAluno varchar(50) NOT NULL,
  emailAluno varchar (50) NOT NULL,
  matriculaAluno varchar(15) NOT NULL,
  senhaAluno varchar(30) NOT NULL,
  PRIMARY KEY (idAluno)
);

CREATE TABLE  tcc (
    idTcc SERIAL,
    tituloTcc varchar(100) NOT NULL,
    notaTcc int(10),
    comentarioTcc varchar(100),
    monografiaTcc longblob,
    PRIMARY KEY (idTcc),
    idOrientando integer references aluno (idAluno),
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