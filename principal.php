<?php
session_start();
//Verifica se o usuário logou.
if(!isset ($_SESSION['nome']) || !isset ($_SESSION['acesso']))
{
  unset($_SESSION['nome']);
  unset($_SESSION['acesso']);
  header('location:index.html');
  exit;
}

//Cria variáveis com a sessão.
$logado = $_SESSION['nome'];
$acesso = $_SESSION['acesso'];


//Faz a conexão com o BD.
require 'conexao.php';

//Cria o SQL com limites de página ordenado por id
$sql = "SELECT * FROM servico ORDER BY id";

//Executa o SQL
$result = $conn->query($sql);

?>
<!DOCTYPE html>

<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  

  <title>Layout PF</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="style.css">
  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
   
    

</head>
<style>
@import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500&display=swap');

* {
    box-sizing: border-box;
  }

body{
     margin: 0;
     font-family: 'Montserrat', sans-serif;
     
}

ul{
    list-style: none;
}

a{
    text-decoration: none;
    color: inherit;
}

header{
    height: 100vh;
    background: no-repeat center/cover url('logo4_30_15178.jpeg') 
   
}

header nav{
    display:flex;
    justify-content: space-between;
    margin:auto 30px;
    color: white;
}

header nav p{
    font-weight: bold;
}


 
header nav ul{
    list-style: none;
    display: flex;
    flex-direction: row;
}

header nav ul li{
    margin: 0 15px;
}


li.dropdown {
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 50px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 10px 14px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown-content a:hover {background-color: #f1f1f1;}

.dropdown:hover .dropdown-content {
  display: block;
}

.pacotes{
    
    background:#dcdcdc;
    padding: 10px;
}

.pacotes .pacotes-cards{
    display: flex;
    max-width: 990px;
    margin: 0 auto;
    justify-content: center;
    flex-wrap: wrap;
}

.pacotes .pacotes-title{
    width: 100%;
    margin: 25px 0;
    text-align: center;
}


.pacotes .card{
    width: 250px;
    height: 320px;
    background: white;
    border-radius: 24px 0px;
    margin:50px auto;
    
}

.pacotes .card-image{
    width: 250px;
    height: 240px;
    border-radius: 24px 0 0 0;
}

.pacotes .card-content{
    display: flex;
    flex-direction: column;
    list-style: none;
    align-items: center;

}

.funciona{
    padding: 15px;
}

.funciona .funciona-title{
    text-align: center;
    margin: 60px 0;
}

.funciona .funciona-cards{
    display: flex;
    max-width: 950px;
    justify-content: center;
    margin: auto;
    flex-wrap: wrap;
}

 .funciona .card{
    width: 250px;
    height: 300px;
    border-radius: 24px 0 0 0;
     display: flex;
     flex-direction: column;
     justify-content: center;
     align-items: center;
     margin: 0 25px;
 }

 .funciona .card h3{
     font-weight: bold;
 }

 .funciona .card p{
     color: grey;
     font-size: .8rem;
     text-align: center;
 }

.funciona .card .card-content{
    height: 180px;
    text-align: center;
}



/* style para o search */
form.pesquisa input[type=search] {
  padding: 10px;
  font-size: 17px;
  border: 1px solid rgb(63, 63, 63);
  float: left;
  width: 30%;
  height: 7%;
  background: #f1f1f1;
  border-top-left-radius: 27px;
  border-bottom-left-radius: 27px;
  margin-top: 5%;
  margin-left: 31%;
  border-right: none;
 
}
input:focus{
    
    outline: none; /*retira a linha azul que fica no input*/
}

/* Style para o  button */
form.pesquisa button {
  float: left;
  width: 6%;
  padding: 7px;
  background: #7bbaee;
  color: white;
  font-size: 17px;
  border: 1px solid rgb(63, 63, 63);
  border-left: none; /* Prevent double borders */
  cursor: pointer;
  margin-top: 5%;
  margin-left: %;
 
 
}

form.pesquisa button:hover {
  background: #0b7dda;
}
 

button{
    margin-left: px;
    border-top-right-radius: 27px;
  border-bottom-right-radius: 27px;
 
    
}
button:focus{
    outline: none; 
}
.historico {
width: 500px;
}
.fa {
    font-size: 25px;
    color: rgb(56, 56, 56);
}
datalist#historico > option {

     width: 100%; 
    }
div.p {
  width: 550px;
  margin-top: 25%;
  margin-left:28% ;
  text-align: center;
  font-size: 15pt;
  background-color: cornsilk;
  padding: 7px;
  font-family:  sans-serif;
}

.imgprestacao{
    height: 100vh;
    width: padding-top: 100px;
text-align: center;
}



.footer-dark {
    padding:50px 0;
    color:#f0f9ff;
    background-color:#282d32;
  }
  
  .footer-dark h3 {
    margin-top:0;
    margin-bottom:12px;
    font-weight:bold;
    font-size:16px;
	text-align: center;
  }
  
  .footer-dark ul {
    padding:0;
    list-style:none;
    line-height:1.6;
    font-size:14px;
    margin-bottom:0;
  }
  
  .footer-dark ul a {
    color:inherit;
    text-decoration:none;
    opacity:0.6;
  }
  
  .footer-dark ul a:hover {
    opacity:0.8;
  }
  
  @media (max-width:767px) {
    .footer-dark .item:not(.social) {
      text-align:center;
      padding-bottom:20px;
    }
  }
  
  .footer-dark .item.text {
    margin-bottom:36px;
  }
  
  @media (max-width:767px) {
    .footer-dark .item.text {
      margin-bottom:0;
    }
  }
  
  .footer-dark .item.text p {
    opacity:0.6;
    margin-bottom:0;
	text-align: center;
  }
  
  .footer-dark .item.social {
    text-align:center;
  }
  
  @media (max-width:991px) {
    .footer-dark .item.social {
      text-align:center;
      margin-top:20px;
    }
  }
  
  .footer-dark .item.social > a {
    font-size:20px;
    width:36px;
    height:36px;
    line-height:36px;
    display:inline-block;
    text-align:center;
    border-radius:50%;
    box-shadow:0 0 0 1px rgba(255,255,255,0.4);
    margin:0 8px;
    color:#fff;
    opacity:0.75;
  }
  
  .footer-dark .item.social > a:hover {
    opacity:0.9;
  }
  
  .footer-dark .copyright {
    text-align:center;
    padding-top:24px;
    opacity:0.3;
    font-size:13px;
    margin-bottom:0;
  }
	
}

/*RESPONSIVIDADE*/

@media (max-width: 480px){
    body {
       margin-bottom: 55px;
    }
    
    header nav ul{
        position: fixed;
        bottom: 0;
        left: 0;
        width: 100%;  
        padding: 0;
        margin:0;

        z-index:99;

        background: #1d61dd;
        color: white;
        font-weight: bold;
        height: 55px;

        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    header nav p{
        width: 100%;
        text-align: center;
    }
}
</style>

<body>
<header>
    <nav>
     <p>Flash Service</p>
	 
<div class="topnav">
<?php
	//Coloca o menu que está no arquivo
	include 'menu.php';
?>
</div>
 
    </nav>
    
              
    </div>
</header>



  <section class="pacotes">

<h1 id="servicos" class="pacotes-title">Conheça Nossos Serviços</h1>

      <div class="pacotes-cards">
      <div class="card">
          
          <img class="card-image" src="https://img.freepik.com/fotos-gratis/trabalhador-da-construcao-civil-com-capacete-construindo-o-telhado-da-casa_23-2148748846.jpg?size=338&ext=jpg" alt="construção">
          <div class="card-content">
           </i>  <h1>Construção</h1>
           
          </div>
      </div>

      <div class="card">
          
        <img class="card-image" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTJlP5C7pjFEJxfZpmAA0v5m9MvYLSKS2Zsjw&usqp=CAU" alt="faxina">
        <div class="card-content">
         </i>  <h1>Serviços Gerais</h1>
         
        </div>
    </div>

    <div class="card">
          
        <img class="card-image" src="https://blog.lg.com.br/wp-content/uploads/2019/11/tecnologia-e-ser-humano-1.png" alt="tecnologia">
        <div class="card-content">
         </i>  <h1>Tecnologia</h1>
         
        </div>
    </div>


<div class="card">
          
    <img class="card-image" src="https://blog.uceff.edu.br/wp-content/uploads/2020/06/ucefffaculdades_uceff_image_530.jpeg" alt="estética">
    <div class="card-content">
     </i>  <h1>Estética</h1>
     
    </div>
</div>


<div class="card">
          
    <img class="card-image" src="https://www.pedrosoerocha.com.br/images/otm/jardinagem-e-paisagismo.jpg" alt="jardinagem">
    <div class="card-content">
     </i>  <h1>Jardinagem</h1>
     
    </div>
</div>


<div class="card">
          
    <img class="card-image" src="https://www.infoescola.com/wp-content/uploads/2017/05/eletricista_567307042.jpg">
    <div class="card-content">
     </i>  <h1>Eletricista</h1>
     
    </div>
</div>
</div>


  <form class="pesquisa" >
    <input type="search" action="" placeholder="Pesquisar Serviço..."list="historico">
    <button type="submit">pesquisar</button
	
    <?php
	 if ($result->num_rows > 0) {
	  while($row = $result->fetch_assoc()) {			
			echo "<option value=" . $row["id"] . ">" . $row["servico"] . "</option>";
		}
	}
?>	
  </form>
  <br>
  <br>
  <br>
  <br>
  


  </section>

  <section class="funciona">
      <h1 class="funciona-title">Como Funciona?</h1>
      <div class="funciona-cards">
    
        <div class="card">
            <br>
            <div class="card-content">
            <h3>Para Profissional</h3>
           <p>O cliente acessa, pesquisa, encontra seu anúncio e conversa com você.

              Nós não nos envolvemos em nenhuma negociação ou orçamento.
              
              Nós simplesmente mostramos você, prestador de serviços, para o cliente que possui

              uma necessidade. </p>
        </div>
</div>

        <div class="card">
            <div class="card-content">
           <h3> Clientes e Profissionais</h3>
           <p>Viemos para aproximar clientes e profissionais de forma simples, rápida e colaborativa!

            Faça parte dessa parceria você também</p>

<br>
<br>
        </div>
</div>


        <div class="card">
            <div class="card-content">
            
            <br>
            <h3>Para Cliente</h3>
           <p>Encontre pedreiro, eletricista, costureira, encanador, passeador de cães, cuidador, faxineira ou diarista e muito mais.

            Você vai encontrar vários prestadores de serviços que podem te atender e estão próximos de você.
            
            Clique no whatsapp de quantos profissionais quiser e converse diretamente com eles.
        </div>
    </div>
</div>
</div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
   <div class="imgprestacao">
       <img src="https://gdr.adv.br/wp-content/uploads/Detalhes-obrigat%C3%B3rios-em-um-contrato-de-presta%C3%A7%C3%A3o-de-servi%C3%A7os.png" alt="prestacao">
   </div>
 
 

 
  </section>
 
<div class="footer-dark">
        <footer>
            <div class="container">
                <div class="row">
                    
                    <div class="col-sm-6 col-md-3 item">
                        
                    <div class="col item social"><a href="https://pt-br.facebook.com/"><i class="icon ion-social-facebook"></i></a><a href="https://twitter.com"><i class="icon ion-social-twitter"></i></a><a href="https://www.snapchat.com/pt-BR"><i class="icon ion-social-snapchat"></i></a><a href="https://www.instagram.com/"><i class="icon ion-social-instagram"></i></a></div>
                </div>
                <p class="copyright">© 2022 - Todos os direitos reservados | FLASH SERVICES | CNPJ : 27.227.433/0001-96</p>
            </div>
        </footer>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
 
</body>





</body>
</html>


