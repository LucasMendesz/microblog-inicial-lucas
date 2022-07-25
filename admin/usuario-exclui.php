<?php
use Microblog\Usuario;
require_once "../inc/cabecalho-admin.php";
$usuario = new Usuario;
$usuario->setId(($_GET['id']));
$usuario->excluir();
header("location:usuarios.php");