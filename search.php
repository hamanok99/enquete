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
                while($data = fgetcsv($fp)){
                    mb_convert_variables("UTF-8", "SJIS-win", $data);
                    echo "1:" . $_POST['thoughts'];
                    echo "2:" . $data[6];

                    if($data[0]===$_POST['name']){
                        echo "data[0]:" . $data[0];
                        echo "$_POST[name]:" . $_POST['name'];
                    }
                    if ($data[1]===$_POST['age']){
                        echo "data[1]:" . $data[1];
                        echo "$_POST[age]:" . $_POST['age'];
                    }
                    if ($data[2]===$_POST['gender']){
                        echo "data[2]:" . $data[2];
                        echo "$_POST[gender]:" . $_POST['gender'];
                    }
                    if ($data[3]===$_POST['address']){
                        echo "data[3]:" . $data[3];
                        echo "$_POST[address]:" . $_POST['address'];
                    }
                    if ($data[4]===$_POST['telephone']){
                        echo "data[4]:" . $data[4];
                        echo "$_POST[telephone]:" . $_POST['telephone'];
                    }
                    if ($data[5]===$_POST['mail']){
                        echo "data[5]:" . $data[5];
                        echo "$_POST[mail]:" . $_POST['mail'];
                    }
                    if ($data[6]===$_POST['thoughts']){
                        echo "data[6]:" . $data[6];
                        echo "$_POST[thoughts]:" . $_POST['thoughts'];
                    }
                    // テーブルセルに配列の値を格納
                    /*
                    echo '<tr>';
                    for ($i=0;$i<count($data);$i++) {
                        echo "<td>" . $data[$i] . "</td>";
                    }*/
                    echo '</tr>';
                    }if (isset($_POST["name"])) {
                        if(empty($_POST['name'] && $_POST['age'] && $_POST['gender'] &&
                        $_POST['address'] && $_POST['telephone'] && $_POST['mail'] && $_POST['thoughts'])){
                            echo '<tr>';
                            for ($i=0;$i<count($data);$i++) {
                            echo "<td>" . $data[$i] . "</td>";
                            }
                            echo '</tr>';
                        }
                    }
                }
                // 開いたファイルを閉じる
                fclose($fp);
                ?>
            </table>
        </form>
    </div>
</body>
</html>