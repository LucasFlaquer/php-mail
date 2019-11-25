<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="main.css">
  <title>Formulario</title>
</head>
<body>
  <div class="container">
    <h1>Formulário</h1>
    <div class="row">
      <div class="col-12 col-sm-6">
        <form id="form" method="POST" novalidate >
          <div class="form-row">
            <div class="form-group col-12">
              <label for="nome">Seu Nome</label>
              <input type="text" erromessage="coriige isso" class="form-control" id="nome" placeholder="digite seu nome" name="nome" required>
            </div>
            <div class="form-group col-12">
              <label for="email">Email</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="digite seu email" required>
            </div>
            <div class="form-group col-6">
              <label for="telefone">telefone</label>
              <input type="tel"  required class="form-control" id="telefone" name="telefone" placeholder="digite seu telefone" maxlength="11" >
            </div>
            <div class="form-group col-4">
              <label for="estado">Estado</label>
              <select class="form-control" id="estado" name="estado" required>
                <option value="">Selecione</option>
                <option value="AC">AC</option>
                <option value="AL">AL</option>
                <option value="AP">AP</option>
                <option value="AM">AM</option>
                <option value="BA">BA</option>
                <option value="CE">CE</option>
                <option value="DF">DF</option>
                <option value="ES">ES</option>
                <option value="GO">GO</option>
                <option value="MA">MA</option>
                <option value="MT">MT</option>
                <option value="MS">MS</option>
                <option value="MG">MG</option>
                <option value="PA">PA</option>
                <option value="PB">PB</option>
                <option value="PR">PR</option>
                <option value="PE">PE</option>
                <option value="PI">PI</option>
                <option value="RJ">RJ</option>
                <option value="RN">RN</option>
                <option value="RS">RS</option>
                <option value="RO">RO</option>
                <option value="RR">RR</option>
                <option value="SC">SC</option>
                <option value="SP">SP</option>
                <option value="SE">SE</option>
                <option value="TO">TO</option>
              </select>
            </div>
            <div class="form-group col-9">
              <label for="cidade">Cidade</label>
              <input type="text" class="form-control" id="cidade" placeholder="cidade" name="cidade" required>
            </div>
            <div class="form-group col-8">
              <label for="mensagem">Sua mensagem</label>
              <textarea class="form-control" id="mensagem" rows="3" name="mensagem"></textarea>
            </div>
          </div>
          <p>
            <button class="btn btn-primary" type="submit">Enviar</button>
          </p>
        </form>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
  integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
  integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="main.js"></script>
</body>
</html>