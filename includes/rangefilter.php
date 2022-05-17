<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <style>
        .filter-price {
            /* background: red; */
            /* height: 30px; */
        }
        .price-slider {
            height: 40px;
            background: red;
        }
        .price-slider::-webkit-slider-thumb {
            -webkit-appearance: none;
            appearance: none;
            width: 25px;
            height: 45px;
            background: red;
            cursor: pointer;
        }
        #price {
            background: rgb(237 233 233);
            padding: 4px 15px;
        }
    </style>
</head>
<body>
<div class="filter-price">
          <h3>Price (KSH)</h3>
          <input type="range" min="100" max="40000" value="250" class="price-slider" id="price-range">
          <p>Price: <span id="price"></span></p>
</div>  

<script>
var priceRange = document.getElementById("price-range");
var output = document.getElementById("price");
output.innerHTML = priceRange.value;


priceRange.oninput = function() {
  output.innerHTML = this.value;
  
}
</script>
    
</body>
</html>