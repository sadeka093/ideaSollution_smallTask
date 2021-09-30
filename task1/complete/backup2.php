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





                function checkDndSeris($mobileno) {
                    if (preg_match("/^0181718\d{4}$|^01819210\d{3}$|^01819310\d{3}$|^01833180\d{3}$|^01833181\d{3}$|^01833182\d{3}$|^01833180\d{3}$|^01819710\d{3}$|^018195505\d{2}$|^018197701\d{2}$|^018172102\d{2}$|^018197904\d{2}$|^018197904\d{2}$/", $mobileno)) {
                        return 1;
                    } else {
                        return 0;
                    }
                }

                function checkDndList($mobilenumber) {
                    require 'digidnd.php';
                    $arrlength = count($cars);
                    for ($x = 0; $x < $arrlength; $x++) {
                        if ($cars[$x] == $mobilenumber) {
                            return 1;
                            break;
                        }
                    }
                    return 0;
                }
                ?>
                <table class="table table-bordered table-striped">
                    <tr>
                        <!-- <td>id</td> -->
                        <td>Phone_Num</td>

                    </tr>
                    <?php  

                    for ($i = 0; $i <= 9; $i++) {
                        for ($j = 0; $j <= 9; $j++) {
                            for ($k = 0; $k <= 9; $k++) {
                                for ($l = 0; $l <= 9; $l++) {
                                    for ($m = 0; $m <= 9; $m++) {
                                        for ($n = 0; $n<= 9; $n++) {
                                            for ($o = 0; $o <= 9; $o++) {
                                                
                                                    $phone =$phone1.$i.$j.$k.$l.$m.$n.$o ;
                                                    $dld_phone=substr($phone, 1);
                                                    if( (checkDndList($dld_phone)==1) || (checkDndSeris($phone)==1) ){
                                                        continue;
                                                    }
                                                    echo "<td>".$phone. "</td>";
                                                    echo "</tr>";

                                                ?>

                                                <?php  

                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                    ?>



                </table>

                <?php  

            }
        }
        ?>
        <!--  input start -->
        <form action="" method="post">
            <input type="Textbox" id="part1" name="phone1" />
            <input type="submit" name="addnew" class="btn btn-success" value="Add New">
        </form>
        <!-- input end -->


        <!--  //data view start -->

        <!-- //data view start -->

    </body>
    </html>
