USE gestao_produtos;

UPDATE produtos 
SET 
    deletado_em = CURRENT_TIMESTAMP
WHERE 
    id = 8;