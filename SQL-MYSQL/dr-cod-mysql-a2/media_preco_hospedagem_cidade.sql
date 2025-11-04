USE hospeda_brasil;

SELECT 
    ho.cidade,
    AVG(r.valor_noite) AS media_valor_diaria
FROM 
    reservas AS r
INNER JOIN 
    hospedagens AS ho ON r.id_hospedagem = ho.id_hospedagem
GROUP BY 
    ho.cidade;