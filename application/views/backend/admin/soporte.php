<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            width: 100%;
        }
        .container{
            width: 90%;
            margin: 0 auto;
            display: flex;
            gap: 30px;
            justify-content: space-between;
        }

        .container div{
            font-family: Ubuntu, Consolas, Monaco, Courier New, Courier, monospace;
            background:#EFEFEF;
            width: 100%;
            height: 340px;
            padding: 10px;
            border-radius: 10px;
            box-shadow: 10px 10px 10px #00000033;
            transition: ease-in-out 0.6s;
        }
        .container div:hover{
            transform: scale(1.030);
        }
        .container div h4{
            font-weight: 700;
            font-size: 20px;
            font-family: Verdana;
        }
        .container div img{
            display: flex;
            justify-content: center;
            margin: 20px auto;
            width: 40%;
        }
    .container div a{
        margin: 10px 0;
    }
    @media screen and (max-width: 700px){
        .container{
            flex-direction: column;
            width: 100%;
            margin: auto;
            gap: 30px;
        }
    }

    </style>
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div>
            <img src="https://i.ibb.co/CwxQBNY/guia.png" alt="guia" >
            <h4>Manual de usuario del sistema</h4>
            <p>Este enlace lo llevará a Google Drive en donde estará permanentemente el manual de usuario en formato PDF</p>
            <a class="btn btn-info" target="_blank" href="https://drive.google.com/drive/folders/1ThLtynVPh_sh4hk5IowvOZycT9hJQvdc?usp=sharing"><i class="fa fa-book"> &nbsp;&nbsp; Ir a</i></a>
        </div>

        <div>
            <img src="https://i.ibb.co/XxcY6St/whatsapp-1.png" alt="whatsapp-1">
            <h4>Enlace al WhatsApp de Omar</h4>
            <p>Este enlace lo llevara a un chat directo con, Omar para cualquier consulta relacionada al tema.</p>
            <span class="texto">
               <a class="btn btn-primary" target="_blank" href="https://api.whatsapp.com/send?phone=50557915691&text=Sistema%20Talk%20%7C%20Ayudame%20con%20esto..."> <i class="fab fa-whatsapp">  Enviar</i></a>
            </span>

        </div>

        <div>
            <img src="https://i.ibb.co/XxcY6St/whatsapp-1.png" alt="whatsapp-1">
            <h4>Enlace al WhatsApp de Endersson</h4>
            <p>Este enlace lo llevara a un chat directo con, Endersson para cualquier consulta relacionada al tema.</p>
            <a class="btn btn-primary" target="_blank" href="https://api.whatsapp.com/send?phone=50582072291&text=Sistema%20Talk%20%7C%20Ayudame%20con%20esto..."><i class="fab fa-whatsapp">  Enviar</i></a>
        </div>

    </div>
</body>
</html>