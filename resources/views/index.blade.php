<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel Generate Image With Text - Nicesnippets.com</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>
    <style>
        .card-container {
            width: 313px;
            height: 302px;
            background-color: #F3F3F3;
            padding: 20px;
        }
    </style>

</head>

<body>
    <div class="container">
        <div class=" justify-content-md-center mt-5">

            <div class="card-container" id="img">
                <p>Prenom : {{ $user['firstName'] }}</p>
                <p>Nom : {{ $user['lastName'] }}</p>
                <p>Adress email : {{ $user['email'] }} </p>
                <p>Téléphone : {{ $user['phone'] }}</p>
                <p>Infos sup : Suis un agent FBI</p>
            </div>

            <button class="btn btn-primary mt-3" id="btnConvert"> Print Card</button>

        </div>
        <div id="previewImg">
        </div>

        <script>
            $("#btnConvert").on('click', function() {
                html2canvas(document.getElementById("img")).then(function(canvas) {
                    var anchorTag = document.createElement("a");
                    document.body.appendChild(anchorTag);
                    //document.getElementById("previewImg").appendChild(canvas);
                    anchorTag.download = (Date.now()).toString() + ".jpg";
                    anchorTag.href = canvas.toDataURL();
                    anchorTag.target = '_blank';
                    anchorTag.click();
                });
            });
        </script>
</body>

</html>