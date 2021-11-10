<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>検索画面</title>
<style type="text/css">
table.type06, th, td {
  border-collapse: collapse;
  border: 1px solid #ccc;
  line-height: 1.5;
  padding: 4px;
}

table.type0 th, td {
  border-collapse: collapse;
  border: 1px solid #FFF;
  line-height: 1.5;
  padding: 4px;
}

table.type06 th {
  width: 150px;
  padding: 5px;
  font-weight: bold;
  vertical-align: top;
  background: #3f3f3f;
  color: #ffffff;
}
table.type06 td {
  width: 350px;
  padding: 10px;
  vertical-align: top;
}
</style>
</head>
<body>
<form action="search.php" method="POST" name='enquete'>
<table class="type0">
    <tr>
        <td style="background-color:#3f3f3f;color: #ffffff">氏名</td>
        <td style="background-color:lightgrey"><input type="text" name="name" value=""></td>
    </tr>
    <tr>
        <td style="background-color:#3f3f3f;color: #ffffff">年齢</td>
        <td style="background-color:lightgrey"><input type="text" name="age" value="">歳</td>
    </tr>
    <tr>
        <td style="background-color:#3f3f3f;color: #ffffff">性別</td>
        <td style="background-color:lightgrey"><select name="gender"><option>男性</option><option>女性</option></select></td>
    </tr>
    <tr>
        <td style="background-color:#3f3f3f;color: #ffffff">住所</td>
        <td style="background-color:lightgrey"><input type="text" name="address" value=""></td>
    </tr>
    <tr>
        <td style="background-color:#3f3f3f;color: #ffffff">電話番号</td>
        <td style="background-color:lightgrey"><input type="text" name="telephone" value=""></td>
    </tr>
    <tr>
        <td style="background-color:#3f3f3f;color: #ffffff">メールアドレス</td>
        <td style="background-color:lightgrey"><input type="text" name="mail" value=""></td>
    </tr>
    <tr>
        <td style="background-color:#3f3f3f;color: #ffffff">感想</td>
        <td style="background-color:lightgrey"><input type="radio" name="thoughts" value="good">良い<input type="radio" name="thoughts" value="normal">普通<input type="radio" name="thoughts" value="bad">悪い</td>
    </tr>
</table>
<div style="margin: 10px 0;">
<button type="submit">検索</button>
</div>

<table>
<?php
// テーブルタグを作成し、テーブルヘッダーで見出しを作る
echo '<table class="type06">
    <tr>
    <th>氏名</th>
    <th>年齢</th>
    <th>性別</th>
    <th>住所</th>
    <th>電話番号</th>
    <th>メールアドレス</th>
    <th>感想</th>
    </tr>
    <tr>
        <td>山田</td>
        <td>50</td>
        <td>男性</td>
        <td>熊本県</td>
        <td>00011112222</td>
        <td>test@test.com</td>
        <td>良い</td>
    </tr>
    <tr>
        <td>田中</td>
        <td>30</td>
        <td>男性</td>
        <td>東京都</td>
        <td>08011112222</td>
        <td>test@co.jp</td>
        <td>普通</td>
    </tr>
    </table>';

?>
</table>
</form>
</body>
</html>