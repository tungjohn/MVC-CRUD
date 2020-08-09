<?php
class AuthorController {


    public function index() {

        

        $model = new AuthorModel();

        $authors = $model->getAll();

        include_once SITE_URL."/mvc/view/author/index.php"; //trả về view
    }


    public function create() {

        

        $errors = array();

        if (isset($_POST) && !empty($_POST)) {
            $model = new AuthorModel();

            $status = $model->store($_POST);
            if ($status) {
                header("Location: index.php");
                exit;
            }
            $errors[] = "Lưu thất bại";
        }
        include_once SITE_URL."/mvc/view/author/create.php";
    }


    public function edit() {

        $errors = array();
        

        if (isset($_POST) && !empty($_POST)) {
            $model = new AuthorModel();

            $status = $model->update($_POST);
            if ($status) {
                header("Location: index.php");
                exit;
            }
            $errors[] = "Sửa thất bại";
        }

        if (isset($_GET["id"])) {
            $id = (int) $_GET["id"];

            $model = new AuthorModel();

            $author = $model->getSingle($id);
        }

        include_once SITE_URL."/mvc/view/author/edit.php";
    }


    public function delete() {

       
        $errors = array();

        if (isset($_POST) && !empty($_POST)) {
            $model = new AuthorModel();

            $id = isset($_POST["id"]) ? (int)$_POST["id"] : 0;

            $status = $model->delete($id);
            if ($status) {
                header("Location: index.php");
                exit;
            }
            $errors[] = "Xóa thất bại";
        }

        if (isset($_GET["id"])) {
            $id = (int) $_GET["id"];

            $model = new AuthorModel();

            $author = $model->getSingle($id);
        }

        include_once SITE_URL."/mvc/view/author/delete.php";
    }

}