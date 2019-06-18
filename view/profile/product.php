<?php $title = 'Mon profil'; ?>

<?php ob_start(); ?>
<?php require './view/menu.php';
$input = new \src\controller\Input(); ?>

<main role="main" class="container">
    <div class="row">
        <div class="col-md-10 blog-main">
            <div class="article">
                <a href="../../index.php"> <<<< Retour</a>
                <div class="warning">
                    <?php
                    if (isset($_GET['warning'])){
                        echo "<br/> " . htmlspecialchars($input->get('warning')) . "<br/>";
                    }
                    ?>
                </div>
                <h2 class="blog-post-title-single">
                    <strong><h2>L'emprunte numérique</h2></strong>
                </h2>
                <div class="blog-post-meta">
                    Mise en place d'une stratégie de communication sur les réseaux qui vous ressemble !
                </div>
                <div class="article">
                    La présence sur les réseaux ne se résume pas à la création d'un site Internet avec référencement en moteur de recherche ou d'un compte sur un réseau social. Sans stratégie adaptée, cette présence passera rapidement inaperçue. Sans interaction avec le visiteur, votre image ne reflètera pas le dynamisme de la démarche et la volonté de se démarquer des concurrents.<br/></br/>
                    <h5>Quels sont vos objectifs et donc vos besoins en terme d'emprunte numérique ?</h5><br/>
                        <ul>
                            <li>Votre offre doit être proposée au plus grand nombre, mais en conservant une certaine flexibilité relative aux besoins du client.</li>
                            <li>De nouveaux partenaires peuvent être attirés par votre innovation, votre dynamisme.</li>
                            <li>Vous devez définir des objectifs précis qui vous permettront de quantifier l'impact de votre emprunte numérique :
                                <ul>
                                    <li type="circle">
                                        Etude de l'évolution du trafic avec des objectifs de progression chiffrés.
                                    </li>
                                    <li type="circle">
                                        Développer les contacts en ligne et quantifier leur impact en terme de nouveaux marchés/ventes.
                                    </li type="circle">
                                    <li type="circle">
                                        Permettre de réaliser des études de marchés auprès d'un public ciblé.
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    <h5>Des produits/services pour le monde numérique</h5><br/>
                        <ul>
                            <li>
                                Reformatter votre gamme de produits/services avec du visuel afin de créer une image numérique attractive.
                            </li>
                            <li>
                                Offrir des avantages liés à l'utilisation de la plateforme numérique pour fidéliser.
                            </li>
                        </ul>
                    <h5>Etre à l'écoute de ses clients</h5><br/>
                        <ul>
                            <li>
                                Utiliser les outils offerts par le numérique pour développer une interaction avec ses prospects/clients.
                            </li>
                            <li>
                                Permettre à son public de s'exprimer directement et agir en conséquence afin d'étoffer sa gamme ou rectifier un produit.
                            </li>
                            <li>
                                Le marketing numérique permet d'appuyer le travail du marketing sur le terrain pour développer la visibilité.
                            </li>
                        </ul>
                </div>
            </div>
        </div>
    </div>
</main>
<?php require './view/blogFooter.php' ?>

<?php $content = ob_get_clean(); ?>

<?php require 'view/template.php'; ?>