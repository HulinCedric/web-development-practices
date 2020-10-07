/*******************************************************
				* CALENDRIER *
* par Cédric Hulin (hulin.cedric@gmail.com) (26/04/2009) *
********************************************************
* Ce script permet de choisir un mois et une annee en *
* particulier, afin d'afficher dynamiquement le *
* calendrier correspondant. Par defaut c'est celui du *
* mois courant qui s'affiche. Note : la 1ere semaine *
* de l'annee commence le 1er lundi. *
* *
* MODIFICATIONS NECESSAIRES POUR PORTAGE VERS D'AUTRES *
* NAVIGATEURS : N'A ETE TESTE QUE SOUS Macintosh *
* Safari *
*******************************************************/
var HTMLCode = "";
var DaysList = new Array("Jour_Vide", "Lun", "Mar", "Mer", "Jeu", "Ven", "Sam", "Dim");
var MonthsList = new Array("Mois_Vide", "Janvier", "F&eacute;vrier", "Mars", "Avril", "Mai", "Juin", "Juillet", "Ao&ucirc;t", "Septembre", "Octobre", "Novembre", "D&eacute;cembre");
var MonthLength = new Array("Mois_longueur_vide",31,29,31,30,31,30,31,31,30,31,30,31);

var QueryDate = 0; /* Jour demande (date)*/
var QueryMonth = 0; /* Mois demande*/
var QueryYear = 0; /* Annee demandee*/
var QueryDay = 0; /* Jour de la semaine du jour demande, inconnu*/
var FirstDay = 0; /* Jour de la semaine du 1er jour du mois*/
var WeekRef = 0; /* Numerotation des semaines*/
var WeekOne = 0; /* Numerotation des semaines*/

var Today = new Date();
var TodaysYear = Today.getYear();
var TodaysMonth = Today.getMonth() + 1;
var TodaysDate = Today.getDate();
var TodaysDay = Today.getDay() + 1;
if (TodaysYear < 2000) { TodaysYear += 1900; }

/* On commence par verifier les donnees fournies par l'utilisateur*/
function CheckData()
{
QueryDate = document.Cal.Date.selectedIndex + 1;
QueryMonth = document.Cal.Month.selectedIndex + 1;
QueryYear = (document.Cal.Century.selectedIndex + 15) * 100 + document.Cal.Year.selectedIndex;
MonthLength[2] = CheckLeap(QueryYear);

/* on teste si la date choisie est anterieure au lundi 20 decembre 1582*/
if ((QueryYear * 10000 + QueryMonth * 100 + QueryDate) < 15821220)
{
alert("Vous avez choisi une date ant\351rieure au 20 d\351cembre 1582, hors du calendrier Gr\351gorien. \nVeuillez s\351lectionner une date plus r\351cente.");
document.Cal.reset();
CheckData();
}
else if (MonthLength[QueryMonth] < QueryDate) /* on verifie si la date est coherente*/
{
alert("Il n'y a pas " + QueryDate + " jours en " + MonthsList[QueryMonth] + " " + QueryYear + " mais " + MonthLength[QueryMonth] + ". \nVeuillez choisir une autre date.");
document.Cal.reset();
CheckData();
}
else { DisplaySchedule(); }

}
/* Teste une annee pour determiner si elle est bissextile ou pas*/
function CheckLeap(yy)
{
if ((yy % 100 != 0 && yy % 4 == 0) || (yy % 400 == 0)) { return 29; }
else { return 28; }
}

/* Renvoie le numero de la semaine correspondant a la date requise*/
function DefWeekNum(dd)
{
numd = 0;
numw = 0;
for (n=1; n<QueryMonth; n++)
{
numd += MonthLength[n];
}
numd = numd + dd - (9 - DefDateDay(QueryYear,1,1));
numw = Math.floor(numd / 7) + 1;

if (DefDateDay(QueryYear,1,1) == 1) { numw++; }
return numw;
}

/* Renvoie le numero du jour de la semaine correspondant a la date requise */
function DefDateDay(yy,mm,dd)
{
return Math.floor((Date2Days(yy,mm,dd)-2) % 7) + 1;
}

/* Transforme la date en nb de jours theoriques */
function Date2Days(yy,mm,dd)
{
if (mm > 2)
{
var bis = Math.floor(yy/4) - Math.floor(yy/100) + Math.floor(yy/400);
var zy = Math.floor(yy * 365 + bis);
var zm = (mm-1) * 31 - Math.floor(mm * 0.4 + 2.3);
return (zy + zm + dd);
}
else
{
var bis = Math.floor((yy-1)/4) - Math.floor((yy-1)/100) + Math.floor((yy-1)/400);
var zy = Math.floor(yy * 365 + bis);
return (zy + (mm-1) * 31 + dd);
}
}

/* Produit le code HTML qui formera le calendrier */
function DisplaySchedule()
{
HTMLCode = "<table cellspacing=0 cellpadding=3 border=3 bgcolor=purple bordercolor=#000033>";
QueryDay = DefDateDay(QueryYear,QueryMonth,QueryDate);
WeekRef = DefWeekNum(QueryDate);
WeekOne = DefWeekNum(1);
HTMLCode += "<tr align=center><td colspan=8 class=Titre><b>" + MonthsList[QueryMonth] + " " + QueryYear + "</b></td></tr><tr align=center>";

for (s=1; s<8; s++)
{
if (QueryDay == s) { HTMLCode += "<td><b><font color=#ff0000>" + DaysList[s] + "</font></b></td>"; }
else { HTMLCode += "<td><b>" + DaysList[s] + "</b></td>"; }
}

HTMLCode += "<td><b><font color=#888888>Sem</font></b></td></tr>";
a = 0;

for (i=(1-DefDateDay(QueryYear,QueryMonth,1)); i<MonthLength[QueryMonth]; i++)
{
HTMLCode += "<tr align=center>";
for (j=1; j<8; j++)
{
if ((i+j) <= 0) { HTMLCode += "<td>&nbsp;</td>"; }
else if ((i+j) == QueryDate) { HTMLCode += "<td><b><font color=#ff0000>" + (i+j) + "</font></b></td>"; }
else if ((i+j) > MonthLength[QueryMonth]) { HTMLCode += "<td>&nbsp;</td>"; }
else { HTMLCode += "<td>" + (i+j) + "</td>"; }
}

if ((WeekOne+a) == WeekRef) { HTMLCode += "<td><b><font color=#00aa00>" + WeekRef + "</font></b></td>"; }
else { HTMLCode += "<td><font color=#888888>" + (WeekOne+a) + "</font></td>"; }
HTMLCode += "</tr>";
a++;
i = i + 6;
}

Calendrier.innerHTML = HTMLCode + "</table>";
}