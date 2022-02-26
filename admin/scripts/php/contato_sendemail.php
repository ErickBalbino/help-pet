<?php
  //Variáveis do formulário.
  $nome = $_POST['nome'];
  $seuemail = $_POST['email'];
  $assunto = $_POST['assunto'];
  $mensagem = $_POST['mensagem'];
  $data_envio = date('d/m/Y');
  $hora_envio = date('H:i:s');

    //Pegando o e-mail e senha de forma segura.
  $json = file_get_contents("../credentials.json");
  $data = json_decode($json);
  
  $myemail = $data->EMAIL;
  $mysenha =  $data->EMAIL_PASSWORD;

  //Chamando a função PHPMailer.
  require_once('PHPMailer/PHPMailerAutoload.php');

  $email = new PHPMailer();
  $email->isSMTP();

  $email->Host = 'smtp.gmail.com';
  $email->Port = '587';
  $email->SMTPSecure = 'tls';
  $email->SMTPAuth = 'true';
  $email->Username = $myemail; //E-mail que vai enviar.
  $email->Password = $mysenha; //Senha do e-mail.

  $email->setFrom($email->Username, $nome);
  $email->AddAddress('alimenteumpetdw@gmail.com'); //E-mail do destino.
  $email->Subject = "Contato pelo Site - $assunto"; //Assunto do e-mail.

  $email->Body = "
    <html>
      <p><b>Nome: </b> $nome </p>
      <p><b>E-mail: </b> $seuemail </p>
      <p><b>Mensagem: </b> $mensagem </p>
      <p>Este e-mail foi enviado em <b>$data_envio</b> às <b>$hora_envio</b></p>
    </html>"; //Corpo de mensagem do -email.
  $email->IsHtml(true); //Transforma o texto acima em tipo HTML.

  //Pegando o arquivo de upload e copiando para outra pasta.
  if(file_exists($_FILES['file']['tmp_name'])){ //Verifica se algum arquivo foi anexado.
    $nome_temporario = $_FILES['file']['tmp_name'];
    $nome_real = $_FILES['file']['name'];
    copy($nome_temporario,"arquivosteporarios/$nome_real");
    $arquivo = "arquivosteporarios/$nome_real";
  
    $email->AddAttachment( $arquivo ); //Envia o arquivo local.
  }

  if ($email->Send()){ //Testa o envio do e-mail.
    echo 'E-mail enviado!';
    
    if(file_exists($_FILES['file']['tmp_name'])){ //Verifica se algum arquivo foi anexado.
      unlink($arquivo); //Apaga o arquivo local.
    }
  } else{
    echo 'Falha ao enviar: ' . $email->ErrorInfo;
  }

  echo "<meta http-equiv='refresh' content='1;URL=../../../src/pages/structure/contato.html'>"; //Redireciona a página de contato.
?>
