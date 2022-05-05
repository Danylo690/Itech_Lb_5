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
            include "connect.php";
            $Software= $_POST['Software'];
            try
            {
                $sql = "SELECT c.ID_Computer, c.netname, c.motherboard,
                c.RAM_capacity, c.HDD_capacity, c.monitor,
                c.vendor, c.guarantee from computer_software as a 
                inner join software as b
                on a.FID_Software = b.ID_Software
                inner join computer as c
                on a.FID_computer = c.ID_Computer
                where b.name = '$Software'";
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
    </table>
</body>
</html>