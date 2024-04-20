

function gotoAdminMenuUpdatePage() {
    //manually submitting the form 
    document.getElementById("admin_menu_form").submit();
    //to uncheck the checkboxes after selectin so that it resets. If you dont do this when you press back the checkboxes will still be checked
    document.getElementById("java_checkbox").checked = false;
    document.getElementById("cafe_checkbox").checked = false;
    document.getElementById("cap_checkbox").checked = false;
}
