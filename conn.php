<?

  $servidor = 'localhost';
  $usuario = 'root';
  $senha = '';
  $banco = 'bc';

  // Conecta-se ao banco de dados MySQL
  $mysqli = new mysqli($servidor, $usuario, $senha, $banco);
  $mysqli->set_charset("utf8");

?>
