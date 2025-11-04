USE gestao_produtos;

SELECT 
    id,
    nome,
    preco,
    quantidade,
    categoria
FROM 
    produtos 
WHERE 
    quantidade > 5 
    AND deletado_em IS NULL;