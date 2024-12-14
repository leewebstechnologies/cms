<form action="" method="post">
    <div class="form-group">
        <label for="cat_title">Edit Categories</label>      
   
    <?php
    //GET CATEGORY NAME
    if (isset($_GET['update'])) {
        $cat_id = $_GET['update'];
        $query = "SELECT * FROM categories WHERE cat_id = $cat_id";
        $result = mysqli_query($connection, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            $cat_title = $row['cat_title'];
    ?>
        <input type="text" class="form-control" value = '<?php echo $cat_title; ?>' name="cat_title" />
    <?php 
        }
    }
    ?>
    </div>      
    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="update_category" value="Update Category" />
    </div>
</form>
<?php
// UPDATE CATEGORY
if (isset($_POST['update_category'])) {
    $cat_id = $_GET['update'];
    $cat_title = $_POST['cat_title'];
    $query = "UPDATE categories SET cat_title = '{$cat_title}' WHERE cat_id = {$cat_id}";
    $result = mysqli_query($connection, $query);
    if (!$result) {
        die("Query Failed!".mysqli_error($connection));
    }
}

?>