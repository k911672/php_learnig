<?php
// 5, for文の基礎
// 1~10までの数字をfor文を使って出力してください

for($i = 1 ;$i <= 10 ;$i++) {
  echo $i."\n";
};

// 6, for文の基礎２
// 35 ~ 46までの数字をfor文を使って出力してください

for($i = 35 ;$i <= 46 ;$i++) {
  echo $i."\n";
};

// 7. for文と条件式の組み合わせ
// 40 ~ 50までの数字の中で奇数の数字のみを出力してください

for($i = 40 ;$i <= 50 ;$i++) {
  if ($i % 2 !== 0){
    echo $i."\n";
  }
};

// 8. for文と条件式の組み合わせ2
// 10 ~ 25までの数字の中で3の倍数の数字のみを出力してください

for($i = 10 ;$i <= 25 ;$i++) {
  if ($i % 3 === 0){
    echo $i."\n";
  }
};
?>
