<ul class="navbar">
    <div class="navbar-items">
        <li class="navbar-item"><a href="/">Home</a></li>
        <?php
            if(isset($_SESSION["userid"])) 
            {
        ?>
            <li class="navbar-item"><a href="/"><?php echo $_SESSION["userUsername"]; ?></a></li>
            <li class="navbar-item"><a href="/posts">Posts</a></li>
            <li class="navbar-item"><a href="/add-category">Add Category</a></li>
            <li class="navbar-item"><a href="/src/controller/logout/logout.logic.php">Exit</a></li>
        <?php
            } else {
        ?>
            <li class="navbar-item"><a href="/login">Login</a></li>
            <li class="navbar-item"><a href="/registration">Sign up</a></li>
        <?php 
            }
        ?>
    </div>
</ul>