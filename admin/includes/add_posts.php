<?php

if (isset($_POST['create_post'])) {
    echo "It works!";
    $post_title = $_POST['title'];
    $post_author = $_POST['post_author'];
    $post_category_id = $_POST['post_category_id'];
    $post_status = $_POST['post_status'];
    $post_image = $_FILES['image']['name'];
    $post_image_temp = $_FILES['image']['tmp_name'];
    $post_tags = $_POST['post_tags'];
    $post_content = $_POST['post_content'];
    $post_date = date('d-m-y');
    $post_comment_count = 4;
    move_uploaded_file($post_image_temp, "../images/$post_image");

    $query = "INSERT INTO posts(post_category_id, post_title, post_author, post_date, post_image, post_content, post_tags, post_comment_count, post_status) VALUES ($post_category_id, '$post_title', '$post_author', '$post_date', '$post_image', '$post_content', '$post_tags', $post_comment_count,  '$post_status')";

    $result = mysqli_query($connection, $query);
    if (!$result) {
         die("Query Failed!".mysqli_error($connection));
    }
       
    
}

?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title">Post Title</label>
        <input type="text" class="form-control" name="title">
    </div>
    <div class="form-group">
        <label for="title">Post Category</label>
        <input type="text" class="form-control" name="post_category_id">
    </div>
    <div class="form-group">
        <label for="title">Post Author</label>
        <input type="text" class="form-control" name="post_author">
    </div>
    <div class="form-group">
        <label for="title">Post Status</label>
        <input type="text" class="form-control" name="post_status">
    </div>
    <div class="form-group">
        <label for="title">Post Image</label>
        <input type="file" name="image">
    </div>
    <div class="form-group">
        <label for="title">Post Tags</label>
        <input type="text" class="form-control" name="post_tags">
    </div>
    <div class="form-group">
        <label for="title">Post Content</label>
        <textarea class="form-control" name="post_content" id="" rows="10" cols="30"></textarea>
    </div>
    <div class="form-group">      
        <button type="submit" class="btn btn-primary" name="create_post" value="Publish Post">Publish Post</button>
        <!-- <input type="submit" class="btn btn-primary" name="create_post" value="Publish Post"> -->
    </div>

</form>
