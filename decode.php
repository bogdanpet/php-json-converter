<?php

require 'src/Transcoder.php';

$transcoder = new Transcoder();

$transcoder->setData($_POST['json']);

echo $transcoder->jsonDecode();