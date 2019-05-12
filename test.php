public function updateSignalementCommentaire()

$commentaireManager = new CommentaireManager();
$chapitreManager = new ChapitreManager();

// $idChapitre = $_GET['idChapitre'];
$commentairesAdmin = $commentaireManager->getListeTousLesCommentaires();

$nombreTotalCommentaires = count($commentairesAdmin);

$chapitres = $chapitreManager->getListeChapitres();
//$totalChapitres = $manager->getTotalChapitres(); //publierTousLesChapitres();

$nombreTotalChapitres = count($chapitres);

$idCommentaire = $_GET['idCommentaire'];

$commentaire = $commentaireManager->getCommentaire($idCommentaire);



if (isset($_POST['choix'])) {
if ($_POST['choix'] == "supprimer")
{
$commentaire->setCommentaireSignale(0);
$modifierSignalementCommentaireAdmin = $commentaireManager->modifierCommentaire($commentaire);
//$messageSuppression = 'Le signalement du commentaire a été supprimé.';


$this->listCommentaires('Le signalement du commentaire a été supprimé.');

}
}

$myView = new View('modifierSignalementCommentaire');
$myView->renderAdmin(array(
'nombreTotalCommentaires' => $nombreTotalCommentaires,
'nombreTotalChapitres' => $nombreTotalChapitres,
'modifierSignalementCommentaireAdmin'=>$modifierSignalementCommentaireAdmin,
'chapitres' => $chapitres,
'commentaire' => $commentaire
//'messageSuppression' =>$messageSuppression
));
}