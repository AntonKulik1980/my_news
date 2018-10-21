<?php

require_once realpath(MODELS.'Post.php');

class PostsController extends Controller
{


    // public function create()
    // {
    //     //Принимаем данные из формы
    //     if (isset($_POST) and !empty($_POST)) {
    //         $stmt = $this->_pdo->prepare("INSERT INTO posts (title, content, status) VALUES (?, ?, ?)");
    //         $stmt->bindParam(1, $title);
    //         $stmt->bindParam(2, $content);
    //         $stmt->bindParam(3, $status);

    //         $title = trim(strip_tags($_POST['title']));
    //         $content = trim($_POST['content']);
    //         $status = trim(strip_tags($_POST['status']));
    //         $stmt->execute();
    //         header('Location: /admin/posts');
    //     }
    //     $data['title'] = 'Admin Add Post ';
    //     $this->_view->render('admin/posts/create', $data);
    // }

    public function index()
    {
        $data = Post::selectAll();
     
        $data['title'] = 'Admin Posts Page ';
        $this->_view->render('admin/posts/index', $data);
    }

    public function store()
    {
        $opts['title'] = trim(strip_tags($_POST['title']));
        $opts['content'] = trim($_POST['content']);
        $opts['status'] = trim(strip_tags($_POST['status']));
        Post::store($opts);
       
            
            if (isset($_FILES['image'])) {
                //Каталог загрузки картинок
                $uploadDir = 'media';
                    
                //Вывод ошибок
                $errors = array();
                // pathinfo — Возвращает информацию о пути к файлу
                $type = pathinfo($_FILES['image']['name']);
                $file_ext = strtolower($type['extension']);

                $expensions= array("jpeg","jpg","png",'gif');
                //Определяем типы файлов для загрузки
                $fileTypes = array(
                    'jpg' => 'image/jpeg',
                    'png' => 'image/png',
                    'gif' => 'image/gif'
                );

                //Проверяем пустые данные или нет
                if (empty($_FILES)) {
                    $errors[] = 'File name must have name';
                } elseif ($_FILES['image']['error'] > 0) {
                    // Проверяем на ошибки
                    $errors[] = $_FILES['image']['error'];
                } elseif ($_FILES['image']['size'] > 2097152) {
                    // если размер файла превышает 2 Мб
                    $errors[] = 'File size must be excately 2 MB';
                } elseif (in_array($file_ext, $expensions)=== false) {
                    $errors[] = "extension not allowed, please choose a JPEG or PNG file.";
                } elseif (!in_array($_FILES['image']['type'], $fileTypes)) {
                    // Проверяем тип файла
                    $errors[] = 'Запрещённый тип файла';
                }
                
                if (empty($errors)) {
                
                    $type = pathinfo($_FILES['image']['name']);
                    $name = uniqid('files_') .'.'. $type['extension'];
                    move_uploaded_file($_FILES['image']['tmp_name'], $uploadDir.'/'.$name);
                   
                    $opts['filename'] = $name;
                    $opts['resource_id'] = (int)Product::lastId();
                    $opts['resource'] = $this->_resource;
                    Picture::store($opts);
    
                } else {
                    print_r($errors);
                }
            }
        $this->redirect('/admin/posts');
    }

    public function create()
    {
      $data['title'] = 'Admin Add Post ';
      $this->_view->render('admin/posts/create', $data);
    }

    public function edit($vars)
    {
        extract($vars);
        $data['title'] = 'Admin Edit Post ';
        $data['post'] = Post::getPostById($id);
        $this->_view->render('admin/posts/edit', $data);
    }

    public function update($vars)
    {
        extract($vars);
        $options['title'] = trim(strip_tags($_POST['title']));
        $options['content'] = trim($_POST['content']);
        $options['status'] = trim(strip_tags($_POST['status']));
        Post::update($id, $options);
        $this->redirect('/admin/posts');
    }

    public function delete($vars)
    {
        extract($vars);
        if (isset($_POST['submit'])) {

            Post::destroy($id);
            $this->redirect('/admin/posts');
          
        } elseif (isset($_POST['reset'])) {
            $this->redirect('/admin/posts');            
        }

        $data['title'] = 'Admin Delete Post ';
        $data['post'] = Post::getPostById($id);
        $this->_view->render('admin/posts/delete', $data);
    }

    public function show($vars)
    {
        extract($vars);
        // var_dump($id);
        $data['title'] = 'Admin Show Post ';
        $data['post'] = Post::getPostById($id);
        $this->_view->render('admin/posts/show', $data);

    }
}
