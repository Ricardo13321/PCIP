# PCIP ou Painel de Controle de Produção Simplificado

Esta é uma atividade avaliativa que realizei junto com meu colega de classe [Guilherme](https://github.com/guilherme359) no curso de Técnico e Desenvolvimento de Sistema no Senai - CTM, ela durou cerca de duas semanas onde cada dia havia uma daily para entregar, nesse trabalho a ideia era produzir um aplicativo web simples utilizando HTML5, CSS, BOOTSTRAP e PHP para que uma pequena indústria possa registrar e acompanhar indicadores básicos de sua produção diária. O sistema deve permitir:
- 📑Cadastro de dados de prodção
- 📑Cálculo automático de alguns indicadores chave
- 📑Visualização desses indicadores de forma organizada e de fácil interpretação

### Industria de sapatos

Aqui está algumas exigências feitas por nosso "cliente"
- 📑Produção => 1000 pares de sapatos por partoda (modelo de sapatos). 
  -  📑E produz 1000 => semana de segunda à sábado, durante quatro semanas.
- 📑20% de retrabalho => mas o permitido é 2%
  - ✅Tipos de defeitos
    - ✅cola
    - ✅couro
- 📑18% de defeitos da produção mensal
- ✅Números de homens/hora => 44 horas/8 homens
- ✅ Quem terá acesso ao admin?
  - ✅ chefe
  - ✅ pcp
  - ✅ 2 gerentes de linha
- ✅login
- ✅dashboard admin
- ✅listagem diaria dos funcionários/cadastro de refugo e tempo de produção

Acredito que entregamos tudo que foi pedido pelo cliente porém ainda faltou algumas funcionalidades o trabalho não foi entregue realmente completo
## O que o nosso aplicativo pode fazer?
- ✅ Autenticação (somente pessoas que possuam login e senha podem entrar no sistema e também permite que o usuário deslogue do sistema)
- ✅ Visualização dos dados atráves de gráficos e números
- ✅ Cadastrar entrega como produto final, refugo do tipo cola ou couro e como perda
- ✅ Botão separado para salvar os dados
- ✅ Botão para maximizar a parte de visualização de dados onde o usuário possa visualizar apenas os gráficos ou os dados importantes
- ✅ Filtro por data
- ✅ Tabela que permite visualizar as entregas e seus dados
- ✅ Tabela que permite visualizar os dados de cada funcionário registrado
- ✅ Tabela que permite ver os dados calculados e resumidos
- ❌ Design interessante e profissional
- ❌ Os gráficos não estão distribuidos de uma maneira amigável
- ❌ Existem dois gráficos identicos
- ❌ Existem alguns bugs que não quebram o site porém podem ser bem incomodos
  - 📑 O filtro por data não seta os dados automáticaente quando o usuário logar inicialmente
  - 📑 Ao cadastrar novas entregas as variáveis não se atualizam automaticamente então isso gera um bug incoveniente, porém é só clicar no botão atualizar que os dados serão atualizados e o aplicativo volta a funcionar normalmente
  - 📑 O menu de navegação não aparece ao apertar o botão que deveria fazer ele aparecer quando o site está responsivo
- ❌ O site não está responsivo adequadamente

## Como está estruturado nosso aplicativo?
```
pcip
│   .htaccess
│   areausuario.php
│   erro.html
│   index.php
│   nodata.html
│   README.md
│
├───controle
│       autenticacao.php
│       cadastrarentrega.php
│       cadastrarfuncionario.php
│       filtrardados.php
│       formulas.php
│       init.php
│       ordernararray.php
│       sair.php
│       salvar.php
│
├───css
│       estilo.css
│
├───data
│       .htaccess
│       .htpasswd
│       cargos.json
│       codigo.json
│       dataadmissao.json
│       date.json
│       estado.json
│       hora.json
│       nome.json
│       nome_entrega.json
│       quantidade.json
│       senhas.json
│       setorfuncionarios.json
│
├───graficos
│       graficodearea.php
│       graficolinha.php
│       graficometa.php
│       graficoperformance.php
│       graficoprodfuncionarios.php
│       graficoproducao.php
│       graficoquanprod.php
│       graficoretrabalho.php
│
├───img
│       gato.jpg
│       sapato1.jpeg
│       sapato2.jpg
│       sapato_planas.webp
│
└───view
        confirmardadossalvos.php
        dashboard.php
        formdados.php
        funcionarios.php
        lista.php
        listadados.php
        login.php
        menucontrole.php
        menunav.php
        modalcadastrarentrega.php
        modalsalvar.php
        questionsalvar.html
        teste.php
```
- 🧠 Controle é responsável pela parte lógica do nosso projeto é onde controlamos as variáveis de sessão, autenticação, cálculos, etc...
- 🖌️ css guarda nossa folha de estilo.
- 🎲 data é onde guardamos os nossos dados, seria como nosso Banco de Dados, adicionamos uma regra com senha para não ser possível acessar essa pasta diretamente pelo navegador.
- 📈 graficos é onde guardamos os arquivos php que são responsáveis pelos nossos gráficos.
- 🖼️ img onde guardamos nossos arquivos de imagens.
- 🪟 view onde guardamos os arquivos estruturais do nosso site, separamos em partes e juntamos tudo utilizando o nosso arquivo principal que seria o areausuario.php.
- 📑 index é a nossa tela de login, mas caso o usuário já esteja autenticado ele será redirecionado para o areausuario.php.
- ❌ erro.html é a nossa página que será apresentada caso aconteça um erro de requisição.
- 📉 nodata.html é a página que aparece no lugar dos gráficos caso não exista dados para serem mostrados nos gráficos.
- 🪶 .htaccess é o arquivo que adiciona algumas regras especiais para o nosso diretório, ele é responsável por redirecionar o usuário caso aconteça um erro de requisição ou algo do tipo. 
Acho que isso é tudo que consegui pontuar sobre esse trabalho, pretendo refazer esse trabalho de uma forma mais adequada.
## Muito obrigado pela atenção 😸
<div align="center">

  <img src="https://media1.tenor.com/m/GOj9ZF_-ZOcAAAAC/cat.gif"> 
</div>
