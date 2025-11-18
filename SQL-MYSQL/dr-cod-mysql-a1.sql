USE gestao_produtos;
CREATE TABLE produtos (
	id VARCHAR(255) PRIMARY KEY,
	nome VARCHAR(255),
	descrição VARCHAR(255),
	categoria VARCHAR(255),
	preco VARCHAR(255),
	peso VARCHAR(255),
	quantidade VARCHAR(255),
	fornecedor VARCHAR(255),
	criado_em VARCHAR(255),
	atualizado_em VARCHAR(255),
	deletado_em VARCHAR(255)
);

CREATE TABLE fornecedores (
	id VARCHAR(255) PRIMARY KEY,
	razao_social VARCHAR(14),
	cnpj VARCHAR(14),
	criado_em VARCHAR(255),
	atualizado_em VARCHAR(255),
	deletado_em VARCHAR(255)
);


