<?php

    $default_homepage = 'home';
    $errorpage = 'error';
    $pages_path = 'pages/';

    function clean($string) {
        $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
 
        return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
    }

    function replace($buffer)
    {
        preg_match_all("{{(.+?.php)}}", $buffer, $arr);
        foreach(array_combine($arr[0], $arr[1]) as $match=>$filename) {
            $buffer = str_replace($match, get_included_contents('components/'.$filename), $buffer);
        }

        return $buffer;
    }

    function get_included_contents($file) {
        ob_start();
        include($file);
        $contents = ob_get_contents();
        ob_end_clean();

        return replace($contents);
    }
    
    $layout = get_included_contents('layout.html');
    
    $page_name = $default_homepage;
    if (isset($_GET['page'])) {
        $page_name = clean($_GET['page']);
    }

    if (!file_exists($pages_path.$page_name.'.php')) {
        $page_name = $errorpage;
    }
    
    $page_path = $pages_path.$page_name.'.php';

    $layout = str_replace("{main}", get_included_contents($page_path), $layout);

    print($layout);
?>