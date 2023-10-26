<form method="post" action="">
<label>Search:</label>
<input type="text" name="serach_input">
<input type="submit" name="search_button" value="search">
</form>
<?php
$server="localhost";
$username="root";
$password="";
$dbname="fall2023";
if(isset($_POST['search_button'])){
    $searchvalue=$_POST['serach_input'];
    $conn=mysqli_connect($server,$username,$password,$dbname);
    if(!$conn){
        die("ERROR:Could not connect ".mysqli_connect_error());
    }

        $sql_search = "SELECT * FROM user WHERE name LIKE '%$searchvalue%'";

        $result_search=mysqli_query($conn,$sql_search);

        mysqli_close($conn);

        echo "<h2>Search Results</h2>";
        echo "<table border='1'>";
        echo "<tr><th>Name</th><th>Email</th><th>Mobile</th>
        <th>ip</th><th>Web Url</th><th>dob</th><th>gender</th><th>info</th></tr>";

        while($row_search=mysqli_fetch_assoc($result_search)){
            echo "<tr>";
            
            echo "<td>".$row_search['name']."</td>";
            echo "<td>".$row_search['email']."</td>";
            echo "<td>".$row_search['mobile']."</td>";
            echo "<td>".$row_search['ip']."</td>";
            echo "<td>".$row_search['url']."</td>";
            echo "<td>".$row_search['dob']."</td>";
            echo "<td>".$row_search['gender']."</td>";
            echo "<td>".$row_search['info']."</td>";

        }


        echo "</table>";

       




    }


?>
