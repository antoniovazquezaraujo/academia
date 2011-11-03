<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">
<html>
{include file="html_header.tpl"}
<body {if $nivel_usuario eq "10"}style="background-color:yellow;"{/if}>
<div style="text-align:center;">
<h1>Formatic Escuela de Programadores</h1>
<h3>Gestion de alumnos</h3>
</div>
{if $nivel_usuario gt 0}Usuario: {$nombre_usuario} (Nivel: {$nivel_usuario}){/if}
<hr>
