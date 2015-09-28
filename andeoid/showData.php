

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title></title>
    </head>
    <body>
Student List is :</br>
<?php
    $dbhost = 'localhost';
    $dbuser = 'admin';
    $dbpass = '';
    $dbname = 'test';
    $tableName = "studmast";
    $conn = mysql_connect($dbhost, $dbuser, $dbpass);
    if (!$conn)     
	    die('Could not connect: ' . mysql_error());
    if (!mysql_select_db($dbname))    
	    die("Can't select database");	
    $result = mysql_query("SELECT * FROM {$tableName}");

    if (!$result)  die("Query to show fields from table failed!" . mysql_error());
    
    /*Creating Table Header*/
    $fields_num = mysql_num_fields($result);
    echo "<h1>Table: {$tableName}</h1>";
    echo "<table border='1'><tr>";
    for($i=0; $i<$fields_num; $i++) 
    {	
	    $field = mysql_fetch_field($result);	
	    echo "<td><b>{$field->name}</b></td>";
    }

    echo "</tr>\n";
    /*End of Table Header Section */

    /*Creating Table Rows.......*/
    while($row = mysql_fetch_array($result) )
    {	
	    echo "<tr>";	
	        /*
           
            echo "<td>{$row['stuname']}</td>";	
	        echo "<td>{$row['cgpa']}</td>";	
            */
            
	       
            echo "<td>".$row['stuname']."</td>";	
	        echo "<td>".$row['cgpa']."</td>";	
            
        echo "</tr>\n";
    }
    mysql_free_result($result);
    mysql_close($conn);
?>        
    </body>
</html>
