<?php
$descriptorspec = array(
   0 => array('pipe', 'r'),
   1 => array('pipe', 'w'),
);
echo "forking process ...\n";
$process = proc_open('./simulator.sh -a kamal -u komal -g /var/www/ -i /var/www/ -s /var/www/ -d ss.php.xyz -m 7780950863', $descriptorspec, $pipes);

if (is_resource($process)) {
    echo "... successfully forked process ...\n";

    while (!feof($pipes[1])) {
        echo fread($pipes[1], 1024);
        flush();
    }

    echo "... process has finished ...\n";
    fclose($pipes[0]);
    fclose($pipes[1]);
    echo "... pipes closed ...\n";

    proc_close($process);
    echo "... process closed.\n";
} else {
    echo "... failed to fork process!\n";
}
?>