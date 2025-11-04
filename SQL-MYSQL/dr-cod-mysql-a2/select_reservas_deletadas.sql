USE hospeda_brasil;

SELECT 
    h.nome_completo AS nome_hospede,
    a.nome_completo AS nome_anfitriao,
    ho.titulo AS titulo_hospedagem,
    r.deletado_em AS data_exclusao
FROM 
    reservas AS r
INNER JOIN 
    hospedes AS h ON r.id_hospede = h.id_hospede
INNER JOIN 
    hospedagens AS ho ON r.id_hospedagem = ho.id_hospedagem
INNER JOIN 
    anfitrioes AS a ON ho.id_anfitriao = a.id_anfitriao
WHERE 
    r.deletado_em IS NOT NULL;