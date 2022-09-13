	
<?php 
		if(isset($_POST['approve_cust'])){
		

			$application_no  = $_SESSION['application_no'];
			$sql = "SELECT * from pending_accounts Where Application_no = '$application_no' ";
			$result = $connection->query($sql);
			if($result->num_rows > 0){
			$row = $result->fetch_assoc();
			$name = $row['Name'];
			$gender = $row['Gender'];
			$mob_no =$row['Mobile_no'];
			$landline = $row['Landline_no'];
			$pan = $row['PAN'];
			$citizenship = $row['CITIZENSHIP'];
			$dob = 	$row['DOB'];
			$email = $row['Email_id'];     
			$home_addr = $row['Home_Addr'];
			$office_addr =	$row['Office_Addr'];
			$country = $row['Country'];
			$state=	$row['State'];
			$city =	$row['City'];
			$pin = 	$row['Pin'];
			$ara_loc =	$row['Area_Loc'];
			$nominee_name =$row['Nominee_name'];
			$nominee_acno= $row['Nominee_ac_no'];
			$acc_type =	$row['Account_type'];
	
	
			include 'database.php';
			$sql = "SELECT MAX(Customer_ID) AS Last_Customer FROM customers_account";
			$result = $connection->query($sql);
			if($result->num_rows > 0){
			$row = $result->fetch_assoc();
			$Last_customer_ID = rand(100,1000);
			$ifsc = 709;
			$customer_id = $ifsc.$Last_customer_ID + 1;
			$acc_no = $ifsc.mt_rand(01,99).$customer_id;
	
			date_default_timezone_set('Africa/Lagos'); 
			$ac_opening_date = date("d/m/y h:i:s A");
				
			$connection->autocommit(FALSE);
	
			$sql1 = " INSERT INTO customers_account (
			Username,
			Gender,
			Customer_ID,
			Account_no,
			Branch,
			IFSC_Code,
			Mobile_no,
			Landline_no,
			PAN,
			CITIZENSHIP,
			DOB,
			Email_ID,
			Home_Addr,
			Office_Addr,
			Country,
			State,
			City,
			Pin_code,
			Area_Loc,
			Nominee_name,
			Nominee_ac_no,
			Account_type,
			Ac_Opening_Date,
			Account_Status)
	
			VALUES (
			'$name',
			'$gender',				
			'$customer_id',
			'$acc_no',
			'$branch ',
			'$ifsc',
			'$mob_no',
			'$landline',
			'$pan',
			'$citizenship',
			'$dob',
			'$email',     
			'$home_addr',
			'$office_addr',
			'$country',
			'$state',
			'$city',
			'$pin',
			'$ara_loc',
			'$nominee_name',
			'$nominee_acno',
			'$acc_type',
			'$ac_opening_date',
			'ACTIVE') ";
	
					//Delete the application from pending_account table
					$sql2 = "DELETE FROM pending_accounts Where Application_no = '$application_no' ";

					//Create Passbook table of the customer
					$sql3 = "CREATE TABLE passbook_$customer_id
					(id INT(255) AUTO_INCREMENT PRIMARY KEY, 
					Transaction_id VARCHAR(255) NULL,
					Transaction_date VARCHAR(255) NULL,
					Description VARCHAR(255) NULL,
					Cr_amount VARCHAR(255) NULL,
					Dr_amount VARCHAR(255) NULL,
					Net_Balance VARCHAR(255) NULL,
					Remark VARCHAR(255) NULL)";

					//Create Beneficiary table of the customer
					$sql4 = "CREATE TABLE beneficiary_$customer_id (id INT(255) AUTO_INCREMENT PRIMARY KEY, 
					Beneficiary_name VARCHAR(255) NULL,
					Beneficiary_ac_no VARCHAR(255) NULL,
					IFSC_code VARCHAR(255) NULL,
					Account_type VARCHAR(255) NULL,
					Status VARCHAR(255) NULL,
					Date_added VARCHAR(255) NULL)";

					$sql5 ="CREATE TABLE loan_$customer_id (id INT(255) AUTO_INCREMENT PRIMARY KEY,
					Account_No VARCHAR(255) NULL,
					Desired_Amount VARCHAR(255) NULL,
					Annual_Income VARCHAR(255) NULL,
					Full_name VARCHAR(255) NULL,
					DOB VARCHAR(255) NULL,
					Email_Id VARCHAR(255) NULL,
					Home_Address VARCHAR(255) NULL,
					Mobile_No VARCHAR(255) NULL,
					Country VARCHAR(255) NULL,
					City VARCHAR(255) NULL,
					Region VARCHAR(255) NULL,
					Job_title VARCHAR(255) NULL,
					Purpose VARCHAR(255) NULL,
					Date_requested VARCHAR(255) NULL)";

					

					//If all the query is TRUE then issue commit else rollback 
					if($connection->query($sql1) == TRUE && $connection->query($sql2) == TRUE  && $connection->query($sql3) == TRUE  && $connection->query($sql4) == TRUE && $connection->query($sql5) == TRUE){
						
						$transaction_id = mt_rand(100,999).mt_rand(1000,9999).mt_rand(10,99);

						$sql = "INSERT into passbook_$customer_id (Transaction_id,Transaction_date,Description,Cr_Amount,Dr_Amount,Net_Balance) 
						VALUES ('$transaction_id','$ac_opening_date','Account Opening','0','0','0') ";
						$connection->query($sql);
					
					$connection->commit();

			

						echo '<script>alert("Account Created Successfully\n\nAccount no :'.$acc_no.'\n\nHint : Get Debit Card then register e-banking")</script>';
				
				}
				else
						{
	
							
							echo "Error Creating Account<br><br>".$connection->error;	
							$connection->rollback();	
							
	
				}
		}
		else{

			echo $sql."<br><br>".$connection->error;

		}
	}

	else{

		echo '<script>alert("Application not found")</script>';

	
	}
}
		
?>