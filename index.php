<!DOCTYPE html>
<head><title>Jalal Mammadli MD5 Cracker</title></head>
<body>
<h1>MD5 cracker</h1>
<p>This application takes an MD5 hash
of a four digit pin and check all possible 10,000 four digit PINs to determine the PIN.</p>
<pre>
Debug Output:
<?php
$goodtext = "Not found";
// If there is no parameter, this code is all skipped
if ( isset($_GET['md5']) ) {
    $time_pre = microtime(true);
    $md5 = $_GET['md5'];

    // This is our alphabet
    $txt = "0123456789";
    $show = 15;

    // Outer loop go go through the numbers for the
    // first position in our "possible" pre-hash
    // text
    for($i=0; $i<strlen($txt); $i++ ) {
        $ch1 = $txt[$i];   // The first of four characters
    
       
        for($j=0; $j<strlen($txt); $j++ ) {
            $ch2 = $txt[$j];  // Our second character

           for($k=0; $k<strlen($txt); $k++ ) {
                $ch3 = $txt[$k];  // Our third character

            
                for($n=0; $n<strlen($txt); $n++ ) {
                    $ch4 = $txt[$n];  // Our fourth character

                    
                    $try = $ch1.$ch2.$ch3.$ch4;
                    $check = hash('md5', $try);
                    if ( $check == $md5 ) {
                        $goodtext = $try;
                        break;   // Exit the inner loop
                    }

                    // Debug output until $show hits 0
                    if ( $show > 0 ) {
                        print "$check $try\n";
                        $show = $show - 1;
                    }
                }
            }

        }
    } 
    // Compute elapsed time
    $time_post = microtime(true);
    print "Elapsed time: ";
    print $time_post-$time_pre;
    print "\n";
}
?>
</pre>

<p>Original Text: <?= htmlentities($goodtext); ?></p>
<form method="GET">
<input type="text" name="md5" size="40"/>
<input type="submit" value="Crack MD5"/>
</form>
<ul>
    <li><a href="index.php">Reset</a></li>
</ul>
</body>
</html>

