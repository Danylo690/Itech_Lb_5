<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<table border="1">
        <tr>
            <td>ID</td>
            <td>Net name</td>
            <td>Motherboard</td>
            <td>RAM capacity</td>
            <td>HDD capacity</td>
            <td>Monitor</td>
            <td>Vendor</td>
            <td>Guarantee</td>
        </tr>
        <?php
        $current_date = date('Y, m, d');
        include "connect.php";
        try
        {
            $sql = "SELECT a.ID_Computer, a.netname, a.motherboard,
            a.RAM_capacity, a.HDD_capacity, a.monitor,
            a.vendor, a.guarantee from computer as a 
            where TIMESTAMPDIFF(DAY, STR_TO_DATE('$current_date', '%Y, %m, %d'), a.guarantee) < 0";
            $i = 0;
            foreach($conn->query($sql) as $result)
            {
                print "<tr>";
                while($i != count($result)/2)
                {
                    print "<td> $result[$i] </td>";
                    $i++;
                }
                $i = 0;
                print "</tr>";
            }
        }
        catch(PDOException $ex)
        {
            print "Error".$ex->getMessage();
            die();
        }
        ?>
</body>
</html>