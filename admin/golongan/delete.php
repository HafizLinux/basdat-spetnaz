<?php

	include "../../config.php";
	$db = dbConnect();


	$id = $_GET['id'];

	if($id){
		$sql = "SELECT * FROM golongan WHERE id_golongan = '$id'";
        $exec = $db->query($sql);
		
		if(mysqli_num_rows($exec) > 0){
			$delete = "DELETE FROM golongan WHERE id_golongan = '$id'";
            $execDel = $db->query($delete);
            
            if ($execDel) {
                echo "
                    <script>
                        alert('Data Sukses dihapus');
                        document.location.href = '../';
                    </script>   
                ";
            }else{
                echo "
                    <script>
                        alert('Data Gagal dihapus');
                        document.location.href = '../';
                    </script>   
                ";
            }

		}else{
			echo "<script>document.location.href='../'</script>";
		}
	}else{
		echo "<script>document.location.href='../'</script>";
	}
?>