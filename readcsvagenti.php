<?PHP

$file_handle = fopen("exp_siv.csv", "r");

while (!feof($file_handle) ) {

$line_of_text = fgetcsv($file_handle, 1024);

//print $line_of_text[0] . $line_of_text[1]. $line_of_text[2] . "<BR>";

$pieces = explode(";", $line_of_text[0]);
echo $pieces[0]. " " .$pieces[1]. $pieces[2]. " " .$pieces[3]. " " .$pieces[4]. " " .$pieces[5]. " " .str_replace($pieces[6]," ",","). " " .$pieces[7]. " " .$pieces[8]. " " .$pieces[9]. " " .$pieces[10]. " " .$pieces[11]. " " .$pieces[12]. " " ."<BR>" ;
//echo $pieces[1]; <br> // piece2

}

fclose($file_handle);

?>