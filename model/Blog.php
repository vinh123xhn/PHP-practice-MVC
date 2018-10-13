<?php
    namespace model;

    class Blog{
        public $id;
        public $title;
        public $introduction;
        public $content;
        public $created;

        public function __construct($title, $introduction, $content,$created){
            $this->title = $title;
            $this->introduction = $introduction;
            $this->content = $content;
            $this->created = $created;
        }


    }