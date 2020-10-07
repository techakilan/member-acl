<div class='wrap'>
<style>

.floatLeft { width: 50%; float: left; }
.floatRight {width: 50%; float: right; }
.container { overflow: hidden; }
</style>

<?php

global $wp_roles;
$roles = $wp_roles->roles;
foreach ($roles as $key => $value) {
    if (!in_array($key, [
        'administrator',
        'editor',
        'author',
        'contributor',
        'subscriber',
    ])) {
        $custom_roles[$key] = $value;
        //echo implode(" ", $value['capabilities']);
    }
}
// print it to the screen
//echo '<pre>' . print_r($custom_roles, true) . '</pre>';
?> 

<h1 class="wp-heading-inline">
		Members ACL- All Roles</h1>
        <a href="http://localhost/blog/wp-admin/user-new.php" class="page-title-action">Add New</a>
        <hr class="wp-header-end">
        <ul class="subsubsub">
	        <li class="all"><a href="users.php" class="current" aria-current="page">All <span class="count">(<?php echo count($custom_roles) ?>)</span></a> |</li>

        </ul>
        <form method="get">
		    <p class="search-box">
	        <label class="screen-reader-text" for="role-search-input">Search Roles:</label>
	        <input type="search" id="role-search-input" name="s" value="" />
		    <input type="submit" id="search-submit" class="button" value="Search Roles"  /></p>
		    <input type="hidden" name="_wp_http_referer" value="/blog/wp-admin/roles.php" />	
            <div class="tablenav top">
                <div class="alignleft actions bulkactions">
                    <label for="bulk-action-selector-top" class="screen-reader-text">Select bulk action</label>
                    <select name="action" id="bulk-action-selector-top">
                        <option value="-1">Bulk Actions</option>
                        <option value="delete">Delete</option>
                    </select>
                    <input type="submit" id="doaction" class="button action" value="Apply"  />
                </div>
            </div>
            <h2 class='screen-reader-text'>Users list</h2>
            <table class="wp-list-table widefat fixed striped users">
                <thead>
	                <tr>
		                <td  id='cb' class='manage-column column-cb check-column'>
                            <label class="screen-reader-text" for="cb-select-all-1">Select All</label>
                            <input id="cb-select-all-1" type="checkbox" />
                        </td>
                        <th scope="col" id='role' class='manage-column column-username column-primary sortable desc'>
                            <a href="http://localhost/blog/wp-admin/users.php?orderby=login&#038;order=asc">
                                <span>Role Name</span><span class="sorting-indicator"></span>
                            </a>
                        </th>               
                       
                        <th scope="col" id='capabilities' class='manage-column column-role'>Capabilities</th>
                        
                    </tr>

                </thead>
                    <tbody id="the-list" data-wp-lists='list:roles'		>		
	                    <tr id='role-1'>
                            <th scope='row' class='check-column'>
                                <label class="screen-reader-text" for="role_1">Select role1</label>
                                <input type="checkbox" name="roles[]" id="role_1" class="administrator" value="1" />
                            </th>
                            <td class='username column-username has-row-actions column-primary' data-colname="Username">
                                <strong><a href="http://localhost/blog/wp-admin/profile.php?wp_http_referer=%2Fblog%2Fwp-admin%2Fusers.php">Role1</a></strong><br />
                                <div class="row-actions">
                                    <span class='edit'><a href="http://localhost/blog/wp-admin/profile.php?wp_http_referer=%2Fblog%2Fwp-admin%2Fusers.php">Edit</a> | </span>
                                    <span class='view'><a href="http://localhost/blog/author/akilan/" aria-label="View posts by akilan">View</a></span>
                                </div>
                                <button type="button" class="toggle-row">
                                    <span class="screen-reader-text">Show more details</span>
                                </button>
                            </td>
                            
                            
                            <td class='role column-role' data-colname="Role">Capabilities List 1</td>
                        </tr>                        
                        <?php
                            $counter =1; 
                            foreach($custom_roles as $key => $role){ ?>
                                <tr>
                                    <th scope='row' class='check-column'>
                                        <label class="screen-reader-text" for="role_<?= $counter ?>">select <?= $key ?></label>
                                        <input type="checkbox" name="roles[]" id="role_<?= $counter ?>" value="1" />
                                    </th>
                                    <td class="has-row-actions column-primary">
                                        <strong><?php echo $role['name'] ?></strong>
                                    </td>                                    
                                    <td>
                                        <?php echo implode(" ",array_keys($role['capabilities'])) ?>
                                    </td>

                                </tr>
                        <?php
                            $counter++;
                        }
                        ?>
	                    
	            </tbody>
                <tfoot>
	                <tr>
                        <td  id='cb' class='manage-column column-cb check-column'>
                            <label class="screen-reader-text" for="cb-select-all-1">Select All</label>
                            <input id="cb-select-all-1" type="checkbox" />
                        </td>
                        <th scope="col" id='role' class='manage-column column-username column-primary sortable desc'>
                            <a href="http://localhost/blog/wp-admin/users.php?orderby=login&#038;order=asc">
                                <span>Role Name</span><span class="sorting-indicator"></span>
                            </a>
                        </th>                      
                       
                        <th scope="col" id='capabilities' class='manage-column column-role'>Capabilities</th>
                        
                    
		            </tr>
	            </tfoot>

            </table>
            <div class="tablenav top">
                <div class="alignleft actions bulkactions">
                    <label for="bulk-action-selector-top" class="screen-reader-text">Select bulk action</label>
                    <select name="action" id="bulk-action-selector-top">
                        <option value="-1">Bulk Actions</option>
                        <option value="delete">Delete</option>
                    </select>
                    <input type="submit" id="doaction" class="button action" value="Apply"  />
                </div>
            </div>

            <!-- try new UI -->
            <div class="container" style="display:inline-flex;">
                
                <table  class="wp-list-table widefat fixed striped floatRight" style="width:50%; float:left;">
                <thead>
	                <tr>
		                <td  id='cb' class='manage-column column-cb check-column'>
                            <label class="screen-reader-text" for="cb-select-all-1">Select All</label>
                            <input id="cb-select-all-1" type="checkbox" />
                        </td>
                        <th scope="col" id='role' class='manage-column column-primary sortable desc'>
                            <a href="http://localhost/blog/wp-admin/users.php?orderby=login&order=asc">
                                <span>Role Name</span><span class="sorting-indicator"></span>
                            </a>
                        </th>               
                       
                        <th scope="col" id='capabilities' class='manage-column'>Capabilities</th>
                        
                    </tr>

                </thead>
                <?php
                            $counter =1; 
                            foreach($custom_roles as $key => $role){ ?>
                                <tr>
                                    <th scope='row' class='check-column'>
                                        <label class="screen-reader-text" for="role_<?= $counter ?>">select <?= $key ?></label>
                                        <input type="checkbox" name="roles[]" id="role_<?= $counter ?>" value="1" />
                                    </th>
                                    <td class="has-row-actions column-primary">
                                        <strong><?php echo $role['name'] ?></strong>
                                    </td>                                    
                                    <td>
                                        <?php echo implode(" ",array_keys($role['capabilities'])) ?>
                                    </td>

                                </tr>
                        <?php
                            $counter++;
                        }
                        ?>
                </table>
                
                <table  class="wp-list-table widefat fixed striped" style="width:50%;float:right;margin-left:5px;">
                    <tr>
                            <td>Name</td>
                            <td>Place</td>

                    </tr>
                    <tr>
                            <td>Name</td>
                            <td>Place</td>

                    </tr>
                </table>
            </div>

</div>
