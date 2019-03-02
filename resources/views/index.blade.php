<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>ruble's rate</title>
    <link rel="stylesheet" href="css/app.css">
</head>
<body style="height: 100vh">
<div class="container">
    <div class="col-md-6 offset-3" style="text-align: center; top: 40vh">
        <h1>Current ruble to euro rate is</h1>
        <h2 id="rateValue">{{$rate}}</h2>
    </div>
</div>
</body>
<script>
    async function updateCurrency() {
        let response = await fetch(`${location.href}/update`);
        if (response.ok){
            valueElement.innerText = await response.text();
        }
    }
    const valueElement = document.getElementById('rateValue');
    const timer = setInterval(updateCurrency, 10000);
</script>
</html>