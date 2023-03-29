<?php

?>

<div class="entryForm">
    <form action="add_post.php" method="post">
        <input type="hidden" name="category_id" value="<?php echo $_GET['category_id']?>" />
        <input type="hidden" name="user_id" value="1" />
        <label>Title:</label> <input type="text" name="title" value="" />
        <label>Post:</label> <textarea name="body" cols="40" rows="10"></textarea>
        <input type="submit" name="Add" value="Add"/>
    </form>
</div>
