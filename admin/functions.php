<?php
function insert_categories() {
    global $connection;
    //INSERT INTO CATEGORIES    
    if (isset($_POST['submit'])) {
        $cat_title = $_POST['cat_title'];
        if (empty($cat_title)) {
            echo "This field should not be empty!";
        } else {
            $query = "INSERT INTO categories(cat_title) VALUES ('{$cat_title}')";
            $result = mysqli_query($connection, $query);
            if (!$result) {
                die("Query Failed!".mysqli_error($connection));
            }
        }
    }
}

function findAllCategories() {
    global $connection;
     //FIND ALL CATEGORIES
     $query = "SELECT * FROM categories";
     $result = mysqli_query($connection, $query);
     while ($row = mysqli_fetch_assoc($result)) {
         $cat_id = $row['cat_id'];
         $cat_title = $row['cat_title'];
         echo "<tr>";
         echo "<td>$cat_id</td>";
         echo "<td>$cat_title</td>";
         echo "<td><a href='categories.php?update={$cat_id}'>UPDATE</a></td>";
         echo "<td><a href='categories.php?delete={$cat_id}'>DELETE</a></td>";
         echo "</tr>";
     } 
}

function deleteCategories() {
    global $connection;
     //DELETE CATEGORY
     if (isset($_GET['delete'])) {
        $delete_id = $_GET['delete'];
        $query = "DELETE FROM categories WHERE cat_id = $delete_id";
        $result = mysqli_query($connection, $query);
        header("Location: categories.php");
    }
}

