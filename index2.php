<?php
require_once 'TemplateRenderer.php';

$renderer = new TemplateRenderer();
print $renderer->render('layout.html.twig', array());
?>
