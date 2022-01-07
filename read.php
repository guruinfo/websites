<html>
    <head>
        <title></title>
    </head>
    <body>
    <?php
    
    $file=fopen("first.txt","w") or die("unable file!");
    
    
    $text="Arshdeep hvwcuvsacuyascvuycasvsuyca\n";
    fwrite($file,$text);
    $text="Arsh wuchiuwchwuidchwiudcwsdiug\n";
    fwrite($file,$text);

    // $text="deep\n";
    // fwrite($file,$text);
    // $text="arsh\n";
    // fwrite($file,$text);
    
    fclose($file);

    

    $file=fopen("first.txt","r") or die ("unable file!");
    echo fread($file,filesize("first.txt"));
    fclose($file);
    ?>

    </body>
    </html>