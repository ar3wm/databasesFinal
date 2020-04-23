<!DOCTYPE html>
<html>
        <head>
            <link rel="stylesheet" href="main.css">
            <meta charset="UTF-8">
            <title>
                User Profile
            </title>
        </head>
  
    <div class="row" style="text-align: center; padding: 0 0 0 4em;">
        <div class="column" style="width=50%; text-align: center;">
            <div style="color: black;">
                <?php foreach($user as $u):
                    echo '<h1>' . $u['display_name'] . "'s Account Info:" . '</h1>';
                    echo '<strong> Username: </strong> ' . $u['username'] . '</br>';
                    echo '<strong> Bio: </strong>' . $u['bio'] . '</br>';
                    echo '<strong> Email: </strong>' . $u['email_address'] . '</br>';
                ?>
            </div>
        </div>
        <br/>
        <div class="column" style="width=25%; text-align: center;">
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
                <input type="submit" value="Change Display Name" name="action" class="btn btn-primary"/>   
                <input type="hidden" name="username" value="<?php echo $u['username']; ?>" />          
            </form>
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
                <input type="submit" value="Change Bio" name="action" class="btn btn-primary" />             
                <input type="hidden" name="username" value="<?php echo $u['username'] ?>" />          
            </form>
        </div>
        <div class="column" style="width=25%; text-align: center;">
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
                <input type="submit" value="Update Email" name="action" class="btn btn-primary" />             
                <input type="hidden" name="username" value="<?php echo $u['username'] ?>" />          
            </form> 
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
                <input type="submit" value="Delete Account" name="action" class="btn btn-danger" />      
                <input type="hidden" name="username" value="<?php echo $u['username'] ?>" />          
            </form>
            
            <?php endforeach; ?>
        </div>
    </div>
    <br/>
    <div class="inner" style="padding: 0 0 0 4em">  
    <br/>
    <h2 style="color:black">Your active Stories</h2>
    <?php foreach($activeStories as $s): ?>
            <li>
            <?php echo '<a href="storypage.php?storyID=' . $s['storyID'] . '&title=' . $s['title'] . '&author_display=' . $s['display_name'] . '&author_user=' . $s['username'] . '">';
            echo $s['title'];
            ?></li>
        <?php endforeach; ?>
        <h2 style="color:black">Stories You Like</h2>
        <?php foreach($likes as $l): ?>
            <li>
            <?php echo '<a href="storypage.php?storyID=' . $l['storyID'] . '&title=' . $l['title'] . '&author_display=' . $l['display_name'] . '&author_user=' . $l['username'] . '">' ;
            echo $l['title'];
            echo " by " . getCreator($l['storyID']);
            ?>
            </li>
        <?php endforeach; ?>
        <br/>
        <h2 style="color:black">Stories You're Following</h2>
            <?php foreach($follows as $f): ?>
                <li>
                <?php echo '<a href="storypage.php?storyID=' . $f['storyID'] . '&title=' . $f['title'] . '&author_display=' . $f['display_name'] . '&author_user=' . $f['username'] . '">' ;
                echo $f['title'];
                echo " by " . getCreator($f['storyID']);
                ?>
                </li>
        <?php endforeach; ?>
    <br/>    
    <h2 style="color:black">Stories You've commented on</h2>
        <?php foreach($comments as $c): ?>
            <li>
            <?php echo '<a href="storypage.php?storyID=' . $c['storyID'] . '&title=' . $c['title'] . '&author_display=' . $c['display_name'] . '&author_user=' . $c['username'] . '">' ;
            echo $c['title'];
            echo " by " . getCreator($c['storyID']);
            echo "  |  " . $c['comment_text'];
            ?>
            </li>
    <?php endforeach; ?>
    <br/>
    <h2 style="color:black">Stories You're Following</h2>
        <?php foreach($follows as $f): ?>
            <li>
            <?php echo '<a href="storypage.php?storyID=' . $f['storyID'] . '&title=' . $f['title'] . '&author_display=' . $f['display_name'] . '&author_user=' . $f['username'] . '">' ;
            echo $f['title'];
            echo " by " . getCreator($f['storyID']);
            ?>
            </li>
    <?php endforeach; ?>
    <h2 style="color:black">Stories You Published</h2>
        <?php foreach($published as $f): ?>
            <li>
            <?php echo '<a href="storypage.php?storyID=' . $f['storyID'] . '&title=' . $f['title'] . '&author_display=' . $f['display_name'] . '&author_user=' . $f['username'] . '">' ;
            echo $f['title'];
            echo " by " . getCreator($f['storyID']);
            ?>
            </li>
    <?php endforeach; ?>
    <h2 style="color:black">Stories You Archived</h2>
        <?php foreach($archives as $f): ?>
            <li>
            <?php echo '<a href="storypage.php?storyID=' . $f['storyID'] . '&title=' . $f['title'] . '&author_display=' . $f['display_name'] . '&author_user=' . $f['username'] . '">' ;
            echo $f['title'];
            echo " by " . getCreator($f['storyID']);
            ?>
            </li>
    <?php endforeach; ?>
  </div>
  
</html>