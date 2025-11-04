USE gestao_produtos;

SELECT 
    p.id AS id_do_produto,
    p.nome AS nome_do_produto,
    p.preco,
    f.razao_social AS nome_do_fornecedor,
    f.cnpj AS cnpj_do_fornecedor
FROM 
    produtos AS p
INNER JOIN 
    fornecedores AS f 
    ON p.id_fornecedor = f.id
WHERE
    p.deletado_em IS NULL;