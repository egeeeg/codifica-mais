USE hospeda_brasil;

SELECT 
    h.nome_completo AS nome_hospede,
    ho.titulo AS titulo_hospedagem,
    s.status_nome AS status_reserva
FROM 
    reservas AS r
INNER JOIN 
    hospedes AS h ON r.id_hospede = h.id_hospede
INNER JOIN 
    hospedagens AS ho ON r.id_hospedagem = ho.id_hospedagem
INNER JOIN 
    status_reservas AS s ON r.status_id = s.id_status;