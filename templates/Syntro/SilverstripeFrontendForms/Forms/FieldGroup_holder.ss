<div <% if $Name %>id="$Name"<% end_if %> class="field <% if $extraClass %>$extraClass<% end_if %>">
	<% include Syntro/SilverstripeFrontendForms/Forms/Includes/Label %>
	<% loop $FieldList %>
			$SmallFieldHolder
	<% end_loop %>
  <% include Syntro/SilverstripeFrontendForms/Forms/Includes/Description %>
  <% include Syntro/SilverstripeFrontendForms/Forms/Includes/Message %>
</div>
