<head>
    <meta charset="UTF-8">
    <title>Ajax Aufgabe 2</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script type="text/javascript">
        $(function (){
            $('#dhl').change(function(){
                $test = $(this).val();
                $('#shipping-price').html($test);
            });
        });

    </script>
</head>