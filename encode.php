<?php

require 'src/Transcoder.php';

$transcoder = new Transcoder();

$transcoder->setData($_POST['php']);

echo $transcoder->jsonEncode();