<?php $currentURL = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];?>
<footer>
    <p>Copyright &copy; <?php 
        $date_current = date('Y');
        $date_created = 2021;
        if($date_created == $date_current){
            echo $date_current;
        }else{
            echo ''.$date_created.' - '.$date_current.'';
        }
        ?>
    </p>
    All Rights Reserved
    <a href="../index.php">Web Design by Ted Miller</a>
    <a href="">Terms of Use</a>
    <a href="https://validator.w3.org/nu/?doc=<?=$currentURL?>">HTML Validation</a>
    <a href="http://jigsaw.w3.org/css-validator/validator?uri=<?php echo $currentURL?>">CSS Validation</a>
            
</footer>
<script src="js/nav.js"></script>
</body>
</html>