<?php
    if (isset($_GET['post_id'])) {
        $post_id = $_GET['post_id'];
        $query = "SELECT * FROM posts WHERE post_id = $post_id";
        $result = mysqli_query($connection, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            $post_category_id =
            $row['post_category_id'];
            $post_title = $row['post_title'];
            $post_author = $row['post_author'];
            $post_date = $row['post_date'];
            $post_image = $row['post_image'];
            $post_content = $row['post_content'];
            $post_tags = $row['post_tags'];
            $post_comment_count =
            $row['post_comment_count'];
            $post_status = $row['post_content'];
        }
    }

?>
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title">Post Title</label>
        <input type="text" class="form-control" value="<?php echo $post_title; ?>" name="title">
    </div>
    <div class="form-group">
        <label for="title">Post Category</label>
        <input type="text" class="form-control" value="<?php echo $post_category_id; ?>" name="post_category_id">
    </div>
    <div class="form-group">
        <label for="title">Post Author</label>
        <input type="text" class="form-control" value="<?php echo $post_author; ?>" name="post_author">
    </div>
    <div class="form-group">
        <label for="title">Post Status</label>
        <input type="text" class="form-control" value="<?php echo $post_status; ?>" name="post_status">
    </div>
    <div class="form-group">
        <img width="100" src="../images/<?php echo $post_image; ?>" alt="">
    </div>
    <div>
        <label for="title">Post Image</label>
        <input type="file" name="image">
    </div>
    <div class="form-group">
        <label for="title">Post Tags</label>
        <input type="text" class="form-control" value="<?php echo $post_tags; ?>" name="post_tags">
    </div>
    <div class="form-group">
        <label for="title">Post Content</label>
        <textarea class="form-control" name="post_content" id="" rows="10" cols="30"><?php echo $post_content; ?></textarea>
    </div>
    <div class="form-group">      
        <button type="submit" class="btn btn-primary" name="create_post" value="Publish Post">Publish Post</button>
        <!-- <input type="submit" class="btn btn-primary" name="create_post" value="Publish Post"> -->
    </div>

</form>