
var checkboxSelection = document.getElementById("checkboxSelection").value;

//using a hidden value set in the form in admin_menu_update.php we pass the price of the products from the database to PHP to this JS file.
var Java_Price = document.getElementById("Java_Price").value;
var Cafe_Single_Price = document.getElementById("Cafe_Single_Price").value;
var Cafe_Double_Price = document.getElementById("Cafe_Double_Price").value;
var Cap_Single_Price = document.getElementById("Cap_Single_Price").value;
var Cap_Double_Price = document.getElementById("Cap_Double_Price").value;


var table = document.getElementById("admin_menu_page_table");
switch(checkboxSelection) {
    case "java":
        var tr = document.createElement('tr');   

        var td1 = document.createElement('td');
        var td2 = document.createElement('td');

        var productName = document.createTextNode('Just Java');
        var productDescription = document.createTextNode('Regular house blend, decaffeinated coffee, or flavor of the day.');
        var linebreak = document.createElement("br");
    
        var span = document.createElement('span');
        span.setAttribute("class", "menu_page_table_pricing");

        var label = document.createElement('label');
        label.setAttribute("style", "float:none");
        label.innerHTML = "Endless Cup $";

        var input = document.createElement('input');
        input.setAttribute("type", "number");
        input.setAttribute("style", "float:none");
        input.setAttribute("name", "Java_Price");
        input.setAttribute("id", "Java_Price");
        input.setAttribute("min", "0.00");
        input.setAttribute("max", "999");
        input.setAttribute("step", "0.01");
        input.setAttribute("value", Java_Price);
        input.setAttribute*("required", "");

        td1.appendChild(productName);
        td2.appendChild(productDescription);
        td2.appendChild(linebreak);
        label.appendChild(input);
        span.appendChild(label);
        td2.appendChild(span);
        tr.appendChild(td1);
        tr.appendChild(td2);

        var tr_submit = document.createElement('tr');  
        var td_submit1 =  document.createElement('td');
        var td_submit2 =  document.createElement('td');
        td_submit2.setAttribute("style", "text-align:right;");
        var input_submit = document.createElement('input');
        input_submit.setAttribute("type", "submit");
        input_submit.setAttribute("value", "Update Prices");
        input_submit.setAttribute("id", "updateprices_button");

        td_submit2.appendChild(input_submit);
        tr_submit.appendChild(td_submit1);
        tr_submit.appendChild(td_submit2);
    
        table.appendChild(tr);
        table.appendChild(tr_submit);
        
        break;


    case "cafe":
        var tr = document.createElement('tr');   

        var td1 = document.createElement('td');
        var td2 = document.createElement('td');

        var productName = document.createTextNode('Cafe Au Lait');
        var productDescription = document.createTextNode('House blended coffee infused into smooth, steamed milk.');
        var linebreak = document.createElement("br");
    
        var span = document.createElement('span');
        span.setAttribute("class", "menu_page_table_pricing");

        var label_single = document.createElement('label');
        label_single.setAttribute("style", "float:none");
        label_single.innerHTML = "Single $";

        var input_single = document.createElement('input');
        input_single.setAttribute("type", "number");
        input_single.setAttribute("style", "float:none");
        input_single.setAttribute("name", "Cafe_Single_Price");
        input_single.setAttribute("id", "Cafe_Single_Price");
        input_single.setAttribute("min", "0.00");
        input_single.setAttribute("max", "999");
        input_single.setAttribute("step", "0.01");
        input_single.setAttribute("value", Cafe_Single_Price);
        input_single.setAttribute*("required", "");

        var label_double = document.createElement('label');
        label_double.setAttribute("style", "float:none");
        label_double.innerHTML = "Double $";
        
        var input_double = document.createElement('input');
        input_double.setAttribute("type", "number");
        input_double.setAttribute("style", "float:none");
        input_double.setAttribute("name", "Cafe_Double_Price");
        input_double.setAttribute("id", "Cafe_Double_Price");
        input_double.setAttribute("min", "0.00");
        input_double.setAttribute("max", "999");
        input_double.setAttribute("step", "0.01");
        input_double.setAttribute("value", Cafe_Double_Price);
        input_double.setAttribute*("required", "");


        td1.appendChild(productName);
        td2.appendChild(productDescription);
        td2.appendChild(linebreak);
        label_single.appendChild(input_single);
        label_double.appendChild(input_double);
        span.appendChild(label_single);
        span.appendChild(label_double);
        td2.appendChild(span);
        tr.appendChild(td1);
        tr.appendChild(td2);

        var tr_submit = document.createElement('tr');  
        var td_submit1 =  document.createElement('td');
        var td_submit2 =  document.createElement('td');
        td_submit2.setAttribute("style", "text-align:right;");
        var input_submit = document.createElement('input');
        input_submit.setAttribute("type", "submit");
        input_submit.setAttribute("value", "Update Prices");
        input_submit.setAttribute("id", "updateprices_button");

        td_submit2.appendChild(input_submit);
        tr_submit.appendChild(td_submit1);
        tr_submit.appendChild(td_submit2);
    
        table.appendChild(tr);
        table.appendChild(tr_submit);

        break;
    case "cap":
        var tr = document.createElement('tr');   

        var td1 = document.createElement('td');
        var td2 = document.createElement('td');

        var productName = document.createTextNode('Iced Cappucino');
        var productDescription = document.createTextNode('Sweetened espresso blended with icy-cold milk and served in a chilled glass.');
        var linebreak = document.createElement("br");
    
        var span = document.createElement('span');
        span.setAttribute("class", "menu_page_table_pricing");

        var label_single = document.createElement('label');
        label_single.setAttribute("style", "float:none");
        label_single.innerHTML = "Single $";

        var input_single = document.createElement('input');
        input_single.setAttribute("type", "number");
        input_single.setAttribute("style", "float:none");
        input_single.setAttribute("name", "Cap_Single_Price");
        input_single.setAttribute("id", "Cap_Single_Price");
        input_single.setAttribute("min", "0.00");
        input_single.setAttribute("max", "999");
        input_single.setAttribute("step", "0.01");
        input_single.setAttribute("value", Cap_Single_Price);
        input_single.setAttribute*("required", "");

        var label_double = document.createElement('label');
        label_double.setAttribute("style", "float:none");
        label_double.innerHTML = "Double $";
        
        var input_double = document.createElement('input');
        input_double.setAttribute("type", "number");
        input_double.setAttribute("style", "float:none");
        input_double.setAttribute("name", "Cap_Double_Price");
        input_double.setAttribute("id", "Cap_Double_Price");
        input_double.setAttribute("min", "0.00");
        input_double.setAttribute("max", "999");
        input_double.setAttribute("step", "0.01");
        input_double.setAttribute("value", Cap_Double_Price);
        input_double.setAttribute*("required", "");


        td1.appendChild(productName);
        td2.appendChild(productDescription);
        td2.appendChild(linebreak);
        label_single.appendChild(input_single);
        label_double.appendChild(input_double);
        span.appendChild(label_single);
        span.appendChild(label_double);
        td2.appendChild(span);
        tr.appendChild(td1);
        tr.appendChild(td2);

        var tr_submit = document.createElement('tr');  
        var td_submit1 =  document.createElement('td');
        var td_submit2 =  document.createElement('td');
        td_submit2.setAttribute("style", "text-align:right;");
        var input_submit = document.createElement('input');
        input_submit.setAttribute("type", "submit");
        input_submit.setAttribute("value", "Update Prices");
        input_submit.setAttribute("id", "updateprices_button");

        td_submit2.appendChild(input_submit);
        tr_submit.appendChild(td_submit1);
        tr_submit.appendChild(td_submit2);
    
        table.appendChild(tr);
        table.appendChild(tr_submit);
        
        break;
    default:
}