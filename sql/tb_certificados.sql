CREATE TABLE certificados (

    idAplicacao int(11) NOT NULL AUTO_INCREMENT,
    status varchar(100) NOT NULL,
    id varchar(100) NOT NULL, 
    pedidoExt varchar(100) NOT NULL, 
    referenciaExt varchar(100) NOT NULL, 
    solicitacao varchar(100) NOT NULL, 
    titular varchar(100) NOT NULL, 
    dataAprovacao DATETIME NOT NULL, 
    situacao varchar(100) NOT NULL, 
    dataSituacao DATETIME NOT NULL, 
    recusas varchar(100) NOT NULL, 
    email varchar(100) NOT NULL, 
    unidadeExt varchar(100) NOT NULL, 
    unidade varchar(100) NOT NULL, 
    extProduto varchar(100) NOT NULL, 
    extProdutoNome varchar(100) NOT NULL, 
    idusuario varchar(100) NOT NULL, 
    usuario varchar(100) NOT NULL, 
    idcertificado varchar(100) NOT NULL, 
    renovacao varchar(100) NOT NULL, 
    videoconferencia varchar(100) NOT NULL, 
    atendimentoexterno varchar(100) NOT NULL, 
    certificado varchar(100) NOT NULL, 
    campo1 varchar(100) NOT NULL, 
    campo2 varchar(100) NOT NULL, 
    campo3 varchar(100) NOT NULL, 
    validade varchar(100) NOT NULL,
    PRIMARY KEY(idAplicacao)
);
