<?php
    namespace model;

    class BlogDB
    {
        private $connection;

        public function __construct($connection)
        {
            $this->connection = $connection;
        }

        public function create($blog){
            $sql = "INSERT INTO `blogs`(`title`, `introduct`, `content`, `created`) VALUES (?, ?, ?, ?)";
            $statement = $this->connection->prepare($sql);
            $statement->bindParam(1, $blog->title);
            $statement->bindParam(2, $blog->teaser);
            $statement->bindParam(3, $blog->content);
            $statement->bindParam(4, $blog->created);
            return $statement->execute();
        }

        public function getAll()
        {
            $sql = "SELECT * FROM `blogs`";
            $statement = $this->connection->prepare($sql);
            $statement->execute();
            $result = $statement->fetchAll();
            $blogs = [];
            foreach ($result as $row) {
                $blog = new Blog($row['title'], $row['introduction'], $row['content'], $row['created']);
                $blog->id = $row['id'];
                $blogs[] = $blog;
            }
            return $blogs;
        }
    }