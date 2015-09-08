#The WP\_Html\_Element Class

The `WP_Html_Element` class is a simple class that can be used to generate HTML using the tag, an optional array of attributes and their values, and a value if the tag is defined in HTML5 to support a value.

##Ambiguous Values
Values are provided for non-self closing tags such as when a `<div>` is used to wrap HTML; in that case the wrapped HTML would be the value. Another example includes`<textarea>` where the content to be edited is the value. 

Then there is the special case of fields where `"value"` is a valid attribute; in these cases the explicitly provided `"value"` overrides a value attribute.


