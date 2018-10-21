<?php

// DashboardController.php

class DashboardController extends Controller
{
    public function index()
    {
        $this->_view->render('admin/index', ['title'=>'Dashboard Controller PAGE']);
    }
}
