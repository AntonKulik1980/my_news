<?php
class Post extends Model
{
    public $id;
    public $title;
    public $content;
    public $created_at;

    const SHOW_BY_DEFAULT = FRONT_MAXPAGE;

    public static function selectAll()
    {
        $stmt = (new self)->pdo->prepare("SELECT * FROM posts");
        $stmt->execute();
        $data['rowCount'] = $stmt->rowCount();
        $data['posts'] = $stmt->fetchAll(PDO::FETCH_CLASS);
        return $data;
    }

    public static function store($parameters)
    {
        $sql = "INSERT INTO posts (title, content, status) VALUES (?, ?, ?)";
        $statment=(new self)->pdo->prepare($sql);
        $statment->bindParam(1, $title);
        $statment->bindParam(2, $content);
        $statment->bindParam(3, $status);
        $title = $parameters['title'];
        $content = $parameters['content'];
        $status = $parameters['status'];
        $statment->execute();
    }

    public static function getPostById($id) 
    {
        $sql = "SELECT * FROM posts WHERE id = :id";
        $res = (new self)->pdo->prepare($sql);
        $res->bindParam(':id', $id, PDO::PARAM_INT);
        $res->execute();
        $data = $res->fetch();
        return $data;
    }

    public static function getPostBySlug($slug) 
    {
        $sql = "SELECT * FROM posts WHERE slug = :slug";
        $res = (new self)->pdo->prepare($sql);
        $res->bindParam(':slug', $slug, PDO::PARAM_STR);
        $res->execute();
        $post = $res->fetch(PDO::FETCH_ASSOC);
        return $post;
    }

    public static function destroy($id) 
    {
        $sql = "DELETE FROM posts WHERE id = :id";
        $res = (new self)->pdo->prepare($sql);
        $res->bindParam(':id', $id, PDO::PARAM_INT);
        return $res->execute();
    }

    public static function update($id, $options) 
    {
        $sql = "
                UPDATE posts
                SET
                    title = :title,
                    content = :content,
                    status = :status
                WHERE id = :id
                ";

        $res = (new self)->pdo->prepare($sql);
        $res->bindParam(':title', $options['title'], PDO::PARAM_STR);
        $res->bindParam(':content', $options['content'], PDO::PARAM_STR);
        $res->bindParam(':status', $options['status'], PDO::PARAM_INT);
        $res->bindParam(':id', $id, PDO::PARAM_INT);
        $res->execute();
    }


    /**
     * Получаем последние Posts
     *
     * @param int $page
     * @return array
     */
    public static function getLatestPosts($page = 1)
    {

        $limit = self::SHOW_BY_DEFAULT;

        //Задаем смещение
        $offset = ($page - 1) * self::SHOW_BY_DEFAULT;
        $sql = "SELECT *
                  FROM posts
                  WHERE status = 1
                  ORDER BY id DESC
                  LIMIT :limit OFFSET :offset
                ";

        //Подготавливаем данные
        $res = (new self)->pdo->prepare($sql);
        $res->bindParam(':limit', $limit, PDO::PARAM_INT);
        $res->bindParam(':offset', $offset, PDO::PARAM_INT);

        //Выполняем запрос
        $res->execute();

        //Получаем и возвращаем результат
        $posts = $res->fetchAll(PDO::FETCH_ASSOC);

        return $posts;
    }

    public static function getTotalPosts()
    {
        $sql = "SELECT count(id) AS count FROM posts WHERE status=1 ";
        $res = (new self)->pdo->prepare($sql);
        $res->execute();
        // Возвращаем значение count - количество
        $row = $res->fetch();
        return $row['count'];
    }

    public static function searchPost($query)
    {
        $sql = "SELECT *
            FROM posts 
            WHERE status = 1 
              and ((title LIKE '%{$query}%') 
              OR (content LIKE '%{$query}%'))";

        $res = (new self)->pdo->prepare($sql);
        $res->execute();
        $posts = $res->fetchAll(PDO::FETCH_ASSOC);
        return $posts;
    }
}
