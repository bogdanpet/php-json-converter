<?php

class Transcoder
{
    public $data;

    /**
     * @param $data
     */
    public function setData($data)
    {
        $this->data = $data;
    }

    public function jsonDecode()
    {
        // Parse JSON data as array
        $array = json_decode($this->data, true);

        // Return array code as text
        $result = $this->var_export54($array);

        return $result;
    }

    public function jsonEncode()
    {
        $file_content = '<?php $array = ' . $this->data . ';';
        $file_name    = 'array_dump.php';
        file_put_contents($file_name, $file_content);
        include $file_name;
        $result = json_encode($array, JSON_PRETTY_PRINT);

        return $result;
    }

    /**
     * Custom var_export() alternative which outputs array in php5.4 short syntax
     * Source: http://stackoverflow.com/questions/24316347/how-to-format-var-export-to-php5-4-array-syntax
     *
     * @param $var
     * @param string $indent
     *
     * @return mixed|string
     */
    private function var_export54($var, $indent = "")
    {
        switch (gettype($var)) {
            case "string":
                return '"' . addcslashes($var, "\\\$\"\r\n\t\v\f") . '"';
            case "array":
                $indexed = array_keys($var) === range(0, count($var) - 1);
                $r       = [];
                foreach ($var as $key => $value) {
                    $r[] = "$indent    "
                           . ($indexed ? "" : $this->var_export54($key) . " => ")
                           . $this->var_export54($value, "$indent    ");
                }

                return "[\n" . implode(",\n", $r) . "\n" . $indent . "]";
            case "boolean":
                return $var ? "TRUE" : "FALSE";
            default:
                return var_export($var, true);
        }
    }
}