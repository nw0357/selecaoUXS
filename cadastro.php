<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="materialize/css/materialize.min.css">
    <title>Cadastro</title>
</head>
<body>
    <form action="cad_cliente.php" method="post" class="container">
        <section class="col7 center-align">
            <h4>Informações do Usuário</h4>
            <div class="row">
                <div class="input-field col s12">
                <input id="nome" type="text" class="validate" name="nome" required>
                <label for="nome">Nome Completo*</label>
            </div>
            <div class="row">
                <div class="input-field col s12">
                <input id="cpf" type="text" class="validate" name="cpf" maxlength="14" required>
                <label for="cpf">CPF*</label>
            </div>
            <section class="col7 s12 center-align">
                <h5>Endereço</h5>
                <div class="row">
                    <div class="input-field col s12">
                    <input id="cep" type="text" class="validate" name="cep" maxlength="9" required>
                    <label for="cep">CEP*</label>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                    <input id="estado" type="text" class="validate" name="estado" required>
                    <label for="estado">UF*</label>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                    <input id="cidade" type="text" class="validate" name="cidade" required>
                    <label for="cidade">Cidade*</label>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                    <input id="bairro" type="text" class="validate" name="bairro" required>
                    <label for="bairro">Bairro*</label>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                    <input id="rua" type="text" class="validate" name="rua" required>
                    <label for="rua">Rua/Logradouro*</label>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                    <input id="numero_residencia" type="text" class="validate" name="numero_residencia" required>
                    <label for="numero_residencia">Número*</label>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                    <input id="complemento" type="text" class="validate" name="complemento">
                    <label for="complemento">Complemento</label>
                </div>
            </section>
            <section class="center-align">
                <h5>Contato</h5>
                <div class="row">
                    <div class="input-field col s12">
                    <input id="telefone" type="text" class="validate" name="telefone" maxlength="15" required>
                    <label for="telefone">Telefone*</label>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                    <input id="email" type="email" class="validate" name="email" required>
                    <label for="email">Email*</label>
                </div>
            </section>
            <div class="row">
                <div class="input-field col s12">
                <input id="senha" type="password" class="validate" name="senha" maxlength="25" required>
                <label for="senha">Senha*</label>
            </div>
        </section>
        <input type="submit" value="Entrar" name="enviar" class="btn waves-effect waves-red">
    </form>
    <script src="materialize/js/materialize.min.js"></script>
    <script>
        let cpfInput=document.querySelector('#cpf')
        let cepInput=document.querySelector('#cep')
        let telInput=document.querySelector('#telefone')
        cpfInput.addEventListener('keypress', ()=>{
            let inputLength=cpfInput.value.length
            if (inputLength==3 || inputLength==7) {
                cpfInput.value+='.'
            } else if(inputLength==11){
                cpfInput.value+='-'
            }
        })
        cepInput.addEventListener('keypress', ()=>{
            let inputLength=cepInput.value.length
            if(inputLength==5){
                cepInput.value+='-'
            }
            if(inputLength==9){
                let researchValue=cepInput.value.replace('-', '')
                let url="https://viacep.com.br/ws/"+researchValue+"/json/"
                fetch(url).then(response => response.json()).then(data =>{
                    document.querySelector('#estado').value=data.uf
                    document.querySelector('#cidade').value=data.localidade
                    document.querySelector('#bairro').value=data.bairro
                    document.querySelector('#rua').value=data.logradouro
                    document.querySelector('#complemento')=data.complemento
                })
            }
        })
        telInput.addEventListener('keypress', ()=>{
            let inputLength=telInput.value.length
            if(inputLength==0){
                telInput.value+='('
            }else if(inputLength==3){
                telInput.value+=')'
            }else if(inputLength==9){
                telInput.value+='-'
            }
        })

    </script>
</body>
</html>