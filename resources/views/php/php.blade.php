<?php 
 function add($a, $b)
{
    $sum = $a + $b;

    // NG: 文字列を返そうとすると、TypeErrorが発生する
    return "合計は: " . $sum; // Fatal error: Uncaught TypeError: ...
}
$result = add(5, 3);
echo $result; // 8
// ?>

<?php $age = 20;

// もし、変数 $age が、18以上ならば
if ($age >= 18) {
    echo "あなたは、成人です。";
}
 ?>