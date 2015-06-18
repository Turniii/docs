<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="../view/main.css"/>
        <link rel="stylesheet" href="../view/signInPage.css"/>
        <title>S'Ur Home Registration Page</title>
    </head>
    <body>
        <div id="page_block">
            
            <?php include("header.php");?>
            <?php include("navprofil.php");?>
            
            <div id="inscription">
                <h2>Inscription</h2>
            <section>
                <form method="post" action="../controler/content.php?page=redirectionPage&redirect=membre" enctype="multipart/form-data">
                    <input type="hidden" name="MAX-FILE-SIZE" value="5242880">
                    <table id="info_perso">
                    <caption>Information personnel</caption>
                    
                    <tr>
                        <td><label for="photo">Votre photo :</label></td>
                        <td><input type="file" name="photo" id="photo" accept="image/jpeg, image/png"></td>
                    </tr>
                    <tr>
                        <td><label for="nom">Nom :</label></td>
                        <td><input type="text" name="nom" id="nom" placeholder="Votre nom"  size="30" required>*</td>
                    </tr>
                    <tr>
                        <td><label for="prenom">Prénom :</label></td>
                        <td><input type="text" name="prenom" id="prenom" placeholder="Votre prénom" size="30" required>*</td>
                    </tr>
                    <tr>
                        <td><label for="adresse_mail">Adresse m@il :</label></td>
                        <td><input type="email" name="adresse_mail" id="adresse_mail" onblur="verification('adresse_mail',/^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/,0);alertVerif(0);" placeholder="Votre adresse m@il" size="30" required>*</td>
                    </tr>
                    <tr>
                        <td><label for="confirmer_adresse_mail">Confirmer votre Adresse m@il:</label></td>
                        <td><input type="email" name="confirmer_adresse_mail" id="confirmer_adresse_mail" onblur="confMail();" placeholder="Veuillez confirmer votre adresse m@il" size="30" required>*</td>
                    </tr>
                    <tr>
                        <td><label for="mdp">Mot de passe :</label></td>
                        <td><input type="password" name="mdp" id="mdp" onblur="verification2('mdp',2);alertVerif(2)" placeholder="Votre mot de passe" size="30" required>*</td>
                    </tr>
                    <tr>
                        <td><label for="confirmer_mdp">Confirmer votre mot de passe :</label></td>
                        <td><input type="password" name="confirmer_mdp" id="confirmer_mdp" onblur="confMdp();" placeholder="Confirmer votre mot de passe" size="30" required>*</td>
                    </tr>
                    <tr>
                        <td><label for="pseudo">Pseudonyme:</label></td>
                        <td><input type="text" name="pseudo" id="pseudo" placeholder="Votre pseudonyme" size="30"></td>
                    </tr>
                    <tr>
                        <td><label for="date_de_naissance">Date de naissance :</label></td>
                        <td><input type="text" name="date_de_naissance" id="date_de_naissance" onblur="verification('date_de_naissance',/^[0-3][0-9]\/[01][0-9]\/[0-9]{4}$/,4);alertVerif(4);verifNaissance();" required placeholder="jj/mm/aaaa">*</td>
                    </tr>
                    <!--
                    <tr>
                        <td><label for="phone">Numéro de téléphone :</label></td>
                        <td><input type="tel" name="phone" id="phone" placeholder="Votre numéro de téléphone" size="22"></td>
                    </tr>
                    -->
                    </table>
                    
                    <table id="adresse">
                    <caption>Adresse</caption>
                    
                    <tr>
                        <td><label for="pays">Pays :</label><td>
                    <select name="pays" id="pays">
                        <option value="France" selected>France</option>
                        <option value="Espagne">Espagne</option>
                        <option value="Italie">Italie</option>
                        <option value="Royaume-uni">Royaume-Uni</option>
                        <option value="Allemagne">Allemagne</option>
                        <option value="Suisse">Suisse</option>
                        <option value="Belgique">Belgique</option>
                        <option value="Luxembourg">Luxembourg</option>
                    </select><br /><br />
                    </tr>
                    <tr>
                        <td><label for="code_postal">Code postal :</label></td>
                        <td><input type="number" name="code_postal" id="code_postal" onblur="verification('code_postal',/^[0-9]{5}$/,5);alertVerif(5)" placeholder="Votre code postal" min="0" max="99999" required>*</td>
                    </tr>
                    <tr>
                        <td><label for="ville" >Ville :</label></td>
                        <td><input type="text" name="ville" size="30" placeholder="Votre ville/lieu-dit/etc..." required>*</td>
                    </tr>
                    <tr>
                        <td><label>Adresse :</label></td>
                        <td><input type="text" name="adresse" size="30" placeholder="Votre adresse" required>*</td>
                    </tr>
                    


                    </table>
                    
                    <p><input type="checkbox" name="majorite" id="majorite" required>
                        <label for="majorite">Je confirme sur l'honneur avoir plus de 18 ans.*</label></p>
                    <p><input type="checkbox" name="CGU" id="CGU" required>
                        <label for="CGU">J'accepte les régles de confidentialitées ainsi que les conditions d'utilisation du site.* </label></p>
            
                    <p><input type="submit" value="Envoyer"></p>
                    
                    <p>Les champs avec une astérisque (*) sont obligatoire.</p>
                </form>
            </section>
            </div>
            <?php include("footer.php");?>
            
        </div>
        <script src="../librairie/jquery-1.11.1.min.js"></script>
        <script src="../script/signInPage.js" type="text/javascript"> </script>
        
    </body>
</html>
