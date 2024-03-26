
<html>
<head>
  <title>Student Enrollment</title>
  <style>
.container{
text-align:center;
}
.bordered-heading{
	border:4px solid black;
	padding:5px;
}
.bordered-form{
	border:5px solid yellow;
	padding:10px;
}
.bolded{
	font-weight:bold;
}

	<!--button{
		dispaly:block;
        margin: 20px auto;
	}-->
</style>
</head>
<body><h1><b><Font COLOR = PURPLE class ="bordered-heading">Student Enrollment Form </b></h1>
<div class="container">
 <?php if (isset($result)): ?>
        <p><?php echo $result; ?></p>
    <?php endif; ?>
	
  <form class ="bordered-form" method="post"action="Connect.php">
  <table>
  <div>
  Enrollment Number:<input type="text" name="enrollment_number"placeholder="Enter your Enrollment"	 required><br>
  </div>
    <div>

    Name:<input type="text" name="name" placeholder="Enter your name" required><br>
</div>
<div>
    Birth Date:<input type="date" name="birth_date" required><br>
</div>
<div>
    Contact Number:<input type="text" name="contact_number" placeholder="Enter your phone" required><br>
</div>
<div>
    Email Address:<input type="email" name="email" placeholder="Enter your email" required><br>
            
			</div>
			<div  class = "center-align" >
			<tr>
                <td colspan="2" align="center" ><input type="submit" value="Submit"></td>
            </tr>
    </div>
	</table>
  </form>
  </body>
  </html>