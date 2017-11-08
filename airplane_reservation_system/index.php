<html>

<head>
  </head>
<div class="container">

    <div class="form">
        <form id="form" method="post" action="http://localhost:8888/anjal/connect.php">

            <div class="username">

                <input placeholder="username" label="Username" name="username" id="username">
                </input>
            </div>
            <div class="password">
                <input placeholder="password" label="Password" name="password" type="password" id="password">
                </input>
            </div>
            <div class="button">
                <button class="submit" name="submit" onclick="submitForm()">Submit</button> </div>

    </div>
    
    <script>
        function submitForm() {
            document.getElementById('form').submit();
        }
    </script>

</html>
