<?php
//get current user from cookies
$curUser = $_COOKIE['curUser'];
//initialize variables for the three countries
$countries=[];
//get countries from query string
if (isset($_GET['1'])) {
    $countries[] = $_GET['1'];
}
if (isset($_GET['2'])) {
    $countries[] = $_GET['2'];
}
if (isset($_GET['3'])) {
    $countries[] = $_GET['3'];
}
//save user's choice to the database
include_once('./inc/dbconn.php');
$arr = [];
foreach ($countries as $country) {
    if ($country != '') {
        $qInsert = $pdo->query("INSERT INTO `world`.`userchoice` (`userID`, `countryCode`) VALUES ('$curUser', '$country');");
        //get info from the database
        $results;
        $qInfo = $pdo->query("SELECT `name`,`SurfaceArea`,`Population`,`LifeExpectancy`,`GNP`,`GovernmentForm` FROM `world`.`country` WHERE `Code`='$country';");
        while ($row = $qInfo->fetch()) {
            $results[] = $row;
        }
        $qLang = $pdo->query("SELECT `percentage` ,`language`
        FROM `COUNTRYLANGUAGE` 
        WHERE  `COUNTRYCODE`='$country'&&`percentage` = (
        SELECT MAX(`percentage`) 
        FROM `countrylanguage` 
        WHERE `COUNTRYCODE`='$country');");
        while ($row = $qLang->fetch()) {
            $languages[] = $row;
        }
    }
}
?>

<div id="hidden" style="display:none">
    <?php
    for ($i = 0; $i < sizeof($countries); $i++) {
        echo "<div class='name'>{$results[$i]['name']}</div>";
        echo "<div class='SurfaceArea'>{$results[$i]['SurfaceArea']}</div>";
        echo "<div class='Population'>{$results[$i]['Population']}</div>";
        echo "<div class='LifeExpectancy'>{$results[$i]['LifeExpectancy']}</div>";
        echo "<div class='GNP'>{$results[$i]['GNP']}</div>";
        echo "<div class='GovernmentForm'>{$results[$i]['GovernmentForm']}</div>";
        echo "<div class='Languages'>{$languages[$i]['language']}</div>";
        echo "<div class='LanguagePerc'>{$languages[$i]['percentage']}</div>";
    }
    ?>
</div>

<div id="charts">
    <div class="chart">
        <h1>Surface Area (km²)</h1>
        <div id="surfacechart"></div>
    </div>
    <div class="chart">
        <h1>Government form</h1>
        <div id="govform">
            <?php
            for ($i = 0; $i < sizeof($countries); $i++) {
                echo "<h2>{$results[$i]['name']} : {$results[$i]['GovernmentForm']}</h2>";
            }
            ?>
        </div>
    </div>
    <div class="chart">
        <h1>Population (million)</h1>
        <div id="populationchart"></div>
    </div>
    <div class="chart">
        <h1>Gross national product (GNP)</h1>
        <p>(millions of current US$)</p>
        <div id="gnpchart"></div>
    </div>
    <div class="chart">
        <h1>Mostly Speaking Language, %</h1>
        <div id="langchart"></div>
    </div>
    <div class="chart">
        <h1>Life expectancy (years)</h1>
        <div id="lifechart"></div>
    </div>
</div>
<div id="menu">
    <?php include_once('./inc/menu.php'); ?>
</div>
<script>
//initializing charts with Morris.js
//get data from the page for charts
    //get countries
    let myLabels = [];
    let labels = document.querySelectorAll('.name');
    for (let i = 0; i < labels.length; i++) {
        myLabels[i] = labels[i].innerHTML;
    }

    //get population
    let population = [];
    let populationEl = document.querySelectorAll('.Population');
    for (let i = 0; i < populationEl.length; i++) {
        let obj = {
            label: '',
            value: ''
        };
        obj.label = myLabels[i];
        obj.value = populationEl[i].innerHTML;
        population.push(obj);
    }

    //get surface
    let surface = [];
    let surfaceEl = document.querySelectorAll('.SurfaceArea');
    var obj = {
        x: '',
        a: '',
        b: '',
        c: '',
    };
    switch(surfaceEl.length){
        case 1:
            obj.a=surfaceEl[0].innerHTML;
        break;
        case 2:
            obj.a=surfaceEl[0].innerHTML;
            obj.b=surfaceEl[1].innerHTML;
        break;
        case 3:
            obj.a=surfaceEl[0].innerHTML;
            obj.b=surfaceEl[1].innerHTML;
            obj.c=surfaceEl[2].innerHTML;
        break;
    }
    surface.push(obj);

    //get life expectancy
    let lifeExpectancy = [];
    let lifeExpectancyEl = document.querySelectorAll('.LifeExpectancy');
    let obj1 = {y:'0', a:'', b:'', c:''};
    let obj2 = {y:'1', a:'', b:'', c:''};
    switch(lifeExpectancyEl.length){
        case 1:
            obj1.a ==lifeExpectancyEl[0].innerHTML;
            obj2.a=lifeExpectancyEl[0].innerHTML;
        break;
        case 2:
            obj1.a =lifeExpectancyEl[0].innerHTML;
            obj2.a=lifeExpectancyEl[0].innerHTML;
            obj1.b =lifeExpectancyEl[1].innerHTML;
            obj2.b=lifeExpectancyEl[1].innerHTML;
        break;
        case 3:
            obj1.a =lifeExpectancyEl[0].innerHTML;
            obj2.a=lifeExpectancyEl[0].innerHTML;
            obj1.b =lifeExpectancyEl[1].innerHTML;
            obj2.b=lifeExpectancyEl[1].innerHTML;
            obj1.c=lifeExpectancyEl[2].innerHTML;
            obj2.c=lifeExpectancyEl[2].innerHTML;
        break;
    }
    lifeExpectancy.push(obj1);
    lifeExpectancy.push(obj2);

    //get GNP
    let gnp = [];
    let gnpEl = document.querySelectorAll('.GNP');
    var obj = {
        x: '',
        a: '',
        b: '',
        c: '',
    };
    let chartKeys;
    switch(gnpEl.length){
        case 1:
            obj.a=gnpEl[0].innerHTML;
            chartKeys = ['a'];
        break;
        case 2:
            obj.a=gnpEl[0].innerHTML;
            obj.b=gnpEl[1].innerHTML;
            chartKeys = ['a','b'];
        break;
        case 3:
            obj.a=gnpEl[0].innerHTML;
            obj.b=gnpEl[1].innerHTML;
            obj.c=gnpEl[2].innerHTML;
            chartKeys = ['a','b','c'];
        break;
    }
    gnp.push(obj);

    //languages
    let languages = [];
    let langEl = document.querySelectorAll('.Languages');
    for (let i = 0; i < langEl.length; i++) {
        languages[i] = langEl[i].innerHTML;
    }
    //get percentage
    let percentage=[];
    let percEl = document.querySelectorAll('.LanguagePerc');
    for (let i = 0; i < percEl.length; i++) {
        percentage[i] = percEl[i].innerHTML;
    }
    let langData = [];
    for(let i =0; i<languages.length;i++){
        let obj = {label:'', value:''};
        obj.label = myLabels[i]+": "+languages[i];
        obj.value = percentage[i];
        langData.push(obj);
    }

    new Morris.Bar({
        element: 'surfacechart',
        data: surface,
        xkey: 'x',
        ykeys: chartKeys,
        labels: myLabels,
        fillOpacity: 0.6,
        behaveLikeLine: true,
        resize: true,
        barColors: ['#54c6eb', '#cda2ab', '#8a89c0'],
        axes: 'y'
    });

    new Morris.Donut({
        element: 'populationchart',
        data: population,
        colors: ['#06d6a0', '#54c6eb', '#8a89c0'],
        labelColor:'#048a81'
    });

    new Morris.Bar({
        element: 'gnpchart',
         data: gnp,
        xkey: 'x',
        ykeys: chartKeys,
        labels: myLabels,
        fillOpacity: 0.6,
        stacked: true,
        resize: true,
        pointFillColors: ['#ffffff'],
        pointStrokeColors: ['black'],
        barColors: ['#06d6a0', '#54c6eb', '#8a89c0'],
        axes: 'y'
    });

    new Morris.Donut({
        element: 'langchart',
        data: langData,
        colors: ['#048a81', '#06d6a0', '#54c6eb'],
        labelColor: '#048a81'
    });

    new Morris.Line({
        element: 'lifechart',
        data: lifeExpectancy,
        xkey: 'y',
        ykeys: chartKeys,
        labels: myLabels,
        fillOpacity: 0.6,
        behaveLikeLine: true,
        resize: true,
        pointFillColors: ['#ffffff'],
        pointStrokeColors: ['black'],
        axes: 'y'
    });

</script>


