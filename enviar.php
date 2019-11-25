<?php
  require "php-mailer/PHPMailerAutoload.php"; 
  $nome = '';
  $email = '';
  $UF = '';
  $cidade = '';
  $mensagem = '';

  if(isset($_POST)) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    $UF = $_POST['estado'];
    $cidade = $_POST['cidade'];
    $mensagem = $_POST['mensagem'];
    //mensagem para o cliente
    $subject = 'Formulário';
    $agradecimento = 'Obrigado por preencher o formulário! aguardo o seu contato.';
    $email1 = enviaEmail($email,$nome, $agradecimento, false, $subject);    
    //mensagem com os dados submetidos para o dono do provedor
    $subject = 'Formulário de '.$nome;
    $conteudo = "<h3>Resposta de {$nome}</h3>
      <p><strong>Nome:</strong> {$nome}</p>
      <p><strong>Email:</strong> {$email}</p>
      <p><strong>Telefone:</strong> {$tel}</p>
      <p><strong>Cidade:</strong> {$cidade} UF: {$UF}</p>
      <p><strong>Mensagem:</strong> {$mensagem}</p>";
    $email = "lucasflaquer.estudophp@gmail.com";
    $email2 = enviaEmail($email,$nome, $conteudo, true, $subject);
    echo json_encode(array('email1'=> $email1, 'email2'=>$email2));
  }

  function enviaEmail($dest, $destName, $message, $html, $subject) {
    $mail = new PHPMailer();
    $mail->IsSMTP(); 
    $mail->Host = "smtp.gmail.com";
    $mail->Port = 587;
    $mail->SMTPAuth = true;
    $mail->Username = 'lucasflaquer.estudophp@gmail.com'; 
    $mail->Password = 'Qwerty19!';
    $mail->SMTPOptions = array( 'ssl' => array( 'verify_peer' => false, 'verify_peer_name' => false, 'allow_self_signed' => true ) );
    $mail->From = "lucasflaquer.estudophp@gmail.com";
    $mail->FromName = "Lucas Flaquer"; 
    $mail->AddAddress($dest, $destName);
    $mail->IsHTML($html);
    $mail->CharSet = 'UTF-8';
    $mail->Subject = $subject;
    $mail->Body = $message;
    $enviado = $mail->Send();

    if($enviado) {
      //echo "Seu email foi enviado com sucesso";
      return true;
    } else {
      return false;
      //echo "houve um erro enviando seu email: ". $mail->ErroInfo;
    }
  }
?>