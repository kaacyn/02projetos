<?php

function ListarCompeticoes(){
	return getAPIFOOTBALL("/competitions");

}

function ListarTeams($idcompeticao){
	return getAPIFOOTBALL("/competitions/".$idcompeticao."/teams");

}

function getAPIFOOTBALL($rota){

	$headers = array();
	$headers[] = "x-auth-token: " . API_TOKEN;

	$ch = curl_init();

	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

	curl_setopt($ch, CURLOPT_URL, API_FOOTBALL.$rota);

	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

	$result=curl_exec($ch);

	curl_close($ch);
	
	return json_decode($result, true);
}


function dataBrasil($data){
	return (new \DateTimeImmutable($data))->format('d/m/Y');
}