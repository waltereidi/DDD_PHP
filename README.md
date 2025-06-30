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
        <span class="Y2IQFc" lang="pt" dir="ltr">“Perguntar uma questão não deveria modificar sua resposta” - Bertrand Meyer</span><br>
        <span class="Y2IQFc" lang="pt" dir="ltr">Este princípio de design afirma que cada método deve ser um Comando, que executa uma ação, ou uma Consulta, que retorna dados ao chamador, mas não ambos.</span>
    </p>
</blockquote>
<h2>
    <span class="Y2IQFc" lang="pt" dir="ltr">1.4 Fonte de Eventos</span>
</h2>
<p>
    <span class="Y2IQFc" lang="pt" dir="ltr">O CQRS é uma arquitetura poderosa e flexível. Há um benefício adicional em relação à coleta e ao salvamento de eventos de domínio (que ocorreram durante uma operação de agregação), proporcionando um alto nível de detalhes sobre o que está acontecendo em seu domínio. Eventos de Domínio são um dos principais padrões táticos devido à sua importância dentro do domínio, pois descrevem ocorrências passadas</span>
</p>
<blockquote>
    <div class="nev7se" style="-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);color:rgb(31, 31, 31);font-family:Arial, sans-serif;font-size:medium;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:400;letter-spacing:normal;orphans:2;text-align:start;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;" data-cp="1" data-nnttsvi="1" data-ntl-fpwrite="true" data-sletp="false" data-sm="1" data-ssbp="false" data-sugg-time="500" data-sugg-url="https://clients1.google.com/complete/search" data-uilc="pt-BR" data-vil=",af,af-ZA,am,am-ET,ar-EG,ar-AE,ar-KW,ar-QA,ar,ar-IL,ar-JO,ar-LB,ar-PS,az,az-AZ,bg,bg-BG,bn,bn-BD,bn-IN,ca,ca-es,cs,cs-CZ,de,de-DE,de-CH,de-AT,de-LI,en,en-US,en-CA,en-AU,en-NZ,en-GB,en-IN,en-KE,en-TZ,en-NG,en-GH,en-PH,en-ZA,es,es-ES,es-AR,es-UY,es-419,es-BO,es-CL,es-CR,es-CO,es-DO,es-EC,es-GT,es-HN,es-NI,es-PA,es-PE,es-PR,es-PY,es-SV,es-VE,es-MX,es-US,eu,eu-ES,fi,fi-FI,fr,fr-FR,fr-CH,fr-BE,gl,gl-ES,gu,gu-IN,he,he-IL,iw,iw-IL,hu,hu-HU,hy,hy-AM,id,id-ID,is,is-IS,it,it-IT,it-CH,ja,ja-JP,jv,jv-ID,ka,ka-GE,km,km-KH,kn,kn-IN,ko,ko-KR,la,lo,lo-LA,lv,lv-LV,ml,ml-IN,mr,mr-IN,ms,ms-MY,nl,nl-NL,nb,nb-NO,ne,ne-NP,pl,pl-PL,pt,pt-BR,pt-PT,ro,ro-RO,ru,ru-RU,si-LK,sk,sk-SK,sr,sr-RS,su,su-ID,sv,sv-SE,sw,sw-TZ,sw-KE,ta,ta-IN,ta-SG,ta-LK,ta-MY,te,te-IN,tr,tr-TR,ur,ur-PK,ur-IN,yue,yue-HK,yue-Hant-HK,zh-HK,zh,zh-CN,zh-cmn,zh-cmn-CN,zh-Hans,zh-Hans-CN,zh-cmn-Hans,zh-cmn-Hans-CN,cmn-CN,cmn-Hans,cmn-Hans-CN,zh-TW,zh-Hant-TW,cmn-TW,cmn-Hant-TW,zh-cmn-TW,zh-cmn-Hant-TW,zu,zu-ZA,hi,hi-IN,tl,tl-PH,pa,pa-IN" id="tw-container">
        <g-expandable-container style="display:block;" jscontroller="QE1bwd" data-npd="1" data-slct="mnr-c" jsshadow="" jsaction="C7xow:Z6bwpe;xNpQtd:Nh5q2c;U6VCqe:GsRPff;Ep2Mgc:AgioGc;BDs6B:fW2qAb;ep03Ne:AvkpRc;gvA4Rc:yELBLe">
        <div jsname="gI9xcc" jsslot="1">
            <div jscontroller="tZEiM" jsdata="SANFE;_;Ckcmn8" jsaction="uQxhTd:d4hecb;lWUBqb:TO5MWb;IcWBXe:hLaFAe;KFlBO:UuREqb;M2HAEc:eNrnOd;KyPa0e:Gz3GTb;rcuQ6b:npT2md">
                <div class="tw-src-ltr" style="display:flex;min-height:140px;position:relative;" id="tw-ob">
                    <div class="oSioSc" style="-webkit-box-flex:1;display:flex;flex:1 1 0%;width:0px;">
                        <div style="-webkit-box-flex:1;background-color:rgb(248, 249, 250);border-radius:8px;display:flex;flex-direction:column;flex:1 1 0%;font-size:0px;margin:0px;min-width:0px;position:relative;text-align:initial;width:0px;" id="tw-target">
                            <div class="g9WsWb PZPZlf" style="display:block;flex:1 1 auto;font-size:0px;margin:0px;padding:10px 16px 48px;position:relative;text-align:initial;" id="kAz1tf" data-attrid="tw-targetArea" data-entityname="Google Translate">
                                <div class="tw-ta-container tw-nfl" style="outline:0px;overflow:hidden;position:relative;" id="tw-target-text-container" tabindex="0" role="text">
                                    <pre class="tw-data-text tw-text-large tw-ta" style="background-color:transparent;border-style:none;font-family:inherit;font-size:28px;line-height:36px;margin:-2px 0px;overflow-wrap:break-word;overflow:hidden;padding:2px 0.14em 2px 0px;position:relative;resize:none;text-align:left;unicode-bidi:isolate;white-space:pre-wrap;width:270px;" data-placeholder="Tradução" id="tw-target-text" data-ved="2ahUKEwjum776z5eOAxXpJLkGHYT3CCYQ3ewLegQIChAV" dir="ltr" aria-label="Texto traduzido: A ideia fundamental por trás do Event Sourcing é expressar o
                                                                        estado dos Agregados como uma sequência linear de eventos"><span class="Y2IQFc" lang="pt"><br class="Apple-interchange-newline">
                                                                        A ideia fundamental por trás do Event Sourcing é expressar o
estado dos Agregados como uma sequência linear de eventos</span></pre>
                                </div>
                                <div class="tw-target-rmn tw-ta-container tw-nfl" style="outline:0px;overflow:hidden;position:relative;" id="tw-target-rmn-container" tabindex="0" role="text">
                                    <pre class="tw-data-placeholder tw-text-small tw-ta" style="background-color:transparent;border-style:none;color:black;font-family:inherit;font-size:16px;font-weight:normal;line-height:24px;margin:0px;overflow-wrap:break-word;overflow:hidden;padding:0px 0.14em 0px 0px;position:relative;resize:none;text-align:left;unicode-bidi:isolate;white-space:pre-wrap;width:270px;" data-placeholder="" id="tw-target-rmn" dir="ltr"><span class="Y2IQFc"></span></pre>
                                </div>
                                <div class="iYB33c" style="bottom:0px;display:flex;height:48px;justify-content:space-between;left:0px;position:absolute;width:302px;" jsname="fek9E">
                                    <div class="tw-menu" style="display:inline-block;left:0px;line-height:normal;position:absolute;white-space:nowrap;" id="tw-tmenu">
                                        <span class="tw-menu-btn" style="color:rgb(94, 94, 94);cursor:pointer;display:inline-block;height:48px;margin-left:8px;outline:0px;overflow:hidden;transform:rotateX(180deg);width:48px;" data-action-target="target" jsaction="kImuFf" id="tw-cpy-btn" title="Copiar" aria-label="Copiar o texto traduzido" role="button" tabindex="0" data-ved="2ahUKEwjum776z5eOAxXpJLkGHYT3CCYQ69UBegQIChAW"><span class="tw-menu-btn-image z1asCe wm4nBd" style="border:1px solid transparent;display:inline-block;fill:currentcolor;height:24px;line-height:24px;padding:10px;position:relative;width:24px;"><svg focusable="false" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24" viewBox="0 0 24 24" width="24"><g><rect fill="none" height="24" width="24"></rect></g><g><path d="M16,20H5V6H3v14c0,1.1,0.9,2,2,2h11V20z M20,16V4c0-1.1-0.9-2-2-2H9C7.9,2,7,2.9,7,4v12c0,1.1,0.9,2,2,2h9 C19.1,18,20,17.1,20,16z M18,16H9V4h9V16z"></path></g></svg></span></span><span class="fQjaD" style="bottom:6px;display:inline-block;position:relative;right:-24px;" id="_yLZhaO6XKenJ5OUPhO-jsAI_46" jscontroller="cZphsd" data-pronunciation-action-target="target" aria-hidden="true" jsaction="mjwztf:V46pce;NcryF:jBJHNe;pD7Wob:tVADEe"><g-bubble jsname="VCkuzd" jscontroller="QVaUhf" data-du="200" jsaction="R9S7w:VqIRre;" jsshadow=""><span class="c5aZPb" style="cursor:pointer;display:inline-block;" jsname="d6wfac" data-extra-container-classes="tw-promo-bubble" data-extra-triangle-classes="tw-promo-triangle" data-hover-hide-delay="1000" data-hover-open-delay="500" data-send-dismiss-event="true" data-theme="0" data-width="0" data-zidx="1" jsaction="vQLyHf" jsslot=""></span></g-bubble></span><span class="tw-menu-btn za3ale" style="color:rgb(94, 94, 94);cursor:pointer;display:inline-block;height:48px;margin-left:8px;outline:0px;overflow:hidden;width:48px;" jscontroller="tDZ6eb" data-action-target="target" data-sttse="true" id="tw-spkr-button" aria-label="Ouvir tradução" role="button" tabindex="0" jsaction="KjsqPd;rcuQ6b:npT2md;WxjQaf:WRB97d;UpNfPc:Xnrsoe;f2MWRb:QKiGd" data-ved="2ahUKEwjum776z5eOAxXpJLkGHYT3CCYQ8DR6BAgKEBk"><span class="tw-menu-btn-image z1asCe JKu1je" style="border:1px solid transparent;display:inline-block;fill:currentcolor;height:24px;line-height:24px;padding:10px;position:relative;width:24px;" title="Ouvir"><svg focusable="false" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M3 9v6h4l5 5V4L7 9H3zm13.5 3c0-1.77-1.02-3.29-2.5-4.03v8.05c1.48-.73 2.5-2.25 2.5-4.02zM14 3.23v2.06c2.89.86 5 3.54 5 6.71s-2.11 5.85-5 6.71v2.06c4.01-.91 7-4.49 7-8.77s-2.99-7.86-7-8.77z"></path></svg></span></span><span></span>
                                    </div>
                                </div>
                                <g-info-bubble id="tw-info-bubble" jscontroller="f3ruEc" jsaction="rcuQ6b:npT2md"></g-info-bubble>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="tw-images">
                </div>
                <div class="dURPtb" style="clear:both;line-height:16px;overflow:hidden;">
                </div>
                <div jsaction="iJE3Ge:yuFC7d;DmzWq:nuBux">
                    <g-expandable-container style="display:block;" jsname="FYBCae" jscontroller="QE1bwd" data-npd="1" data-slct="mnr-c" jsshadow="" jsaction="C7xow:Z6bwpe;xNpQtd:Nh5q2c;U6VCqe:GsRPff;Ep2Mgc:AgioGc;BDs6B:fW2qAb;ep03Ne:AvkpRc;gvA4Rc:yELBLe">
                    <div jsname="gI9xcc" jsslot="1">
                    </div>
                    </g-expandable-container>
                </div>
            </div>
        </div>
        </g-expandable-container>
    </div>
    <div class="KFFQ0c xKf9F" style="-webkit-text-stroke-width:0px;align-items:center;background-color:rgb(255, 255, 255);color:rgb(31, 31, 31);display:flex;font-family:Arial, sans-serif;font-size:medium;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:400;letter-spacing:normal;margin-bottom:0px;margin-top:16px;orphans:2;text-align:start;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;width:652px;word-spacing:0px;">
        A ideia fundamental por trás do Event Sourcing é expressar o estado dos Agregados como uma sequência linear de eventos
    </div>
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
<figure class="image" data-ckbox-resource-id="tSTxxPdSRKAd">
    <picture><source srcset="https://ckbox.cloud/4b670c997b9c3a9c7b5b/assets/tSTxxPdSRKAd/images/80.webp 80w,https://ckbox.cloud/4b670c997b9c3a9c7b5b/assets/tSTxxPdSRKAd/images/160.webp 160w,https://ckbox.cloud/4b670c997b9c3a9c7b5b/assets/tSTxxPdSRKAd/images/240.webp 240w,https://ckbox.cloud/4b670c997b9c3a9c7b5b/assets/tSTxxPdSRKAd/images/320.webp 320w,https://ckbox.cloud/4b670c997b9c3a9c7b5b/assets/tSTxxPdSRKAd/images/400.webp 400w,https://ckbox.cloud/4b670c997b9c3a9c7b5b/assets/tSTxxPdSRKAd/images/480.webp 480w,https://ckbox.cloud/4b670c997b9c3a9c7b5b/assets/tSTxxPdSRKAd/images/560.webp 560w,https://ckbox.cloud/4b670c997b9c3a9c7b5b/assets/tSTxxPdSRKAd/images/640.webp 640w,https://ckbox.cloud/4b670c997b9c3a9c7b5b/assets/tSTxxPdSRKAd/images/720.webp 720w,https://ckbox.cloud/4b670c997b9c3a9c7b5b/assets/tSTxxPdSRKAd/images/748.webp 748w" sizes="(max-width: 748px) 100vw, 748px" type="image/webp"><img src="https://ckbox.cloud/4b670c997b9c3a9c7b5b/assets/tSTxxPdSRKAd/images/748.png" width="748" height="410"></picture>
</figure>
<p>
    Na pior das hipóteses, a lógica de negócios pode ser muito complexa. Regras e lógica descrevem muitos casos e inclinações de comportamento diferentes, e é com essa complexidade que os objetos foram projetados para trabalhar. Um Modelo de Domínio cria uma rede de objetos interconectados, onde cada objeto representa algum indivíduo significativo, seja ele do tamanho de uma corporação ou do tamanho de uma única linha em um formulário de pedido.
</p>
<p>
    &nbsp;
</p>
<h2>
    2.0 Clean Architeture
</h2>
<figure class="image" data-ckbox-resource-id="bD-4A40U6Lz0">
    <picture><source srcset="https://ckbox.cloud/4b670c997b9c3a9c7b5b/assets/bD-4A40U6Lz0/images/80.webp 80w,https://ckbox.cloud/4b670c997b9c3a9c7b5b/assets/bD-4A40U6Lz0/images/160.webp 160w,https://ckbox.cloud/4b670c997b9c3a9c7b5b/assets/bD-4A40U6Lz0/images/240.webp 240w,https://ckbox.cloud/4b670c997b9c3a9c7b5b/assets/bD-4A40U6Lz0/images/320.webp 320w,https://ckbox.cloud/4b670c997b9c3a9c7b5b/assets/bD-4A40U6Lz0/images/345.webp 345w" sizes="(max-width: 345px) 100vw, 345px" type="image/webp"><img src="https://ckbox.cloud/4b670c997b9c3a9c7b5b/assets/bD-4A40U6Lz0/images/345.png" width="345" height="225"></picture>
</figure>
<h3>
    <br>
    <span style="background-color:rgb(248,249,250);color:rgb(31,31,31);font-family:Arial, sans-serif;font-size:28px;"><span style="-webkit-text-stroke-width:0px;display:inline !important;float:none;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:400;letter-spacing:normal;orphans:2;text-align:left;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:pre-wrap;widows:2;word-spacing:0px;">A REGRA DA DEPENDÊNCIA</span></span>
</h3>
<blockquote>
    <div class="nev7se" style="-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);color:rgb(31, 31, 31);font-family:Arial, sans-serif;font-size:medium;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:400;letter-spacing:normal;orphans:2;text-align:start;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;" data-cp="1" data-nnttsvi="1" data-ntl-fpwrite="true" data-sletp="false" data-sm="1" data-ssbp="false" data-sugg-time="500" data-sugg-url="https://clients1.google.com/complete/search" data-uilc="pt-BR" data-vil=",af,af-ZA,am,am-ET,ar-EG,ar-AE,ar-KW,ar-QA,ar,ar-IL,ar-JO,ar-LB,ar-PS,az,az-AZ,bg,bg-BG,bn,bn-BD,bn-IN,ca,ca-es,cs,cs-CZ,de,de-DE,de-CH,de-AT,de-LI,en,en-US,en-CA,en-AU,en-NZ,en-GB,en-IN,en-KE,en-TZ,en-NG,en-GH,en-PH,en-ZA,es,es-ES,es-AR,es-UY,es-419,es-BO,es-CL,es-CR,es-CO,es-DO,es-EC,es-GT,es-HN,es-NI,es-PA,es-PE,es-PR,es-PY,es-SV,es-VE,es-MX,es-US,eu,eu-ES,fi,fi-FI,fr,fr-FR,fr-CH,fr-BE,gl,gl-ES,gu,gu-IN,he,he-IL,iw,iw-IL,hu,hu-HU,hy,hy-AM,id,id-ID,is,is-IS,it,it-IT,it-CH,ja,ja-JP,jv,jv-ID,ka,ka-GE,km,km-KH,kn,kn-IN,ko,ko-KR,la,lo,lo-LA,lv,lv-LV,ml,ml-IN,mr,mr-IN,ms,ms-MY,nl,nl-NL,nb,nb-NO,ne,ne-NP,pl,pl-PL,pt,pt-BR,pt-PT,ro,ro-RO,ru,ru-RU,si-LK,sk,sk-SK,sr,sr-RS,su,su-ID,sv,sv-SE,sw,sw-TZ,sw-KE,ta,ta-IN,ta-SG,ta-LK,ta-MY,te,te-IN,tr,tr-TR,ur,ur-PK,ur-IN,yue,yue-HK,yue-Hant-HK,zh-HK,zh,zh-CN,zh-cmn,zh-cmn-CN,zh-Hans,zh-Hans-CN,zh-cmn-Hans,zh-cmn-Hans-CN,cmn-CN,cmn-Hans,cmn-Hans-CN,zh-TW,zh-Hant-TW,cmn-TW,cmn-Hant-TW,zh-cmn-TW,zh-cmn-Hant-TW,zu,zu-ZA,hi,hi-IN,tl,tl-PH,pa,pa-IN" id="tw-container">
        <g-expandable-container style="display:block;" jscontroller="QE1bwd" data-npd="1" data-slct="mnr-c" jsshadow="" jsaction="C7xow:Z6bwpe;xNpQtd:Nh5q2c;U6VCqe:GsRPff;Ep2Mgc:AgioGc;BDs6B:fW2qAb;ep03Ne:AvkpRc;gvA4Rc:yELBLe">
        <div jsname="gI9xcc" jsslot="1">
            <div jscontroller="tZEiM" jsdata="SANFE;_;Aoe4a8" jsaction="uQxhTd:d4hecb;lWUBqb:TO5MWb;IcWBXe:hLaFAe;KFlBO:UuREqb;M2HAEc:eNrnOd;KyPa0e:Gz3GTb;rcuQ6b:npT2md">
                <div class="tw-src-ltr" style="display:flex;min-height:140px;position:relative;" id="tw-ob">
                    <div class="oSioSc" style="-webkit-box-flex:1;display:flex;flex:1 1 0%;width:0px;">
                        <div style="-webkit-box-flex:1;background-color:rgb(248, 249, 250);border-radius:8px;display:flex;flex-direction:column;flex:1 1 0%;font-size:0px;margin:0px;min-width:0px;position:relative;text-align:initial;width:0px;" id="tw-target">
                            <div class="g9WsWb PZPZlf" style="display:block;flex:1 1 auto;font-size:0px;margin:0px;padding:10px 16px 48px;position:relative;text-align:initial;" id="kAz1tf" data-attrid="tw-targetArea" data-entityname="Google Translate">
                                <div class="tw-ta-container tw-nfl" style="outline:0px;overflow:hidden;position:relative;" id="tw-target-text-container" tabindex="0" role="text">
                                    <pre class="tw-data-text tw-text-large tw-ta" style="background-color:transparent;border-style:none;font-family:inherit;font-size:28px;line-height:36px;margin:-2px 0px;overflow-wrap:break-word;overflow:hidden;padding:2px 0.14em 2px 0px;position:relative;resize:none;text-align:left;unicode-bidi:isolate;white-space:pre-wrap;width:270px;" data-placeholder="Tradução" id="tw-target-text" data-ved="2ahUKEwiw0ZfGlZqOAxVnHLkGHdLnBUcQ3ewLegQICRAV" dir="ltr" aria-label="Texto traduzido: As dependências do código-fonte devem apontar apenas para dentro, em direção a políticas de nível superior"><span class="Y2IQFc" lang="pt">As dependências do código-fonte devem apontar apenas para dentro, em direção a políticas de nível superior</span></pre>
                                </div>
                                <div class="tw-target-rmn tw-ta-container tw-nfl" style="outline:0px;overflow:hidden;position:relative;" id="tw-target-rmn-container" tabindex="0" role="text">
                                    <pre class="tw-data-placeholder tw-text-small tw-ta" style="background-color:transparent;border-style:none;color:black;font-family:inherit;font-size:16px;font-weight:normal;line-height:24px;margin:0px;overflow-wrap:break-word;overflow:hidden;padding:0px 0.14em 0px 0px;position:relative;resize:none;text-align:left;unicode-bidi:isolate;white-space:pre-wrap;width:270px;" data-placeholder="" id="tw-target-rmn" dir="ltr"><span class="Y2IQFc"></span></pre>
                                </div>
                                <div class="iYB33c" style="bottom:0px;display:flex;height:48px;justify-content:space-between;left:0px;position:absolute;width:302px;" jsname="fek9E">
                                    <div class="tw-menu" style="display:inline-block;left:0px;line-height:normal;position:absolute;white-space:nowrap;" id="tw-tmenu">
                                        <span class="tw-menu-btn" style="color:rgb(94, 94, 94);cursor:pointer;display:inline-block;height:48px;margin-left:8px;outline:0px;overflow:hidden;transform:rotateX(180deg);width:48px;" data-action-target="target" jsaction="kImuFf" id="tw-cpy-btn" title="Copiar" aria-label="Copiar o texto traduzido" role="button" tabindex="0" data-ved="2ahUKEwiw0ZfGlZqOAxVnHLkGHdLnBUcQ69UBegQICRAW"><span class="tw-menu-btn-image z1asCe wm4nBd" style="border:1px solid transparent;display:inline-block;fill:currentcolor;height:24px;line-height:24px;padding:10px;position:relative;width:24px;"><svg focusable="false" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24" viewBox="0 0 24 24" width="24"><g><rect fill="none" height="24" width="24"></rect></g><g><path d="M16,20H5V6H3v14c0,1.1,0.9,2,2,2h11V20z M20,16V4c0-1.1-0.9-2-2-2H9C7.9,2,7,2.9,7,4v12c0,1.1,0.9,2,2,2h9 C19.1,18,20,17.1,20,16z M18,16H9V4h9V16z"></path></g></svg></span></span><span class="fQjaD" style="bottom:6px;display:inline-block;position:relative;right:-24px;" id="_MAxjaLD5Oee45OUP0s-XuAQ_46" jscontroller="cZphsd" data-pronunciation-action-target="target" aria-hidden="true" jsaction="mjwztf:V46pce;NcryF:jBJHNe;pD7Wob:tVADEe"><g-bubble jsname="VCkuzd" jscontroller="QVaUhf" data-du="200" jsaction="R9S7w:VqIRre;" jsshadow=""><span class="c5aZPb" style="cursor:pointer;display:inline-block;" jsname="d6wfac" data-extra-container-classes="tw-promo-bubble" data-extra-triangle-classes="tw-promo-triangle" data-hover-hide-delay="1000" data-hover-open-delay="500" data-send-dismiss-event="true" data-theme="0" data-width="0" data-zidx="1" jsaction="vQLyHf" jsslot=""></span></g-bubble></span><span class="tw-menu-btn za3ale" style="color:rgb(94, 94, 94);cursor:pointer;display:inline-block;height:48px;margin-left:8px;outline:0px;overflow:hidden;width:48px;" jscontroller="tDZ6eb" data-action-target="target" data-sttse="true" id="tw-spkr-button" aria-label="Ouvir tradução" role="button" tabindex="0" jsaction="KjsqPd;rcuQ6b:npT2md;WxjQaf:WRB97d;UpNfPc:Xnrsoe;f2MWRb:QKiGd" data-ved="2ahUKEwiw0ZfGlZqOAxVnHLkGHdLnBUcQ8DR6BAgJEBk"><span class="tw-menu-btn-image z1asCe JKu1je" style="border:1px solid transparent;display:inline-block;fill:currentcolor;height:24px;line-height:24px;padding:10px;position:relative;width:24px;" title="Ouvir"><svg focusable="false" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M3 9v6h4l5 5V4L7 9H3zm13.5 3c0-1.77-1.02-3.29-2.5-4.03v8.05c1.48-.73 2.5-2.25 2.5-4.02zM14 3.23v2.06c2.89.86 5 3.54 5 6.71s-2.11 5.85-5 6.71v2.06c4.01-.91 7-4.49 7-8.77s-2.99-7.86-7-8.77z"></path></svg></span></span><span></span>
                                    </div>
                                </div>
                                <g-info-bubble id="tw-info-bubble" jscontroller="f3ruEc" jsaction="rcuQ6b:npT2md"></g-info-bubble>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="tw-images">
                </div>
                <div class="dURPtb" style="clear:both;line-height:16px;overflow:hidden;">
                </div>
                <div jsaction="iJE3Ge:yuFC7d;DmzWq:nuBux">
                    <g-expandable-container style="display:block;" jsname="FYBCae" jscontroller="QE1bwd" data-npd="1" data-slct="mnr-c" jsshadow="" jsaction="C7xow:Z6bwpe;xNpQtd:Nh5q2c;U6VCqe:GsRPff;Ep2Mgc:AgioGc;BDs6B:fW2qAb;ep03Ne:AvkpRc;gvA4Rc:yELBLe">
                    <div jsname="gI9xcc" jsslot="1">
                    </div>
                    </g-expandable-container>
                </div>
            </div>
        </div>
        </g-expandable-container>
    </div>
    <div class="KFFQ0c xKf9F" style="-webkit-text-stroke-width:0px;align-items:center;background-color:rgb(255, 255, 255);color:rgb(31, 31, 31);display:flex;font-family:Arial, sans-serif;font-size:medium;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:400;letter-spacing:normal;margin-bottom:0px;margin-top:16px;orphans:2;text-align:start;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;width:652px;word-spacing:0px;">
        As dependências do código-fonte devem apontar apenas para dentro, em direção a políticas de nível superior
    </div>
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
