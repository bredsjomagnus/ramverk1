---
title: "Redovisningar | maaa16"
...
Redovisningar
=========================

Redovisningar av kursmoment Ramverk1.

---

*2017-08-21*
###KMOM01
####Gör din egen kunskapsinventering baserat på PHP The Right Way, berätta om dina styrkor och svagheter som du vill förstärka under det kommande året.
Måste först säga att jag tyckte mycket om *PHP The Right Way*. Den var övergripande och pedagogisk med möjlighet att kolla vidare på djupet.

När det kommer till min egna kunskapsinventering så har jag svårt att tala om styrkor och svagheter. Det finns så mycket att lära att det är svårt att peka ut en riktning. Det fanns en del man känner igen på sidan, så klart. Tur är väl det. Men även om man har arbetat en hel del med PHP nu, så visar *PHP The Right Way* hur mycket man har kvar.

Jag kommer, som sagt, inte kunna peka ut delar som kan läggas till önskelista att förstärka. Snarare vill jag få så pass mycket säkerhet inom det nu rådande sättet att arbeta, så att man kan få en tjänst utan att göra bort sig mer än nödvändigt den först tiden.

####Vilket blev resultatet från din mini-undersökning om vilka ramverk som för närvarande är mest populära inom PHP (ange källa var du fann informationen)?
Jag kollade runt lite och Laravel verkar vara den stora vinnaren ([artikel](https://coderseye.com/best-php-frameworks-for-web-developers/)). Av 7,500 svar i undersökning använde 43,7 % Laravel. Det är en rätt övertygande majoritet.

Man kan även ana att så är fallet om man kikar i på codeschool som lagt upp en [Laravelkurs](https://www.codeschool.com/courses/try-laravel) - ett litet tecken på dess popularitet.

####Berätta om din syn/erfarenhet generellt kring communities och specifikt communities inom opensource och programmeringsdomänen.
Jag har väldigt lite erfarenhet av dessa communities. Rättare sagt ingen erfarenhet alls. Jag har enbart agerat användare. Aldrig deltagare.

Men som användare tycker jag opensource är utmärkt. Inte av politiska skäl, utan för att om det är populärt med många användare och många som bidrar kan det bli hur bra som helst.

Skall man ha en chans att vara aktiv och bidra behöver man mer på fötterna än vad jag har/(haft?).

####Vad tror du om begreppet “en ramverkslös värld” som framfördes i videon?
Visst skulle det vara skönt att inte behöva lära sig ytterligare ett nytt ramverk. Men den decentraliserade utveckling som råder gör det till en utopi. Sen kan man säkert nå en bit med standardisering, om den blir populär. Det kan ju 'tvinga in' andra att utgå från samma principer om tillräckligt många tar till sig denna standard.

####Hur gick dina förberedelser inför kommentarsystemet?
Har börjar kolla och jämföra olika kommentarsystem. Vad man bör ha med och vilka vägar man kan gå. Försöker reda ut alternativen och vad de kan innebära - vad som krävs beroende på vilken väg jag väljer att gå. Just nu lutar det åt någon form av system med hierarki för att inte bara kommentera ett inlägg utan att svara andra användares svar. Detta skall då, i sådana fall, även representeras visuellt. Så som man har på Twitter exempelvis. Där syns det med en linje som sammanbinder användare som skriver inlägg till varandra. Annat sätt är den klassiska indenteringen under det inlägg man svarar på. Får se vad det blir. Men processen är igång.

Den svåra biten är att egentligen förstå hur. Vad är MVC och hur programmerar man enligt den modellen? Vad är en modell, vad är en controller och så vidare. Innan jag får mer klarhet i vad det innebär och är blir det bara väldigt skissartat. Men tankarna har satts igång i vilket fall.

---

*2017-09-02*

###KMOM02

####Vilka tidigare erfarenheter har du av MVC? Gick arbetet bra med artikeln om MVC?
Detta är nytt för mig. Har kollat runt lite och läst lite i forum, inlägg, artiklar och annat och börjar nog får mer kolla på läget dock. Tänkte först att man hade en controller och att $app agerade som controller. Men förstår att så inte är fallet. Har försökt, med remservern som mall, göra även en admindel och kommentardelen med controller och modullager. Även login, men att det inte blev så bra. Där stannade jag halvvägs. Låter det vara som det är nu och ser om jag backar eller går vidare med det senare.

####Kom du fram till vad begreppet SOLID innebar och vilka källor använde du? Kan du förklara SOLID på ett par rader med dina egna ord?
Tyckte videoklippet bitvis var lite för snabbt och lite för mycket. Men man fick ändå en hyfsad förklaring på vad SOLID är. Kollade även runt lite och fann då denna [artikel](https://scotch.io/bar-talk/s-o-l-i-d-the-first-five-principles-of-object-oriented-design) om SOLID. Den förklarade med några klargörande exempel.

SOLID skall göra koden lättare att underhålla och möjlig att lätt bygga ut.

- S - Enbart ett problem för en klass. Likt commentary controllern ser till att sammanbinda. Medan Commentary anterar data och commentaryAssembler ser till att skapa ett output i form av tabeller.
- O - Eftersträva möjlighet att lägga till vilket kan göras med interfaces som ser till att klasser fyller kraven för att göra detta möjligt. Man bör välja interface framför extend.
- L - Subklasser skall matcha deras föräldrar vad gäller metoderna. Så att exempelvis klasserna returnerar samma datatyp.
- I - Interfaces skall enbart ha metoder som kommer användas. Bättre att dela upp i fler interfaces än att lägga ihop i ett stort.
- D - Istället för att göra klasser beroende av andra klasser använder man interfaces och koden blir mer fristående.

####Gick arbetet med REM servern bra och du lyckades integrera den i din me-sida?
Det tycker jag. Denna delen var viktigt för min förståelse av MVC och hur jag kunde gå vidare med kommentarsmodulen. Det som krånglade lite var att det krockade när sessionen startade för min login-funktion. Men med hjälp och guidning i gitter så löste sig även det. Valde bland annat på grund av detta att inte använda session till en början i kommentarsmodulen. Satte igång med databas direkt.

####Berätta om arbetet med din kommentarsmodul, hur långt har du kommit och hur tänker du?
I nu läget har jag en testroute med en 'artikel' som kan kommenteras. Man måste vara inloggad för att kommentera. Man kan redigera sina egna kommentarer och gör man det kommer det synas under att kommentaren blivit redigerad med datum för redigeringen. Det är även möjligt att helt ta bort kommentaren.

Man kan även gilla andras kommentarer och antalet gillande markeras med siffra strax under kommentaren.

En admin kan via sin accountsida nå admingränssnittet och där se lagda kommentarer. Där har admin möjlighet att redigera och/eller helt ta bort lagda kommentarer. Funderar på att lägga in så att det syns specifikt när det är admin som redigerar en kommentar till skillnad från när användaren själv gör det.

Hade även ambitionen att lägga in så man kan svara på andras kommentarer. Men det får bli längre fram.


---

*2017-09-18*

###KMOM03

####Hur känns det att jobba med begreppen kring dependency injection, service locator och lazy loading?
Som med det mesta nytt som kommer in och gör att man måste lära om saker man börjat få lite kolla på så reagerar jag först med grymtningar och fraser som "varför då" och "vad skall det där vara bra för". Men jag tycker, nu när refactoringen är klar, att det blev smidigare med di.php istället för service.php. Detta och att dela upp i contollers och moduler känns som en strukrur som ger en bra överblick och är lättare att ändra, ta bort eller lägga till i. Det är "bara" att jacka in klasser och med MVC i kombination kan man lättare ändra utan att behöva skriva om i andra klasser.
####Hur känns det att göra dig av med beroendet till $app, blir $di bättre?
Att det samlas kring just $di istället gör ingen större skillnad i sig. Men, som jag skrev ovan, är det en stor skillnad i hanterbarheten. Gillar verligen konfigurerbarheten och hur smidigt det är att arbeta med. Man kan lätt lägga till eller ta bort delar på detta sätt. Använder detta nu i individuella projektet och kan på ett enkelt och smidigt sätt lägga till delar från tidigare kod och få tiden över till nya och för mig mer tekniskt utmanande delar.
####Hur känns det att återigen göra refaktoring på din me-sida, blir det förbättringar på kodstrukturen, eller bara annorlunda?
Nuddade lite vid det innan. Det tar emot. Just denna gång lyckades jag trassla till det extra mycket och kunde inte för mitt liv få till databasen efter refaktoreringen. Tackar för allt hjälp jag fick att lösa det. Det är så många delar som hänger ihop. Så många filer som kräver varandra att det är alltför lätt att missa en del i kedjan och allt stannar upp. Sen kommer en osäkerhetsfaktor in vad gäller exemeplvis om det skall vara shared: true eller shared: false. Det blir lite att testa sig fram och hålla tummarna att nästa försök blir lyckat. Kan, om det drar ut på tiden, vara väldigt tålamodskrävande och frustrerande. Men när jag nu kommit igenom denna refaktorering tycker jag att det blev bättre.
####Lyckades du införa begreppen kring DI när du vidareutvecklade ditt kommentarssystem?
Ja. Nu finns beroende till $di istället. Det behöver dock renodlas mer vad gäller MVC och är något jag kommer ta tag i allteftersom i framtida kmoms. Har upptäckt några $app ute i vyer som jag måste arbeta bort.
####Påbörjade du arbetet (hur gick det) med databasmodellen eller avvaktar du till kommande kmom?
Jag lade till databas i kmom02 och har därmed startat upp med detta. Men tror säker att det kommer bli en hel del förändringar från hur det ser ut idag. Det var inte det lättaste att få till refaktoriseringen med just databasen. Tyckte att det gick smidigare än man kan förtjäna till en böjan. Men det tog fleratalet försök och dagar innan jag återigen kunde kommentera eller logga in.
####Allmänna kommentare kring din me-sida och dess kodstruktur?
Det har gått från att ha upplevt total förvirring vad gäller MVC till att äntligen fått en förståelse och framför allt sett vinsten med en sådan struktur. Det finns mer renodling att göra innan jag är helt framme. Men som jag förstått det kommer det mer refaktoring längre fram och strukturarbetet kommer vara något ständigt pågående. Allt nytt görs på nya sättet. Allt gammalt skall struktureras om efterhand.


---

*2017-09-24*

###KMOM04

####Hur gick det att integrera formulärhantering och databashantering i ditt kommentarssystem?

####Berätta om din syn på Active record och liknande upplägg, ser du fördelar och nackdelar?

####Utveckla din syn på koden du nu har i ramverket och din kommentars- och användarkod. Hur känns det?

####Om du vill, och har kunskap om, kan du även berätta om din syn på ORM och designmönstret Data Mapper som är närbesläktade med Active Record. Du kanske har erfarenhet av likande upplägg i andra sammanhang?

####Vad tror du om begreppet scaffolding, kan det vara något att kika mer på?
