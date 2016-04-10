# Advanced Posts Widget Testing

This is small plugin for testing the Advanced Posts Widget.  It's meant as a brief overview, outlining ways to extend the widget.

* Check out `filter-utils.php` for example functions to filter various utility methods from the `Advanced_Posts_Widget_Utils` class.  
* Check out `field-subtitle.php` for an example in adding an additional field to the widget form.


## A Quick Overview

1. Add to the widget `$instance` via the `apw_instance_defaults` filter.
1. Add the field to the widget form via the `"apw_form_before_field_{$name}"` filter or the `"apw_form_after_field_{$name}"` filter.
1. Hook into the `Widget_APW_Recent_Posts::update()` method to save the field value.
1. Hook into the `Widget_APW_Recent_Posts::widget()` method to display the field value.

## Resources

* APW plugin on GitHub: https://github.com/dboutote/advanced-posts-widget
* APW plugin overview: http://darrinb.com/advanced-posts-widget/
