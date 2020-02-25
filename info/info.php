<div id="charts">
    <div class="chart">
        <h1>Surface Area (km²)</h1>
        <div id="surfacechart"></div>
    </div>
    <div class = "chart">
        <h1>Government form</h1>
        <div id="govform">
            <h2>Country 1 :form 1</h2>
            <h2>Country 2: form 2</h2>
            <h2>Country 3 : form 3</h2>
        </div>
    </div>
    <div class = "chart">
        <h1>Population (million)</h1>
        <div id="populationchart"></div>
    </div>
    <div class = "chart">
        <h1>Gross national product (GNP)</h1>
        <p>(millions of current US$)</p>
        <div id="gnpchart"></div>
    </div>
    <div class = "chart">
        <h1>Mostly Speaking Language, %</h1>
        <div id="langchart"></div>
    </div>
    <div class = "chart">
        <h1>Life expectancy (years)</h1>
        <div id="lifechart"></div>
    </div>
</div>
    <div id="menu">
    <?php include_once('./inc/menu.php'); ?>
</div>


<!--initializing charts with Morris.js-->
<script>
    let myLabels = ['Country 1', 'Country 2', 'Country 3'];
    let languages = ['lang1', 'lang2', 'lang3'];
    let lang = [myLabels[0]+' ' +languages[0], myLabels[1]+' ' +languages[1], myLabels[2]+' ' +languages[2] ];

new Morris.Bar({
  element: 'surfacechart',
  data: [
    { km: '', a: 20, b:10, c:50 },
  ],
  xkey: 'km',
  ykeys: ['a', 'b', 'c'],
  labels: myLabels,
  fillOpacity: 0.6,
      behaveLikeLine: true,
      resize: true,
      barColors: ['#54c6eb', '#cda2ab', '#8a89c0'],
      axes: 'y'
});

new Morris.Donut({
  element: 'populationchart',
  data: [
    {label: myLabels[0], value: 30},
    {label: myLabels[1], value: 15},
    {label: myLabels[2], value: 45}],
    colors:['#06d6a0', '#54c6eb', '#8a89c0']
});

new Morris.Bar({
    element: 'gnpchart',
    data: [
        { y: '', a: 20, b:10, c:50 },
    ],
      xkey: 'y',
      ykeys: ['a', 'b', 'c'],
      labels: myLabels,
      fillOpacity: 0.6,
      stacked:true,
      resize: true,
      pointFillColors:['#ffffff'],
      pointStrokeColors: ['black'],
      barColors: ['#06d6a0', '#54c6eb', '#8a89c0'],
      axes: 'y'
});

new Morris.Donut({
  element: 'langchart',
  data: [
    {label: lang[0], value: 30},
    {label: lang[1], value: 15},
    {label: lang[2], value: 45}],
    colors:['#048a81', '#06d6a0', '#54c6eb']
});

new Morris.Line({
    element:'lifechart',
    data: [
        { y: '0', a: 20, b:10, c:50 },
        { y: '1', a: 20, b:10, c:50 },
    ],
      xkey: 'y',
      ykeys: ['a', 'b', 'c'],
      labels: myLabels,
      fillOpacity: 0.6,
      behaveLikeLine: true,
      resize: true,
      pointFillColors:['#ffffff'],
      pointStrokeColors: ['black'],
      axes: 'y'
})

</script>
