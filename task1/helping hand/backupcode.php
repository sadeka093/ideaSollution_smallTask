<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    <?php
    require_once 'connect.php';

    ?>
    <div class="container">
        <?php
        if(isset($_POST['addnew'])){
                        
                if( empty($_POST['phone1'])  )
                {
                    echo "Please fillout all required fields";
                }else{
                            $phone1 =$_POST['phone1'];

                            function GetRandom() {
                                        $digits = 7;
                                        return rand(pow(10, $digits-1), pow(10, $digits)-1);
                                    }

                            $phone2 =GetRandom();
                            $phone =$phone1.$phone2 ;
                            echo $phone;

                            function checkDndSeris($mobileno) {
                                if (preg_match("/^181718\d{4}$|^1819210\d{3}$|^1819310\d{3}$|^1833180\d{3}$|^1833181\d{3}$|^1833182\d{3}$|^1833180\d{3}$|^1819710\d{3}$|^18195505\d{2}$|^18197701\d{2}$|^18172102\d{2}$|^18197904\d{2}$|^18197904\d{2}$/", $mobileno)) {
                                    return 1;
                                } else {
                                    return 0;
                                }
                            }

                            function checkDndList($mobilenumber) {
                                    require_once 'digidnd.php';
                                    $arrlength = count($cars);
                                    for ($x = 0; $x < $arrlength; $x++) {
                                        if ($cars[$x] == $mobilenumber) {
                                            return 1;
                                            break;
                                        }
                                    }
                                    return 0;
                                }

                            if((checkDndList($phone)==1))
                            {

                                echo "<div class='alert alert-danger'>Error: already exist number in dnd file</div>";
                            }
                            else if(checkDndSeris($phone)==1){
                                echo "<div class='alert alert-danger'>Error: already reserved</div>";
                            }
                            else{
                                $sql = "INSERT INTO alldata(phone_num)
                                VALUES('$phone')";

                                if( $con->query($sql) === TRUE){
                                    echo "<div class='alert alert-success'>Successfully added new number</div>";
                                    /*header("Location:http://localhost/small_task_IdeaSollution-main/userlist.php");*/
                                }else{
                                    echo "<div class='alert alert-danger'>Error: already exist number</div>";
                                }
                            }

                            }
            }
            ?>
            //input start
            <form action="" method="post">
                <input type="Textbox" id="part1" name="phone1" />
                <input type="submit" name="addnew" class="btn btn-success" value="Add New">
            </form>
            <!-- //input end -->


           <!--  //data view start -->
            <?php
            require_once 'connect.php';
            echo "<div class='container'>";
            $sql = "SELECT * FROM alldata ORDER BY id";
            $result = $con->query($sql);
            if( $result->num_rows > 0)
            {
                ?>
                <h2>List of all Users</h2>
                <table class="table table-bordered table-striped">
                    <tr>
                        <td>id</td>
                        <td>Phone_Num</td>
                
                </tr>
                <?php
                while( $row = $result->fetch_assoc()){
                   
                    echo "<td>".$row['id'] . "</td>";
                    echo "<td>".$row['phone_num'] . "</td>";

                    echo "</tr>";
                
                }
                ?>
            </table>
            <?php
            }
            else
            {
                echo "<br><br>No Record Found";
            }
            ?>
            <!-- //data view start -->

</body>
</html>
