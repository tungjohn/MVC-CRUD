<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>

<div class="container" style="margin-top: 100px">
    <div class="row">
        <div class="col-md-12">

            <h1>DANH SÁCH TÁC GIẢ</h1>

            <div style="margin: 30px 0">
                <a href="index.php?controller=author&action=create" class="btn btn-success">thêm mới tác giả</a>
            </div>

            <table class="table">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Tên</th>
                    <th scope="col">Hình ảnh</th>
                    <th scope="col">Giới thiệu</th>
                    <th scope="col">Hành động</th>
                </tr>
                </thead>
                <tbody>

                <?php
              
                if (mysqli_num_rows($authors) > 0) {
                    
                    while($row = mysqli_fetch_assoc($authors)) {
                        ?>
                        <tr>
                            <th scope="row"><?php echo $row['id'] ?></th>
                            <td><?php echo $row['author_name'] ?></td>
                            <td>
                                <?php
                            if (isset($row['author_image']) && $row['author_image']) {
                                ?> <img src="<?php echo $row['author_image']; ?>" style="width: 100px; height: 100px;"> <?php
                            } ?>
                          </td>
                            <td><?php echo $row['author_desc'] ?></td>
                            <td>
                                <div>
                                    <a class="btn btn-warning" href="index.php?controller=author&action=edit&id=<?php echo $row['id'] ?>">Sửa tác giả</a>
                                </div>
                                <div>
                                    <a class="btn btn-danger" href="index.php?controller=author&action=delete&id=<?php echo $row['id'] ?>">Xoá tác giả</a>
                                </div>
                            </td>
                        </tr>
                        <?php
                    }
                } else {
                    echo "<br> Không có bản ghi nào trong CSDL";
                }
                ?>

                
                </tbody>
            </table>
        </div>
    </div>
</div>

</body>
</html>