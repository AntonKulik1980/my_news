<?php

require_once realpath(MODELS.'Post.php');

class HomeController extends Controller
{

    public function index($vars)
    {
        extract($vars);
        $page = $page? $page:1;
     
        $posts = Post::getLatestPosts($page);
    
        //Общее кол-во posts (для пагинации)
        $total = Post::getTotalPosts();

        $pagination = new Pagination($total, $page, Post::SHOW_BY_DEFAULT, 'page-');
    
        $data['pagination'] = $pagination;

        $data['breadcrumb'] = $this->breadcrumb->build(
            array(
                'All Blog Posts' => 'blog',
            )
        );
        $data['title'] = 'My <b>News</b>';
        $data['subtitle'] = 'Lorem Ipsum не є випадковим набором літер';
        $data['rowCount'] = $total;
        $data['posts'] = $posts;
        $this->_view->render('blog/index', $data);
    }

    public function show($vars)
    {
        extract($vars);
        $post = Post::getPostById($id);
        $data['post'] = $post;
        $data['breadcrumb'] = $this->breadcrumb->build(
            array( 'All Blog Posts' => 'blog', $post['title'] => '',)
        );
        $data['title'] = 'My News ';
        $this->_view->render('blog/show', $data);
    }

}
