<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <div>

    <video src="" id="preview" width="100%"></video>

    </div>
    <div style="text-align: center;">
    <label for="">QR CODE</label>
    <input type="text" name="text" id="text" readonly>
    </div>


        <script type="text/javascript" src="./node_modules/instascan/index.js"></script>
        <script type="text/javascript">
            let scanner = new Instascan.Scanner({ video: document.getElementById('preview')});
            scanner.addListener('scan', function(context){
                document.getElementById('text').value=content;
            });
            Instascan.Camera.getCameras().then(function (cameras){
                if (cameras.length > 0) {
                    scanner.start(cameras[0]);
                } else {
                    alert('no camera found.');
                }
            }).catch(function(e){
                console.error(e);
            });;

            scanner.addListener('scan',function(c){
                document.getElementById('text').value=c;
            });
        </script>
</body>
</html>