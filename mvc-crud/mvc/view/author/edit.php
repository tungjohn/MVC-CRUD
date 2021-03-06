<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Sửa sách</h1>

            <?php
            if (isset($errors) && is_array($errors) && !empty($errors)) {
                ?>
                <div class="alert alert-danger">
                    <?php echo implode("<br>", $errors) ?>
                </div>
                <?php
            }
            ?>

            <div>
                <form name="edit" action="" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo (int) $author['id'] ?>">
                    <div class="form-group">
                        <label>Tên tác giả</label>
                        <input type="text" class="form-control" name="author_name" value="<?php echo $author["author_name"] ?>">
                    </div>
                    <div class="form-group">
                        <label>Hình ảnh</label>
                        <input type="file" class="form-control" name="author_image" value="<?php echo $author["author_image"] ?>">
                        <?php
                            if (isset($author['author_image']) && $author['author_image']) {
                                ?> <img src="<?php echo $author['author_image'] ?>" style="width: 100px;"> <?php
                            } ?>
                    </div>
                    <div class="form-group">
                        <label>Giới thiệu</label>
                        <textarea name="author_desc" class="form-control"><?php echo $author["author_desc"] ?></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>