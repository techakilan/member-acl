jQuery(document).ready(function ($) {

      //on change function on member role select in Member ACL Edit Role Page
  $("#selected_member_role").change(function () {
    var selected_member_role = $("#selected_member_role").val();
    var selected_member_cap = {};
    $("input:checkbox").prop("checked", false);
    $.each(roles_caps_master.custom_roles, function (k, v) {
      if (k == selected_member_role) {
        selected_member_cap = v.capabilities;
      }
    });
    $.each(selected_member_cap, function (k, v) {
      if (v == 1) {
        $("#" + k).prop("checked", true);
      }
    });
    if (selected_member_role == "no_role_selected") {
      $(".update-role-button").prop("disabled", true);
      $(".delete-role-button").prop("disabled", true);
    } else {
      $(".update-role-button").prop("disabled", false);
      $(".delete-role-button").prop("disabled", false);
    }
  });
  
  if(select_member_role_trigger!=null){
    $("#selected_member_role").val(select_member_role_trigger).trigger('change');
  } 
  

  //Event triggered when update role button is clicked in Member ACL Edit Role Page
  $(".update-role-button").on("click", function (e) {
    e.preventDefault();
    $("#action_type").val("update_role");
    var $form = $(".update-role-form");

    $.post(
      ajax_obj.ajax_url,
      $form.serialize(),

      function (data) {
        //defined in template file
        roles_caps_master = data.roles_caps_master;
        $("[class~='modal-container']")[2].classList.add('modal-show');
      },
      "json"
    );
  });

  //Event triggered when add new role button is clicked in Member ACL Edit Role Page
  $(".add-role-button").on("click", function (e) {
    e.preventDefault();
    var buttonText = $(this).html();
    if (buttonText == "Add New Role") {
      $(this).html("Confirm Add Role");
      $(".cancel-add-role-button").show();
      $("#new_role_name").prop("disabled", false);
      $(".update-role-button").prop("disabled", true);
      $(".delete-role-button").prop("disabled", true);
      $("#selected_member_role option[value=no_role_selected]").attr(
        "selected",
        "selected"
      );
      $("#selected_member_role").prop("disabled", true);
      $("input:checkbox").prop("checked", false);
    } else {
      $("#action_type").val("add_role");
      var $form = $(".update-role-form");

      $.post(
        ajax_obj.ajax_url,
        $form.serialize(),

        function (data) {
          //defined in template file
          roles_caps_master = data.roles_caps_master;
          if (data.error == false) {
            $("#selected_member_role").prop("disabled", false);
            $("#new_role_name").val("");
            $("#new_role_name").prop("disabled", true);
            $(".cancel-add-role-button").hide();
            $(".add-role-button").html("Add New Role");
            $("#selected_member_role").append(
              $("<option selected></option>")
                .val(data.role_name)
                .html(data.display_name)
            );            
            $(".update-role-button").prop("disabled", false);
            $(".delete-role-button").prop("disabled", false);
            $("[class~='modal-container']")[1].classList.add('modal-show');
          }
          else{
            //show add role failed modal
            $("[class~='modal-container']")[1].classList.add('modal-show');
          }
         
        },
        "json"
      );
    }
  });


  //Event triggered when cancel add role button is clicked in Member ACL Edit Role Page

  $(".cancel-add-role-button").on("click", function (e) {
    e.preventDefault();
    $(".add-role-button").html("Add New Role");
    $("#selected_member_role").prop("disabled", false);
    $("#new_role_name").val("");
    $("#new_role_name").prop("disabled", true);
    $(this).hide();
  });

  //Event triggered when delete role button is clicked in Member ACL Edit Role Page 
  $(".delete-role-button").on("click", (e) => {
    e.preventDefault();
    $("[class~='modal-container']")[0].classList.add('modal-show');
    //$(".modal-container").addClass("modal-show");
    
  });

  //Event triggered when delete role button is clicked in  Member ACL Main Page
  $(".delete-role-main-page-button").on("click", (e) => {
    e.preventDefault();
    //alert(e.target.getAttribute('data-role-id'));
    $("#selected_member_role").val(e.target.getAttribute('data-role-id'))
    $("[class~='modal-container']")[0].classList.add('modal-show');
    $(".modal-container").addClass("modal-show");
    
  });

  //Event triggered when ok button is clicked  in the delete role modal in Member ACL Edit Role Page
  $(".modal-delete-role-ok-btn1").on("click", (e) => {
    e.preventDefault();
    $(".modal-container").removeClass("modal-show");    
    $("#action_type").val("delete_role");
    var $form = $(".update-role-form");
    console.log($form.serialize());
    $.post(
      ajax_obj.ajax_url,
      $form.serialize(),
      function(data){
        console.log(data);
        alert(data.message);
      },
      "json"
    ); 
  });

  //Event triggered when ok button is clicked  in the delete role modal in Member ACL Edit Role Page
  $(".modal-delete-role-ok-btn2").on("click", (e) => {
    e.preventDefault();
    $(".modal-container").removeClass("modal-show");    
    $("#action_type").val("delete_role");    
    var $form = $(".member-acl-role-form");
    $.post(
      ajax_obj.ajax_url,
      $form.serialize(),
      function(data){
        console.log(data);
        alert(data.message);
      },
      "json"
    ); 
  });
  //Event triggered when cancel button is clicked  in the delete role modal in Member ACL Edit Role Page
  $(".modal-cancel-btn").on("click", (e) => {
    e.preventDefault();
    $(".modal-container").removeClass("modal-show");
  });

  //Event triggered when Rename link is clicked in Member ACL Main Page
 
  $(".rename-role-main-page-button").on("click", (e) => {
    e.preventDefault();
    $("[class~='modal-container']")[1].classList.add('modal-show');
  });

  //Event triggered when ok is clicked in modal in Member ACL Main Page
 
  $(".modal-rename-role-ok-button").on("click", (e) => {
    e.preventDefault();
    $(".modal-container").removeClass("modal-show");
    var rename_role_value = $("#rename-role-value-input").val();
    $("#rename_role_value").val(rename_role_value);
    $("#action_type").val("rename_role");    
    var $form = $(".member-acl-role-form");
    $.post(
      ajax_obj.ajax_url,
      $form.serialize(),
      function(data){
        console.log(data);
        alert(data.message);
      },
      "json"
    ); 
  
  });

}); //End of jQuery assign as $ at the beginning of this file
