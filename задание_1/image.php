<?php
header("Content-Type: image/png"); // mime-type пикчи в заголовке

$image="./square.png";

readfile($image); // $image - строка с путем к файлу