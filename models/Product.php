<?php
class Product
{
    //Количество отображаемых товаров по умолчанию
    const SHOW_BY_DEFAULT = 6;

    /**
     * Выводит список всех товаров
    */
    public static function selectAll()
    {
        $pdo = Connection::dbFactory(include DB_CONFIG_FILE);
        $stmt = $pdo->query("SELECT * FROM products ORDER BY id ASC");
        $data['rowCount'] = $stmt->rowCount();
        $data['products'] = $stmt->fetchAll(PDO::FETCH_CLASS);
        return $data;
    }

    public static function getProducts()
    {
        $pdo = Connection::dbFactory(include DB_CONFIG_FILE);
        $sql = "SELECT t1.*, t2.filename as picture
                FROM products t1
                JOIN pictures t2
                ON t2.resource = 'products' 
                AND t1.id = t2.resource_id
                ORDER BY id ASC";
      
        $res = $pdo->query($sql);
        $products = $res->fetchAll(PDO::FETCH_ASSOC);
        return $products;
    }


    /**
     * Получаем последние товары
     *
     * @param int $page
     * @return array
     */
    public static function getLatestProducts($page = 1)
    {
        $limit = self::SHOW_BY_DEFAULT;

        //Задаем смещение
        $offset = ($page - 1) * self::SHOW_BY_DEFAULT;

        $pdo = Connection::dbFactory(include DB_CONFIG_FILE);

        $sql = "SELECT id, name, price, is_new, description
                  FROM products
                    WHERE status = 1
                      ORDER BY id DESC
                        LIMIT :limit OFFSET :offset
                ";

        //Подготавливаем данные
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
        //Выполняем запрос
        $stmt->execute();
        //Получаем и возвращаем результат
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $products;
    }

    /**
     * Добавление продукта
     *
     * @param $options - характеристики товара
     * @return int|string
     */
    public static function store($options)
    {
        $pdo = Connection::dbFactory(include DB_CONFIG_FILE);
        $sql = "INSERT INTO products(
                name, slug, category_id, price, brand,
                description, is_new, status)
                VALUES (:name, :slug,:category_id, :price,
                :brand, :description, :is_new, :status)";
        $stmt = $pdo->prepare($sql);
        
        $slug = Slug::makeSlug($options['name'], array('transliterate' => true));
                
        $stmt->bindParam(':name', $options['name'], PDO::PARAM_STR);
        $stmt->bindParam(':slug', $slug, PDO::PARAM_STR);
        $stmt->bindParam(':category_id', $options['category'], PDO::PARAM_INT);
        $stmt->bindParam(':price', $options['price'], PDO::PARAM_INT);
        $stmt->bindParam(':brand', $options['brand'], PDO::PARAM_STR);
        $stmt->bindParam(':description', $options['description'], PDO::PARAM_STR);
        $stmt->bindParam(':is_new', $options['is_new'], PDO::PARAM_INT);
        $stmt->bindParam(':status', $options['status'], PDO::PARAM_INT);
        $stmt->execute();
        
    }

    public static function lastId() 
    {
        $pdo = Connection::dbFactory(include DB_CONFIG_FILE);
        $stmt = $pdo->prepare("SELECT id FROM products ORDER BY id DESC LIMIT 1");
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC)['id'];
    }


    /**
     * Общее кол-во товаров в магазине
     *
     * @return mixed
     */
    public static function getTotalProducts()
    {

        // Соединение с БД
        $pdo = Connection::dbFactory(include DB_CONFIG_FILE);

        // Текст запроса к БД
        $sql = "SELECT count(id) AS count FROM products WHERE status=1 ";

        // Выполнение коменды
        $stmt = $pdo->query($sql);

        // Возвращаем значение count - количество
        $row = $stmt->fetch();
        return $row['count'];
    }

    /**
     * Выбираем товар по идентификатору
     *
     * @param $productId
     * @return mixed
     */
    public static function getProductById($productId)
    {

        $pdo = Connection::dbFactory(include DB_CONFIG_FILE);
        $sql = "SELECT * FROM products WHERE id = :id";

        $res = $pdo->prepare($sql);
        $res->bindParam(':id', $productId, PDO::PARAM_INT);
        $res->execute();

        $product = $res->fetch(PDO::FETCH_ASSOC);

        return $product;
    }

    public static function getProductBySlug($slug)
    {

        $pdo = Connection::dbFactory(include DB_CONFIG_FILE);

        $sql = "SELECT * FROM products WHERE slug = :slug";

        $res = $pdo->prepare($sql);
        $res->bindParam(':slug', $slug, PDO::PARAM_STR);
        $res->execute();

        $product = $res->fetch(PDO::FETCH_ASSOC);

        return $product;
    }
    /**
     * Изменение товара
     *
     * @param $id
     * @param $options
     * @return bool
     */
    public static function update($id, $options)
    {

        $pdo = Connection::dbFactory(include DB_CONFIG_FILE);

        $sql = "
                UPDATE products
                SET
                    name = :name,
                    category_id = :category,
                    price = :price,
                    brand = :brand,
                    description = :description,
                    is_new = :is_new,
                    status = :status
                WHERE id = :id
                ";

        $res = $pdo->prepare($sql);

        $res->bindParam(':name', $options['name'], PDO::PARAM_STR);
        $res->bindParam(':category', $options['category'], PDO::PARAM_INT);
        $res->bindParam(':price', $options['price'], PDO::PARAM_INT);
        $res->bindParam(':brand', $options['brand'], PDO::PARAM_STR);
        $res->bindParam(':description', $options['description'], PDO::PARAM_STR);
        $res->bindParam(':is_new', $options['is_new'], PDO::PARAM_INT);
        $res->bindParam(':status', $options['status'], PDO::PARAM_INT);
        $res->bindParam(':id', $id, PDO::PARAM_INT);

        return $res->execute();
    }

    /**
     * Выборка товаров по массиву id
     *
     * @param $arrayIds
     * @return array
    */
    public static function getProductsByIds($arrayIds)
    {

        $pdo = Connection::dbFactory(include DB_CONFIG_FILE);

        //Разбиваем пришедший массив в строку

        $stringIds = "(".implode(',', $arrayIds).")";

        $sql = "SELECT * FROM products WHERE id IN $stringIds";

        $sth = $pdo->prepare($sql);
        
        $sth->execute();

        $products = $sth->fetchAll(PDO::FETCH_ASSOC);

        return $products;
    }

    /**
     * Удаление товара(админка)
     *
     * @param $id
     * @return bool
     */
    public static function destroy($id)
    {
        $pdo = Connection::dbFactory(include DB_CONFIG_FILE);
        $sql = "DELETE FROM products WHERE id = :id";
        $res = $pdo->prepare($sql);
        $res->bindParam(':id', $id, PDO::PARAM_INT);
        return $res->execute();
    }

}
