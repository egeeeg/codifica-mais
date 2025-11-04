USE gestao_produtos;

UPDATE produtos 
SET 
    preco = 199.90
WHERE 
    id = 1;

UPDATE produtos 
SET 
    quantidade = 5,
    descricao = 'Cadeira ergonômica com mais espuma'
WHERE 
    id = 6;

UPDATE produtos 
SET 
    nome = 'Monitor 29" LG'
WHERE 
    id = 3;