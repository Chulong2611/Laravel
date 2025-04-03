-- solution_b.sql
-- 1. Liệt kê các hóa đơn của khách hàng
SELECT users.user_id, users.user_name, orders.order_id 
FROM users 
JOIN orders ON users.user_id = orders.user_id;

-- 2. Liệt kê số lượng các hóa đơn của khách hàng
SELECT users.user_id, users.user_name, COUNT(orders.order_id) AS total_orders 
FROM users 
LEFT JOIN orders ON users.user_id = orders.user_id 
GROUP BY users.user_id, users.user_name;

-- 3. Liệt kê thông tin hóa đơn: mã đơn hàng, số sản phẩm
SELECT orders.order_id, COUNT(order_details.product_id) AS total_products 
FROM orders 
JOIN order_details ON orders.order_id = order_details.order_id 
GROUP BY orders.order_id;

-- 4. Liệt kê thông tin mua hàng của người dùng
SELECT users.user_id, users.user_name, orders.order_id, GROUP_CONCAT(products.product_name ORDER BY products.product_name SEPARATOR ', ') AS product_names
FROM users 
JOIN orders ON users.user_id = orders.user_id 
JOIN order_details ON orders.order_id = order_details.order_id 
JOIN products ON order_details.product_id = products.product_id 
GROUP BY orders.order_id, users.user_id, users.user_name;

-- 5. Liệt kê 7 người dùng có số lượng đơn hàng nhiều nhất
SELECT users.user_id, users.user_name, COUNT(orders.order_id) AS total_orders 
FROM users 
JOIN orders ON users.user_id = orders.user_id 
GROUP BY users.user_id, users.user_name 
ORDER BY total_orders DESC 
LIMIT 7;

-- 6. Liệt kê 7 người dùng mua sản phẩm có tên: Samsung hoặc Apple
SELECT DISTINCT users.user_id, users.user_name, orders.order_id, products.product_name 
FROM users 
JOIN orders ON users.user_id = orders.user_id 
JOIN order_details ON orders.order_id = order_details.order_id 
JOIN products ON order_details.product_id = products.product_id 
WHERE products.product_name LIKE '%Samsung%' OR products.product_name LIKE '%Apple%'
LIMIT 7;

-- 7. Liệt kê danh sách mua hàng của user bao gồm giá tiền của mỗi đơn hàng
SELECT users.user_id, users.user_name, orders.order_id, SUM(products.product_price) AS total_price
FROM users 
JOIN orders ON users.user_id = orders.user_id 
JOIN order_details ON orders.order_id = order_details.order_id 
JOIN products ON order_details.product_id = products.product_id 
GROUP BY users.user_id, users.user_name, orders.order_id;

-- 8. Mỗi user chỉ chọn ra 1 đơn hàng có giá tiền lớn nhất
SELECT user_id, user_name, order_id, total_price FROM (
    SELECT users.user_id, users.user_name, orders.order_id, SUM(products.product_price) AS total_price,
    RANK() OVER (PARTITION BY users.user_id ORDER BY SUM(products.product_price) DESC) AS rank_order
    FROM users 
    JOIN orders ON users.user_id = orders.user_id 
    JOIN order_details ON orders.order_id = order_details.order_id 
    JOIN products ON order_details.product_id = products.product_id 
    GROUP BY users.user_id, users.user_name, orders.order_id
) ranked_orders WHERE rank_order = 1;

-- 9. Mỗi user chỉ chọn ra 1 đơn hàng có giá tiền nhỏ nhất
SELECT user_id, user_name, order_id, total_price, total_products FROM (
    SELECT users.user_id, users.user_name, orders.order_id, SUM(products.product_price) AS total_price, COUNT(order_details.product_id) AS total_products,
    RANK() OVER (PARTITION BY users.user_id ORDER BY SUM(products.product_price) ASC) AS rank_order
    FROM users 
    JOIN orders ON users.user_id = orders.user_id 
    JOIN order_details ON orders.order_id = order_details.order_id 
    JOIN products ON order_details.product_id = products.product_id 
    GROUP BY users.user_id, users.user_name, orders.order_id
) ranked_orders WHERE rank_order = 1;

-- 10. Mỗi user chỉ chọn ra 1 đơn hàng có số sản phẩm là nhiều nhất
SELECT user_id, user_name, order_id, total_price, total_products FROM (
    SELECT users.user_id, users.user_name, orders.order_id, SUM(products.product_price) AS total_price, COUNT(order_details.product_id) AS total_products,
    RANK() OVER (PARTITION BY users.user_id ORDER BY COUNT(order_details.product_id) DESC) AS rank_order
    FROM users 
    JOIN orders ON users.user_id = orders.user_id 
    JOIN order_details ON orders.order_id = order_details.order_id 
    JOIN products ON order_details.product_id = products.product_id 
    GROUP BY users.user_id, users.user_name, orders.order_id
) ranked_orders WHERE rank_order = 1;