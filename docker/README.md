<h1> php com xdebug , composer , nginx e npm</h1>

<h2>Rodar o container e baixar repositorios do git backend e frontend</h2>
<ol>
    <li>edite até o arquivo Makefile</li>
    <li>Modifique os parametros <strong>GITREPOSBACKPARAM</strong> e <strong>GITREPOSFRONTPARAM</strong> com a URL dos repositorios para serem baixados</li>
    <li>Os parametros de repositorio em branco não são baixados</li>
    <li>Edite os arquivos <strong>docker\back.conf</strong> e <strong>docker\front.conf</strong> para configurar o nginx ,adicione a entrada do seu repositorio</li>
    <li>Execute o comando <strong>$sudo make launchwithrepos</strong> </li>
    <li>Entrar no container <strong>$sudo make bash</strong> </li>
</ol>


<h2>Rodar o container pela primeira vez sem repositorios</h2>
<ol>
    <li>sudo make launch</li>
    <li>configure o nginx em docker\back.conf e docker\front.conf</li>
    <li>Adicione os repositorios manualmente</li>
</ol>


<h2>Refazer o container após já ter sido buildado uma vez </h2>
<ol>
    <li>sudo make deleteandrebuild </li>
</ol>


