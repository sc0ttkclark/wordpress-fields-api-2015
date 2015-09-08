#Architecture Choices

The #metadata project's goal was to implement a feature whose scope could become overwhelming if an attempt was made to incorporate all functionality desired by the participants into the implementation. As that was not realistic the best approach was to ensure that #metadata had a consistent and extensible architecture that was extremely flexible. 

This document lists those architecture choices and explains the reason they were chosen.

##Object Orientation
While it might have been possible to implement #metadata using procedural code and associative arrays past experience indicated that would result in a code base that quickly grows to be unmanageable. Further, not using OOP would have placed a greater burden on those creating custom objects to use with #metadata than the requirement to learn basic OOP syntax.

##Registration
The WordPress precedent for extending WordPress with additional features such as post types and taxonomies so #metadata follows that lead. It further attempts to provide a consistent approach for object registration that uses flat arrays for object property initialization, frequently referred to as `$args`, or an array of initialization arguments.  

For example:

```PHP
$args = array(
	'type' => 'date',
	'label' => __( 'Event Date', 'myplugin' ),
);
register_post_field( 'event_date', 'event', $args );
```

Or more succinctly:

```PHP
register_post_field( 'event_date', 'event', array(
	'type' => 'date',
	'label' => __( 'Event Date', 'myplugin' ),
));
```

##The WP\_Metadata\_Base Class
PHP is an extremely flexible and powerful language yet its provides very little structure for subclassing thus requiring developers creating the subclasses to write a large amount of code to properly subclass. Thus the goal of the `WP_Metadata_Base` class is to provide a structure for subclassing that assumes initialization. 

###Initialization Rules


##Method Naming Conventions

###get_*() vs. just *()
