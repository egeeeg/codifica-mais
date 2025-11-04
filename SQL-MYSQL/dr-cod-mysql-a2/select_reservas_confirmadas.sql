USE hospeda_brasil;

SELECT 
    r.*
FROM 
    reservas AS r
INNER JOIN 
    status_reservas AS s ON r.status_id = s.id_status
WHERE 
    s.status_nome = 'Confirmada'
    AND r.data_checkin > '2025-05-31'
    AND r.deletado_em IS NULL;