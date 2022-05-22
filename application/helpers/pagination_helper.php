<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

if (!function_exists('loadPaginationConfig')) {
    function loadPaginationConfig($uri, $totalRows, $uriSegment = 4, $perPage = 5)
    {
        $itemsPerPage = $perPage;
        if (@$_SESSION['itemsPerPage']) {
            $itemsPerPage = $_SESSION['itemsPerPage'];
        }

        $config['reuse_query_string'] = true;
        $config["base_url"] = $uri;
        $config["total_rows"] = $totalRows;
        $config["per_page"] = 10; //$itemsPerPage;
        $config["num_links"] = 5;
        $config["uri_segment"] = $uriSegment;
        $config['full_tag_open'] = '<ul class="pagination m-0 ms-auto">';
        $config['full_tag_close'] = '</ul>';
        $config['attributes'] = ['class' => 'page-link'];
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a href="#" class="page-link">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';

        return $config;
    }
}