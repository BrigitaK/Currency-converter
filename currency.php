<?php
session_start();

if (!empty($_POST)) {
    $from = $_POST['from'];
    $to = $_POST['to'];
    $amount = $_POST['amount'];
    $string = $from . "_" . $to;

  
    $url = file_get_contents("https://free.currconv.com/api/v7/convert?q=$string&compact=ultra&apiKey=fcb8cfbc519ccc63fe6f");
    $json = json_decode($url, true);
    $rate = implode(" ",$json);
    $total = $rate * $amount;
    $rounded = round($total,2);
    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css.css" />
    <title>Coverter</title>
</head>
<body>

<div class="block">
    <h1>Currency Converter</h1>
    <form method="POST">
        <div class="column">
            <div>Amount</div>
            <input name="amount" class="form-control" value="<?=$amount ?? ''?>">
        </div>
        <div class="column">
            <div>From</div>
            <input name="from" class="form-control"  value="<?=$from ?? ''?>">
        </div>
        <div class="column">
            <div>To</div>
            <input name="to" class="form-control"  value="<?=$to ?? ''?>">
        </div>
        <div>
            <input type="submit" class="convert-btn" name="submit" value="Convert">
        </div>
    </form>
    <?php if(isset($total)) {?>
        <h2 class="ans"><?= $amount?><?= $from?> = <?= $rounded?><?= $to?></h2>
    <?php }?>
</div>

</body>
</html>