<?php

require_once './Include/entete.inc.php';
require_once './Include/SourceDonnees.inc.php';
require_once './Include/Bibliotheque01.inc.php';

?>

<div id="bas">
    
    <h1> Pharmacopée </h1>
    
<?php

switch ($_REQUEST['action']) {
case 20:
            
?>
    
<form name="formChoixFamilleMedicaments" method="post" action="index.php">
    
<?php

        $selected = (isset($_REQUEST["listeFamilleMed"]) ? $_REQUEST["listeFamilleMed"] : 1);
        echo formSelectDepuisRecordset('Famille : ', 'listeFamilleMed', 'ListeFamMedicaments', getListeFamilleMed(), 10, $selected);
        echo formInputHidden("action", "action", 31);
        echo formBoutonSubmit("btnSubmit", "btnSubmit", "OK", "20");

?>

</form>

<?php

break;
case 31:
            
?>

<form name="formChoixFamilleMedicaments" method="post" action="index.php">
    
<?php
        
$selected = (isset($_REQUEST["listeFamilleMed"]) ? $_REQUEST["listeFamilleMed"] : 1);
                
echo formSelectDepuisRecordset('Famille : ', 'listeFamilleMed', 'ListeFamMedicaments', getListeFamilleMed(), 10, $selected);
echo formInputHidden("action", "action", 31);
echo formBoutonSubmit("btnSubmit", "btnSubmit", "OK", "20");

?>
    
</form>
    
<form name="formChoixMedicament" method="post" action="index.php">
               
<?php

$selectedList = (isset($_REQUEST["listeMed"]) ? $_REQUEST["listeMed"] : 1);

echo formSelectDepuisRecordset('Médicament : ', 'listeMed', 'ListeMedicaments', getListeMed($selected),11, $selectedList);
echo formInputHidden("famille", "famille", $selected);
echo formInputHidden("action", "action", 32);
echo formBoutonSubmit("btnSubmit", "btnSubmit", "OK", "21");
                
?>

</form>

<?php
            
break;
        
case 32:
            
    $selected = $_REQUEST["famille"];
            
?>
            
<form name="formChoixFamilleMedicaments" method="post" action="index.php">
                
<?php
   
echo formSelectDepuisRecordset('Famille : ', 'listeFamilleMed', 'ListeFamMedicaments', getListeFamilleMed(), 10, $selected);
echo formInputHidden("action", "action", 31);
echo formBoutonSubmit("btnSubmit", "btnSubmit", "OK", "20");
                
?>

</form>
           
    <form name="formChoixMedicament" method="post" action="index.php" >
               
<?php
               
$selectedList = (isset($_REQUEST["listeMed"]) ? $_REQUEST["listeMed"] : 1);
                
echo formSelectDepuisRecordset('Médicament : ', 'listeMed', 'ListeMedicaments', getListeMed($selected), 11 , $selectedList);
echo formInputHidden("famille", "famille", $selected);
echo formInputHidden("action", "action", 32);
echo formBoutonSubmit("btnSubmit", "btnSubmit", "OK", "21");

?>
            
</form>

    <form id="formMedicament" name="formMedicament">
                
<?php
                
if (isset($_REQUEST["listeMed"])) {
    $resultat = recupMEDICAMENT($_REQUEST["listeMed"]);
                    
        echo formInputText("NOM COMMERCIAL ", "MED_NOM", "MED_NOM", $resultat["MED_NOM"], 50, 50, 30, true) . " <br/>\n";
        echo formTextArea("COMPOSITION ", "MED_COMPO", "MED_COMPO", $resultat["MED_COMPO"], 50, 5, 255, 40, true) . " <br/>\n";
        echo formTextArea("EFFETS ", "MED_EFFETS", "MED_EFFETS", $resultat["MED_EFFETS"], 50, 5, 255, 50, true) . " <br/>\n";
        echo formTextArea("CONTRE INDIC ", "MED_CONTREINDIC", "MED_CONTREINDIC", $resultat["MED_CONTREINDIC"], 50, 5, 255, 60, true) ;
        echo " <br/>\n";
        echo formInputText("LABORATOIRE ", "LAB_NOM", "LAB_NOM", $resultat["LAB_NOM"], 50, 50, 70, true) . " <br/>\n";
                
}

?>
    </form>
<?php
        
break;
default:

break;
}

?>
    
</div>

<?php

require_once './Include/pied.inc.php';
       
?>