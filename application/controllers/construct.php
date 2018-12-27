<?php
/**
 * Created by PhpStorm.
 * User: proms
 * Date: 12/23/2018
 * Time: 3:29 PM
 */

$this->load->helper('url');
$this->load->helper(array('form', 'url'));
$this->load->database();
$this->load->model('user');
$this->load->model('post');
$this->load->model('livestream');
$this->load->model('comment');
$this->load->library('session');
$this->load->model('category');
$this->load->library("pagination");
?>