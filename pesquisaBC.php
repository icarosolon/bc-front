<?
require "conn.php";

// Recebe o valor enviado
$valor = $_GET['valor'];

$cnsArt = mysqli_query($mysqli, "SELECT * FROM `artigos` WHERE `Art_TitArt` LIKE '%{$valor}%' OR `Art_DscArt` LIKE '%{$valor}%' OR `Art_KeyArt` LIKE '%{$valor}%' ORDER BY `Art_CodArt` ASC ");
$cntArt = $cnsArt->num_rows;

if($cntArt != 0) {

  // Exibe todos os valores encontrados
  while($linArt = mysqli_fetch_array($cnsArt)){ 

    $linFil = mysqli_fetch_array(mysqli_query($mysqli, "SELECT * FROM `artigos_files` WHERE `Fil_CodArt` = {$linArt['Art_CodArt']} "));

    echo '
    <div class="marshall-works-details">
      <div id="works-heading" class="marshall-works-heading">
        <div class="marshall-works-heading-inner">
          <h2>'.$linArt['Art_TitArt'].'</h2>
          <p>'.$linArt['Art_DscArt'].'</p> 
          <a target="_blank" href="'.$linFil['Fil_SrcFil'].'">Abrir</a>
        </div>
      </div>
    </div>';
  }
} else {
  echo '<div id="loading" class="nenhum"><div id="preloader"><span></span><span></span></div></div>';
}
 
?>
