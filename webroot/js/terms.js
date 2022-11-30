$(document).on('click', '.conditions', function () {
    Swal.fire({
        title: `Política Privacidade`,
        showCancelButton: true,
        html: termsInHtml(),

        showCancelButton: false,
        showConfirmButton: false
    });
});

function termsInHtml() {
    return '<p>A sua privacidade é importante para nós. É política do Manos barber respeitar a sua privacidade em relação a qualquer informação sua que possamos coletar no site Manos barber, e outros sites que possuímos e operamos.</p></br>' +

    '<p>Solicitamos informações pessoais apenas quando realmente precisamos delas para lhe fornecer um serviço. Fazemo-lo por meios justos e legais, com o seu conhecimento e consentimento. Também informamos por que estamos coletando e como será usado.</p></br>' +

    '<p>Apenas retemos as informações coletadas pelo tempo necessário para fornecer o serviço solicitado. Quando armazenamos dados, protegemos dentro de meios comercialmente aceitáveis ​​para evitar perdas e roubos, bem como acesso, divulgação, cópia, uso ou modificação não autorizados.</p></br>' +

    '<p>Não compartilhamos informações de identificação pessoal publicamente ou com terceiros, exceto quando exigido por lei.</p></br>' +

    '<p>O nosso site pode ter links para sites externos que não são operados por nós. Esteja ciente de que não temos controle sobre o conteúdo e práticas desses sites e não podemos aceitar responsabilidade por suas respectivas políticas de privacidade.</p></br>' +

    '<p>Você é livre para recusar a nossa solicitação de informações pessoais, entendendo que talvez não possamos fornecer alguns dos serviços desejados.</p></br>' +

    '<p>O uso continuado de nosso site será considerado como aceitação de nossas práticas em torno de privacidade e informações pessoais. Se você tiver alguma dúvida sobre como lidamos com dados do usuário e informações pessoais, entre em contato conosco.</p></br></br></br>' +


    '<p>Compromisso do Usuário</p></br>' +
    '<p>O usuário se compromete a fazer uso adequado dos conteúdos e da informação que o Manos barber oferece no site e com caráter enunciativo, mas não limitativo:</p></br>' +

    '<p>1) Não se envolver em atividades que sejam ilegais ou contrárias à boa fé a à ordem pública;</p>' +
    '<p>2) Não difundir propaganda ou conteúdo de natureza racista, xenofóbica, apostas online ou azar, qualquer tipo de pornografia ilegal, de apologia ao terrorismo ou contra os direitos humanos;</p>' +
    '<p>3) Não causar danos aos sistemas físicos (hardwares) e lógicos (softwares) do Manos barber, de seus fornecedores ou terceiros, para introduzir ou disseminar vírus informáticos ou quaisquer outros sistemas de hardware ou software que sejam capazes de causar danos anteriormente mencionados.</p>' +

    '<p>Mais informações</p></br>' +

    '<p>Esperemos que esteja esclarecido.</p></br>' +

    '<p>Esta política é efetiva a partir de <b>30 November 2022 17:37</b></p>';
}
