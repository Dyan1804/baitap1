<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phương án rút tiền</title>
</head>

<body>
    <h1>Phương án rút tiền tại cây ATM</h1>
    <?php
        $getMoney = $_POST["input-money"];

        $moneyArr = [200000, 100000, 50000];

        $atm200 = $_POST["200"];
        $atm100 = $_POST["100"];
        $atm50 = $_POST["50"];

        $atm = [$atm200, $atm100, $atm50];

        $sum = 0;
        for ($i = 0; $i < count($moneyArr); $i++) {
            $sum += $atm[$i] * $moneyArr[$i];
        }

        if ($getMoney > $sum) {

            echo "Cây ATM hiện không đủ tiền!";
        } 
        elseif ($getMoney % 50000 != 0) {

            echo "Số tiền nhập vào phải là bội số của 50.";
        } 
        else {

            if (($getMoney % 200000 == 0) && (floor($getMoney / 200000) <= $atm200)) {

                echo "Rút tiền tại câsy ATM thành công!" .
                    "<br>Số tờ 200.000VNĐ: " . floor($getMoney / 200000);
            } else {
                for ($i = 0; $i < count($moneyArr); $i++) {
                    $atmCheck = min($getMoney / $moneyArr[$i], $atm[$i]);
                    $getMoney -= $atmCheck * $moneyArr[$i];
                    echo "Số tờ $moneyArr[$i]: $atmCheck <br>";
                    if ($getMoney == 0) {
                        break;
                    }
                }
            }
        }
    ?>
</body>

</html>
