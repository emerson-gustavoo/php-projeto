<?php
// logout.php

require_once __DIR__ . '/classes/Sessao.php';

/**
 * Encerra a sessão e redireciona para a página de login.
 */

Sessao::iniciar();
Sessao::destruir();

header('Location: login.php');
exit;
