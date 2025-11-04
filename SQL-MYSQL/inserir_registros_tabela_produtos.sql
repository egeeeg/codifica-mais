USE gestao_produtos;

INSERT INTO 
    produtos (nome, descricao, categoria, preco, peso, quantidade, id_fornecedor) 
VALUES
    ('Mouse RGB', 'Mouse óptico', 'Periféricos', 180.50, 0.250, 15, 1),
    ('Teclado Mecânico', 'Teclado ABNT2', 'Periféricos', 350.00, 0.800, 10, 1),
    ('Monitor 29"', 'Monitor 1080p', 'Monitores', 1100.00, 4.500, 5, 2),
    ('SSD 1TB', 'SSD M.2 de alta velocidade', 'Hardware', 650.00, 0.100, 8, 1),
    ('Memória RAM 16GB', 'DDR4', 'Hardware', 480.00, 0.080, 20, 2),
    ('Cadeira Gamer', 'Cadeira ergonômica', 'Móveis', 1350.00, 18.000, 3, 3),
    ('Headset', 'Headset com microfone', 'Periféricos', 550.00, 0.400, 7, 1),
    ('Placa de Vídeo', 'GPU para jogos', 'Hardware', 2800.00, 1.200, 4, 2),
    ('Gabinete', 'Gabinete com vidro temperado', 'Hardware', 300.00, 5.000, 6, 3),
    ('Mousepad Grande', 'Mousepad 90x40cm', 'Periféricos', 90.00, 0.300, 30, 3);