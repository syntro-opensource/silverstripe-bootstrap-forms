<div <% if $Name %>id="$Name"<% end_if %> class="field <% if $extraClass %>$extraClass<% end_if %>">
	<% include Syntro/SilverstripeBootstrapForms/Forms/Includes/Label %>
	<% loop $FieldList %>
			$SmallFieldHolder
	<% end_loop %>
  <% include Syntro/SilverstripeBootstrapForms/Forms/Includes/Description %>
  <% include Syntro/SilverstripeBootstrapForms/Forms/Includes/Message %>
</div>
