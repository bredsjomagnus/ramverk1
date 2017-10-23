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
Både och kan man säga. Jag hade ju en databas integrerad sedan förut (hoppade session i kmom02 och gick direkt till databas). Det blev lösningen att lägga till det nya med active record för 'böcker' och 'innehåll'. 'Innehåll' är artiklar som kan läggas till via admingränssnittet som sedan kan kommenteras.

Men jag tyckte om det nya sättet med Active Record. Även HTMLForm var skönt att använda. Man får en bättre överblick och det blir snabbare att både redigera och skapa nytt. Kommer nog använda både och i individuella projektet.

####Berätta om din syn på Active record och liknande upplägg, ser du fördelar och nackdelar?
Det kan vara rätt så frustrerande att för tusende gången behöva connecta mot databas mm för att ställa en fråga. Med Active Record blir det både renare och snabbare. Det är ett väldigt skönt sätt att arbeta på. Men samtidigt har jag, förmodligen pga ovanan, inte lyckats göra allt jag ville på detta sätt. Har fått gå vanliga vägen när frågorna blir lite mer komplicerade än vanligt. Det kanske kan ses som en nackdel. Men jag har heller inte full koll på hur jag formulerar mig via det systemet som vi använder ännu. Så vad som beror på vad får jag nog låta vara osägt i nuläget.

####Utveckla din syn på koden du nu har i ramverket och din kommentars- och användarkod. Hur känns det?
Det känns verkligen som att koden utvecklats. Den är lite av en blandning nu, av nytt och gammalt. Har lovat mig själv att städa lite efter hand.

När jag satte igång med artiklarna som skall kommenteras hade jag en helt annan struktur, ett annat tänk och tillvägagångssätt, mot vid första kmom. Det skulle vara skönt om tiden fanns att gå tillbaka och skriva om. Det kan behövas.

Som det ser ut nu har jag artiklarna via databasen. Dessa skapas i admingränssnittet. Den slug som då blir av titlen på artikeln används som path, article/articleslug. När sidan laddas visas artikel följt av form för ny kommentar, därefter kommer kommentarer som är knutna till just den artikeln. Man kan redigera egna kommentarer och gilla andras (en gång). Ännu har jag inte lagt in att man kan svara på varandras kommentarer. Lyssnade på rådet att inte lägga in för många funktioner i detta läge. Får se om det kan bli längre fram istället.

####Om du vill, och har kunskap om, kan du även berätta om din syn på ORM och designmönstret Data Mapper som är närbesläktade med Active Record. Du kanske har erfarenhet av likande upplägg i andra sammanhang?
Det jag kommer ihåg att jag tyckte mycket om ORM som vi använde i Python förut. Det blir mycket mer lätthanterligt och överblickbart. Det är, enligt min mening, helt klart att föredra att använda ORM eller Active Record.

####Vad tror du om begreppet scaffolding, kan det vara något att kika mer på?
Absolut. Det gör det ju väldigt smidigt. Tänker på hur snabbt vi med det kan få fram fungerande Anaxsidor. Något som kan ta sin lilla tid i vanliga fall är nu klart på några sekunder. Skulle gärna lära mig mer om detta.

---

*2017-10-04*

###KMOM05
####Hur gick arbetet med att lyfta ut koden ur me-sidan och placera i en egen modul?
Det var inte helt enkelt och jag fick göra om och göra rätt fyra gånger innan det fungerade. Dels har jag behov av flera moduler för att få det att fungera. Dels så när jag fick det att fungera gick det inte att köra `composer update` en andra eller tredje gång efter lyckad installation.

Det blev slutligen så att jag slog ihop till en större modul och lämnade information i installationen att det krävs inloggad användare med vissa kriterier. Det var det som höll hela vägen. Lite synd. Men man har inte hur mycket tid som helst. Speciellt nu när en deadline för individuella projektet dessutom kryper närmare oroväckande fort.

####Flöt det på bra med GitHub och kopplingen till Packagist?
Den delen fungerade relativt smidigt. Det tog några vändor att vänja sig och förstå packagist. Men inte värre än så. Följde man övningen var det bara att tuta och köra. Skönt att det fanns delar som var så detta kmom.

####Hur gick det att åter installera modulen i din me-sida med composer, kunde du följa du din installationsmanual?
Eftersom att jag testat och därmed ändrat för att kunna testa gick det inte lika smidigt som jag hoppats. Det rörde sig om att få routes och views att stämma i en testmiljö. I vanliga fall kan jag bara komma åt vissa delar som inloggad admin och behövde komma runt det i testet. Men nu är det ändrat så att det skall gå lättare gång nummer två. Så är tanken och förhoppningen i allafall.

####Hur väl lyckas du enhetstesta din modul och hur mycket kodtäckning fick du med?
Det var nog denna delen som tog mest tid av allt, tror jag. Det var väldigt länge sedan jag använde phpunit och det fanns många frågor och funderingar på hur jag överhuvudtaget skulle gå tillväga. Men som tur är fanns det sparat från tidigare kurser och tillslut kunde jag få fram test som fungerade. Däremot valde jag av tidskäl bara göra en ynka test. Nu vet jag hur jag gör och kommer kunna lägga till fler framöver. Men är för stressad över deadlines nu för att ha ro att tänka på grad av kodtäckning.

####Några reflektioner över skillnaden med och utan modul?
En sak är ju att det är väldigt kul att ha gjort en. Även om den aldrig kommer användas mer så har man fått testa. Det blir ju mer återanvändbart och när man uppdaterar den så kan alla andra projekt som använder modulen snabbt och enkelt få med sig uppdateringarna. Mycket smidigt. Har redan innan tänkt lägga till kommentarsmöjlighet i individuella projektet och nu blir det ännu lättare att göra det.

---
*2017-10-12*

###KMOM06
####Har du någon erfarenhet av automatiserade testar och CI sedan tidigare?
Nej. Men började bekanta mig under förra kursmomentet så det var roligt att man via detta kursmomentet fick lite mer insikt i vad det är och hur man kan använda det.

####Hur ser du på begreppen, bra, onödigt, nödvändigt, tidskrävande?
Får man slänga in frustrerande? Men nödvändigt i vissa fall. Det är även tidskrävande. Men tar man tiden till att lägga upp bra tester blir det en säkerhet både för dig och andra. Är metoderna testade så kan man utesluta dessa då fel uppstår, vilket kan spara tid i slutändan. Men sen tror jag inte man i varje läge bör sträva efter 100% kodtäckning. Tror det tar mer tid och energi än vad man får tillbaka. Då går det snarare över till en jakt efter bättre 'poäng'. Som ett datorspel. Men var någonstans som är rimligt att lägga sig kan säkert skifta från fall till fall.

####Hur stor kodtäckning lyckades du uppnå i din modul?
Jag hade lite problem med databasen. Därav att det var frustrerande. Fick skapa en sqlitekopia som jag kunde arbeta mot. Dessutom hade jag svårt att få till tester mot controllern. Hur testa response/request. Googlade utan framgång. Kom upp tillslut upp i 35% kodtäckning.

####Berätta hur det gick att integrera mot de olika externa tjänsterna?
Detta gick på sätt och vis väldigt smidigt. Det var ju sen kring testerna som det blev fail efter fail efter fail. Efter 20 mail om att man failat så var jag rätt irriterad. Så lyckan blev desto större när det väl lossnade och jag kunde använda min sqlite istället. Skulle verkligen vilja veta hur man smidigt testar när koden är beroende av databas.

####Vilken extern tjänst uppskattade du mest, eller har du förslag på ytterligare externa tjänster att använda?
Tycker bäst om scrutinizer som har lite av varje i ett och samma kit. Utöver build fail eller passed så får man en liten poäng på kodkvalitén. Alltid kul. Sen är det schysst med kodtäckningsprocenten. Känns som att denna tjänsten täcker in vad de andra, vi testade, har. Kommer främsta använda mig av den hädanefter.

---
*2017-10-23*
###KMOM07/10
####Krav 1, 2, 3: Grunden
Det krävs att man loggar in för att kunna lägga till, svara på och skriva kommentarer. Man kan även skapa konto. Kontobild fås via Gravatar.
Överst på sidorna följer med en etikettlista över de fem mest populära etiketterna (tagsen) samt en länk, etikett, för alla frågor. Alla etiketter på alla sidor fungerar som länk där man får se alla frågor med denna etikett.

Alla frågor, svar och kommentarer skrivs i Markdown. Till hjälp använder jag bootstrap-markdown.js för att få verktygsfält för att få fetstil, kursivt mm.
Väl inne på en fråga kan användaren välja svara via ’Ditt svar’ textfältet. Man kan även lägga till kommentar, antingen till frågan eller till redan existerande svar via länken ’Lägg till kommentar’.

Användaren kan ändra en fråga, ett svar eller en kommentar den skrivit. Men inte ta bort. Detta är ett medvetet val för att andra användare via svar och kommenterar bli sammankopplade via frågorna och inte skall ligga i händerna på en användare fullt så mycket. Vill användaren kan den däremot redigera innehållet. Då redigering görs noteras det att frågan, svaret eller kommentaren redigerats och vilket datum och klockslag.

Koden finns på GitHub under namnet RVIProject sammanlänkat med Travis och Scrutinizer och med en README som förklarar hur man kan installera Commentary.

####Förstasidan – Översikt
Här ser man de fem senaste frågorna, de fem senaste svaren, de fem aktivaste användarna och de fem högst rankade användarna.
Tabellerna visar följande information:

* De senaste fem frågorna
    - Antal svar
    - Rang
    - Antal röster
    - Antal kommentarer
    - Länk till och information om frågan – etiketter, skapat datum och författare.
* De senaste fem svaren
    - Rang
    - Antal röster
    - Antal kommentarer
    - Länk till och information om frågan – etiketter, skapat datum och författare.
* De fem mest aktiva användarna. Aktivitetpoäng fås via frågor (1,5 p), svar (1 p) och kommentarer (0,5 p).
    - Användaren med länk till dess statistiksida
    - Antal ställda frågor
    - Antal ställda svar
    - Antal skriva kommentarer
    - Aktivitetspoäng
    - Rang
* De fem högst rankade användarna. Rang får man via röster – röst*5 för på fråga, röst*10 på svar och röst*1 på kommentar. 15 p för varje svar som är accepterat svar.
    - Användaren med länk till dess statistiksida
    - Antal ställda frågor
    - Antal ställda svar
    - Antal skriva kommentarer
    - Aktivitetspoäng
    - Rang

####Frågor
Denna vy visar frågorna i en tabell med paginator och sökfält. Man kan välja söka via titel eller etikett. Tabellen visar frågans antal svar, röstsammanställning, antal röster, rang och länk till frågan samt frågans etiketter, skapat datum och författare.

Här kan man även via länken ’Lägg till fråga’. Den leder till formulär där man ha möjlighet att skapa ny fråga. Minst en etikett måste finnas med.
Frågorna kan även sorteras titelvis. Detta gäller även om man filtrerar frågorna etikettvis, genom att klicka på en etikett. Då sorteras de frågorna med den etiketten.

####Etiketter
Denna vy sammanställer etiketterna i en tabell med etikettnamnet, antal av den etiketten och datum för när den först skapades. Etikettnamnen är länkar som leder till Frågorvyn med enbart de frågorna med den etiketten i tabellen filtrerade.

Det finns även ett etikettmoln där de vanligaste etiketterna är större än de etiketter som är få till antalet.

####Om
Här finns kort information om mig samt information om Commentarmodulen. Det står även hur aktivitetspoäng och rangpoäng räknas fram.
Det finns länkar till repot på Github och information och länk till extern js som använts i projektet.

####Krav 4: Frågor
Den som skrivit frågan kan välja att markera något av svaren som ’Accepterat svar’. Detta markeras då med att frågan blir grön. Frågeförfattaren kan då ångra sig genom att klicka ’Ångra accepterat svar’ och sen välja ett annat svar istället eller inget alls.

Användaren som får svar accepterat får 15 p i rangpoäng.

Varje fråga, svar och kommentar kan röstas både upp och ner. För frågor och svar visas både antalet röster och fråga/svar fått samt sammanställningen av dessa röster.
Man kan bara rösta på andras frågar/svar/kommentarer och man kan enbart rösta en gång per fråga/svar/kommentar. Den som röstat har möjlighet att ångra en röst via länk ’Ångra röst’.

Svaren kan sorteras både stigande och sjunkande med tanke på datum eller rang. Det står vilken typ av sortering som man har för tillfället.

####Krav 5: Användare
En användare får rangpoäng. Jag har valt att frångå exemplet som gavs i kravspecifikationen. Istället baseras rangen enbart på själva röstningen och om man har svar som är accepterade. Istället finns parallellt statistik för aktiviteten som enbart visar på hur mycket man engagerat sig. Det blir en siffra för kvantitet och en siffra för kvalitet vilket känns mer användbart.

För hur aktivitetspoäng och rangpoäng räknas se under 'Förstasidan - Översikt'.

####Statistiksida
Varje användare har en statistiksida och användare kan se andras statistiksidor.
Här listas delar av kontoinformationen, totala antalet ställda frågor, svar, kommenterer, antal gjorda röstningar, totala antalet aktivitetspoäng och totala antalet rangpoäng.
Är det ens egen statistiksida har man även en länk till sida för att redigera kontoinformation samt lösenord.

Statistiksidan visar i fyra tabeller vilka frågor, svar, kommentarer på frågor samt kommentarer på svar som användaren skrivit. Tabellerna innehåller, lite beroende på vilken av dem det är, information om antalet svar, sammanställning av rösterna, antal röster, rang och antal kommentarers samt en länk till frågan det gäller.

Har användaren accepterade svar visas de som gröna i den tabellen på denna sidan.

####Krav 6: Valfritt
Som krav 6 har jag dels lagt in en paginator och ett sökfält för frågorna, som nämnts ovan. Det finns valet via radioknappar att söka antingen på titel eller etiketter med ’%’ som wildcard (vilket nämns i placeholdern).

Jag har även valt att dela upp och se aktivitet som en sak skiljt från rang. Det kan blir intressant i jämförelse hur aktivitet och rang står i förhållande till varandra.
Som något lite utanför vill jag även nämna etikettmolnet. Det är en kul detalj vilket ger en bättre överblick över vilka etiketter som finns och vilka som är mest populära. Etiketterna i etikettmolnet funkar även som länkar till att få fram enbart de frågor med just den etiketten.

####Allmänt
Det var ett bra projekt på så vis att det följde kursmomenten och att man hade byggt upp kod som skulle användas i slutändan. Men att det nog var lite tur det, för min del, för det har ändå varit tidskrävande att få med alla delar. Det är väl främst att allting även skall kunna kommenteras och att dessa också skall kunna få en röst som har gjort att det blivit en hel del kod i slutändan.

En av de svåra bitarna var etiketterna. Jag ville ha etiketter med å, ä och ö. Samtidigt ville jag ha dem som filter att användas som path. Bara så pass krävde inte mer än att skapa två kolumner – en för etikett man ser och en för path. Men sen när man skall ändra befintliga började det bli komplicerat. Det blev en del turer mellan metoder som skulle kolla av tecken och som skulle uppdatera olika tabeller. Var de unika eller inte? Togs det bort någon vid ändring? De fanns ju två som skulle hanteras olika i allt det här så när det väl började krångla blev det snart som ett tilltrasslat garnnystan som måste redas ut.

Även etikettmolnen tog mer tid i anspråk än jag hoppats. Ville ha molnkänsla och därmed inte ha de uppradade i en box. Samtidigt något som kan funka för olika antal etiketter. Tycker nog det funka i slutändan.

Annars låg mycket av svårigheten att det var mycket som skulle både läggas och plockas fram på rätt plats. Detta stötte på patrull då jag ju gillar att använda vyer och att det inte fungerade på studentservern. Fick bli en del ändringar och anpassningar där lösningen blev flera olika anrop för varje tabell.

####Avslutningsvis
Det har varit en kul och intressant kurs. Det kom en frustrerande dipp när det skulle phpunit-testas och databasen gjorde att allt blev ett ända mörker för ett tag. Men jag känner nu äntligen att jag vet hur jag skall jobba med Anax. Tredje gången gillt. Att arbeta enligt MVC är också något jag kommit att tycka mycket om. Även hur kul som helst att kunna göra egna moduler och använda/återanvända i annan kod. Så på många sätt en intressant och givande kurs.

Feedbacken på kursmomenten har inte varit så bra. Kanske för att de halkat efter lite tidsmässigt? Men hjälpen på Gitter chatten har däremot varit mycket bra. Både från andra kurskamrater och lärare.

En sak jag tänker på som kan underlätta inför nästa gång är att, även om det gjorts förut, skulle vara trevligt med stoff, repetition och stöd vad gäller phpunit-test. Hur var det nu man satte upp testerna nu igen och framför allt mot databas.

Kursen får, för mycket intressant innehåll och bra kursmoment, en 9:a. Kan absolut rekommenderas vidare.

Nu ser jag väldigt mycket fram emot del 2.
