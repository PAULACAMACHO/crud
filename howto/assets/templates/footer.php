<footer>
    <?php
        //date_default_timezone_set('GMT');
        //echo date('l jS \of F Y') . "\n";
    ?>
</footer>

    <script>
        function showForm(formId) {
            document.querySelectorAll(".form-box").forEach(form => form.classList.remove("active"));
            document.getElementById(formId).classList.add("active");
        }
    </script>
   
</body>
</html>