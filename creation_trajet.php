<?php
$title = "Création de Trajet";
include "entete.php";

//On vérifie si la personne est connectée
if (empty($_SESSION['membre_id']) or $_SESSION['membre_id'] == 0)
{
	echo "<h1>Il faut se connecter pour avoir accès à cette page.</h1>";
	echo "<a href='connexion.php'> Se connecter ou s'inscrire </a>";
	include "pied.php";
	exit(); 
}
?>	

<h1> Création de trajet </h1>
				
<form action="verifier_trajet.php" method="post" class="form_inscription" >
	<fieldset>
		<legend>Départ</legend>
		<div>
			<!-- on a la liste déroulante de tous les pays -->
			<label for="pays_depart">Pays de départ : </label>
			<select name="pays_depart">
				<optgroup label="Europe">
					<option value="allemagne">Allemagne</option>
					<option value="albanie">Albanie</option>
					<option value="andorre">Andorre</option>
					<option value="autriche">Autriche</option>
					<option value="bielorussie">Biélorussie</option>
					<option value="belgique">Belgique</option>
					<option value="bosnieHerzegovine">Bosnie-Herzégovine</option>
					<option value="bulgarie">Bulgarie</option>
					<option value="croatie">Croatie</option>
					<option value="danemark">Danemark</option>
					<option value="espagne">Espagne</option>
					<option value="estonie">Estonie</option>
					<option value="finlande">Finlande</option>
					<option value="france">France</option>
					<option value="grece">Grèce</option>
					<option value="hongrie">Hongrie</option>
					<option value="irlande">Irlande</option>
					<option value="islande">Islande</option>
					<option value="italie">Italie</option>
					<option value="lettonie">Lettonie</option>
					<option value="liechtenstein">Liechtenstein</option>
					<option value="lituanie">Lituanie</option>
					<option value="luxembourg">Luxembourg</option>
					<option value="exRepubliqueYougoslaveDeMacedoine">Ex-République Yougoslave de Macédoine</option>
					<option value="malte">Malte</option>
					<option value="moldavie">Moldavie</option>
					<option value="monaco">Monaco</option>
					<option value="norvege">Norvège</option>
					<option value="paysBas">Pays-Bas</option>
					<option value="pologne">Pologne</option>
					<option value="portugal">Portugal</option>
					<option value="roumanie">Roumanie</option>
					<option value="royaumeUni">Royaume-Uni</option>
					<option value="russie">Russie</option>
					<option value="saintMarin">Saint-Marin</option>
					<option value="serbieEtMontenegro">Serbie-et-Monténégro</option>
					<option value="slovaquie">Slovaquie</option>
					<option value="slovenie">Slovénie</option>
					<option value="suede">Suède</option>
					<option value="suisse">Suisse</option>
					<option value="republiqueTcheque">République Tchèque</option>
					<option value="ukraine">Ukraine</option>
					<option value="vatican">Vatican</option>
				</optgroup>
				<optgroup label="Amérique">
					<option value="antiguaEtBarbuda">Antigua-et-Barbuda</option>
					<option value="argentine">Argentine</option>
					<option value="bahamas">Bahamas</option>
					<option value="barbade">Barbade</option>
					<option value="belize">Belize</option>
					<option value="bolivie">Bolivie</option>
					<option value="bresil">Brésil</option>
					<option value="canada">Canada</option>
					<option value="chili">Chili</option>
					<option value="colombie">Colombie</option>
					<option value="costaRica">Costa Rica</option>
					<option value="cuba">Cuba</option>
					<option value="republiqueDominicaine">République Dominicaine</option>
					<option value="dominique">Dominique</option>
					<option value="equateur">Équateur</option>
					<option value="etatsUnis">États Unis</option>
					<option value="grenade">Grenade</option>
					<option value="guatemala">Guatemala</option>
					<option value="guyana">Guyana</option>
					<option value="haiti">Haïti</option>
					<option value="honduras">Honduras</option>
					<option value="jamaique">Jamaïque</option>
					<option value="mexique">Mexique</option>
					<option value="nicaragua">Nicaragua</option>
					<option value="panama">Panama</option>
					<option value="paraguay">Paraguay</option>
					<option value="perou">Pérou</option>
					<option value="saintCristopheEtNieves">Saint-Cristophe-et-Niévès</option>
					<option value="sainteLucie">Sainte-Lucie</option>
					<option value="saintVincentEtLesGrenadines">Saint-Vincent-et-les-Grenadines</option>
					<option value="salvador">Salvador</option>
					<option value="suriname">Suriname</option>
					<option value="triniteEtTobago">Trinité-et-Tobago</option>
					<option value="uruguay">Uruguay</option>
					<option value="venezuela">Venezuela</option>
				</optgroup>
					<optgroup label="Asie">
					<option value="afghanistan">Afghanistan</option>
					<option value="arabieSaoudite">Arabie Saoudite</option>
					<option value="armenie">Arménie</option>
					<option value="azerbaidjan">Azerbaïdjan</option>
					<option value="bahrein">Bahreïn</option>
					<option value="bangladesh">Bangladesh</option>
					<option value="bhoutan">Bhoutan</option>
					<option value="birmanie">Birmanie</option>
					<option value="brunei">Brunéi</option>
					<option value="cambodge">Cambodge</option>
					<option value="chine">Chine</option>
					<option value="coreeDuSud">Corée Du Sud</option>
					<option value="coreeDuNord">Corée Du Nord</option>
					<option value="emiratsArabeUnis">Émirats Arabe Unis</option>
					<option value="georgie">Géorgie</option>
					<option value="inde">Inde</option>
					<option value="indonesie">Indonésie</option>
					<option value="iraq">Iraq</option>
					<option value="iran">Iran</option>
					<option value="israel">Israël</option>
					<option value="japon">Japon</option>
					<option value="jordanie">Jordanie</option>
					<option value="kazakhstan">Kazakhstan</option>
					<option value="kirghistan">Kirghistan</option>
					<option value="koweit">Koweït</option>
					<option value="laos">Laos</option>
					<option value="liban">Liban</option>
					<option value="malaisie">Malaisie</option>
					<option value="maldives">Maldives</option>
					<option value="mongolie">Mongolie</option>
					<option value="nepal">Népal</option>
					<option value="oman">Oman</option>
					<option value="ouzbekistan">Ouzbékistan</option>
					<option value="pakistan">Pakistan</option>
					<option value="philippines">Philippines</option>
					<option value="qatar">Qatar</option>
					<option value="singapour">Singapour</option>
					<option value="sriLanka">Sri Lanka</option>
					<option value="syrie">Syrie</option>
					<option value="tadjikistan">Tadjikistan</option>
					<option value="taiwan">Taïwan</option>
					<option value="thailande">Thaïlande</option>
					<option value="timorOriental">Timor oriental</option>
					<option value="turkmenistan">Turkménistan</option>
					<option value="turquie">Turquie</option>
					<option value="vietNam">Viêt Nam</option>
					<option value="yemen">Yemen</option>
				</optgroup>
				<optgroup label="Afrique">
					<option value="afriqueDuSud">Afrique Du Sud</option>
					<option value="algerie">Algérie</option>
					<option value="angola">Angola</option>
					<option value="benin">Bénin</option>
					<option value="botswana">Botswana</option>
					<option value="burkina">Burkina</option>
					<option value="burundi">Burundi</option>
					<option value="cameroun">Cameroun</option>
					<option value="capVert">Cap-Vert</option>
					<option value="republiqueCentre-Africaine">République Centre-Africaine</option>
					<option value="comores">Comores</option>
					<option value="republiqueDemocratiqueDuCongo">République Démocratique Du Congo</option>
					<option value="congo">Congo</option>
					<option value="coteIvoire">Côte d'Ivoire</option>
					<option value="djibouti">Djibouti</option>
					<option value="egypte">Égypte</option>
					<option value="ethiopie">Éthiopie</option>
					<option value="erythrée">Érythrée</option>
					<option value="gabon">Gabon</option>
					<option value="gambie">Gambie</option>
					<option value="ghana">Ghana</option>
					<option value="guinee">Guinée</option>
					<option value="guinee-Bisseau">Guinée-Bisseau</option>
					<option value="guineeEquatoriale">Guinée Équatoriale</option>
					<option value="kenya">Kenya</option>
					<option value="lesotho">Lesotho</option>
					<option value="liberia">Liberia</option>
					<option value="libye">Libye</option>
					<option value="madagascar">Madagascar</option>
					<option value="malawi">Malawi</option>
					<option value="mali">Mali</option>
					<option value="maroc">Maroc</option>
					<option value="maurice">Maurice</option>
					<option value="mauritanie">Mauritanie</option>
					<option value="mozambique">Mozambique</option>
					<option value="namibie">Namibie</option>
					<option value="niger">Niger</option>
					<option value="nigeria">Nigeria</option>
					<option value="ouganda">Ouganda</option>
					<option value="rwanda">Rwanda</option>
					<option value="saoTomeEtPrincipe">Sao Tomé-et-Principe</option>
					<option value="senegal">Séngal</option>
					<option value="seychelles">Seychelles</option>
					<option value="sierra">Sierra</option>
					<option value="somalie">Somalie</option>
					<option value="soudan">Soudan</option>
					<option value="swaziland">Swaziland</option>
					<option value="tanzanie">Tanzanie</option>
					<option value="tchad">Tchad</option>
					<option value="togo">Togo</option>
					<option value="tunisie">Tunisie</option>
					<option value="zambie">Zambie</option>
					<option value="zimbabwe">Zimbabwe</option>
				</optgroup>
				<optgroup label="Océanie">
					<option value="australie">Australie</option>
					<option value="fidji">Fidji</option>
					<option value="kiribati">Kiribati</option>
					<option value="marshall">Marshall</option>
					<option value="micronesie">Micronésie</option>
					<option value="nauru">Nauru</option>
					<option value="nouvelleZelande">Nouvelle-Zélande</option>
					<option value="palaos">Palaos</option>
					<option value="papouasieNouvelleGuinee">Papouasie-Nouvelle-Guinée</option>
					<option value="salomon">Salomon</option>
					<option value="samoa">Samoa</option>
					<option value="tonga">Tonga</option>
					<option value="tuvalu">Tuvalu</option>
					<option value="vanuatu">Vanuatu</option>
				</optgroup>
			</select>
		</div>
		
		<div>
			<label for="ville_depart"> Ville de départ :</label>
			<input type="text" name="ville_depart" placeholder="Bordeaux"/>
		</div>
	</fieldset>
		
	<fieldset>
		<legend>Arrivée</legend>
		<div>
			<!-- on a la liste déroulante de tous les pays -->
			<label for="pays_arrivee">Pays d'arrivée : </label>
			<select name="pays_arrivee">
				<optgroup label="Europe">
					<option value="allemagne">Allemagne</option>
					<option value="albanie">Albanie</option>
					<option value="andorre">Andorre</option>
					<option value="autriche">Autriche</option>
					<option value="bielorussie">Biélorussie</option>
					<option value="belgique">Belgique</option>
					<option value="bosnieHerzegovine">Bosnie-Herzégovine</option>
					<option value="bulgarie">Bulgarie</option>
					<option value="croatie">Croatie</option>
					<option value="danemark">Danemark</option>
					<option value="espagne">Espagne</option>
					<option value="estonie">Estonie</option>
					<option value="finlande">Finlande</option>
					<option value="france">France</option>
					<option value="grece">Grèce</option>
					<option value="hongrie">Hongrie</option>
					<option value="irlande">Irlande</option>
					<option value="islande">Islande</option>
					<option value="italie">Italie</option>
					<option value="lettonie">Lettonie</option>
					<option value="liechtenstein">Liechtenstein</option>
					<option value="lituanie">Lituanie</option>
					<option value="luxembourg">Luxembourg</option>
					<option value="exRepubliqueYougoslaveDeMacedoine">Ex-République Yougoslave de Macédoine</option>
					<option value="malte">Malte</option>
					<option value="moldavie">Moldavie</option>
					<option value="monaco">Monaco</option>
					<option value="norvege">Norvège</option>
					<option value="paysBas">Pays-Bas</option>
					<option value="pologne">Pologne</option>
					<option value="portugal">Portugal</option>
					<option value="roumanie">Roumanie</option>
					<option value="royaumeUni">Royaume-Uni</option>
					<option value="russie">Russie</option>
					<option value="saintMarin">Saint-Marin</option>
					<option value="serbieEtMontenegro">Serbie-et-Monténégro</option>
					<option value="slovaquie">Slovaquie</option>
					<option value="slovenie">Slovénie</option>
					<option value="suede">Suède</option>
					<option value="suisse">Suisse</option>
					<option value="republiqueTcheque">République Tchèque</option>
					<option value="ukraine">Ukraine</option>
					<option value="vatican">Vatican</option>
				</optgroup>
				<optgroup label="Amérique">
					<option value="antiguaEtBarbuda">Antigua-et-Barbuda</option>
					<option value="argentine">Argentine</option>
					<option value="bahamas">Bahamas</option>
					<option value="barbade">Barbade</option>
					<option value="belize">Belize</option>
					<option value="bolivie">Bolivie</option>
					<option value="bresil">Brésil</option>
					<option value="canada">Canada</option>
					<option value="chili">Chili</option>
					<option value="colombie">Colombie</option>
					<option value="costaRica">Costa Rica</option>
					<option value="cuba">Cuba</option>
					<option value="republiqueDominicaine">République Dominicaine</option>
					<option value="dominique">Dominique</option>
					<option value="equateur">Équateur</option>
					<option value="etatsUnis">États Unis</option>
					<option value="grenade">Grenade</option>
					<option value="guatemala">Guatemala</option>
					<option value="guyana">Guyana</option>
					<option value="haiti">Haïti</option>
					<option value="honduras">Honduras</option>
					<option value="jamaique">Jamaïque</option>
					<option value="mexique">Mexique</option>
					<option value="nicaragua">Nicaragua</option>
					<option value="panama">Panama</option>
					<option value="paraguay">Paraguay</option>
					<option value="perou">Pérou</option>
					<option value="saintCristopheEtNieves">Saint-Cristophe-et-Niévès</option>
					<option value="sainteLucie">Sainte-Lucie</option>
					<option value="saintVincentEtLesGrenadines">Saint-Vincent-et-les-Grenadines</option>
					<option value="salvador">Salvador</option>
					<option value="suriname">Suriname</option>
					<option value="triniteEtTobago">Trinité-et-Tobago</option>
					<option value="uruguay">Uruguay</option>
					<option value="venezuela">Venezuela</option>
				</optgroup>
					<optgroup label="Asie">
					<option value="afghanistan">Afghanistan</option>
					<option value="arabieSaoudite">Arabie Saoudite</option>
					<option value="armenie">Arménie</option>
					<option value="azerbaidjan">Azerbaïdjan</option>
					<option value="bahrein">Bahreïn</option>
					<option value="bangladesh">Bangladesh</option>
					<option value="bhoutan">Bhoutan</option>
					<option value="birmanie">Birmanie</option>
					<option value="brunei">Brunéi</option>
					<option value="cambodge">Cambodge</option>
					<option value="chine">Chine</option>
					<option value="coreeDuSud">Corée Du Sud</option>
					<option value="coreeDuNord">Corée Du Nord</option>
					<option value="emiratsArabeUnis">Émirats Arabe Unis</option>
					<option value="georgie">Géorgie</option>
					<option value="inde">Inde</option>
					<option value="indonesie">Indonésie</option>
					<option value="iraq">Iraq</option>
					<option value="iran">Iran</option>
					<option value="israel">Israël</option>
					<option value="japon">Japon</option>
					<option value="jordanie">Jordanie</option>
					<option value="kazakhstan">Kazakhstan</option>
					<option value="kirghistan">Kirghistan</option>
					<option value="koweit">Koweït</option>
					<option value="laos">Laos</option>
					<option value="liban">Liban</option>
					<option value="malaisie">Malaisie</option>
					<option value="maldives">Maldives</option>
					<option value="mongolie">Mongolie</option>
					<option value="nepal">Népal</option>
					<option value="oman">Oman</option>
					<option value="ouzbekistan">Ouzbékistan</option>
					<option value="pakistan">Pakistan</option>
					<option value="philippines">Philippines</option>
					<option value="qatar">Qatar</option>
					<option value="singapour">Singapour</option>
					<option value="sriLanka">Sri Lanka</option>
					<option value="syrie">Syrie</option>
					<option value="tadjikistan">Tadjikistan</option>
					<option value="taiwan">Taïwan</option>
					<option value="thailande">Thaïlande</option>
					<option value="timorOriental">Timor oriental</option>
					<option value="turkmenistan">Turkménistan</option>
					<option value="turquie">Turquie</option>
					<option value="vietNam">Viêt Nam</option>
					<option value="yemen">Yemen</option>
				</optgroup>
				<optgroup label="Afrique">
					<option value="afriqueDuSud">Afrique Du Sud</option>
					<option value="algerie">Algérie</option>
					<option value="angola">Angola</option>
					<option value="benin">Bénin</option>
					<option value="botswana">Botswana</option>
					<option value="burkina">Burkina</option>
					<option value="burundi">Burundi</option>
					<option value="cameroun">Cameroun</option>
					<option value="capVert">Cap-Vert</option>
					<option value="republiqueCentre-Africaine">République Centre-Africaine</option>
					<option value="comores">Comores</option>
					<option value="republiqueDemocratiqueDuCongo">République Démocratique Du Congo</option>
					<option value="congo">Congo</option>
					<option value="coteIvoire">Côte d'Ivoire</option>
					<option value="djibouti">Djibouti</option>
					<option value="egypte">Égypte</option>
					<option value="ethiopie">Éthiopie</option>
					<option value="erythrée">Érythrée</option>
					<option value="gabon">Gabon</option>
					<option value="gambie">Gambie</option>
					<option value="ghana">Ghana</option>
					<option value="guinee">Guinée</option>
					<option value="guinee-Bisseau">Guinée-Bisseau</option>
					<option value="guineeEquatoriale">Guinée Équatoriale</option>
					<option value="kenya">Kenya</option>
					<option value="lesotho">Lesotho</option>
					<option value="liberia">Liberia</option>
					<option value="libye">Libye</option>
					<option value="madagascar">Madagascar</option>
					<option value="malawi">Malawi</option>
					<option value="mali">Mali</option>
					<option value="maroc">Maroc</option>
					<option value="maurice">Maurice</option>
					<option value="mauritanie">Mauritanie</option>
					<option value="mozambique">Mozambique</option>
					<option value="namibie">Namibie</option>
					<option value="niger">Niger</option>
					<option value="nigeria">Nigeria</option>
					<option value="ouganda">Ouganda</option>
					<option value="rwanda">Rwanda</option>
					<option value="saoTomeEtPrincipe">Sao Tomé-et-Principe</option>
					<option value="senegal">Séngal</option>
					<option value="seychelles">Seychelles</option>
					<option value="sierra">Sierra</option>
					<option value="somalie">Somalie</option>
					<option value="soudan">Soudan</option>
					<option value="swaziland">Swaziland</option>
					<option value="tanzanie">Tanzanie</option>
					<option value="tchad">Tchad</option>
					<option value="togo">Togo</option>
					<option value="tunisie">Tunisie</option>
					<option value="zambie">Zambie</option>
					<option value="zimbabwe">Zimbabwe</option>
				</optgroup>
				<optgroup label="Océanie">
					<option value="australie">Australie</option>
					<option value="fidji">Fidji</option>
					<option value="kiribati">Kiribati</option>
					<option value="marshall">Marshall</option>
					<option value="micronesie">Micronésie</option>
					<option value="nauru">Nauru</option>
					<option value="nouvelleZelande">Nouvelle-Zélande</option>
					<option value="palaos">Palaos</option>
					<option value="papouasieNouvelleGuinee">Papouasie-Nouvelle-Guinée</option>
					<option value="salomon">Salomon</option>
					<option value="samoa">Samoa</option>
					<option value="tonga">Tonga</option>
					<option value="tuvalu">Tuvalu</option>
					<option value="vanuatu">Vanuatu</option>
				</optgroup>
			</select>
		</div>
		
		<div>
			<label for="ville_arrivee"> Ville d'arrivée :</label>
			<input type="text" name="ville_arrivee" placeholder="Bordeaux"/>
		</div>
	</fieldset>

	<fieldset>
		<legend>Temps de voyage</legend>
		<div>
			<label for="date_depart"> Date de départ :</label>
			<input type="date" name="date_depart"/>
		</div>
		
		<div>
			<label for="duree"> Durée du voyage:</label>
			<input type="text" name="duree" placeholder="2 semaines"/>
		</div>
	</fieldset>
	
	<fieldset>
		<legend>Caractéristiques </legend>
		<div>
			<label for="nb_base"> Nombre organisateurs:</label>
			<input type="text" name="nb_base" placeholder="2"/>
		</div>
		
		<div>
			<label for="nb_participants"> Nombre de places:</label>
			<input type="text" name="nb_participants" placeholder="2"/>
		</div>
		
		<div>
			<label for="description"> Décrivez vous </label>
			<textarea name="description" rows="10" cols="50" placeholder="Donnez les étapes prévues. Donnez des détails sur votre voyage, décrivez ce que vous voulez faire d'autre, quelles sont vos envies. " ></textarea>
		</div>
		
		<div>
			<!-- liste déroulante de tous les objectifs pour le choix de 3 objectifs et un champ texte pour un 4eme si nécessaire -->
			<label for="objectifs">Objectifs : </label>
			<select name="objectif1">
				<optgroup label="Détente">
					<option value="bronzer">Bronzer</option>
					<option value="plages">Plages</option>
					<option value="spa">Spa</option>
					<option value="familles">En famille</option>
					<option value="nature">Nature</option>
				</optgroup>
				<optgroup label="Découverte">
					<option value="monuments">Monuments</option>
					<option value="rencontres">Rencontres</option>
					<option value="animaux">Animaux</option>
					<option value="paysages">Paysages</option>
				</optgroup>
				<optgroup label="Culture">
					<option value="musées">Musées</option>
					<option value="art">Art</option>
					<option value="expositions">Expositions</option>
					<option value="photos">Photos</option>
					<option value="apprendre">Apprendre</option>
				</optgroup>
				<optgroup label="Loisirs">
					<option value="fêtes">Fêtes</option>
					<option value="mode">Mode</option>
					<option value="rencontres">Rencontres</option>
					<option value="social">Social</option>
				</optgroup>
				<optgroup label="Sport">
					<option value="randonnées">Randonnées</option>
					<option value="plongée">Plongée</option>
					<option value="vélo">Velo</option>
				</optgroup>
				<optgroup label="Budget">
					<option value="petit budget">Petit budget</option>
					<option value="confort">Confort</option>
					<option value="luxe">Luxe</option>
				</optgroup>
				<optgroup label="Gastronomie">
					<option value="dégustation">Dégustation</option>
					<option value="vins">Vins</option>
					<option value="bieres">Bières</option>
					<option value="thé">Thé</option>
					<option value="café">Café</option>
					<option value="fromages">Fromages</option>
					<option value="plats typiques">Plats typiques</option>
				</optgroup>	
			</select>
			<select name="objectif2">
				<optgroup label="Détente">
					<option value="bronzer">Bronzer</option>
					<option value="plages">Plages</option>
					<option value="spa">Spa</option>
					<option value="familles">En famille</option>
					<option value="nature">Nature</option>
				</optgroup>
				<optgroup label="Découverte">
					<option value="monuments">Monuments</option>
					<option value="rencontres">Rencontres</option>
					<option value="animaux">Animaux</option>
					<option value="paysages">Paysages</option>
				</optgroup>
				<optgroup label="Culture">
					<option value="musées">Musées</option>
					<option value="art">Art</option>
					<option value="expositions">Expositions</option>
					<option value="photos">Photos</option>
					<option value="apprendre">Apprendre</option>
				</optgroup>
				<optgroup label="Loisirs">
					<option value="fêtes">Fêtes</option>
					<option value="mode">Mode</option>
					<option value="rencontres">Rencontres</option>
					<option value="social">Social</option>
				</optgroup>
				<optgroup label="Sport">
					<option value="randonnées">Randonnées</option>
					<option value="plongée">Plongée</option>
					<option value="vélo">Velo</option>
				</optgroup>
				<optgroup label="Budget">
					<option value="petit budget">Petit budget</option>
					<option value="confort">Confort</option>
					<option value="luxe">Luxe</option>
				</optgroup>
				<optgroup label="Gastronomie">
					<option value="dégustation">Dégustation</option>
					<option value="vins">Vins</option>
					<option value="bieres">Bières</option>
					<option value="thé">Thé</option>
					<option value="café">Café</option>
					<option value="fromages">Fromages</option>
					<option value="plats typiques">Plats typiques</option>
				</optgroup>	
			</select>
			<select name="objectif3">
				<optgroup label="Détente">
					<option value="bronzer">Bronzer</option>
					<option value="plages">Plages</option>
					<option value="spa">Spa</option>
					<option value="familles">En famille</option>
					<option value="nature">Nature</option>
				</optgroup>
				<optgroup label="Découverte">
					<option value="monuments">Monuments</option>
					<option value="rencontres">Rencontres</option>
					<option value="animaux">Animaux</option>
					<option value="paysages">Paysages</option>
				</optgroup>
				<optgroup label="Culture">
					<option value="musées">Musées</option>
					<option value="art">Art</option>
					<option value="expositions">Expositions</option>
					<option value="photos">Photos</option>
					<option value="apprendre">Apprendre</option>
				</optgroup>
				<optgroup label="Loisirs">
					<option value="fêtes">Fêtes</option>
					<option value="mode">Mode</option>
					<option value="rencontres">Rencontres</option>
					<option value="social">Social</option>
				</optgroup>
				<optgroup label="Sport">
					<option value="randonnées">Randonnées</option>
					<option value="plongée">Plongée</option>
					<option value="vélo">Velo</option>
				</optgroup>
				<optgroup label="Budget">
					<option value="petit budget">Petit budget</option>
					<option value="confort">Confort</option>
					<option value="luxe">Luxe</option>
				</optgroup>
				<optgroup label="Gastronomie">
					<option value="dégustation">Dégustation</option>
					<option value="vins">Vins</option>
					<option value="bieres">Bières</option>
					<option value="thé">Thé</option>
					<option value="café">Café</option>
					<option value="fromages">Fromages</option>
					<option value="plats typiques">Plats typiques</option>
				</optgroup>	
			</select>
			<input type="text" name="objectif4" placeholder="Autre"/>
		</div>
		
	</fieldset>
	<div class="control-group">
		<div class="controls">
			<button class="btn btn-primary" id="bouton_inscription">Valider</button>
		</div>
	</div>
</form>
<?php
include "pied.php";
?>