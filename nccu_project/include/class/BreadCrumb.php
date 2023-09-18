<?php

    class Breadcrumb{

        public $breadcrumbObj;

        public function generateCurrCrumb($name){

            $this -> breadcrumbObj = '<li class="breadcrumb-item active" aria-current="page">'.

            $name.'<li>';

        }

        public function generateParentCrumb($name, $url){

            $this -> breadcrumbObj = '<li class="breadcrumb-item"><a href="'.$url.'">'.$name.'</a></li>';

            return $this -> breadcrumbObj;
        }

    }

?>