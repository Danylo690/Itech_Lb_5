<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>By processor</title>
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
            <td>Processor</td>
            <td>Frequency</td>
        </tr>
        <?php
            include "connect.php";
            $Processor = $_POST['Processor'];
            try
            {
                $sql = "SELECT a.ID_Computer, a.netname, a.motherboard,
                a.RAM_capacity, a.HDD_capacity, a.monitor,
                a.vendor, a.guarantee, b.name, b.frequency from computer as a 
                inner join processor as b
                on a.FID_Processor = b.ID_Processor 
                where b.name = '$Processor'";
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