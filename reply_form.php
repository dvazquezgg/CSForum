<?php

?>

<div class="entryForm">
    <form action="reply.php" method="post">
        <input type="hidden" name="topic_id" value="<?php echo $_GET['topic_id']?>" />
        <input type="hidden" name="user_id" value="1" />
        <label>Reply:</label> <textarea name="body" cols="40" rows="10"></textarea>
        <input type="submit" name="Reply" value="Reply"/>
    </form>
</div>
