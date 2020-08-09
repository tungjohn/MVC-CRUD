<?php
class AuthorModel extends Database {

    public $table = "authors";

    public function getAll() {

        $sqlSelect = "SELECT * FROM $this->table";
      
        $result = mysqli_query($this->connection, $sqlSelect);

        return $result;
    }

    public function upload($data) {
        
        $uploadDir = "mvc/uploads/";
        $uploadFile = $uploadDir . basename($_FILES['author_image']['name']);
        $imageFileType = pathinfo($uploadFile,PATHINFO_EXTENSION);
        $maxfilesize   = 800000; 
        $allowtypes    = array('jpg', 'png', 'jpeg', 'gif');
        $error=[];

        if (isset($_POST['submit'])) 
        {
            if (isset($_FILES) && $_FILES['author_image']['error'] == 0) 
            {
                $checkimg = getimagesize($_FILES['author_image']['tmp_name']);
                if ($checkimg == false) 
                {
                    $error[] = 'File up load không phải là ảnh';
                }
                
                if ($_FILES['author_image']['size'] > $maxfilesize)
                {
                    $error[] = 'Không thể upload file có kích thước quá lớn';
                }
                if (!in_array($imageFileType, $allowtypes))
                {
                    $error[] = 'Chỉ được upload các định dạng JPG, PNG, JPEG, GIF';
                }
            }
        }
        if (empty($error)) 
        {
            $resultUpload = move_uploaded_file($_FILES['author_image']['tmp_name'], $uploadFile);
            var_dump($resultUpload);
            if ($resultUpload) 
            {
                echo "upload thành công";
                return $uploadFile;
            } else { 
                $error_string = implode(", ", $error);
                echo "<div style='color:red'>$error_string</div>"; }
        }
    }

    public function getSingle($author_id = 0) {

        $sqlSelect = "SELECT * FROM $this->table WHERE id = " . $author_id;

        $result = mysqli_query($this->connection, $sqlSelect);

        $row = mysqli_fetch_assoc($result);

        return $row;
    }


    public function store($data) {
        
    
        $author_name = $data["author_name"];
        $author_image = $this->upload($data);
        $author_desc = $data["author_desc"];
        
        if (empty($author_name) || empty($author_image) || empty($author_desc)) {
            return false;
        }
        
        $sqlInsert = "INSERT INTO $this->table(author_name, author_image, author_desc) VALUES ('$author_name', '$author_image', '$author_desc')";

        if (mysqli_query($this->connection, $sqlInsert)) {
            return true;
        }

        return false;
    }

    public function update($data) {


        $author_name = $data["author_name"];
        $author_image = $this->upload($data);                                       
        $author_desc = $data["author_desc"];
        $id = (int)$data['id'];

        if (!$id || empty($author_name) || empty($author_image) || empty($author_desc)) {
            return false;
        }
       
        $sql = "UPDATE $this->table SET author_name='$author_name',author_image='$author_image',author_desc='$author_desc' WHERE id = " . (int) $id;

        echo $sql;
        if (mysqli_query($this->connection, $sql)) {
            echo "Update thanh cong";
            /**
             * hàm header được dùng để chuyển hương url
             */
            header('Location: index.php');
            exit;
        } else {
            return false;
        }
    }


    public function delete($id) {

        $sqlDelete = "DELETE FROM $this->table WHERE id = $id";
        if (mysqli_query($this->connection, $sqlDelete)) {
            return true;
        }

        return false;

    }

    
}