<% if $Message %>
<span class="message <% if $MessageType == 'validation' %>invalid<% else %>$MessageType<% end_if %>-feedback">$Message</span>
<% end_if %>
