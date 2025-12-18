<?php 
    include "includes/header.php";

?>

<div class="container" style="width:800px;">
    <div class="row">
        <div class="col">
            <h3>Register</h3>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <!-- 
                The way to submit data to a PHP file from a file is through the form's action.
                The action will be the file's path. The code in that file will be executed immediately upon form submission.
                If we want to include JavaScript validation, we can. That will be executed before the action is triggered.
                You can see last year's example for that implementation.  
            --> 
                <?php 
                    
                    if(isset($_GET["userId"])){
                        $selectedFormAction = "includes/edit-inc.php"; 
                    }
                    else{
                        $selectedFormAction = "includes/register-inc.php"; 
                    }
                    
                    ?>
            <form action="<?php echo $selectedFormAction; ?>" method="post">
            <!-- <form action="includes/register-inc.php" method="post"> -->
                <div class="row">
                    <div class="col">
                        <input type="text" name="username" id="username" placeholder="joeborg" class="w-100 m-2">
                    </div>
                    <div class="col">
                        <input type="email" name="email" id="email" placeholder="joeborg@gmail.com" class="w-100 m-2">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <input type="password" name="password" id="password" placeholder="abc123!" class="w-100 m-2">
                    </div>
                    <div class="col">
                        <input type="password" name="confpass" id="confpass" placeholder="abc123!" class="w-100 m-2">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <input type="text" name="name" id="name" placeholder="Joe" class="w-100 m-2">
                    </div>
                    <div class="col">
                        <input type="text" name="surname" id="surname" placeholder="Borg" class="w-100 m-2">
                    </div>
                </div>
                
                <div class="row">
                    <div class="col">
                        <input type="text" name="nationality" id="nationality" placeholder="Maltese" class="w-100 m-2">
                    </div>
                    <div class="col p-2">
                        <label for="age" class="ms-2">Age:</label>
                        <select name="age" id="age" class="h-100">
                            <option value="15">15</option>
                            <option value="16">16</option>
                            <option value="17">17</option>
                            <option value="18">18</option>
                            <option value="19">19</option>
                            <option value="20">20</option>
                            <option value="21">21</option>
                            <option value="22">22</option>
                            <option value="23">23</option>
                            <option value="24">24</option>
                            <option value="25">25</option>
                        </select>
                    </div>
                </div>
                <div class="row my-3">
                    <div class="col">
                        <button class="btn btn-success w-100 m-2" type="submit" name="submit" id="submit">Submit</button>
                    </div>
                    <div class="col">
                        <button class="btn btn-danger w-100 m-2" type="reset" name="reset" id="reset">Cancel</button>
                    </div>
                </div>
            </form>
        </div>
    </div>



    <!-- 
        Here, we can use the $_GET superglobal variable to get QueryString values from the URL.
        QueryString values are key value pairs after the & symbol at the end of the URL. 
        We can then take different actions based on the values we get. 
    -->
    <?php 
        if(isset($_GET["error"])) { 
            $error = "<h5>Could not register account:</h5><ul>";
            if (isset($_GET["emptyinput"])){
                $error = $error."<li>You have some empty fields.</li>";
            }
            if (isset($_GET["invalidUsername"])){
                $error = $error."<li>Username format invalid.</li>";
            }
            if (isset($_GET["invalidEmail"])){
                $error = $error."<li>Email format invalid.</li>";
            }
            if (isset($_GET["passwordsDoNotMatch"])){
                $error = $error."<li>Passwords do not match.</li>";
            }
            $error= $error."</ul>";
            ?>
            <div class="row">
                <div class="col"></div>
                <div class="col-6 border border-danger text-danger rounded">
                    <p><?php echo $error; ?></p>
                </div>
                <div class="col"></div>
            </div>
    <?php } ?>


    <?php 
        if(isset($_GET["success"])) { 
            $message = "";
            if ($_GET["success"] == "true"){
                $message = "You have successfully registered a new account.";
            }
            ?>
            <div class="row">
                <div class="col"></div>
                <div class="col border border-success text-success">
                    <p><?php echo $message; ?></p>
                </div>
                <div class="col"></div>
            </div>
    <?php } ?>
</div>




<?php include "includes/footer.php"; ?>