<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../styles/reset.css">
    <link rel="stylesheet" href="../styles/all.min.css"><!-- font awesome -->
    <link rel="stylesheet" href="../styles/jquery-ui.css">
    <link rel="stylesheet" href="../styles/trumbowyg.min.css">
    <link rel="stylesheet" href="../styles/style.css">
        
    <script src='../js/jquery.min.js'></script>

    <script src='../js/jquery-ui.min.js'></script>

    <script src="../js/trumbowyg.min.js"></script>
    <title>La cuisine de Fanie</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montez&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap');
        body {
            font-family: 'Montserrat', sans-serif;
            -webkit-font-smoothing: antialiased; 
            overflow-y: scroll;
        }
        .btn {
            position: relative;
            text-transform: uppercase;
            font-weight: bold;
            padding: .5rem 1rem;
            cursor: pointer;
        }
        p {
            position: relative;
            text-transform: uppercase;
            font-weight: bold;
            padding: .5rem 1rem;
            cursor: default; 
        }
        .btn:hover {
            background: #900f45;
            color: #fff;
        }
 
        .section-admin {
            margin: 5vh 5vw;
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            align-items: flex-start;
        }
        .section-admin li {
            margin: 2rem 0;
        }
    </style>
</head>
<body>
<?php include '../config/settings.php'; ?>

<div class="section-admin">
    
</div>
<?= flash_out() ?>
</body>
</html>