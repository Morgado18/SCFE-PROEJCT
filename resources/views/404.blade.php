<!DOCTYPE html>
<html lang="pt-ao">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- icon url -->
    <link rel="icon" href="/imgs/logo.png">
    <link rel="stylesheet" href="/bootstrap/bootstrap.css">
    <script defer src="/bootstrap/bootstrap.js"></script>
    <link rel="stylesheet" href="/fontawesome/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <title>404</title>
</head>
<body style="background: #012254;">

    <style>
        .erro404{
            display: flex;
            justify-content: center;
            flex-direction: column;
            height: 100vh;
            width: 100vw;
            overflow: hidden;
            color: #fff;
        }
        h2{
            font-weight: 800;
            letter-spacing: 1px;
            font-family: "Raleway", sans-serif; 
        }
        p{
            text-align: justify;
        }
        button{
            border: 2px solid green;
            border-radius: 2px;
            transition: 1s;
            outline: none;
            
        }
        button:hover{
            transform: scale(0.9);
        }
    </style>

    <div class="container p-4 erro404">
        <img src="/imgs/computer.png" alt="Img 404 erro" width="80" height="80">
        <br>
        <h2>
            <strong>ERRO 404</strong>
        </h2>
        <p>
            Parece que você encontrou um beco sem saída. A página que você está procurando não foi encontrada. Isso pode ser devido a um link quebrado, uma digitação incorreta na URL ou talvez a página tenha sido removida. Por favor, verifique o endereço digitado e tente novamente. Se você acredita que isso é um erro, entre em contato conosco para que possamos corrigir o problema. Obrigado!
        </p>
        <a href="/tarefa/dash">
            <button class="btn-light p-3">
                <strong>
                    Me leve para casa
                </strong>
            </button>
        </a>
    </div>
    
</body>
</html>