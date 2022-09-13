<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="Description" content="Enter your description here"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="style.css">
    <title>Add Staff</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-12 mx-auto border">
                <form method="post">
                    <div class="form-group">
                        <label for="name">Full Name</label>
                        <input type="text" class="form-control" name="Staff_name" required>
                    </div>
                    <div class="form-group">
                        <label for="Phone Number">Mobile Number</label>
                        <input type="text" class="form-control" name="Mobile_no" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" class="form-control" name="email">
                    </div>
                    <div class="form-group">
                        <label for="form-group">Gender</label>
                        <select name="gender" class="form-control" required>
                            <option value="" disabled selected>Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="citizienship">Citizenship</label>
                        <input type="text" class="form-control" name="citizenship" required>
                    </div>
                    <div class="form-group">
                        <label for="dateofbirth">Date of Birth</label>
                        <input type="date" class="form-control" name="dob" required>
                    </div>
                    <div class="form-group">
                        <label for="Department">Department</label>
                        <select name="dept" class="form-control" required>
                            <option value="" disabled selected>Department</option>
                            <option value="Revenue" >Revenue</option>
                            <option value="Cash Deposit" >Cash Deposit</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input class="form-control" type="text" name="address">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password">
                    </div>

                    <input type="submit" name="submit" value="Add Staff">
                </form>
            </div> 
        </div>
        <?php
if(isset($_POST['submit'])){

    include 'database.php';

    echo $staff_name = $_POST['Staff_name'];
    echo $staff_id = mt_rand(100,999);
    echo $staff_password = md5($_POST['password']);
    echo $staff_mobile_no = $_POST['Mobile_no'];
    echo $staff_email = $_POST['email'];
    echo $staff_gender = $_POST['gender'];
    echo $staff_department = $_POST['dept'];
    echo $staff_dob = $_POST['dob'];
    echo $staff_citizenship = $_POST['citizenship'];
    echo $staff_address = $_POST['address'];
    
    
    
    $sql = "INSERT INTO bank_staff (Staff_name,Staff_id,Password,Mobile_no,Email_id,Gender,
    Department,DOB,CITIZENSHIP,Home_addr)
    VALUES('$staff_name','$staff_id','$staff_password','$staff_mobile_no','$staff_email','$staff_gender',
    '$staff_department','$staff_dob','$staff_citizenship','$staff_address') ";

    if($connection->query($sql) == TRUE){

        echo '<script>alert("New Staff Added Successfully\n\nStaff Id is '.$staff_id.'\n\nPassword is '.$staff_password.'")</script>';

    }

    else
     { 
        echo "<br>Error".$sql."<br>".$connection->error;

}

}

?>
    </div>
</body>
</html>
