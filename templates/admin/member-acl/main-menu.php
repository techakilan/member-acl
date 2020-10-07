<?php

$roles_cap_master = $params['roles_caps_master'];
if (isset($params['roles_caps_master']) && isset($params['roles_caps_master']['custom_roles'])) {
    //var_dump($params['roles_caps_master']['custom_roles']);
    
    ?>
    <h3>List of Custom Roles</h3>
   
    
    <script>
    //Hack to solve undecalred variable issue 
    var select_member_role_trigger = null;
    </script>
    <?php
    
}

?>
<h2 class='screen-reader-text'>List of Custom Roles</h2>
<form method="post" class="member-acl-role-form">

<table class="wp-list-table widefat fixed striped " style="width:25%">
	<thead>
	<tr>
		<td  id='cb_role' class='manage-column column-cb check-column'>            
            <input id="member_acl_cb_role_select_all" type="checkbox" />
        </td>
        <th scope="col" id='member_acl_role_name' class='manage-column column-title column-primary sortable desc'>
            <a href="#">
                <span>Role Name</span>
                <span class="sorting-indicator"></span>
            </a>
        </th>
        </thead>

	<tbody id="the-list">
    <input type="hidden" name="action" value="main_role_capabilities_action" />        
        <?php wp_nonce_field( 'main_role_capabilities_action_nonce', 'main_role_capabilities_nonce' ); ?>
        <input type="hidden" id="action_type" name="action_type" value=""/> 
        <input type="hidden" id="selected_member_role" name="selected_member_role" value=""/> 
        <input type="hidden" id="selected_member_roles" name="selected_member_roles" value=""/>
    <?php
        
    foreach ($params['roles_caps_master']['custom_roles'] as $key=>$role) {
        //for($i=0;$i<2;$i++){
        ?>
        

		<tr>
            <th scope="row" class="check-column">                      
                <input id="member_acl_cb_select<?= $key?>" type="checkbox" name="roles[]" value="1" />
                
            </th>
            <td >
                
                <strong><a class="row-title" href=<?php echo menu_page_url('member-acl-edit-role',false)."&selected_role_id=".$key; ?>><?=$role['name']?></a></strong>

                        <div class="hidden" id="inline_$i">
	                       HERE
                        </div>
                    <div class="row-actions">  
                    <span >
                            <a href=<?php echo menu_page_url('member-acl-add-role',false); ?> class="edit-role-main-page-button" aria-label="Add New" aria-expanded="false">
                                Add New
                            </button> | 
                        </span> 
                        <span >
                            <a href=<?php echo menu_page_url('member-acl-edit-role',false)."&selected_role_id=".$key; ?> class="edit-role-main-page-button" aria-label="Edit" aria-expanded="false">
                                Edit 
                            </button> | 
                        </span>
                        
                        <span class='trash'>
                            <a href="#" class="delete-role-main-page-button" aria-label="Move to trash" data-role-id="<?= $key ?>">
                                Delete
                            </a> | 
                        </span>
                        
                    </div>                  
            </td>
    	</tr>
        <?php
        
    }
    ?>
	</tbody>

	<tfoot>
	<tr>
		<td   class='manage-column column-cb check-column'>
            <label class="screen-reader-text" for="cb-select-all-2">Select All</label>
            <input id="cb-select-all-2" type="checkbox" />
        </td>
        <th scope="col"  class='manage-column column-title column-primary sortable desc'>
            <a href="#">
                <span>Role Name</span>
                <span class="sorting-indicator"></span>
            </a>
        </th>
        </tfoot>

</table>
</form>

<div class="modal-container">
    <div class="modal">
        <h3>Delete Role</h3>
        <p>
          The role would be removed and any associated user will be assigned a
          subscriber role. 
        </p>
        <p>Do you want to continue?</p>
        <div class='modal-btn-container' >
            <button class="modal-cancel-btn button button-primary">Cancel</button>
            <button class="modal-delete-role-ok-btn2 button button-primary">OK</button>
        </div>
    </div>
</div>
			