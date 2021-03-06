
<div >
<h1> Member ACL Page </h1>
<hr class="wp-header-end">
<p id='ajax-message'></p> 
<div id='capabilities' class="wrap">  
    

    <!-- <form method="post" action="options.php"> -->

    <form method="post" class="add-role-form" action="<?php echo admin_url('admin-ajax.php'); ?>">
    <div class="wrap" >
                   <label><strong>New Role Name: </strong></label>
                   <input type='text' name='new_role_name' id='new_role_name' />
            </div>
            <hr> 
            <h3>Capabilities</h3>
        <input type="hidden" name="action" value="add_new_role_action" />
       
        <?php wp_nonce_field( 'add_new_role_action_nonce', 'add_new_role_nonce' ); ?>
        <table class="form-table   striped " role="presentation">
        <tr>
                <th scope="row">General</th>
                    <td>
                        <fieldset>
                            
                            <label for="read">
                            <input name="role_capabilities[read]" type="checkbox" id="read" value="1"  />
                            <strong>Read:</strong>To Read pages and posts</label>
                            <br />
                            
                    </fieldset>
                </td>
                
                <td>
                        
                </td>
                <td>

                </td>
            </tr>
            
            <tr>
                <th scope="row">For Themes</th>
                    <td>
                        <fieldset>
                            
                            <label for="switch_themes">
                            <input name="role_capabilities[switch_themes]" type="checkbox" id="switch_themes" value="1"  />
                            <strong>Switch Themes:</strong>To change the wordpress website themes</label>
                            <br />
                            <label for="install_themes">
                            <input name="role_capabilities[install_themes]" type="checkbox" id="install_themes" value="1"/>
                            <strong>Install Themes:</strong>To edit wordpress theme in themes editor</label>
                            <br />                             
                    </fieldset>
                </td>
                
                    <td>
                        <fieldset>
                            <label for="edit_themes">
                            <input name="role_capabilities[edit_themes]" type="checkbox" id="edit_themes" value="1"/>
                            <strong>Edit Themes:</strong>To edit wordpress theme in themes editor</label>
                            <br />  
                            <label for="edit_theme_options">
                            <input name="role_capabilities[edit_theme_options]" type="checkbox" id="edit_theme_options" value="1"  />
                            <strong>Edit Theme Options:</strong>To change the wordpress website themes</label>
                            <br />
                                                            
                        </fieldset>
                </td>
                <td>
                        
                </td>
                
            </tr>
            <tr>
                <th scope="row">For Pages</th>
                    <td>
                        <fieldset>
                            
                            <label for="read">                            
                            <strong>Read:</strong>To Read pages(enable at General->Read)</label>
                            <br />
                            <label for="read_private_pages">
                            <input  name="role_capabilities[read_private_pages]" type="checkbox" id="read_private_pages" value="1"  />
                            <strong>Read Private Pages:</strong>To Read private pages</label>
                            <br />
                            <label for="publish_pages">
                            <input  name="role_capabilities[publish_pages]" type="checkbox" id="publish_pages" value="1"  />
                            <strong>Publish Pages:</strong>To Publish pages(otherwise only save as draft is allowed)</label>
                            <br />
                                                      
                    </fieldset>
                </td>
                
                    <td>
                        <fieldset>
                                
                                <label for="edit_others_pages">
                                <input  name="role_capabilities[edit_others_pages]"  type="checkbox" id="edit_others_pages" value="1"  />
                                <strong>Edit Other Pages:</strong>To edit(own & other's) pages and add new pages</label>
                                <br />
                                <label for="edit_pages">
                                <input  name="role_capabilities[edit_pages]"  type="checkbox" id="edit_pages" value="1"/>
                                <strong>Edit Pages:</strong>To edit(own) page and add new page</label>
                                <br />      
                                <label for="edit_published_pages">
                                <input  name="role_capabilities[edit_published_pages]"  type="checkbox" id="edit_published_pages" value="1"/>
                                <strong>Edit Published Pages:</strong>To edit(own) and update already published Page</label>
                                <br />   
                                <label for="edit_private_pages">
                                <input  name="role_capabilities[edit_private_pages]"  type="checkbox" id="edit_private_pages" value="1"  />
                                <strong>Edit Private Pages:</strong>To Edit private page</label>
                                <br />                        
                        </fieldset>
                </td>
                <td>
                        <fieldset>
                                
                                <label for="delete_pages">
                                <input  name="role_capabilities[delete_pages]" type="checkbox" id="delete_pages" value="1"  />
                                <strong>Delete Pages:</strong>To delete(own) page </label>
                                <br />
                                <label for="delete_others_pages">
                                <input  name="role_capabilities[delete_others_pages]"  type="checkbox" id="delete_others_pages" value="1"/>
                                <strong>Delete Others Pages:</strong>To delete(own and others) page</label>
                                <br />      
                                <label for="delete_published_pages">
                                <input  name="role_capabilities[delete_published_pages]"  type="checkbox" id="delete_published_pages" value="1"/>
                                <strong>Delete Published Pages:</strong>To delete page(own) that is already published</label>
                                <br /> 
                                <label for="delete_private_pages">
                                <input  name="role_capabilities[delete_private_pages]" type="checkbox" id="delete_private_pages" value="1"  />
                                <strong>Delete Private Pages:</strong>To Delete private pages</label>
                                <br />                              
                        </fieldset>
                </td>
            </tr>
            <tr>
                <th scope="row">For Posts</th>
                    <td>
                        <fieldset>
                            <label for="read">                            
                            <strong>Read:</strong>To Read posts(enable at General->Read)</label>
                            <br />                            
                            <label for="read_private_posts">
                            <input  name="role_capabilities[read_private_posts]" type="checkbox" id="read_private_posts" value="1"  />
                            <strong>Read Private Post:</strong>To Read private posts</label>
                            <br />
                            <label for="publish_posts">
                            <input  name="role_capabilities[publish_posts]"  type="checkbox" id="publish_posts" value="1"  />
                            <strong>Publish Posts:</strong>To Publish posts(otherwise only save as draft is allowed)</label>
                            <br />
                                                      
                    </fieldset>
                </td>
                
                    <td>
                        <fieldset>
                                
                                <label for="edit_others_posts">
                                <input  name="role_capabilities[edit_others_posts]" type="checkbox" id="edit_others_posts" value="1"  />
                                <strong>Edit Other Posts:</strong>To edit(own & other's) post and add new post</label>
                                <br />
                                <label for="edit_posts">
                                <input n name="role_capabilities[edit_posts]"  type="checkbox" id="edit_posts" value="1"/>
                                <strong>Edit Posts:</strong>To edit(own) post and add new post</label>
                                <br />      
                                <label for="edit_published_posts">
                                <input  name="role_capabilities[edit_published_posts]"  type="checkbox" id="edit_published_posts" value="1"/>
                                <strong>Edit Published Posts:</strong>To edit(own) and update already published post</label>
                                <br />   
                                <label for="edit_private_posts">
                                <input  name="role_capabilities[edit_private_posts]"  type="checkbox" id="edit_private_posts" value="1"  />
                                <strong>Edit Private Post:</strong>To Edit private posts</label>
                                <br />                        
                        </fieldset>
                </td>
                <td>
                        <fieldset>
                                
                                <label for="delete_posts">
                                <input  name="role_capabilities[delete_posts]" type="checkbox" id="delete_posts" value="1"  />
                                <strong>Delete Posts:</strong>To delete(own) post </label>
                                <br />
                                <label for="delete_others_posts">
                                <input  name="role_capabilities[delete_others_posts]"  type="checkbox" id="delete_others_posts" value="1"/>
                                <strong>Delete Others Posts:</strong>To delete(own and others) post</label>
                                <br />      
                                <label for="delete_published_posts">
                                <input  name="role_capabilities[delete_published_posts]"  type="checkbox" id="delete_published_posts" value="1"/>
                                <strong>Delete Published Posts:</strong>To delete post(own) that is already published</label>
                                <br /> 
                                <label for="delete_private_posts">
                                <input  name="role_capabilities[delete_private_posts]"  type="checkbox" id="delete_private_posts" value="1"  />
                                <strong>Delete Private Post:</strong>To Delete private posts</label>
                                <br />                              
                        </fieldset>
                </td>
            </tr>
            <tr>
                <th scope="row">For Plugins</th>
                    <td>
                        <fieldset>                            
                            <label for="install_plugins">
                            <input  name="role_capabilities[install_plugins]"  type="checkbox" id="install_plugins" value="1"  />
                            <strong>Install Plugins:</strong>To Add New Plugin</label>
                            <br />
                            <label for="activate_plugins">
                            <input  name="role_capabilities[activate_plugins]"  type="checkbox" id="activate_plugins" value="1"  />
                            <strong>Activate Plugin</strong>To Activate/Deactivate Plugin(This is not install plugin)</label>
                            <br />
                            
                                                      
                    </fieldset>
                </td>
                <td>
                    <fieldset>  
                        <label for="edit_plugins">
                        <input  name="role_capabilities[edit_plugins]"  type="checkbox" id="edit_plugins" value="1"  />
                        <strong>Edit Plugins</strong>To Edit Plugin using Wordpress plugin editor</label>
                        <br />
                        <label for="update_plugins">
                        <input  name="role_capabilities[update_plugins]"  type="checkbox" id="update_plugins" value="1"  />
                        <strong>Update Plugins</strong>To Update Plugin</label>
                        <br />
                    </fieldset>  
                </td>
                <td>
                <fieldset>  
                        <label for="delete_plugins">
                        <input  name="role_capabilities[delete_plugins]"  type="checkbox" id="delete_plugins" value="1"  />
                        <strong>Delete Plugins</strong>To Delete Plugin using Wordpress plugin editor</label>
                        <br />
                        
                    </fieldset>  
                </td>
            </tr>
        </table>
        <p class="submit">
            <input type="submit" name="submit" id="submit" class="button button-primary" value="Add Role"  />
        </p>
    </form>  
</div>   


</div> 
