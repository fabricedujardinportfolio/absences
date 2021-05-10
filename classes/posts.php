
<?php
require "database.php";
class Post extends Databases
{
    public function getAllPosts(){
        $sql = "SELECT * FROM `posts`";
        $result =  $this->getConnection()->query($sql);
        return $result;
    }
    public function getPost($postId){
        $sql = "SELECT * FROM `posts` WHERE id = ?";
        $result =  $this->getConnection()->prepare($sql);
        $result->execute([
            $postId
        ]);
        return $result;
    }
    public function setUpdate(){  
        // $_GET['id'],$_GET['date_start'],$_GET['date_end'],$_GET['date_start'];
        // $id = $_GET['id'] ;
        // var_dump($id);     
        // $dateStart = $_GET['date_start'];
        // var_dump($dateStart);
        // $dateEnd = $_GET['date_end'];
        // var_dump($dateEnd);
        // $motif = $_GET['motif'];
        // var_dump($motif);
        // $sql = "UPDATE posts SET title = ?, content = ?, Users_id = ?, Categories_id = ?, date = ? WHERE id = ?";
        // $result =  $this->getConnection()->prepare($sql);
        // $result->execute([$_POST["title"],$_POST["content"],$Users_id_int,$Categories_id_int,$date,$_POST["id"]]);
        // return $result;
               
    }
    public function setDelete(){   
    echo "salut";
            $sqldelete = ('DELETE FROM absences_absences WHERE id = ? ');
            $result =  $this->getConnection()->prepare($sqldelete);
            $result->execute([$_GET['id']]);  
            // $msg = 'You have deleted the post!';
            header('Location: ../index.php');
    }
    // public function setCreate(){
    //     $Title = isset($_POST['title']) ? $_POST['title'] : '';
    //     $Content = isset($_POST['content']) ? $_POST['content'] : '';
    //     $Users_id = isset($_POST['Users_id']) ? $_POST['Users_id'] : '';
    //     $Users_id_int = (int)$Users_id; 
    //     $id=(int)""; 
    //     $Categories_id = isset($_POST['categories_id']) ? $_POST['categories_id'] : '';
    //     $Categories_id_int = (int)$Categories_id;  
    //     $date = date("Y-m-d H:i:s"); 
    //     $sqlInsertPost = 'INSERT INTO `posts` (`title`,`content`,`Users_id`,`Categories_id`,`date`) VALUES (?, ?, ?, ?, ?)';
    //     $result =  $this->getConnection()->prepare($sqlInsertPost);
    //     $result->execute([$Title,$Content,$Users_id_int,$Categories_id_int,$date]);
    //     $msg = 'Created Successfully!'; 
    //     header('Location: ../index.php');
    // }

}