<?php
class Breadcrumb
{
    private $_breadcrumb;

    private $_separator = ' / ';

    private $_domain = DOMAIN;

    public function build($array)
    {
        $breadcrumbs = array_merge(array('Home' => ''), $array);

        $count = 0;

        foreach ($breadcrumbs as $title => $link) {
            $this->_breadcrumb .= '
            <span itemscope="" itemtype="">
                <a href="'.$this->_domain. '/'.$link.'" itemprop="url">
                <span itemprop="title">'.$title.'</span>
                </a>
            </span>';

            $count++;

            if ($count !== count($breadcrumbs)) {
                $this->_breadcrumb .= $this->_separator;
            }
        }
        return $this->_breadcrumb;
    }
}
