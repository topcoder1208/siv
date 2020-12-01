<?php


define('FTP_HOST', '156.54.119.9 ');
define('FTP_USER', 'C$T1NFORMAT1CA');
define('FTP_PASSWORD', 'vUZ1G43JPoq9mW9');

// (1) CONNECT TO FTP SERVER
$ftp = ftp_connect(FTP_HOST) or die("Failed to connect to " . FTP_HOST);

ini_set('memory_limit', '-1');
set_time_limit(0);



if (ftp_login($ftp, FTP_USER, FTP_PASSWORD))
{
    $currentDir = ftp_pwd($ftp);
    $files = ftp_nlist($ftp, $currentDir);
    // $files = array("dispoP.xml.zip", "LinkImgC_Nuovo.xml.zip", "LinkImgPC_Nuovo.xml.zip", "quickM.xml.zip");
    foreach ($files as $file)
    {
        $arr_file_name = explode("/", $file);
        $download_file = $arr_file_name[count($arr_file_name) - 1];
        if (in_array(strtolower($download_file) , $download_list))
        {
            $destination = "data/" . $download_file; // Save to this file
            if (is_file($destination))
            {
                @unlink($destination);
            }

            if (ftp_get($ftp, $destination, $file, FTP_BINARY))
            {
                echo "Saved to $destination<br>";
            }
            else
            {
                echo "Error downloading $source<br>";
            }

            $zip = new ZipArchive;
            if ($zip->open($destination))
            {
                $zip->extractTo("data");
                $zip->close();
            }
            if (is_file($destination))
            {
                echo '<span style="color:red;">' . $destination . "</span><br>";
            }
            else
            {
                echo "<br>No file" . $destination;
            }

            $xml = new XMLReader();
            $xml->open("/home/uaicfohu/public_html/" . substr($destination, 0, strlen($destination) - 4));
            $xml->read();

            $row = array();
            $current_node = "";
            $tbl_created = false;

            while ($xml->read())
            {
                if ($xml->nodeType == XMLReader::ELEMENT)
                {
                    $current_node = $xml->name;
                }
                else if ($xml->nodeType == XMLReader::TEXT)
                {
                    if (isset($row[$current_node]))
                    {
                        if (!$tbl_created)
                        {
                            $tbl_created = true;

                            $sql = "CREATE TABLE IF NOT EXISTS " . $tbls[strtolower($download_file) ] . "(";
                            $flag = false;
                            foreach ($row as $f => $v)
                            {
                                if ($flag == true)
                                {
                                    $sql .= ",";
                                }
                                $flag = true;
                                $sql .= $f . " varchar(256)";
                            }
                            $sql .= ")";

                            $db->query($sql);
                            echo $db->error;
                            $sql = "TRUNCATE TABLE " . $tbls[strtolower($download_file) ];
                            $db->query($sql);
                        }
                        $sql = "INSERT INTO " . $tbls[strtolower($download_file) ] . " SET ";
                        $flag = false;
                        foreach ($row as $f => $v)
                        {
                            if ($flag == true)
                            {
                                $sql .= ",";
                            }
                            $flag = true;
                            $sql .= $f . "='" . $v . "'";
                        }

                        $sql .= "ON DUPLICATE KEY UPDATE ";
                        $flag = false;
                        foreach ($row as $f => $v)
                        {
                            if ($flag == true)
                            {
                                $sql .= ",";
                            }
                            $flag = true;
                            $sql .= $f . "='" . $v . "'";
                        }

                        $db->query($sql);
                        $row = array();
                    }
                    $row[$current_node] = $xml->value;
                }
            }
        }

    }
}
else
{
    $error = "Invalid user/password";
}

ftp_close($ftp);

$sql = "SELECT COUNT(*) AS cnt FROM (SELECT DISTINCT descCatMerc FROM $tbl WHERE descCatMerc NOT IN (SELECT descCatMerc FROM $tbl2)) as A;";

$qy = $db->query($sql);

while ($row = $qy->fetch_array(MYSQLI_ASSOC))
{
    if ($row['cnt'] * 1 > 0)
    {
        $sql = "SELECT DISTINCT DescCatMerc FROM $tbl WHERE DescCatMerc NOT IN (SELECT descCatMerc FROM $tbl2) limit 10;";
        $qy2 = $db->query($sql);
        $list = array();
        while ($row2 = $qy2->fetch_array(MYSQLI_ASSOC))
        {
            $list[] = $row2["DescCatMerc"];
        }
        wp_mail("massimilianoamendola@gmail.com", "New categories added", "Hello, There are new " . $row['cnt'] . " categories. New categories:" . implode(",", $list));
    }
}

echo $db->error;

$tbl4 = "wp7y_postmeta";
$selected_categories = array();
$sql = "SELECT * FROM $tbl2";
$qy = $db->query($sql);
while ($row = $qy->fetch_array(MYSQLI_ASSOC)) {
    $selected_categories[$row['descCatMerc']] = 1;
}

$brains = array();
$codices = array();
$sql = "SELECT *,0 AS POST_ID FROM $tbl WHERE CodiceEAN <> ''";
$qy = $db->query($sql);
while ($row = $qy->fetch_array(MYSQLI_ASSOC)) {
    if(isset($selected_categories[$row["DescCatMerc"]]))
    {
        $brains[$row["CodiceEAN"]] = $row;
        $codices[$row['Codice']] = $row['CodiceEAN'];
    }
}

$sql = "SELECT ID as POST_ID,REPLACE(guid, 'http://', '') as guid FROM $tbl3 WHERE post_type='product'";
$qy = $db->query($sql);
while ($row = $qy->fetch_array(MYSQLI_ASSOC)) {
    if(isset($brains[$row["guid"]]))
    {
        $brains[$row['guid']]["POST_ID"] = $row['POST_ID'];
        $brains[$row['guid']]["guid"] = $row['guid'];
    }
}

echo $db->error;


$tbl = "Brain_UpdExprinet";
$tbl3 = "wp7y_posts";
$tbl6 = "Brain_quickM";

$sql = "SELECT * FROM " . $tbl6;
$qy = $db->query($sql);
echo $db->error;
while ($row = $qy->fetch_array(MYSQLI_ASSOC))
{

    $post_content = "\n\n&nbsp;<table>";
    $quicks = array();
    $valorequicks = array();

    foreach ($row as $f => $v)
    {
        if($f == "CodiceArticolo") continue;
        if (strpos($f, "ValoreQuick") !== false)
        {
            $valorequicks[substr($f, 11) - 1] = $v;
        }
        else
        {
            $quicks[substr($f, 5) - 1] = str_replace("Specifiche tecniche - ", "", $v);
        }
    }

    foreach ($quicks as $ind => $v)
    {
        $post_content .= "<tr>";
        $post_content .= "<td>" . $v . "</td>";
        $post_content .= "<td>" . $valorequicks[$ind] . "</td>";
        $post_content .= "</tr>";
    }
    $post_content .= "</table>";

    if(isset($codices[$row['CodiceArticolo']]))
    {
        $brains[$codices[$row['CodiceArticolo']]]['DescEstesa'] .= $db->real_escape_string($post_content);
    }
}

$max_sql = "SELECT MAX(ID) as max_id from $tbl3;";
$max_qy = $db->query($max_sql);
$max_id = 0;
while ($max_row = $max_qy->fetch_array(MYSQLI_ASSOC))
{
    $max_id = $max_row['max_id'];
}

$prices = array();
$sql = "SELECT * FROM $tbl4 WHERE meta_key='_price'";
$qy = $db->query($sql);
while ($row = $qy->fetch_array(MYSQLI_ASSOC)) {
    $prices[$row['post_id']] = $row;
}

foreach ($brains as $row)
{
    if ($row['POST_ID'] > 0)
    {
        $price = $row['PrezzoListino'];
        $id = $row['POST_ID'];
        if (isset($prices[$id]))
        {
            $sql = "UPDATE $db_name2.$tbl4 SET meta_value='$price' WHERE post_id='$id' AND meta_key='_price';";
            $db->query($sql);
        }
        else
        {
            $sql = "INSERT INTO $db_name2.$tbl4(meta_key,post_id,meta_value) VALUES('_price','$id','$price');";
            $db->query($sql);
        }
        echo $db->error;

        $sql = "UPDATE $db_name2.$tbl3 SET 
              `post_date_gmt`='" . date("Y-m-d H:i:s") . "',
              `post_content`='" . $db->real_escape_string($row['DescEstesa']) . "',
              `post_title`='" . $db->real_escape_string($row['DescProd']) . "',
              `post_name`='" . $db->real_escape_string(str_replace(" ", "_", $row['Descrizione'])) . "'
            WHERE guid='http://" . $row['CodiceEAN'] . "'
            ";
        $db->query($sql);

        echo $db->error;
    }
    else
    {
        $max_id++;
        $sql = "INSERT INTO $db_name2.$tbl3(
              `ID`, 
              `post_author`, 
              `post_date`, 
              `post_date_gmt`, 
              `post_content`, 
              `post_title`, 
              `post_name`, 
              `post_status`, 
              `comment_status`, 
              `ping_status`, 
              `guid`, 
              `post_type`) 
            VALUES (
              '" .$max_id. "',
              1,
              '" . date("Y-m-d H:i:s") . "',
              '" . date("Y-m-d H:i:s") . "', 
              '" . $db->real_escape_string($row['DescEstesa']) . "', 
              '" . $db->real_escape_string($row['DescProd']) . "', 
              '" . $db->real_escape_string(str_replace(" ", "_", $row['Descrizione'])) . "', 
              'publish', 
              'closed', 
              'closed', 
              'http://" . $row['CodiceEAN'] . "', 
              'product')";

        $db->query($sql);
        echo $db->error;

        $price = $row['PrezzoListino'];
        $codice = $row['Codice'];
        $id = $max_id;
        $sql = "SELECT * FROM $db_name2.`$tbl4` WHERE meta_key ='_price' AND post_id='" . $id . "'";
        $count = $db->query($sql);
        $prices = array();
        if ($count->num_rows > 0)
        {
            $sql = "UPDATE $db_name2.$tbl4 SET meta_value='$price' WHERE post_id='$id' AND meta_key='_price';";
            $db->query($sql);
        }
        else
        {
            $sql = "INSERT INTO $db_name2.$tbl4(meta_key,post_id,meta_value) VALUES('_price','$id','$price');";
            $db->query($sql);
        }


        $sql = "SELECT * FROM $db_name2.`$tbl4` WHERE meta_key ='_sku' AND post_id='" . $id . "'";
        $count = $db->query($sql);
        $prices = array();
        if ($count->num_rows > 0)
        {
            $sql = "UPDATE $db_name2.$tbl4 SET meta_value='$codice' WHERE post_id='$id' AND meta_key='_sku';";
            $db->query($sql);
        }
        else
        {
            $sql = "INSERT INTO $db_name2.$tbl4(meta_key,post_id,meta_value) VALUES('_sku','$id','$codice');";
            $db->query($sql);
        }
        echo $db->error;
    }
    echo $db->error;
}

$qy->free_result();


$tbl = "Brain_UpdExprinet";
$tbl3 = "wp7y_posts";
$tbl4 = "Brain_LinkImgC_Nuovo";
$meta = "wp7y_postmeta";

$posts = array();
$sql = "select ID,guid from wp7y_posts where post_type='product'";
$qy = $db->query($sql);
while ($row = $qy->fetch_array(MYSQLI_ASSOC)) {
  $posts[$row['guid']] = $row['ID'];
}

$data = array();
$sql = "select CodiceEAN,Codice from Brain_UpdExprinet;";
$qy = $db->query($sql);
while($row = $qy->fetch_array(MYSQLI_ASSOC))
{
  if(isset($posts[$row['CodiceEAN']]))
  {
    $data[$row['Codice']] = $posts[$row['CodiceEAN']];
  }
}

$images = array();
$sql = "select * from Brain_LinkImgC_Nuovo";
$qy = $db->query($sql);
while ($row = $qy->fetch_array(MYSQLI_ASSOC)){
  if(isset($data[$row['Codice']]))
  {
    $images[$data[$row['Codice']]] = $row;
  }
}

$thumbnails = array();
$sql = "SELECT meta_value FROM $meta WHERE meta_key ='_thumbnail_id';";
$qy = $db->query($sql);
while ($row = $qy->fetch_array(MYSQLI_ASSOC)) {
  $thumbnails[$row['post_id']] = $row['meta_value'];
}

echo $db->error;
$max_sql = "SELECT MAX(ID) as max_id from $tbl3;";
$max_qy = $db->query($max_sql);
$max_id = 0;
while ($max_row = $max_qy->fetch_array(MYSQLI_ASSOC))
{
    $max_id = $max_row['max_id'];
}

foreach($images as $post_id => $row)
{
    if (isset($thumbnails[$post_id]))
    {
        $update_sql = "UPDATE $tbl3 SET post_title='" . $row["Titolo"] . "', guid='" . $row['Foto'] . "' WHERE id='" . $thumbnails[$post_id] . "'";
        $db->query($update_sql);
    }
    else
    {        
        $max_id++;
        $insert_sql = "INSERT INTO $db_name2.$tbl3(
  `ID`,
  `post_author`, 
  `post_date`, 
  `post_date_gmt`, 
  `post_content`, 
  `post_title`, 
  `post_name`, 
  `post_status`, 
  `comment_status`, 
  `ping_status`, 
  `guid`, 
  `post_type`) 
VALUES (
  $max_id,
  1,
  '" . date("Y-m-d H:i:s") . "',
  '" . date("Y-m-d H:i:s") . "', 
  '', 
  '" . $row["Titolo"] . "', 
  '', 
  'inherit', 
  'open', 
  'closed', 
  '" . $row['Foto'] . "', 
  'attachment');";
        $db->query($insert_sql);

        $thumbnail_post_id = $max_id;

        $insert_sql = "INSERT INTO $meta SET meta_value=$thumbnail_post_id, meta_key ='_thumbnail_id', post_id = '" . $post_id . "';";
        $db->query($insert_sql);
    }
}

$sql = "INSERT INTO $tbl2 SELECT DISTINCT descCatMerc FROM $tbl WHERE NOT EXISTS (SELECT descCatMerc FROM $tbl2 WHERE descCatMerc=$tbl.descCatMerc)";
$db->query($sql);

$db->query("call taxonomy();");
echo $db->error;
$db->close();

?>