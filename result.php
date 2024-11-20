<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>投票結果 - ときめき★タグ選手権</title>
</head>

<body>
    <div class="container">
        <h2>投票結果</h2>
        <?php
        //評価を☆とかに変更する関数
        function showRating($value,$symbol){
            $output="";
            for ($i = 0; $i < 5; $i++){
                if($i < $value){
                    $output.= '<span class="rating-symbol filled">'.$symbol.'</span>';
                }else{
                    '<span class="rating-symbol">' . $symbol . '</span>';
                }
            }
            return $output;
        }

        // ファイルの読み込み
        $file = fopen("data/data.csv", "r"); // r = 読み取り専用

        // テーブルのヘッダーを作る
        echo '<table>';
        echo '<tr>';
        echo '<th>お名前</th>';
        echo '<th>メールアドレス</th>';
        echo '<th>タグ</th>';
        echo '<th>かっこよさ</th>';
        echo '<th>可愛さ</th>';
        echo '<th>使いやすさ</th>';
        echo '<th>コメント</th>';
        echo '</tr>';

        // csvのデータを配列に変換し、HTMLに埋め込む
        while ($line = fgetcsv($file)) {
            echo "<tr>";
            //名前、メール、タグのみ表示
            for ($i = 0; $i < 3; $i++) {
                echo "<td>" . htmlspecialchars($line[$i]) . "</td>"; //htmlspecialcharsはセキュリティの観点からつけたほうがいい
            }
            // 評価を記号で表示
            echo "<td>" . showRating($line[3], '★') . "</td>";
            echo "<td>" . showRating($line[4], '♥') . "</td>";
            echo "<td>" . showRating($line[5], '☺') . "</td>";
            // コメントを表示
            echo "<td>" . htmlspecialchars($line[6]) . "</td>";
            echo "</tr>";
        }
        echo "</table>";

        // ファイルを閉じる
        fclose($file);
        ?>
    </div>
    <button id="back">投票画面へ戻る</button>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // 画面の読み込みが完全に終わってから
            const backButton = document.getElementById("back");
            backButton.addEventListener("click", function() {
                window.location.href = "index.html";
            });
        });
    </script>
</body>

</html>