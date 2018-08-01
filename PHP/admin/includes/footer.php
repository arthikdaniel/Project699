<!--    //Display Pretty JSON response-->


<?php if ($debug == "true") { ?>
    <pre id="json"></pre>
    <script>
        var MyJSNumVar = <?php Print($json_string); ?>;
        document.getElementById("json").innerHTML = JSON.stringify(MyJSNumVar, undefined, 2);
    </script>';
<?php } ?>
