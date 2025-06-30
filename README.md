<h1>
    Introdução ao DDD
</h1>
<p>
    Domain-Driven Design ou DDD, é uma abordagem que nos ajuda a ter sucesso <span class="Y2IQFc" lang="pt" dir="ltr">na compreensão e construção de modelos de design de software. Ele nos fornece ferramentas de modelagem estratégicas e táticas para auxiliar no design de software de alta qualidade que atenda aos nossos objetivos de negócios.</span><br>
    Mais importante ainda, o<strong> Domain-Driven Design</strong> não tem a ver com tecnologia. DDD consiste em desenvolver conhecimento sobre o negócio e usar a tecnologia para agregar valor. Somente quando você for capaz de entender o negócio em que sua empresa atua, você poderá participar do processo de descoberta de modelos de software para produzir uma Linguagem Ubíqua.
</p>
<h2 id="efa2ec689eb611305ed8aefe4a4eede30">
    1.1 Quando eu devo considerar DDD como uma opção?&nbsp;
</h2>
<p>
    Se você tiver mais de 30 casos de uso, seu sistema pode estar caminhando para a temida "grande bola de lama". Se você tem certeza de que seu sistema ficará mais complexo, deve começar a considerar o uso de DDD para combater a complexidade.
</p>
<h2 id="e1cb5642c40bfbea47e7d4303203f4d07">
    1.2 &nbsp;<span class="Y2IQFc" lang="pt" dir="ltr">Principais desafios da aplicação do Domain-Driven Design</span>
</h2>
<p>
    Aplicar o Design Orientado a Domínio completamente exigirá pensar no domínio do negócio, terminologia, pesquisa e colaboração com especialistas do domínio, em vez de jargões de codificação. Isso exigirá tempo e esforço.<br>
    Você precisa do comprometimento de especialistas em domínio para se envolver no processo de construção de software. Você precisará de especialistas em domínio para revelar um conhecimento profundo do domínio. Será necessária uma conversa aberta, saudável, respeitosa e contínua com os especialistas para modelar sua linguagem falada em software.
</p>
<p>
    <img src="https://github.com/user-attachments/assets/5b49e1c5-bdff-4af5-9292-d380e02ed54f">
</p>
<h2>
    1.3 &nbsp;<span class="Y2IQFc" lang="pt" dir="ltr">Command Query Separation (CQS)</span>
</h2>
<blockquote>
    <p>
        “Perguntar uma questão não deveria modificar sua resposta” - Bertrand Meyer<br>
        Este princípio de design afirma que cada método deve ser um Comando, que executa uma ação, ou uma Consulta, que retorna dados ao chamador, mas não ambos.
    </p>
</blockquote>
<h2>
    1.4 Fonte de Eventos
</h2>
<p>
    <span class="Y2IQFc" lang="pt" dir="ltr">O CQRS é uma arquitetura poderosa e flexível. Há um benefício adicional em relação à coleta e ao salvamento de eventos de domínio (que ocorreram durante uma operação de agregação), proporcionando um alto nível de detalhes sobre o que está acontecendo em seu domínio. Eventos de Domínio são um dos principais padrões táticos devido à sua importância dentro do domínio, pois descrevem ocorrências passadas</span>
</p>
<blockquote>
                            
A ideia fundamental por trás do Event Sourcing é expressar o estado dos Agregados como uma sequência linear de eventos
</blockquote>
                               
<h2>
    1.5 Value Objects
</h2>
<p>
    Objetos de Valor são um bloco de construção fundamental no Design Orientado a Domínio, usados ​​para modelar conceitos da sua Linguagem Ubíqua no código<br>
    Podemos usar objetos como valores. O padrão para isso é Value Object*. Uma das restrições em usar Value Object<br>
    é que os valores das variáveis de instância do objeto nunca mudem uma vez que foram criados no construtor.
</p>
<h2>
    1.6 Entidades
</h2>
<p>
    Este conceito possui uma identidade que perdura ao longo do tempo. Não importa quantas vezes os dados desses conceitos mudem, suas identidades permanecem as mesmas. É isso que os torna Entidades e não Objetos de Valor.
</p>
<h2>
    1.7 Operação de identidade UUID
</h2>
<p>
    A intenção dos UUIDs é permitir que sistemas distribuídos identifiquem informações de forma única sem coordenação central significativa. Neste contexto, a palavra "único" deve ser usada para significar "praticamente único" em vez de "único garantido". Como os identificadores têm um tamanho finito, é possível que dois itens diferentes compartilhem o mesmo identificador. Esta é uma forma de colisão de hashes. O tamanho do identificador e o processo de geração precisam ser selecionados de forma a tornar isso suficientemente improvável na prática.
</p>
<p>
    &nbsp;
</p>
<h2>
    1.8 Database Gateways
</h2>
<p>
    Entre os interatores do caso de uso e o banco de dados estão os gateways do banco de dados. Esses gateways são interfaces polimórficas que contêm métodos para cada operação de criação, leitura, atualização ou exclusão que pode ser realizada pelo aplicativo no banco de dados.
</p>
<p>
    &nbsp;
</p>
<h2>
    1.9 Modelo de domínio
</h2>
<p>
    Um modelo de objeto do domínio que incorpora comportamento e dados.
</p>
<img src="https://github.com/user-attachments/assets/81d3fd36-9a76-4a8c-8eb0-f4bf6f5ba02b">

<p>
    Na pior das hipóteses, a lógica de negócios pode ser muito complexa. Regras e lógica descrevem muitos casos e inclinações de comportamento diferentes, e é com essa complexidade que os objetos foram projetados para trabalhar. Um Modelo de Domínio cria uma rede de objetos interconectados, onde cada objeto representa algum indivíduo significativo, seja ele do tamanho de uma corporação ou do tamanho de uma única linha em um formulário de pedido.
</p>
<p>
    &nbsp;
</p>
<h2>
    2.0 Clean Architeture
</h2>
<img src="https://github.com/user-attachments/assets/dbb2f6dd-a23d-4834-926b-63652f541045">

<h3>
    <br>
    <span style="background-color:rgb(248,249,250);color:rgb(31,31,31);font-family:Arial, sans-serif;font-size:28px;"><span style="-webkit-text-stroke-width:0px;display:inline !important;float:none;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:400;letter-spacing:normal;orphans:2;text-align:left;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:pre-wrap;widows:2;word-spacing:0px;">A REGRA DA DEPENDÊNCIA</span></span>
</h3>
<blockquote>
 As dependências do código-fonte devem apontar apenas para dentro, em direção a políticas de nível superior</span></pre>
                             
</blockquote>
<div class="KFFQ0c xKf9F" style="-webkit-text-stroke-width:0px;align-items:center;background-color:rgb(255, 255, 255);color:rgb(31, 31, 31);display:flex;font-family:Arial, sans-serif;font-size:medium;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:400;letter-spacing:normal;margin-bottom:0px;margin-top:16px;orphans:2;text-align:start;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;width:652px;word-spacing:0px;">
    Nada em um círculo interno pode saber absolutamente nada sobre algo em um círculo externo. Em particular, o nome de algo declarado em um círculo externo não deve ser mencionado pelo código em um círculo interno. Isso inclui funções, classes, variáveis ​​ou qualquer outra entidade de software nomeada.
</div>
<div class="KFFQ0c xKf9F" style="-webkit-text-stroke-width:0px;align-items:center;background-color:rgb(255, 255, 255);color:rgb(31, 31, 31);display:flex;font-family:Arial, sans-serif;font-size:medium;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:400;letter-spacing:normal;margin-bottom:0px;margin-top:16px;orphans:2;text-align:start;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;width:652px;word-spacing:0px;">
    &nbsp;
</div>
<div class="KFFQ0c xKf9F" style="-webkit-text-stroke-width:0px;align-items:center;background-color:rgb(255, 255, 255);color:rgb(31, 31, 31);display:flex;font-family:Arial, sans-serif;font-size:medium;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:400;letter-spacing:normal;margin-bottom:0px;margin-top:16px;orphans:2;text-align:start;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;width:652px;word-spacing:0px;">
    &nbsp;
</div>
<h2>
    3.0 Codigo fonte
</h2>
