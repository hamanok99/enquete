<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="enquete.css" media="all" />
<title>検索画面</title>
</head>
<body>
    <div class ="contact">
    <h1 class="contact-ttl">検索</h1>
        <form action="search.php" method="post">
            <table class="contact-table">
                <tr>
                    <th class="contact-item">名前</th>
                    <td class="contact-body">
                        <input type="text" name="name" class="form-text" value="">
                    </td>
                </tr>
                <tr>
                    <th class="contact-item">年齢</th>
                    <td class="contact-body">
                        <input type="text" name="age" class="form-age-text" value="">歳
                    </td>
                </tr>
                <tr>
                    <th class="contact-item">性別</th>
                    <td class="contact-body">
                        <select name="gender" class="form-select">
                            <option hidden>選択してください</option>

                            <option>男性</option>
                            <option>女性</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th class="contact-item">住所</th>
                    <td class="contact-body">
                        <input type="text" name="address" class="form-text" value="">
                    </td>
                </tr>
                <tr>
                    <th class="contact-item">電話番号</th>
                    <td class="contact-body">
                        <input type="text" name="telephone" class="form-text" value="">
                    </td>
                </tr>
                <tr>
                    <th class="contact-item">メ―ルアドレス</th>
                    <td class="contact-body">
                        <input type="text" name="mail" class="form-text" value="">
                    </td>
                </tr>
                <tr>
                    <th class="contact-item">感想</th>
                    <td class="contact-body">
                    <label class="contact-thoughts">
                        <input type="radio" name="thoughts" value="good" />
                        <span class="contact-thoughts-txt">良い</span>
                    </label>
                    <label class="contact-thoughts">
                        <input type="radio" name="thoughts" value="normal" />
                        <span class="contact-thoughts-txt">普通</span>
                    </label>
                    <label class="contact-thoughts">
                        <input type="radio" name="thoughts" value="bad" />
                        <span class="contact-thoughts-txt">悪い</span>
                    </label>
                    </td>
                </tr>
                <tr>
                    <td><input class="contact-submit" type="submit" value="検索" /></td>
                </tr>
            </table>
            <table>
                <tr>
                    <th>氏名</th>
                    <th>年齢</th>
                    <th>性別</th>
                    <th>住所</th>
                    <th>電話番号</th>
                    <th>メールアドレス</th>
                    <th>感想</th>
                </tr>
                <?php
                // test.csvファイルを開いて、読み込みモードに設定する
                $fp = fopen('data.csv', 'r');
                // while文でCSVファイルのデータを1つずつ繰り返し読み込む
                $i=0;
                while($data = fgetcsv($fp)){
                    echo $i;
                    $i++;
                    mb_convert_variables("UTF-8", "SJIS-win", $data);
                    // test
                    echo "data[0]:" . $data[0] . "<br/>";
                    echo "_POST[name]:" . $_POST['name'] . "<br/>";
                    if($data[0]===$_POST['name']){
                        echo "一致<br/>";
                        echo '<tr>';
                        for ($i=0;$i<count($data);$i++) {
                            echo "<td>" . $data[$i] . "</td>";
                        }
                        echo '</tr>';
                    }
                    echo "data[1]:" . $data[1] . "<br/>";
                    echo "_POST[age]:" . $_POST['age'] . "<br/>";
                    if ($data[1]===$_POST['age']){
                        echo "一致<br/>";
                    }
                    echo "data[2]:" . $data[2] . "<br/>";
                    echo "_POST[gender]:" . $_POST['gender'] . "<br/>";
                    if ($data[2]===$_POST['gender']){
                        echo "一致<br/>";
                    }
                    echo "data[3]:" . $data[3] . "<br/>";
                    echo "_POST[address]:" . $_POST['address'] . "<br/>";
                    if ($data[3]===$_POST['address']){
                        echo "一致<br/>";
                    }
                    echo "data[4]:" . $data[4] . "<br/>";
                    echo "_POST[telephone]:" . $_POST['telephone'] . "<br/>";
                    if ($data[4]===$_POST['telephone']){
                        echo "一致<br/>";
                    }
                    echo "data[5]:" . $data[5] . "<br/>";
                    echo "_POST[mail]:" . $_POST['mail'] . "<br/>";
                    if ($data[5]===$_POST['mail']){
                        echo "一致<br/>";
                    }
                    echo "data[6]:" . $data[6] . "<br/>";
                    echo "_POST[thoughts]:" . $_POST['thoughts'] . "<br/>";
                    if ($data[6]===$_POST['thoughts']){
                        echo "一致<br/>";
                    }
                    // テーブルセルに配列の値を格納


/*
                    if (isset($_POST["name"])) {
                        if(empty($_POST['name'] && $_POST['age'] && $_POST['gender'] &&
                        $_POST['address'] && $_POST['telephone'] && $_POST['mail'] && $_POST['thoughts'])){
                            echo '<tr>';
                            for ($i=0;$i<count($data);$i++) {
                            echo "<td>" . $data[$i] . "</td>";
                            }
                            echo '</tr>';
                        }
                    }*/
                }
                // 開いたファイルを閉じる
                fclose($fp);
                ?>
            </table>
        </form>
    </div>
</body>
</html>