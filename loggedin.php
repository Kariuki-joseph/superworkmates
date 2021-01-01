    <div class="bb">
       
        <?php
            echo "<h3> Welcome <strong>". $_SESSION ['username']."</strong>!</h3>";
        ?>
    
        <form action="logout.php" method="post">
            <button type="submit" name="logout">Log Out</button>
        </form>
        <br>
        <!--Upload Profile Picture or Show Profile Picture-->
        <?php
        $uid = $_SESSION['userid'];
        include_once 'connections/dbconnect.php';
        if(isset($_SESSION['username']))
        $getprofpic = "SELECT profpic FROM theusers WHERE id = '$uid'";
        $query = mysqli_query ($connect, $getprofpic);
        $result = mysqli_fetch_array($query);
        $imagename=$result['profpic'];
        ?>
        <div class="profileimage">
            <img src="<?php echo $imagename;?>" alt="No Image Found">
        </div>
        <?php
        if (isset($_SESSION['error'])) {
        ?>
<p style= "color:red;"><?php echo $_SESSION['error']; unset($_SESSION['error']);?></p>
        <?php
        }
        ?>
        <?php
        if ($result['profpic'] == 'profileimages/user.png') {
        ?>
        <h4 id = "texgdbfb" style="cursor: pointer;" onclick="openUploadForm()">Upload Profile Picture</h4>
        <form id="formUploadProfilePic" action="getimage.php" method="POST" enctype="multipart/form-data" class="hide">
            <input type="file" name="file"> <br> <br>
            <button type="submit" name="submitnow">Upload</button>
        </form>
        <?php
        }else{
        ?>
            <h4 id = "texgdbfb" style="cursor: pointer;" onclick="openChangeForm()" onmouseover="changeBackground('purple')">Change Profile Picture</h4>
            <form id="formChangeProfilePic" action="getimage.php" method="POST" enctype="multipart/form-data" class="hide">
                <input type="file" name="file"> <br> <br>
            <button type="submit" name="submitnow">Change</button>
        </form>
        <?php
        }
        ?>
    </div>
<script>
function openUploadForm(){
    document.getElementById('formUploadProfilePic').classList.toggle('hide');
}
function openChangeForm(){
    document.getElementById('formChangeProfilePic').classList.toggle('hide');
}
function changeBackground(color){
    document.querySelectorAll('#texgdbfb')[0].style.color=color;
    document.querySelectorAll('#texgdbfb')[1].style.color=color;
}
</script>