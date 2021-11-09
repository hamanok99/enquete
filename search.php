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
        <form action="search.php" method="get">
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
                            <option value="" hidden>選択してください</option>
                            <option value="man">男性</option>
                            <option value="woman">女性</option>
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
                    <label class="contact-thoughts">
                        <input type="radio" name="thoughts" value="" checked="checked" style="display:none;"/>
                    </label>
                    </td>
                </tr>
                <tr>
                    <td><input class="contact-submit" type="submit" value="検索" /></td>
                </tr>
            </table>
            <table>
                <?php
                echo '<table>
                <tr>
                <th>氏名</th>
                <th>年齢</th>
                <th>性別</th>
                <th>住所</th>
                <th>電話番号</th>
                <th>メールアドレス</th>
                <th>感想</th>
                </tr>';

                $NAME = $_GET['name'];
                $AGE = $_GET['age'];
                $GENDER = $_GET['gender'];
                $ADDRESS = $_GET['address'];
                $TELEPHONE = $_GET['telephone'];
                $MAIL = $_GET['mail'];
                $THOUGHTS = $_GET['thoughts'];

                // test.csvファイルを開いて、読み込みモードに設定する
                $fp = fopen('data.csv', 'r');

                // while文でCSVファイルのデータを1つずつ繰り返し読み込む
                while($data = fgetcsv($fp)){

                    //UTF-8に変換
                    mb_convert_variables("UTF-8", "SJIS-win", $data);

                    // 検索用フラグ
                    $display = True;

                    // 検索条件を取得
                    $get = $_GET;

                    // 検索条件がある場合
                    if (!empty($get)){
                        // nameが入力されている
                        if(empty($NAME) === false) {
                            // 部分一致しない
                            if ((strpos($data[0], $NAME) === false)){
                                $display = false;
                            }
                        }
                        // 年齢が入力されている
                        if (empty($AGE) === false) {
                            // 完全一致しない
                            if (($data[1] !== $AGE)){
                                $display = false;
                            }
                        }
                        // 性別が入力されている
                        if (empty($GENDER) === false) {
                            // 完全一致しない
                            if ($data[2] !== $GENDER){
                                $display = false;
                            }
                        }
                        // 住所が入力されている
                        if (empty($ADDRESS) === false) {
                            // 部分一致しない
                            if (strpos($data[3], $ADDRESS) === false){
                                $display = false;
                            }
                        }
                        // 電話番号が入力されている
                        if (empty($TELEPHONE) === false) {
                            // 部分一致しない
                            if (strpos($data[4], $TELEPHONE) === false) {
                                $display = false;
                            }
                        }
                        // メールが入力されている
                        if (empty($MAIL) === false) {
                            // 部分一致しない
                            if (strpos($data[5], $MAIL) === false) {
                                $display = false;
                            }
                        }
                        // 感想が入力されている
                        if (empty($THOUGHTS) === false) {
                            // 完全一致する
                            if ($data[6] === $THOUGHTS) {
                                $display = false;
                            }
                        }
                        if ($display === True)
                        {
                            echo '<tr>';
                            for ($i=0;$i<count($data);$i++) {
                                echo "<td>" . $data[$i] . "</td>";
                            }
                            echo '</tr>';
                        }
                    }
                }

                 // テーブルの閉じタグ
                echo '</table>';

                // 開いたファイルを閉じる
                fclose($fp);
                ?>
            </table>
        </form>
    </div>
</body>
</html>