//<?php 
 //$JAVA_HOME = "\jre1.8.0_51";
 //$PATH = "$JAVA_HOME/bin:".getenv('PATH');
 //putenv("JAVA_HOME=$JAVA_HOME");
 //putenv("PATH=$PATH");
//enter rest of the code here

//echo $abc;
//shell_exec("javac Example.java");
//$abc = "pnge";
//echo $abc;
//exec("java Example", $psqr);
//echo $pqr



?>
<?php
        // Show whoami
        $output = shell_exec("whoami");
        echo "<strong>WHOAMI</strong>";
        echo "<hr/>";
        echo "$output<br/><br/><br/><br/>";
 
        // Show The Java Version Before Setting Environmental Variable
        $output = shell_exec("java -version 2>&1");
        echo "<strong>Java Version Before Setting Environmental Variable</strong>";
        echo "<hr/>";
        echo "$output<br/><br/><br/><br/>";
 
        // Set Enviromental Variable
        $JAVA_HOME = "C:\Program Files\Java\jdk1.7.0_79";
        $PATH = "$JAVA_HOME/bin:/usr/local/bin:/usr/bin:/bin";
        putenv("JAVA_HOME=$JAVA_HOME");
        putenv("PATH=$PATH");
 
        // Show The Java Version After Setting Environmental Variable
        $output = shell_exec("java -version 2>&1");
        echo "<strong>Java Version After Setting Environmental Variable</strong>";
        echo "<hr/>";
        echo $output;
?>