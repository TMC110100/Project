<?php
class BackupModel extends DB
{
    public function Backup_DB(){
	date_default_timezone_set('Asia/Ho_Chi_Minh');
        // Lưu trữ tất cả tên Table vào một mảng
	$return='';
	$allTables = array();
	$result = mysqli_query($this->con,"SHOW TABLES");
	while($row = mysqli_fetch_row($result)){
		 $allTables[] = $row[0];
	}
	 
	foreach($allTables as $table){
		$result = mysqli_query($this->con,'SELECT * FROM '.$table);
		$num_fields = mysqli_num_fields($result);
		 
		$return.= 'DROP TABLE IF EXISTS '.$table.';';
		$row2 = mysqli_fetch_row(mysqli_query($this->con,'SHOW CREATE TABLE '.$table));
		$return.= "\n\n".$row2[1].";\n\n";
		 
		for ($i = 0; $i < $num_fields; $i++) {
			while($row = mysqli_fetch_row($result)){
				$return.= 'INSERT INTO '.$table.' VALUES(';
				for($j=0; $j<$num_fields; $j++){
					$row[$j] = addslashes($row[$j]);
					$row[$j] = str_replace("\n","\\n",$row[$j]);
					if (isset($row[$j])) { $return.= '"'.$row[$j].'"' ; }
					else { $return.= '""'; }
					if ($j<($num_fields-1)) { $return.= ','; }
				}
				$return.= ");\n";
			}
		}
		$return.="\n\n";
	}
	 
	// Tạo thư mục Backup
	$folder = 'MVC/Core/DB_Backup/';
	if (!is_dir($folder))
	mkdir($folder, 0777, true);
	chmod($folder, 0777);	
	// Đặt tên file
	$date = date('d-M-Y-H-i-s', time());
	$filename = $folder."db-backup-".$date;
	//Tạo file .sql
	$handle = fopen($filename.'.sql','w+');
	fwrite($handle,($return));
	fclose($handle);

    }
}

?>