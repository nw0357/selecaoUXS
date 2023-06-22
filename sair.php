<?

foreach($_SESSION as $dado):
    unset($dado);
endforeach;

session_abort();

header('Locatiion: index.php');