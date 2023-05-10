<?php  include_once('configuracoes.php'); ?>
<?php  include_once('funcoes.php'); 

$competicoes = ListarCompeticoes()["competitions"];

if(!is_array($competicoes) || count($competicoes) == 0 || (isset($competicoes['errorCode']) and !empty($competicoes['errorCode']))){
	header('Location: '.SITE_URL."/404.php");
	exit;
}
?>

<!DOCTYPE html> 
<html lang="pt-br"> 
<head> 
	<meta charset="utf-8"> 
	<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
	<meta name="viewport" content="width=device-width, initial-scale=1"> 
	<meta name="theme-color" content="#ffffff"> 
	<title>Campeonatos mundiais de futebol</title> 
	<meta name="description" content="02 Projetos"> 
	<meta name="keywords" content=""> 

	<?php include(dirname(__FILE__)."/header_jscss.php"); ?>
</head> 

<body> 
	<div id="page-container">
		<div id="content-wrap">
			<?php  include(dirname(__FILE__)."/header.php"); ?>

			<div class="container"> 

			
				<?php if(count($competicoes) > 0 and is_array($competicoes)){ ?>
					<?php foreach($competicoes as $competicao){ ?>
						<div class="competicao">
							<div class="row">
								<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
									<div class="imagem_corpo">
										<div class="imagem">
											<a href="<?php  echo SITE_URL ?>/clubes.php?idcompeticao=<?php echo $competicao['id']; ?>" title="<?php echo $competicao['name']?>">
												<?php if($competicao['emblem']) { ?>
													<img class="img-responsive" src = "<?php echo $competicao['emblem']; ?>"> 
												<?php } else { ?>
													<img src = "<?php echo SITE_URL ?>/img/bola-marcadagua.png"> 
												<?php } ?>
											</a>
										</div>
									</div>
								</div>
								<div class="col-xs-12 col-sm-6 col-md-8 col-lg-8">
									<div class="competicao_descricao">
										<h2>
											<?php if($competicao['area']['flag']) { ?>
													<!-- <div class="flag"><a href="<?php  echo SITE_URL ?>/clubes.php" title="Clubes"><img class="img-responsive" src = "<?php echo $competicao['area']['flag']; ?>"></a></div>  -->
											<?php } ?>
											<a href="<?php  echo SITE_URL ?>/clubes.php?idcompeticao=<?php echo $competicao['id']; ?>" title="<?php echo $competicao['name']?>"><?php echo $competicao['name']; ?></a>
										</h2>

										<span class="data">
											<i class="fa fa-calendar" aria-hidden="true"></i> <?php echo dataBrasil($competicao['currentSeason']['startDate']); ?> a <?php echo dataBrasil($competicao['currentSeason']['endDate']); ?>
										</span>
									</div>
								</div>
							</div>
							<div class="acao">
								<a href = "<?php  echo SITE_URL ?>/clubes.php?idcompeticao=<?php echo $competicao['id']; ?>" title="<?php echo $competicao['name']?>" type="button" class="btn btn-primary">CLUBES PARTICIPANTES <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
							</div>
						</div>
					<?php } ?>
				<?php } ?>
			</div>
		</div>
		<?php  include(dirname(__FILE__)."/footer.php"); ?>
	</div>
</body>
</html>