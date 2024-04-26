SELECT t.id AS toy_id, t.name, t.price, t.image, m.name AS magasin, s.quantity
FROM toys AS t
INNER JOIN stock AS s ON s.toy_id
INNER JOIN stores AS m ON s.store_id = m.id
WHERE m.id =4; 
