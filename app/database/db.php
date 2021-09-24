<?php
require_once('connect.php');

class DbModel
{
    private $dbConnect;

    function __construct()
    {
        $this->dbConnect = new DbConnect();
    }


    public function executeQuery($sql, $data)
    {
        $conn = $this->dbConnect->dbConnect();
        $stmt = $conn->prepare($sql);
        foreach ($data as $key => $value) {
            if (is_int($value))
                $param[$key]= PDO::PARAM_INT;
            elseif (is_bool($value))
                $param[$key]= PDO::PARAM_BOOL;
            elseif (is_null($value))
                $param[$key]= PDO::PARAM_NULL;
            elseif (is_string($value))
               $param[$key]= PDO::PARAM_STR;
            else
             $param[$key]= FALSE;    
        }

        if (isset($data)) {
            $i = 1;
            foreach($data as $key => &$value) {
                //$value = "%" . $value . "%";
                //echo 'value' . $value . 'param'. $param;
                $stmt->bindParam($i, $value, $param[$key]);
                $i++;
            }
        }
        $stmt->execute();
        return $stmt;
    }

    //Récupérer des données de la DB en sécurité
    public function selectAll($table, $conditions = [])
    {
        $conn = $this->dbConnect->dbConnect();
        $sql = "SELECT * FROM $table";
        if (empty($conditions)) {
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $records;
        } else {
            // return records that match conditions...
            // $sql = "SELECT * FROM $table WHERE username='Sara' AND admin=1;

            $i = 0;
            foreach ($conditions as $key => $value) {
                if ($i === 0) {
                    $sql = $sql . " WHERE $key=?";
                } else {
                    $sql = $sql . " AND $key=?";
                }
                $i++;
            }

            $stmt = $this->executeQuery($sql, $conditions);
            $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $rec = $records[0];
            return $rec;
        }
    }

    public function selectOne($table, $conditions)
    {
        $conn = $this->dbConnect->dbConnect();
        $sql = "SELECT * FROM $table";

        $i = 0;
        foreach ($conditions as $key => $value) {
            if ($i === 0) {
                $sql = $sql . " WHERE $key=?";
            } else {
                $sql = $sql . " AND $key=?";
            }
            $i++;
        }

        $sql = $sql . " LIMIT 1";
        $stmt = $this->executeQuery($sql, $conditions);
        $records = $stmt->fetchAll();
        $rec = $records[0];
        return $rec;
    }

    public function create($table, $data)
    {
        $conn = $this->dbConnect->dbConnect();
        $sql = "INSERT INTO $table SET ";

        $i = 0;
        foreach ($data as $key => $value) {
            if ($i === 0) {
                $sql = $sql . " $key=?";
            } else {
                $sql = $sql . ", $key=?";
            }
            $i++;
        }

        $stmt = $this->executeQuery($sql, $data);
        $id = $conn->lastInsertId();
        return $id;
    }

    public function update($table, $id, $data)
    {
        $conn = $this->dbConnect->dbConnect();
        $sql = "UPDATE $table SET ";

        $i = 0;
        foreach ($data as $key => $value) {
            if ($i === 0) {
                $sql = $sql . " $key=?";
            } else {
                $sql = $sql . ", $key=?";
            }
            $i++;
        }

        $sql = $sql . " WHERE id=?";
        $data['id'] = $id;
        $stmt = $this->executeQuery($sql, $data);
        return $stmt->affected_rows;
    }

    public function delete($table, $id)
    {
        $conn = $this->dbConnect->dbConnect();
        $sql = "DELETE FROM $table WHERE id=?";
        //$stmt = $this->executeQuery($sql, ['id' => $id]);
        //return $stmt->affected_rows;

        $stmt = $conn->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->affected_rows;
    }

    public function getPublishedPosts()
    {
        $conn = $this->dbConnect->dbConnect();
        $sql = "SELECT p.*, u.username FROM posts AS p JOIN users AS u ON p.user_id=u.id WHERE p.published=1";

        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $records;

        // $stmt = $this->executeQuery($sql, ['published' => 1]);
        // $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // return $records;
    }

    public function getPostsByTopicId($topicId)
    {
        $conn = $this->dbConnect->dbConnect();
        $sql = "SELECT p.*, u.username FROM posts AS p JOIN users AS u ON p.user_id=u.id WHERE p.published=? AND topic_id=?";

        $stmt = $this->executeQuery($sql, ['published' => 1, 'topic_id' => $topicId]);
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //$rec = $records[0];
        return $records;
    }

    public function searchPosts($term)
    {
        $match = '%' . $term . '%';
        $conn = $this->dbConnect->dbConnect();
        $sql = "SELECT 
                    p.*, u.username 
                FROM posts AS p 
                JOIN users AS u 
                ON p.user_id=u.id 
                WHERE p.published=?
                AND p.title LIKE ? OR p.body LIKE ? ";

        $stmt = $this->executeQuery($sql, ['published' => 1, 'title' => $match, 'body' => $match]);
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $records;
    }

    public function getReportedComments($postId)
    {
        $conn = $this->dbConnect->dbConnect();
        $sql = "SELECT c.*, u.username FROM comments AS c JOIN users AS u ON c.user_id=u.id WHERE c.published='1' AND c.reported='1' AND c.post_id=? ";

        // $stmt = $this->executeQuery($sql, ['published' => 1, 'reported' => 1, 'post_id' => $postId]);
        // $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // return $records;

        $stmt = $conn->prepare($sql);
        $stmt->execute([$postId]);
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $records;
    }

    public function getPublishedComments($postId)
    {
        $conn = $this->dbConnect->dbConnect();
        $sql = "SELECT c.*, u.username FROM comments AS c JOIN users AS u ON c.user_id=u.id WHERE c.published=1 AND c.reported=0 AND c.post_id=? ";

        // $stmt = $this->executeQuery($sql, ['published' => 1, 'reported' => 0, 'post_id' => $postId]);
        // $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // return $records;

        $stmt = $conn->prepare($sql);
        $stmt->execute([$postId]);
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $records;
    }

    public function getCommentsForAdmin()
    {
        $conn = $this->dbConnect->dbConnect();
        $sql = "SELECT c.*, u.username, p.title FROM comments AS c
        LEFT JOIN users AS u ON c.user_id=u.id
        LEFT JOIN posts AS p ON c.post_id=p.id";

        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $records;
    }

    public function getPostsForAdmin()
    {
        $conn = $this->dbConnect->dbConnect();
        $sql = "SELECT p.*, u.username, t.name FROM posts AS p
        LEFT JOIN users AS u ON p.user_id=u.id
        LEFT JOIN topics AS t ON p.topic_id=t.id";

        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $records;
    }
}
