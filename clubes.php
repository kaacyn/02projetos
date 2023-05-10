<?php  include_once('configuracoes.php'); ?>
<?php  include_once('funcoes.php'); ?>
<?php 

$teams = ListarTeams($_GET['idcompeticao']); 

if(!is_array($teams) || count($teams) == 0 || (isset($teams['errorCode']) and !empty($teams['errorCode']))){
	header('Location: '.SITE_URL."/404.php");
	exit;
}


// print_r($teams);
?>
<!DOCTYPE html> 
<html lang="pt-br"> 
<head> 
	<meta charset="utf-8"> 
	<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
	<meta name="viewport" content="width=device-width, initial-scale=1"> 
	<meta name="theme-color" content="#ffffff"> 
	<title><?php echo $teams['competition']['name'] ?></title> 
	<meta name="description" content="02 Projetos"> 
	<meta name="keywords" content=""> 

	<?php include(dirname(__FILE__)."/header_jscss.php"); ?>
</head> 

<body> 
	<div id="page-container">
		<div id="content-wrap">
			<?php  include(dirname(__FILE__)."/header.php"); ?>
			<div class="container"> 
				<div class="nav">
					<ul>
						<li><a href="<?php echo SITE_URL ?>" title="Ir para a página inicial">HOME</a></li>
						<li><i class="fa fa-angle-double-right" aria-hidden="true"></i></li>
						<li><?php echo $teams['competition']['name'] ?></li>
					</ul>
				</div>

				<div class="row"> 
					<?php if(count($teams['teams']) > 0 and is_array($teams['teams'])){ ?>
						<?php foreach($teams['teams'] as $team){ 		  ?>
						
							<div class="col-xs-12 col-sm-12 col-md-4 col-lg-3">
								<div class="time_box">
									<div class="imagem_corpo">
										<div class="imagem">
											<span class="helper"></span>
											<?php if($team['crest']) { ?>
												<img src = "<?php echo $team['crest']; ?>"> 
											<?php } else { ?>
												<img src = "<?php echo SITE_URL ?>/img/bola-marcadagua.png"> 
											<?php } ?>
										</div>
										<div class="nome">
											<?php echo $team['name']; ?>
										</div> 
									</div>
								</div>
							</div>
						<?php } ?>
					<?php } ?>
				</div>
			</div>
		</div>
		<?php  include(dirname(__FILE__)."/footer.php"); ?>
	</div>
</body>
</html>