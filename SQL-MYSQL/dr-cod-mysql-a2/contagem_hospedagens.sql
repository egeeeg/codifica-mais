USE hospeda_brasil;

SELECT 
    a.nome_completo, 
    COUNT(h.id_hospedagem) AS contagem_hospedagens
FROM 
    anfitrioes AS a
INNER JOIN 
    hospedagens AS h ON a.id_anfitriao = h.id_anfitriao
GROUP BY 
    a.id_anfitriao, a.nome_completo;