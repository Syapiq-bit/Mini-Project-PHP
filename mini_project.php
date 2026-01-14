<!-- PHP -->
  <?php
  $result = '';
  if(isset($_POST["calculate"])){
    $num1 = htmlspecialchars($_POST["num1"]);
    $num2 = htmlspecialchars($_POST["num2"]);
    $operator = $_POST["operator"];

    // validasi
    if(is_numeric($num1) && is_numeric($num2)){
        switch ($operator){
            case "add":
               $result = $num1 + $num2;
                break;
                case "subtract":
                    $result = $num1 - $num2;
                    break;
                    case "multiply":
                        $result = $num1 * $num2;
                        break;
                        case "divide";
                        if($num2 != 0){

                            $result = $num1 / $num2;
                        }else{
                            $result = "Pembagian dengan nol tidak di perbolehkan";
                        }
                        // ternary expression
                        // $num2 !=0 ? $result =$num1 + $num2 : $result = "Error Pembagian dengan nol tidak di perbolehkan";
                        // break;
        }
    }else{
        echo "Angka tidak valid";
    }
    echo $num1;
  }
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mini Project Kalkulator</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="calculator-container">
    <h1>Kalkulator Sederhana</h1>



    <form action="mini_project.php" method="post" class="calculator-form">
        <input type="text" id="num1" name="num1" placeholder="Masukkan Angka" value="<?php echo isset($_POST["num1"]) ? $_POST ["num1"] : '' ?>">
        <input type="text" id="num2" name="num2" placeholder="Masukkan Angka Kedua" value="<?php echo isset($_POST["num2"]) ? $_POST ["num2"] : '' ?>">

        <select name="operator" id="operator" class="operator">
            <option  <?= isset($_POST['operator']) && $_POST ['operator'] == 'add' ? "selected" : "" ?>  value="add">
                Tambah
            </option>
            <option <?= isset($_POST['operator']) && $_POST ['operator'] == 'subtract' ? "selected" : "" ?> value="subtract">
                Kurang
            </option>
            <option <?= isset($_POST['operator']) && $_POST['operator'] == 'multiply' ? "selected" : "" ?>  value="multiply">
                Kali
            </option>
            <option <?= isset($_POST['operator']) && $_POST['operator'] == 'divide' ? "selected" : "" ?>  value="divide">
                Bagi 
            </option>
        </select>
        <button type="submit" name="calculate" class="calc-btn">Hitung</button>
    </form>
    <div class="result">Result : <?php echo  htmlspecialchars($result) ?></div>
  </div>


</body>
</html>