SELECT t.id, t.name, t.price, t.image, s.quantity, m.name AS magasin, m.postal_code, m.city, b.name AS marque
FROM stock AS s
INNER JOIN toys AS t ON s.toy_id = t.id
INNER JOIN stores AS m ON s.store_id = m.id
INNER JOIN brands AS b ON t.brand_id = b.id
WHERE m.id = 1