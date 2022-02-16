<?php

    // Call file in line
    include 'Database.php';

    // Create object / instance
    $db = new Database();
    $con=$db->Connect();

    // Variabel GET URL
    // $nama=$_GET['nama'];

    // Process GET query
    $rows=mysqli_query($con,"select * from chat");
    $data=array();
    $no=0;
    foreach($rows as $row)
    {
        $data[]=$row;
        $no=$no+1;
    }

    // Process encription data
    $dataGet=json_encode($data);

    // Process description data
    $mhs=json_decode($dataGet);

    // View with looping use index array
    for ($i = 0; $i < $no; $i++) {
        echo "<div class='alert alert-primary' role='alert' style='width: 60%;'>";

        echo "<label style='top: 8px; position: absolute; font-size: 11px;'>".$mhs[$i]->nama_chat."</label>"; 

        $date = date_create($mhs[$i]->tgl_chat);
        echo "<label style='top: 8px; right: 8px; position: absolute; font-size: 11px;'>".date_format($date,"M d")."</label>";

        echo"<br>";
        echo $mhs[$i]->text_chat; 
        echo"<br>";

        echo "</div>";
      }

?>