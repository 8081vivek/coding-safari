<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Certificate</title>

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">

    <style>
        body{
            margin:0;
            padding:0;
            background:#0f172a;
            display:flex;
            justify-content:center;
            align-items:center;
            height:100vh;
            flex-direction:column;
            font-family: sans-serif;
        }

        #certificate {
            position: relative;
            width: 900px;
        }

        #certificate img{
            width:100%;
            border-radius:10px;
        }

        /* NAME */
        .name{
            position:absolute;
            top:45%;
            left:50%;
            transform:translate(-50%,-50%);
            font-size:42px;
            font-weight:bold;
            color:#FF6B35;
            font-family: 'Playfair Display', serif;
        }

        /* SCORE */
        .score{
            position:absolute;
            top:60%;
            left:50%;
            transform:translate(-50%,-50%);
            font-size:28px;
            color:#00C49A;
            font-weight:bold;
        }

        /* DATE */
        .date{
            position:absolute;
            bottom:60px;
            right:80px;
            font-size:18px;
            color:#333;
        }

        /* BUTTON */
        button{
            margin-top:20px;
            padding:12px 25px;
            border:none;
            background:#FF6B35;
            color:white;
            font-size:16px;
            border-radius:5px;
            cursor:pointer;
        }

        button:hover{
            background:#e55a2b;
        }

    </style>
</head>
<body>

<!-- CERTIFICATE -->
<div id="certificate">

    <!-- IMAGE -->
    <img src="{{ asset('image/certificate.png') }}" alt="certificate">

    <!-- NAME -->
    <div class="name">
        {{ $attempt->name ?? 'Student Name' }}
    </div>

   

</div>

<!-- DOWNLOAD BUTTON -->
<button onclick="downloadCertificate()">Download Certificate</button>

<!-- JS LIBRARY -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>

<script>

    // DATE SET
    document.getElementById("date").innerHTML =
        new Date().toLocaleDateString();

    // DOWNLOAD FUNCTION
    function downloadCertificate() {

        const element = document.getElementById("certificate");

        html2canvas(element, {
            scale: 2
        }).then(canvas => {

            const link = document.createElement("a");
            link.download = "{{ $attempt->name ?? 'Student Name' }}_certificate.png";
            link.href = canvas.toDataURL();
            link.click();

        });
    }

</script>

</body>
</html>