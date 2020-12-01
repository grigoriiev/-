<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/fancybox@3.5.1/dist/jquery.fancybox.min.css" />
    <title>Calculator</title>
</head>
<body>
<?php
if(isset($_POST['submit'])){

    $result = '';

if(isset($_POST['firstNumber'])&&isset($_POST['secondNumber'])&&isset($_POST['operation'])){

    require_once('Calc.php');

          $calc= new Calc;


    if($_POST['operation']=='+'){

       $result = $calc->sum(trim(strip_tags (  $_POST['firstNumber'])),trim(strip_tags ( $_POST['secondNumber'])));

    }else if($_POST['operation']=='-'){

       $result =$calc->subtraction(trim(strip_tags($_POST['firstNumber'])),trim(strip_tags ( $_POST['secondNumber'])));
    }else if($_POST['operation']=='/'){

        if(trim(strip_tags($_POST['secondNumber']))==0){

            $result ="деленние на ноль не возможно";

        }else{

            $result =$calc->division(trim(strip_tags($_POST['firstNumber'])),trim(strip_tags ( $_POST['secondNumber'])));
        }
    }else if($_POST['operation']=='*'){

           $result=$calc->multiplication(trim(strip_tags($_POST['firstNumber'])),trim(strip_tags ( $_POST['secondNumber'])));

    }else{
        $result = "Что-то пошло не так";
    }
}else{
    $result ="Что-то пошло не так!!!";
}

}else{
    $result ="Введите числа";
}

?>
    <form class="form-inline" method="post" action="<?php echo htmlspecialchars($_SERVER[" PHP_SELF"]);?>">
        <div class="form-group  mx-sm-3 mb-2">
            <label for="firstNumber" class="sr-only">Первое число</label>
            <input type="number" class="form-control" id="firstNumber" required name="firstNumber">
        </div>
        <div class="form-group  mx-sm-3  mb-2">
            <label for="inputState" class="sr-only">Первое число</label>
            <select name="operation" id="inputState" class="form-control" required>
                <option selected></option>
                <option value="+">плюс</option>
                <option value="-">минус</option>
                <option value="/">деление</option>
                <option value="*">умножение</option>
            </select>
            <?php echo htmlspecialchars($_POST["operation"]);?>
        </div>
        <div class="form-group mx-sm-3 mb-2">
            <label for="secondNumber" class="sr-only">Второе число</label>
            <input type="number" class="form-control" id="secondNumber" name="secondNumber" required>
        </div>
<?php
  echo  '<div class="form-group mx-sm-3 mb-2">';
  echo $result ;
  echo'</div>';
  ?>
        <button type="submit" class="btn btn-primary mb-2" name="submit">Выполнить действие</button>
    </form>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"> </script>
    <script src = "https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity = "sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin = "anonymous" ></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/fancybox@3.5.1/dist/jquery.fancybox.min.js"></script>
    <script src="js/myJavaScript.js"></script>
</body>

</html>