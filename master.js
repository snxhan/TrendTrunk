/* When the user clicks on the filter button,
toggle between hiding and showing the dropdown content */
window.onclick = function(event)
{
  //----------------Declaration Of Elements--------------------//
  var dropdown_sort = document.getElementById("filter-dropdown-sort");
  var dropdown_gender = document.getElementById("filter-dropdown-gender");
  var dropdown_size = document.getElementById("filter-dropdown-size");
  var dropdown_category = document.getElementById("filter-dropdown-category");
  var button_sort = document.getElementById("filter-button-sort");
  var button_gender = document.getElementById("filter-button-gender");
  var button_size = document.getElementById("filter-button-size");
  var button_category = document.getElementById("filter-button-category");
  var HTL_selection = document.getElementById("HTL-selection");
  var LTH_selection = document.getElementById("LTH-selection");
  var Feature_selection = document.getElementById("Feature-selection");
  var Male_selection = document.getElementById("Male-selection");
  var Female_selection = document.getElementById("Female-selection");
  var S_selection = document.getElementById("S-selection");
  var M_selection = document.getElementById("M-selection");
  var L_selection = document.getElementById("L-selection");
  var XL_selection = document.getElementById("XL-selection");
  var Apparel_selection = document.getElementById("Apparel-selection");
  var Accessories_selection = document.getElementById("Accessories-selection");
  var Shoes_selection = document.getElementById("Shoes-selection");
  var Bags_selection = document.getElementById("Bags-selection");


  //if clicked the sort button
  if(event.target.id == "filter-button-sort"){
    CloseAllDropdownExcept("sort");
    if(dropdown_sort.className == "filter-dropdown-close")
    {
      dropdown_sort.className = "filter-dropdown-open";
      button_sort.className = "filter-button-clicked";
    }
    else{
      dropdown_sort.className = "filter-dropdown-close";
      button_sort.className = "filter-button";
    }
  }
  //if clicked the gender button
  else if(event.target.id == "filter-button-gender"){
    CloseAllDropdownExcept("gender");
    if(dropdown_gender.className == "filter-dropdown-close")
    {
      dropdown_gender.className = "filter-dropdown-open";
      button_gender.className = "filter-button-clicked";
    }
    else{
      dropdown_gender.className = "filter-dropdown-close";
      button_gender.className = "filter-button";
    }
  }
  //if clicked the size button
  else if(event.target.id == "filter-button-size"){
    CloseAllDropdownExcept("size");
    if(dropdown_size.className == "filter-dropdown-close")
    {
      dropdown_size.className = "filter-dropdown-open";
      button_size.className = "filter-button-clicked";
    }
    else{
      dropdown_size.className = "filter-dropdown-close";
      button_size.className = "filter-button";
    }
  }
  //if clicked the category button
  else if(event.target.id == "filter-button-category"){
    CloseAllDropdownExcept("category");
    if(dropdown_category.className == "filter-dropdown-close")
    {
      dropdown_category.className = "filter-dropdown-open";
      button_category.className = "filter-button-clicked";
    }
    else{
      dropdown_category.className = "filter-dropdown-close";
      button_category.className = "filter-button";
    }
  }

  //if clicked the HTL dropdown button
  else if(event.target.id == "HTL-selection"){
    dropdown_sort.className = "filter-dropdown-open";
    button_sort.className = "filter-button-clicked";
    if(HTL_selection.className == "filter-selection"){
      if(getCurrentURL().includes("filter") == true){
        window.location.href = clearURL("sort")+"Sort=HTL";
      }
      else{
        window.location.href = clearURL("sort")+"&filter:Sort=HTL";
      }
      HTL_selection.className = "filter-selection-clicked";
      LTH_selection.className = "filter-selection";
      Feature_selection.className = "filter-selection";
    }
    else{
      window.location.href = clearURL("sort");
      HTL_selection.className = "filter-selection";
    }
  }
    //if clicked the LTH dropdown button
  else if(event.target.id == "LTH-selection"){
    dropdown_sort.className = "filter-dropdown-open";
    button_sort.className = "filter-button-clicked";
    if(LTH_selection.className == "filter-selection"){
      if(getCurrentURL().includes("filter") == true){
        window.location.href = clearURL("sort")+"Sort=LTH";
      }
      else{
        window.location.href = clearURL("sort")+"&filter:Sort=LTH";
      }
      LTH_selection.className = "filter-selection-clicked";
      HTL_selection.className = "filter-selection";
      Feature_selection.className = "filter-selection";
    }
    else{
      window.location.href = clearURL("sort");
      LTH_selection.className = "filter-selection";
    }
  }
  //if clicked the Featured dropdown button
  else if(event.target.id == "Feature-selection"){
    dropdown_sort.className = "filter-dropdown-open";
    button_sort.className = "filter-button-clicked";
    if(Feature_selection.className == "filter-selection"){
      if(getCurrentURL().includes("filter") == true){
        window.location.href = clearURL("sort")+"Sort=Featured";
      }
      else{
        window.location.href = clearURL("sort")+"&filter:Sort=Featured";
      }
      Feature_selection.className = "filter-selection-clicked";
      HTL_selection.className = "filter-selection";
      LTH_selection.className = "filter-selection";
    }
    else{
      window.location.href = clearURL("sort");
      Feature_selection.className = "filter-selection";
    }
  }
  //if clicked the Male dropdown button
  else if(event.target.id == "Male-selection"){
    dropdown_gender.className = "filter-dropdown-open";
    button_gender.className = "filter-button-clicked";
    if(Male_selection.className == "filter-selection"){
      if(getCurrentURL().includes("filter") == true){
        window.location.href = clearURL("gender")+"Gender=Male";
      }
      else{
        window.location.href = clearURL("gender")+"&filter:Gender=Male";
      }
      Male_selection.className = "filter-selection-clicked";
      Female_selection.className = "filter-selection";
    }
    else{
      window.location.href = clearURL("gender");
      Male_selection.className = "filter-selection";
    }
  }
  //if clicked the Female dropdown button
  else if(event.target.id == "Female-selection"){
    dropdown_gender.className = "filter-dropdown-open";
    button_gender.className = "filter-button-clicked";
    if(Female_selection.className == "filter-selection"){
      if(getCurrentURL().includes("filter") == true){
        window.location.href = clearURL("gender")+"Gender=Female";
      }
      else{
        window.location.href = clearURL("gender")+"&filter:Gender=Female";
      }
      Female_selection.className = "filter-selection-clicked";
      Male_selection.className = "filter-selection";
    }
    else{
      window.location.href = clearURL("gender");
      Female_selection.className = "filter-selection";
    }
  }
  //if clicked the S dropdown button
  else if(event.target.id == "S-selection"){
    dropdown_size.className = "filter-dropdown-open";
    button_size.className = "filter-button-clicked";
    if(S_selection.className == "filter-selection"){
      if(getCurrentURL().includes("filter") == true){
        window.location.href = clearURL("size")+"Size=S";
      }
      else{
        window.location.href = clearURL("size")+"&filter:Size=S";
      }
      S_selection.className = "filter-selection-clicked";
      M_selection.className = "filter-selection";
      L_selection.className = "filter-selection";
      XL_selection.className = "filter-selection";
    }
    else{
      window.location.href = clearURL("size");
      S_selection.className = "filter-selection";
    }
  }
  //if clicked the M dropdown button
  else if(event.target.id == "M-selection"){
    dropdown_size.className = "filter-dropdown-open";
    button_size.className = "filter-button-clicked";
    if(M_selection.className == "filter-selection"){
      if(getCurrentURL().includes("filter") == true){
        window.location.href = clearURL("size")+"Size=M";
      }
      else{
        window.location.href = clearURL("size")+"&filter:Size=M";
      }
      M_selection.className = "filter-selection-clicked";
      S_selection.className = "filter-selection";
      L_selection.className = "filter-selection";
      XL_selection.className = "filter-selection";
    }
    else{
      window.location.href = clearURL("size");
      M_selection.className = "filter-selection";
    }
  }
  //if clicked the L dropdown button
  else if(event.target.id == "L-selection"){
    dropdown_size.className = "filter-dropdown-open";
    button_size.className = "filter-button-clicked";
    if(L_selection.className == "filter-selection"){
      if(getCurrentURL().includes("filter") == true){
        window.location.href = clearURL("size")+"Size=L";
      }
      else{
        window.location.href = clearURL("size")+"&filter:Size=L";
      }
      L_selection.className = "filter-selection-clicked";
      S_selection.className = "filter-selection";
      M_selection.className = "filter-selection";
      XL_selection.className = "filter-selection";
    }
    else{
      window.location.href = clearURL("size");
      L_selection.className = "filter-selection";
    }
  }
  //if clicked the XL dropdown button
  else if(event.target.id == "XL-selection"){
    dropdown_size.className = "filter-dropdown-open";
    button_size.className = "filter-button-clicked";
    if(XL_selection.className == "filter-selection"){
      if(getCurrentURL().includes("filter") == true){
        window.location.href = clearURL("size")+"Size=XL";
      }
      else{
        window.location.href = clearURL("size")+"&filter:Size=XL";
      }
      XL_selection.className = "filter-selection-clicked";
      S_selection.className = "filter-selection";
      M_selection.className = "filter-selection";
      L_selection.className = "filter-selection";
    }
    else{
      window.location.href = clearURL("size");
      XL_selection.className = "filter-selection";
    }
  }
  //if clicked the Apparel dropdown button
  else if(event.target.id == "Apparel-selection"){
    dropdown_category.className = "filter-dropdown-open";
    button_category.className = "filter-button-clicked";
    if(Apparel_selection.className == "filter-selection"){
      if(getCurrentURL().includes("filter") == true){
        window.location.href = clearURL("cat")+"Cat=Apparel";
      }
      else{
        window.location.href = clearURL("cat")+"&filter:Cat=Apparel";
      }
      Apparel_selection.className = "filter-selection-clicked";
      Accessories_selection.className = "filter-selection";
      Shoes_selection.className = "filter-selection";
      Bags_selection.className = "filter-selection";
    }
    else{
      window.location.href = clearURL("cat");
      Apparel_selection.className = "filter-selection";
    }
  }
  //if clicked the Accessories dropdown button
  else if(event.target.id == "Accessories-selection"){
    dropdown_category.className = "filter-dropdown-open";
    button_category.className = "filter-button-clicked";
    if(Accessories_selection.className == "filter-selection"){
      if(getCurrentURL().includes("filter") == true){
        window.location.href = clearURL("cat")+"Cat=Accessories";
      }
      else{
        window.location.href = clearURL("cat")+"&filter:Cat=Accessories";
      }
      Accessories_selection.className = "filter-selection-clicked";
      Apparel_selection.className = "filter-selection";
      Shoes_selection.className = "filter-selection";
      Bags_selection.className = "filter-selection";
    }
    else{
      window.location.href = clearURL("cat");
      Accessories_selection.className = "filter-selection";
    }
  }
  //if clicked the Shoes dropdown button
  else if(event.target.id == "Shoes-selection"){
    dropdown_category.className = "filter-dropdown-open";
    button_category.className = "filter-button-clicked";
    if(Shoes_selection.className == "filter-selection"){
      if(getCurrentURL().includes("filter") == true){
        window.location.href = clearURL("cat")+"Cat=Shoes";
      }
      else{
        window.location.href = clearURL("cat")+"&filter:Cat=Shoes";
      }
      Shoes_selection.className = "filter-selection-clicked";
      Apparel_selection.className = "filter-selection";
      Accessories_selection.className = "filter-selection";
      Bags_selection.className = "filter-selection";
    }
    else{
      window.location.href = clearURL("cat");
      Shoes_selection.className = "filter-selection";
    }
  }
  //if clicked the Bags dropdown button
  else if(event.target.id == "Bags-selection"){
    dropdown_category.className = "filter-dropdown-open";
    button_category.className = "filter-button-clicked";
    if(Bags_selection.className == "filter-selection"){
      if(getCurrentURL().includes("filter") == true){
        window.location.href = clearURL("cat")+"Cat=Bags";
      }
      else{
        window.location.href = clearURL("cat")+"&filter:Cat=Bags";
      }
      Bags_selection.className = "filter-selection-clicked";
      Apparel_selection.className = "filter-selection";
      Accessories_selection.className = "filter-selection";
      Shoes_selection.className = "filter-selection";
    }
    else{
      window.location.href = clearURL("cat");
      Bags_selection.className = "filter-selection";
    }
  }
  //if click on anywhere else except the filter buttons or dropdowns
  else{
    CloseAllDropdownExcept();
  }


  function CloseAllDropdownExcept(exclude){ //nested function so that we can reuse the declaration of elements
    if(exclude == null)
    {
      button_sort.className = "filter-button"; 
      dropdown_sort.className = "filter-dropdown-close";
      button_gender.className = "filter-button";
      dropdown_gender.className = "filter-dropdown-close";
      button_size.className = "filter-button";
      dropdown_size.className = "filter-dropdown-close";
      button_category.className = "filter-button"; 
      dropdown_category.className = "filter-dropdown-close";
    }
    else
    {
      switch(exclude){
        case "sort":
          button_gender.className = "filter-button";
          dropdown_gender.className = "filter-dropdown-close";
          button_size.className = "filter-button";
          dropdown_size.className = "filter-dropdown-close";
          button_category.className = "filter-button"; 
          dropdown_category.className = "filter-dropdown-close";
          break;
        case "gender":
          button_sort.className = "filter-button"; 
          dropdown_sort.className = "filter-dropdown-close";
          button_size.className = "filter-button";
          dropdown_size.className = "filter-dropdown-close";
          button_category.className = "filter-button"; 
          dropdown_category.className = "filter-dropdown-close";
          break;
        case "size":
          button_sort.className = "filter-button"; 
          dropdown_sort.className = "filter-dropdown-close";
          button_gender.className = "filter-button";
          dropdown_gender.className = "filter-dropdown-close";
          button_category.className = "filter-button"; 
          dropdown_category.className = "filter-dropdown-close";
          break;
        case "category":
          button_sort.className = "filter-button"; 
          dropdown_sort.className = "filter-dropdown-close";
          button_gender.className = "filter-button";
          dropdown_gender.className = "filter-dropdown-close";
          button_size.className = "filter-button";
          dropdown_size.className = "filter-dropdown-close";
          break;
      } 
    }
  }
}


function getCurrentURL () {
  return window.location.href
}

function clearURL (type){
  let URL = window.location.href;
  switch(type){
    case "sort":
      URL = URL.replace("Sort=HTL","");
      URL = URL.replace("Sort=LTH","");
      URL = URL.replace("Sort=Featured","");
      break;
    case "gender":
      URL = URL.replace("Gender=Male","");
      URL = URL.replace("Gender=Female","");
      break;
    case "size":
      URL = URL.replace("Size=S","");
      URL = URL.replace("Size=M","");
      URL = URL.replace("Size=L","");
      URL = URL.replace("Size=XL","");
      break;
    case "cat":
      URL = URL.replace("Cat=Apparel","");
      URL = URL.replace("Cat=Accessories","");
      URL = URL.replace("Cat=Bags","");
      URL = URL.replace("Cat=Shoes","");
      break;
  }
  return URL
}