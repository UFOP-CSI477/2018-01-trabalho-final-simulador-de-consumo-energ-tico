<!DOCTYPE html>
<html  lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Simulador de Consumo Energético</title>
<!-- Comila Template: http://www.templatemo.com/tm-490-comila -->
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="keywords" content="">
<meta name="description" content="">

<link rel="icon" type="imagem/png" href="images/favicon.png" />

<!-- stylesheets css -->
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/animate.min.css">

<link rel="stylesheet" href="css/et-line-font.css">
<link rel="stylesheet" href="css/font-awesome.min.css">

<link rel="stylesheet" href="css/vegas.min.css">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/consumo.css">

<link href='https://fonts.googleapis.com/css?family=Rajdhani:400,500,700' rel='stylesheet' type='text/css'>

<script src="js/Chart.min.js"></script>
<script src="js/Chart.bundle.min.js"></script>

</head>
<body>
<nav class="navbar">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
      <a class="navbar-brand" href="#"><span class="glyphicon glyphicon-flash"></span> Consumo Energético</a>
    </div>

    <div class="collapse navbar-collapse navbar-right" id="myNavbar">
      <ul class="nav navbar-nav">
        @guest
        <li>
          <a href="{{ route('register') }}">
            <span class="glyphicon glyphicon-user"></span> {{ __('Cadastrar') }}
          </a>
        </li>
        <li>
          <a href="{{ route('login') }}">
            <span class="glyphicon glyphicon-log-in"></span> {{ __('Entrar') }}
          </a>
        </li>
        @else
        <li class="nav-item dropdown">
              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                  {{ Auth::user()->name }} <span class="caret"></span>
              </a>

              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="{{ route('logout') }}"
                     onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                      {{ __('Logout') }}
                  </a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                  </form>
              </div>
          </li>
      @endguest
      </ul>
    </div>
  </div>
</nav>


<!-- home section -->
<section id="home">
  <div class="container">
    <div class="row">
      <div class="col-md-offset-2 col-md-8 col-sm-12">
        <div class="home-thumb">
          <h1>Simulador de Consumo Energético</h1>
          <h3>Veja qual o <strong>consumo de energia</strong> de cada <strong>cômodo de sua casa</strong>.</h3>
          <a href="#feature" class="btn btn-lg btn-default">Entenda o cálculo</a>
          <a href="{{ route('login') }}" class="btn btn-lg btn-success smoothScroll">Iniciar simulação</a>
        </div>
      </div>

    </div>
  </div>		
</section>

<!-- about section -->
<section id="about">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-sm-12">
        <div class="section-title">
            <h2 style="color: black;">Quem Regulamenta</h2>
            <h3>Agência Nacional de Energia Elétrica (ANEEL)</h3>
        </div>
      </div>
      <div class="col-md-4 col-sm-12">
        <div class="row">
            <img src="images/ANEEL_Sede.jpg" class="img-responsive" alt="Sede">
        </div>
        <div class="row" style="padding: 30px 0;">
            <img src="images/ANEEL_logo.jpg" class="img-responsive" alt="Logo" style="margin: auto; width: 60%;">
        </div>
      </div>

      <div class="col-md-8 col-sm-12">
        <div class="about-thumb">
          <div class="justify">
            <p>A Agência Nacional de Energia Elétrica (ANEEL), autarquia em regime especial vinculada ao Ministério de Minas e Energia, foi criada para regular o setor elétrico brasileiro, por meio da Lei nº 9.427/1996 e do Decreto nº 2.335/1997.</p>
            <p>A ANEEL iniciou suas atividades em dezembro de 1997, tendo como principais atribuições:</p>
            <ul>
              <li>Regular a geração (produção), transmissão, distribuição e comercialização de energia elétrica;</li>
              <li>Fiscalizar, diretamente ou mediante convênios com órgãos estaduais, as concessões, as permissões e os serviços de energia elétrica;</li>
              <li>Implementar as políticas e diretrizes do governo federal relativas à exploração da energia elétrica e ao aproveitamento dos potenciais hidráulicos;</li>
              <li>Estabelecer tarifas;</li>
              <li>Dirimir as divergências, na esfera administrativa, entre os agentes e entre esses agentes e os consumidores;</li>
              <li>Promover as atividades de outorgas de concessão, permissão e autorização de empreendimentos e serviços de energia elétrica, por delegação do Governo Federal.</li>
            </ul>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>


<!-- feature section -->
<section id="feature">
  <div class="container">
     <svg preserveAspectRatio="none" viewBox="0 0 100 102" height="100" width="100%" version="1.1" xmlns="http://www.w3.org/2000/svg" class="svgcolor-light">
        <path d="M0 0 L50 100 L100 0 Z"></path>
      </svg>
    <div class="row">
      <div class="col-md-12">
        <div class="media-body justify">
          <h2 class="media-heading">Entendendo a tarifa</h2>
          <p>A tarifa visa assegurar aos prestadores dos serviços receita suficiente para cobrir custos operacionais eficientes e remunerar investimentos necessários para expandir a capacidade e garantir o atendimento com qualidade. Os custos e investimentos repassados às tarifas são calculados pelo órgão regulador, e podem ser maiores ou menores do que os custos praticados pelas empresas. Para cumprir o compromisso de fornecer energia elétrica com qualidade, a distribuidora tem custos que devem ser avaliados na definição das tarifas. A tarifa considera três custos distintos:</p>
          <img src="images/tarifa.png" style="display: block;margin-left: auto;margin-right: auto; margin-bottom: 15px">
          <p>Além da tarifa, os Governos Federal, Estadual e Municipal cobram na conta de luz o PIS/COFINS, o ICMS e a Contribuição para Iluminação Pública, respectivamente.</p>
          <br>
        </div>
      </div>  
    </div>

    <div class="row">
      <div class="col-md-6 col-sm-6">
        <div class="media">
          <div class="media-object media-left">
            <i class="icon icon-laptop"></i>
          </div>
          <div class="media-body">
            <h2 class="media-heading">A conta do consumidor e os ENCARGOS SETORIAIS</h2>
            <p class="justify">Quando a conta chega ao consumidor, ele paga pela compra da energia (custos do gerador), pela transmissão (custos da transmissora) e pela distribuição (serviços prestados pela distribuidora), além de encargos setoriais e tributos.</p>
            <p class="justify">Os encargos setoriais e os tributos não são criados pela ANEEL e, sim, instituídos por leis. Alguns incidem somente sobre o custo da distribuição, enquanto outros estão embutidos nos custos de geração e de transmissão.</p>
          </div>
        </div>
      </div>

      <div class="col-md-6 col-sm-6">
        <div class="media">
          <div class="media-object media-left">
            <i class="icon icon-refresh"></i>
          </div>
          <div class="media-body">
            <h2 class="media-heading">TRANSMISSÃO E DISTRIBUIÇÃO</h2>
            <p class="justify">O transporte da energia (da geradora à unidade consumidora) é um monopólio natural, pois a competição nesse segmento não geraria ganhos econômicos. Por essa razão, a ANEEL atua para que as tarifas sejam compostas por custos eficientes, que efetivamente se relacionem com os serviços prestados. Este setor é dividido em dois segmentos, transmissão e distribuição. A transmissão entrega a energia a distribuidora,  a distribuidora por sua vez leva a energia ao usuário final.</p>
          </div>
        </div>
      </div>
    </div>
    <br>
    <div class="row">
      <div class="col-md-6">
        <div class="media-body">
          <p>Para fins de cálculo tarifário, os custos da distribuidora são classificados em:</p>
          <p><b>Parcela A:</b> Compra de Energia, transmissão e Encargos Setoriais</p>
          <p><b>Parcela B:</b> Distribuição de Energia</p>
          <br>
          <p class="justify">Conforme se observa no gráfico, os custos de energia representam atualmente a maior parcela de custos (53,5%), seguido dos custos com Tributos (29,5%). A parcela referente aos custos com distribuição, ou seja, o custo para manter os ativos e operar todo o sistema de distribuição representa apenas 17% dos custos das tarifas.</p>
        </div>
      </div>
      <div class="col-md-6">
        <div class="media-body">
          <canvas id="myChart"></canvas>
          <script type="text/javascript">
            // And for a doughnut chart
            var ctx = document.getElementById("myChart");
            var data = {
              datasets: [{data: [53.5, 17, 29.5], backgroundColor: ['#000000','#ffffff','#c0c0c0']}],
              labels: ['Parcela A: 53,5%','Parcela B: 17%', 'Tributos: 29.5%']
            };
            
            var myDoughnutChart = new Chart(ctx, {
                type: 'doughnut',
                data: data
            });
            
          </script>
        </div>
      </div>
    </div>      
  </div>
</section>

<!-- contact section -->
<section id="contact">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-sm-12">
        <div class="section-title">
          <h1>Bandeiras Tarifárias</h1>
          <p class="justify">Desde o ano de 2015, as contas de energia passaram a trazer uma novidade: o Sistema de Bandeiras Tarifárias, que apresenta as seguintes modalidades: verde, amarela e vermelha –   as mesmas cores dos semáforos –  e indicam se haverá ou não acréscimo no valor da energia a ser repassada ao consumidor final, em função das condições de geração de eletricidade. Cada modalidade apresenta as seguintes características:</p>
        </div>
      </div>
    </div>
    <div class="row justify">
      <div class="col-sm-6 col-md-3">
        <div class="thumbnail">
          <div class="caption">
            <h3>Bandeira Verde</h3>
            <hr style="border-color:green">
            <p ck>Condições favoráveis de geração de energia. A tarifa não sofre nenhum acréscimo.</p>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-3">
        <div class="thumbnail">
          <div class="caption">
            <h3>Bandeira Amarela</h3>
            <hr style="border-color:yellow">
            <p>Condições de geração menos favoráveis. A tarifa sofre acréscimo de R$ 0,010 para cada quilowatt-hora (kWh) consumidos.</p>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-3">
        <div class="thumbnail">
          <div class="caption">
            <h3>Bandeira Vermelha<br>Patamar 1</h3>
            <hr style="border-color:darkred">
            <p>Condições mais custosas de geração. A tarifa sofre acréscimo de R$ 0,030 para cada quilowatt-hora kWh consumido.</p>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-3">
        <div class="thumbnail">
          <div class="caption">
            <h3>Bandeira Vermelha<br>Patamar 2</h3>
            <hr style="border-color:red">
            <p>Condições ainda mais custosas de geração. A tarifa sofre acréscimo de R$ 0,050 para cada quilowatt-hora kWh consumido.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- footer section -->
<footer>
  <div class="container">
    <div class="row">

      <svg class="svgcolor-light" preserveAspectRatio="none" viewBox="0 0 100 102" height="100" width="100%" version="1.1" xmlns="http://www.w3.org/2000/svg">
        <path d="M0 0 L50 100 L100 0 Z"></path>
      </svg>

      <div class="col-md-4 col-sm-6">
        <h2>REFERÊNCIAS</h2>
        <div class="wow fadeInUp" data-wow-delay="0.3s">
          <p>Os textos foram retirados de forma integral ou parcial das seguintes fontes:</p>
          <p><a href="http://www.aneel.gov.br/a-aneel">ANEEL -  A ANNEL</a></p>
          <p><a href="http://www.aneel.gov.br/entendendo-a-tarifa">ANEEL -  Entendendo a Tarifa</a></p>
          <p><a href="http://www.aneel.gov.br/bandeiras-tarifarias">ANEEL -  Bandeiras Tarifárias</a></p>
          <p><a href="http://www.cemig.com.br/pt-br/atendimento/Paginas/Bandeiras_tarifárias.aspx">CEMIG - Bandeiras Tarifárias</a></p>
         </div>
       </div>

       <div class="col-md-1 col-sm-1"></div>

       <div class="col-md-4 col-sm-5">
        <h2>DESENVOLVEDORES</h2>
        <p class="wow fadeInUp" data-wow-delay="0.6s">
          Brenda Lima Rocha - 13.2.8369<br>
          Daniela Paiva - <br>
          João Monlevade, MG, Brasil
        </p>
        <p class="copyright-text">
           Designed by <a rel="nofollow" href="http://www.google.com/+templatemo" target="_parent">Templatemo</a>
        </p>
      </div>

    </div>
  </div>
</footer>

<!-- Back top -->
<a href="#back-top" class="go-top"><i class="fa fa-angle-up"></i></a>

<!-- javscript js -->
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>

<script src="js/vegas.min.js"></script>

<script src="js/wow.min.js"></script>
<script src="js/smoothscroll.js"></script>
<script src="js/custom.js"></script>

</body>
</html>