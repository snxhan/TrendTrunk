

function calculatePrice() {
    // Taking price values from PHP file
    var jjNullCost = document.getElementById("jjNullCost").value;
    var calSingleCost = document.getElementById("calSingleCost").value;
    var calDoubleCost = document.getElementById("calDoubleCost").value;
    var icSingleCost = document.getElementById("icSingleCost").value;
    var icDoubleCost = document.getElementById("icDoubleCost").value;

    var dom = document.getElementById("checkout_form");
    if(dom.JustJavaQty.value != null)
    {
        document.getElementById("Total_JustJava").innerHTML = "$" + dom.JustJavaQty.value * jjNullCost ;
    }
    if(dom.itemButton_Cafe[0].checked == true && dom.CafeQty.value != null)
    {   
        document.getElementById("Total_Cafe").innerHTML = "$" + dom.CafeQty.value * calSingleCost ;
    }
    if(dom.itemButton_Cafe[1].checked == true && dom.CafeQty.value != null)
    {
        document.getElementById("Total_Cafe").innerHTML = "$" + dom.CafeQty.value * calDoubleCost ;
    }
    if(dom.itemButton_Cappuccino[0].checked == true && dom.CappuccinoQty.value != null)
    {
        document.getElementById("Total_Cappuccino").innerHTML = "$" + dom.CappuccinoQty.value * icSingleCost;
    }
    if(dom.itemButton_Cappuccino[1].checked == true && dom.CappuccinoQty.value != null)
    {
        document.getElementById("Total_Cappuccino").innerHTML = "$" + dom.CappuccinoQty.value * icDoubleCost;
    }

    //update total price in footer
    if(dom.itemButton_Cafe[0].checked == true && dom.itemButton_Cappuccino[0].checked == true)
    {
        document.getElementById("Total_Price").innerHTML = "$" + ((dom.JustJavaQty.value * jjNullCost) + (dom.CafeQty.value * calSingleCost) + (dom.CappuccinoQty.value * icSingleCost));
    }
    if(dom.itemButton_Cafe[0].checked == true && dom.itemButton_Cappuccino[1].checked == true)
    {
        document.getElementById("Total_Price").innerHTML = "$" + ((dom.JustJavaQty.value * jjNullCost) + (dom.CafeQty.value * calSingleCost) + (dom.CappuccinoQty.value * icDoubleCost));
    }
    if(dom.itemButton_Cafe[1].checked == true && dom.itemButton_Cappuccino[0].checked == true)
    {
        document.getElementById("Total_Price").innerHTML = "$" + ((dom.JustJavaQty.value * jjNullCost) + (dom.CafeQty.value * calDoubleCost) + (dom.CappuccinoQty.value * icSingleCost));
    }
    if(dom.itemButton_Cafe[1].checked == true && dom.itemButton_Cappuccino[1].checked == true)
    {
        document.getElementById("Total_Price").innerHTML = "$" + ((dom.JustJavaQty.value * jjNullCost) + (dom.CafeQty.value * calDoubleCost) + (dom.CappuccinoQty.value * icDoubleCost));
    }
}