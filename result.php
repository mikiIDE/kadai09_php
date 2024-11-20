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
        // ファイルの読み込み
        $file = fopen("data/data.csv", "r"); // r = 読み取り専用

        // テーブルのヘッダーを作る
        echo '<table border="1">';
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
            for ($i = 0; $i < count($line); $i++) {
                echo "<td>" . htmlspecialchars($line[$i]) . "</td>"; //htmlspecialcharsはセキュリティの観点からつけたほうがいい
            }
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