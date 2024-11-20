<?php
$name = $_POST["name"];
$mail = $_POST["mail"];
$tag = $_POST["tag"];
$cool = $_POST["cool_rating"];
$cute = $_POST["cute_rating"];
$usability = $_POST["usability_rating"];
$comment = $_POST["comment"];
$c = ",";
$str = $name.$c.$mail.$c.$tag.$c.$cool.$c.$cute.$c.$usability.$c.$comment;

//File書き込み（講義ファイルから完全借用コピペ）
$file = fopen("data/data.csv", "a");    // ファイル読み込み。aは「add」で追加書き込み用。
fwrite($file, $str . "\n"); //書き込み。第1引数＝書き込み場所の指定。第2引数＝書き込み文字列。
fclose($file); //ファイルを閉じる。

include("thanks.html");
?>
