 // Abrir o modal
 var modal = document.getElementById("modalForm");
 var btn = document.getElementById("openModal");
 var span = document.getElementsByClassName("close")[0];

 btn.onclick = function() {
     modal.style.display = "block";
 }

 // Fechar o modal quando clicar no 'x'
 span.onclick = function() {
     modal.style.display = "none";
 }

 // Fechar o modal quando clicar fora da janela
 window.onclick = function(event) {
     if (event.target == modal) {
         modal.style.display = "none";
     }
 }

 // Enviar o formulário (aqui você pode fazer uma requisição para o backend em PHP, por exemplo)
 document.getElementById("formPlanoHospedagem").onsubmit = function(event) {
     event.preventDefault(); // Evitar o reload da página

     // Capturar os dados do formulário
     var nome_plano = document.getElementById("nome_plano").value;
     var descricao = document.getElementById("descricao").value;
     var preco_mensal = document.getElementById("preco_mensal").value;
     var preco_anual = document.getElementById("preco_anual").value;
     var recursos = document.getElementById("recursos").value;
     var status = document.getElementById("status").value;

     // Aqui você pode fazer uma requisição AJAX ou fetch para salvar os dados no backend
     console.log({
         nome_plano,
         descricao,
         preco_mensal,
         preco_anual,
         recursos,
         status
     });

     // Fechar o modal após salvar os dados
     modal.style.display = "none";
 }